<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use App\Http\Requests\StoreHotelRequest;
use App\Http\Requests\UpdateHotelRequest;
use App\Models\HotelCategory;
use App\Models\HotelOpinion;
use App\Models\HotelRate;
use App\Models\HotelService;
use App\Models\HotelTag;
use App\Models\ParentHotel;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hotels = Hotel::with('media', 'admin', 'parentHotel')->select('id', 'headline', 'admin_id', 'parent_hotel_id')->when(!auth('admin')->user()->hasRole('super-admin'), function ($q) {
            return $q->where('admin_id', auth('admin')->user()->id);
        })->latest()->paginate(20);


        return view('pages.admin.hotels.index', compact('hotels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories     = HotelCategory::latest()->get();
        $tags           = HotelTag::latest()->get();
        $services       = HotelService::latest()->get();

        return view('pages.admin.hotels.create', compact('categories', 'tags', 'services'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([

            'thumbnail' => 'required|mimes:jpeg,jpg',

            'gallery' => 'required',
            'gallery.*' => 'mimes:jpeg,jpg',

            'google_place_id' => 'required|string',
            'title' => 'required|string',
            'address' => 'required|string',
            'city_country' => 'required|string',
            'google_rating' => "required|numeric",
            'google_total_reviews' => "required|numeric",


            'headline' => 'required|string',
            // 'excerpt' => 'required|string',
            'description' => 'required|string',

            'slug'               => 'nullable|unique:hotels,slug',

            'categories' => 'array|required',
            'categories.*' => 'exists:hotel_categories,id',

            'tags' => 'required|string',
            // 'tags.*' => 'exists:hotel_tags,id',

            // 'services' => 'array|required',
            // 'services.*' => 'exists:hotel_services,id',

            'rating_romantic' => 'nullable|required_if:rating_intimate,*|required_if:rating_luxury,*|numeric|min:1|max:10',
            'rating_intimate' => 'nullable|numeric|required_if:rating_romantic,*|required_if:rating_luxury,*|min:1|max:10',
            'rating_luxury' => 'nullable|numeric|required_if:rating_intimate,*|required_if:rating_romantic,*|min:1|max:10',
            'opinion'       => 'required|string',
        ]);






        $parentHotel =  ParentHotel::firstWhere('google_place_id', $request->google_place_id);
        if (!$parentHotel) { //Create new one
            $parentHotel = ParentHotel::create([
                'google_place_id' => $request->google_place_id,
                'title' => $request->title,
                'address' => $request->address,
                'city_country' => $request->city_country,
                'google_rating' => $request->google_rating,
                'google_total_reviews' => $request->google_total_reviews,
            ]);
        } else {
            //update old one
            $parentHotel->update([
                'title' => $request->title,
                'address' => $request->address,
                'city_country' => $request->city_country,
                'google_rating' => $request->google_rating,
                'google_total_reviews' => $request->google_total_reviews,
                'sync_date'     => now()
            ]);
        }


        $hotel  = Hotel::create([
            'headline' => $request->headline,
            // 'excerpt' => $request->excerpt,
            'description' => $request->description,
            'slug' => $request->slug,

            'parent_hotel_id' => $parentHotel->id,
            'admin_id' => auth('admin')->user()->id
        ]);

        $hotel->categories()->sync($request->categories);
        //-------------- sync tags----------------
        $tagsString = $request->tags;
        $tagTitles = explode(',', $tagsString);

        // Find existing tags
        $existingTags = HotelTag::whereIn('title', $tagTitles)->get();

        // Get the IDs of the existing tags
        $existingTagIds = $existingTags->pluck('id')->toArray();

        // Create new tags for the titles that don't exist
        $newTagTitles = array_diff($tagTitles, $existingTags->pluck('title')->toArray());
        $newTagIds = [];
        foreach ($newTagTitles as $title) {
            $newTag = HotelTag::create(['title' => $title]);
            $newTagIds[] = $newTag->id;
        }

        // Merge the existing tag IDs with the newly created tag IDs
        $allTagIds = array_merge($existingTagIds, $newTagIds);

        $hotel->tags()->sync($allTagIds);
        //-------------- end sync tags------------
        // $hotel->services()->sync($request->services);



        if ($request->rating_luxury && $request->rating_intimate && $request->rating_romantic) {
            $parentHotel->ratings()->createMany([
                [
                    'type' => 'luxury',
                    'rate' => $request->rating_luxury,
                    'admin_id' => auth('admin')->user()->id

                ],
                [
                    'type' => 'intimate',
                    'rate' => $request->rating_intimate,
                    'admin_id' => auth('admin')->user()->id
                ],
                [
                    'type' => 'romantic',
                    'rate' => $request->rating_romantic,
                    'admin_id' => auth('admin')->user()->id
                ],
            ]);
        }


        $parentHotel->opinions()->create([
            'comment' => $request->opinion,
            'admin_id' => auth('admin')->user()->id
        ]);

        $parentHotel->syncRatings();


        // thumbnail
        $hotel->addMediaFromRequest('thumbnail')
            ->toMediaCollection('thumbnail');

        foreach ($request->file('gallery') as $image) {
            $hotel->addMedia($image)->toMediaCollection('gallery');
        }


        return redirect()->route('admin.hotels.edit', $hotel->id)->with('success-message', 'Property created.');
    }


    public function storeRatings(Request $request, Hotel $hotel)
    {

        $request->validate([
            'romantic' => 'numeric|min:1|max:10',
            'intimate' => 'numeric|min:1|max:10',
            'luxury' => 'numeric|min:1|max:10',
            'opinion'       => 'required|string',
            'created_at' => ['required', function ($attribute, $value, $fail) {
                try {
                    Carbon::createFromFormat('d M,Y', $value);
                } catch (\Exception $e) {
                    $fail('The ' . $attribute . ' must be in the format "dd M, Y".');
                }
            }]
        ]);

        $created_at = Carbon::createFromFormat('d M,Y', $request->created_at);
        $authAdmin = auth('admin')->user();

        $hotel->parentHotel->ratings()->createMany([
            [
                'type' => 'luxury',
                'rate' => $request->luxury,
                'admin_id' => $authAdmin->id,
                'created_at' => $created_at,
                'updated_at' => $created_at


            ],
            [
                'type' => 'intimate',
                'rate' => $request->intimate,
                'admin_id' => $authAdmin->id,
                'created_at' => $created_at,
                'updated_at' => $created_at

            ],
            [
                'type' => 'romantic',
                'rate' => $request->romantic,
                'admin_id' => $authAdmin->id,
                'created_at' => $created_at,
                'updated_at' => $created_at
            ],
        ]);


        $hotel->parentHotel->opinions()->create([
            'comment' => $request->opinion,
            'admin_id' => $authAdmin->id,
            'created_at' => $created_at,
            'updated_at' => $created_at
        ]);

        $hotel->parentHotel->syncRatings();

        return redirect()->back();
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit($hotel)
    {

        $authAdmin = auth('admin')->user();

        $hotel = Hotel::when(!auth('admin')->user()->hasRole('super-admin'), function ($q) use ($authAdmin) {
            $q->where('admin_id', $authAdmin->id);
        })->where('id', $hotel)->firstOrFail();

        $categories     = HotelCategory::latest()->get();
        $tags           = HotelTag::latest()->get();
        $services       = HotelService::latest()->get();



        $rating_romantic_query = $hotel->parentHotel->ratings()->with('admin')->where('type', 'romantic');
        $rating_romantic_total = $rating_romantic_query->count();
        $rating_romantic = $rating_romantic_query->latest()->paginate(30)->withQueryString();


        $rating_intimate_query = $hotel->parentHotel->ratings()->with('admin')->where('type', 'intimate');
        $rating_intimate_total = $rating_intimate_query->count();
        $rating_intimate = $rating_intimate_query->latest()->paginate(30)->withQueryString();

        $rating_luxury_query = $hotel->parentHotel->ratings()->with('admin')->where('type', 'luxury');
        $rating_luxury_total = $rating_luxury_query->count();
        $rating_luxury = $rating_luxury_query->latest()->paginate(30)->withQueryString();




        return view('pages.admin.hotels.edit', compact(
            'hotel',
            'categories',
            'tags',
            'services',
            'rating_romantic',
            'rating_romantic_total',
            'rating_intimate',
            'rating_intimate_total',
            'rating_luxury',
            'rating_luxury_total',
            'authAdmin'
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $hotel)
    {

        $hotel = Hotel::when(!auth('admin')->user()->hasRole('super-admin'), function ($q) {
            $q->where('admin_id', auth('admin')->user()->id);
        })->where('id', $hotel)->firstOrFail();

        $authAdmin = $hotel->admin;

        $request->validate([

            'thumbnail' => 'nullable|mimes:jpeg,jpg',

            'gallery' => 'nullable',
            'gallery.*' => 'mimes:jpeg,jpg',

            'google_place_id' => 'required|string',
            'title' => 'required|string',
            'address' => 'required|string',
            'city_country' => 'required|string',
            'google_rating' => "required|numeric",
            'google_total_reviews' => "required|numeric",

            'headline' => 'required|string',
            // 'excerpt' => 'required|string',
            'description' => 'required|string',


            'slug'               => 'nullable|unique:hotels,slug,' . $hotel->id,

            'categories' => 'array|required',
            'categories.*' => 'exists:hotel_categories,id',

            'tags' => 'required|string',

            // 'services' => 'array|required',
            // 'services.*' => 'exists:hotel_services,id',

            // 'rating_romantic' => 'numeric|min:1|max:10',
            // 'rating_intimate' => 'numeric|min:1|max:10',
            // 'rating_luxury' => 'numeric|min:1|max:10',





        ]);






        $parentHotel =  ParentHotel::firstWhere('google_place_id', $request->google_place_id);
        if (!$parentHotel) {

            //Create new one
            $parentHotel = ParentHotel::create([
                'google_place_id' => $request->google_place_id,
                'title' => $request->title,
                'address' => $request->address,
                'city_country' => $request->city_country,
                'google_rating' => $request->google_rating,
                'google_total_reviews' => $request->google_total_reviews,
            ]);
        } else {
            //update old one
            $parentHotel->update([
                'title' => $request->title,
                'address' => $request->address,
                'city_country' => $request->city_country,
                'google_rating' => $request->google_rating,
                'google_total_reviews' => $request->google_total_reviews,
                'sync_date'     => now()
            ]);
        }



        $hotel->update([
            'google_place_id' => $request->google_place_id,
            'headline' => $request->headline,
            // 'excerpt' => $request->excerpt,
            'description' => $request->description,
            'slug' => $request->slug,

            'parent_hotel_id' => $parentHotel->id,
            'admin_id' => $authAdmin->id
        ]);

        $hotel->categories()->sync($request->categories);
        //-------------- sync tags----------------
        $tagsString = $request->tags;
        $tagTitles = explode(',', $tagsString);

        // Find existing tags
        $existingTags = HotelTag::whereIn('title', $tagTitles)->get();

        // Get the IDs of the existing tags
        $existingTagIds = $existingTags->pluck('id')->toArray();

        // Create new tags for the titles that don't exist
        $newTagTitles = array_diff($tagTitles, $existingTags->pluck('title')->toArray());
        $newTagIds = [];
        foreach ($newTagTitles as $title) {
            $newTag = HotelTag::create(['title' => $title]);
            $newTagIds[] = $newTag->id;
        }

        // Merge the existing tag IDs with the newly created tag IDs
        $allTagIds = array_merge($existingTagIds, $newTagIds);

        $hotel->tags()->sync($allTagIds);
        //remove other tags that has no hotels
        HotelTag::doesntHave('hotels')->get()->each->delete();
        //-------------- end sync tags------------

        // $hotel->services()->sync($request->services);


        // thumbnail
        if ($request->hasFile('thumbnail'))
            $hotel->addMediaFromRequest('thumbnail')
                ->toMediaCollection('thumbnail');


        // Gallery
        if ($gallery = $request->file('gallery')) {
            foreach ($gallery as $image) {
                $hotel->addMedia($image)->toMediaCollection('gallery');
            }
        }



        // Delete empty parent hotels
        ParentHotel::doesntHave('hotel')->get()->each->delete();


        return redirect()->route('admin.hotels.edit', $hotel->id)->with('success-message', 'Property updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($hotel)
    {
        $hotel = Hotel::when(!auth('admin')->user()->hasRole('super-admin'), function ($q) {
            $q->where('admin_id', auth('admin')->user()->id);
        })->where('id', $hotel)->firstOrFail();


        $hotel->delete();

        //remove other tags that has no hotels
        HotelTag::doesntHave('hotels')->get()->each->delete();


        // Delete empty parent hotels
        ParentHotel::doesntHave('hotel')->get()->each->delete();






        return redirect()->back()->with('success-message', 'Property deleted.');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function deleteRatings(HotelRate $hotelRate)
    {
        $hotelRate->delete();
        $hotelRate->parentHotel->syncRatings();
        return redirect()->back();
    }


    /**
     * Remove the specified resource from storage.
     */
    public function deleteOpinion(HotelOpinion $hotelOpinion)
    {
        $hotelOpinion->delete();
        return redirect()->back();
    }
}
// <?php

// namespace App\Http\Controllers\Admin;

// use App\Http\Controllers\Controller;
// use App\Models\Hotel;
// use App\Http\Requests\StoreHotelRequest;
// use App\Http\Requests\UpdateHotelRequest;
// use App\Models\HotelCategory;
// use App\Models\HotelOpinion;
// use App\Models\HotelRate;
// use App\Models\HotelService;
// use App\Models\HotelTag;
// use Carbon\Carbon;
// use Illuminate\Http\Request;

// class HotelController extends Controller
// {
//     /**
//      * Display a listing of the resource.
//      */
//     public function index()
//     {
//         $hotels = Hotel::with('media', 'admin')->select('id', 'headline', 'admin_id')->when(!auth('admin')->user()->hasRole('super-admin'), function ($q) {
//             return $q->where('admin_id', auth('admin')->user()->id);
//         })->latest()->paginate(20);


//         return view('pages.admin.hotels.index', compact('hotels'));
//     }

//     /**
//      * Show the form for creating a new resource.
//      */
//     public function create()
//     {
//         $categories     = HotelCategory::latest()->get();
//         $tags           = HotelTag::latest()->get();
//         $services       = HotelService::latest()->get();

//         return view('pages.admin.hotels.create', compact('categories', 'tags', 'services'));
//     }

//     /**
//      * Store a newly created resource in storage.
//      */
//     public function store(Request $request)
//     {

//         $request->validate([

//             'thumbnail' => 'required|mimes:jpeg,jpg',

//             'gallery' => 'required',
//             'gallery.*' => 'mimes:jpeg,jpg',

//             'google_place_id' => 'required|string',
//             'title' => 'required|string',
//             'address' => 'required|string',
//             'google_rating' => "required|numeric",
//             'google_total_reviews' => "required|numeric",


//             'headline' => 'required|string',
//             'excerpt' => 'required|string',
//             'description' => 'required|string',

//             'slug'               => 'nullable|unique:hotels,slug',

//             'categories' => 'array|required',
//             'categories.*' => 'exists:hotel_categories,id',

//             'tags' => 'array|required',
//             'tags.*' => 'exists:hotel_tags,id',

//             'services' => 'array|required',
//             'services.*' => 'exists:hotel_services,id',

//             'rating_romantic' => 'nullable|required_if:rating_intimate,*|required_if:rating_luxury,*|numeric|min:1|max:10',
//             'rating_intimate' => 'nullable|numeric|required_if:rating_romantic,*|required_if:rating_luxury,*|min:1|max:10',
//             'rating_luxury' => 'nullable|numeric|required_if:rating_intimate,*|required_if:rating_romantic,*|min:1|max:10',
//             'opinion'       => 'required|string',
//         ]);






//         $data = [
//             'google_place_id' => $request->google_place_id,
//             'title' => $request->title,
//             'address' => $request->address,
//             'google_rating' => $request->google_rating,
//             'google_total_reviews' => $request->google_total_reviews,

//             'headline' => $request->headline,
//             'excerpt' => $request->excerpt,
//             'description' => $request->description,
//             'slug' => $request->slug,

//             // 'booking_type' => $request->booking_type
//             'admin_id' => auth('admin')->user()->id
//         ];


//         // if ($request->booking_type == 'direct') {
//         //     $data['direct_booking_link'] = $request->direct_booking_link;
//         // }

//         // if ($request->booking_type == 'request') {
//         //     $data['booking_request_price_per_night'] = $request->booking_request_price_per_night;
//         //     $data['booking_request_link']           = $request->booking_request_link;
//         // }
//         // if ($request->booking_type == 'online') {
//         //     $data['online_booking_links'] = $request->online_booking_links;
//         // }


//         $hotel  = Hotel::create($data);

//         $hotel->categories()->sync($request->categories);
//         $hotel->tags()->sync($request->tags);
//         $hotel->services()->sync($request->services);



//         if ($request->rating_luxury && $request->rating_intimate && $request->rating_romantic) {
//             $hotel->ratings()->createMany([
//                 [
//                     'type' => 'luxury',
//                     'rate' => $request->rating_luxury
//                 ],
//                 [
//                     'type' => 'intimate',
//                     'rate' => $request->rating_intimate
//                 ],
//                 [
//                     'type' => 'romantic',
//                     'rate' => $request->rating_romantic
//                 ],
//             ]);
//         }


//         $hotel->opinions()->create([
//             'comment' => $request->opinion,
//         ]);



//         // thumbnail
//         $hotel->addMediaFromRequest('thumbnail')
//             ->toMediaCollection('thumbnail');

//         foreach ($request->file('gallery') as $image) {
//             $hotel->addMedia($image)->toMediaCollection('gallery');
//         }


//         return redirect()->route('admin.hotels.edit', $hotel->id);
//     }


//     public function storeRatings(Request $request, Hotel $hotel)
//     {

//         $request->validate([
//             'romantic' => 'numeric|min:1|max:10',
//             'intimate' => 'numeric|min:1|max:10',
//             'luxury' => 'numeric|min:1|max:10',
//             'opinion'       => 'required|string',
//             'created_at' => ['required', function ($attribute, $value, $fail) {
//                 try {
//                     Carbon::createFromFormat('d M,Y', $value);
//                 } catch (\Exception $e) {
//                     $fail('The ' . $attribute . ' must be in the format "dd M, Y".');
//                 }
//             }]
//         ]);

//         $created_at = Carbon::createFromFormat('d M,Y', $request->created_at);

//         $hotel->ratings()->createMany([
//             [
//                 'type' => 'luxury',
//                 'rate' => $request->luxury,
//                 'created_at' => $created_at,
//                 'updated_at' => $created_at


//             ],
//             [
//                 'type' => 'intimate',
//                 'rate' => $request->intimate,
//                 'created_at' => $created_at,
//                 'updated_at' => $created_at

//             ],
//             [
//                 'type' => 'romantic',
//                 'rate' => $request->romantic,
//                 'created_at' => $created_at,
//                 'updated_at' => $created_at
//             ],
//         ]);


//         $hotel->opinions()->create([
//             'comment' => $request->opinion,
//             'created_at' => $created_at,
//             'updated_at' => $created_at
//         ]);



//         return redirect()->back();
//     }



//     /**
//      * Show the form for editing the specified resource.
//      */
//     public function edit($hotel)
//     {

//         $hotel = Hotel::when(!auth('admin')->user()->hasRole('super-admin'), function ($q) {
//             $q->where('admin_id', auth('admin')->user()->id);
//         })->where('id', $hotel)->firstOrFail();

//         $categories     = HotelCategory::latest()->get();
//         $tags           = HotelTag::latest()->get();
//         $services       = HotelService::latest()->get();





//         $rating_romantic_query = $hotel->ratings()->where('type', 'romantic')->latest();
//         $rating_romantic_total = $rating_romantic_query->latest()->count();
//         $rating_romantic = $rating_romantic_query->paginate(30)->withQueryString();


//         $rating_intimate_query = $hotel->ratings()->where('type', 'intimate')->latest();
//         $rating_intimate_total = $hotel->ratings()->where('type', 'intimate')->latest()->count();
//         $rating_intimate = $rating_intimate_query->paginate(30)->withQueryString();

//         $rating_luxury_query = $hotel->ratings()->where('type', 'luxury')->latest();
//         $rating_luxury_total = $hotel->ratings()->where('type', 'luxury')->latest()->count();
//         $rating_luxury = $rating_luxury_query->paginate(30)->withQueryString();




//         return view('pages.admin.hotels.edit', compact(
//             'hotel',
//             'categories',
//             'tags',
//             'services',
//             'rating_romantic',
//             'rating_romantic_total',
//             'rating_intimate',
//             'rating_intimate_total',
//             'rating_luxury',
//             'rating_luxury_total',
//         ));
//     }

//     /**
//      * Update the specified resource in storage.
//      */
//     public function update(Request $request,  $hotel)
//     {
//         $hotel = Hotel::when(!auth('admin')->user()->hasRole('super-admin'), function ($q) {
//             $q->where('admin_id', auth('admin')->user()->id);
//         })->where('id', $hotel)->firstOrFail();

//         $request->validate([

//             'thumbnail' => 'nullable|mimes:jpeg,jpg',

//             'gallery' => 'nullable',
//             'gallery.*' => 'mimes:jpeg,jpg',

//             'google_place_id' => 'required|string',
//             'title' => 'required|string',
//             'address' => 'required|string',
//             'google_rating' => "required|numeric",
//             'google_total_reviews' => "required|numeric",

//             'headline' => 'required|string',
//             'excerpt' => 'required|string',
//             'description' => 'required|string',


//             'slug'               => 'nullable|unique:hotels,slug,' . $hotel->id,

//             'categories' => 'array|required',
//             'categories.*' => 'exists:hotel_categories,id',

//             'tags' => 'array|required',
//             'tags.*' => 'exists:hotel_tags,id',

//             'services' => 'array|required',
//             'services.*' => 'exists:hotel_services,id',

//             // 'rating_romantic' => 'numeric|min:1|max:10',
//             // 'rating_intimate' => 'numeric|min:1|max:10',
//             // 'rating_luxury' => 'numeric|min:1|max:10',





//         ]);





//         $data = [
//             'google_place_id' => $request->google_place_id,
//             'title' => $request->title,
//             'address' => $request->address,
//             'google_rating' => $request->google_rating,
//             'google_total_reviews' => $request->google_total_reviews,


//             'headline' => $request->headline,
//             'excerpt' => $request->excerpt,
//             'description' => $request->description,
//             // 'google_map_embed_url' => $request->google_map_embed_url,
//             'slug' => $request->slug,

//             // 'booking_type' => $request->booking_type

//         ];



//         $hotel->update($data);

//         $hotel->categories()->sync($request->categories);
//         $hotel->tags()->sync($request->tags);
//         $hotel->services()->sync($request->services);


//         // thumbnail
//         if ($request->hasFile('thumbnail'))
//             $hotel->addMediaFromRequest('thumbnail')
//                 ->toMediaCollection('thumbnail');


//         // Gallery
//         if ($gallery = $request->file('gallery')) {
//             foreach ($gallery as $image) {
//                 $hotel->addMedia($image)->toMediaCollection('gallery');
//             }
//         }



//         return redirect()->route('admin.hotels.edit', $hotel->id);
//     }

//     /**
//      * Remove the specified resource from storage.
//      */
//     public function destroy($hotel)
//     {
//         $hotel = Hotel::when(!auth('admin')->user()->hasRole('super-admin'), function ($q) {
//             $q->where('admin_id', auth('admin')->user()->id);
//         })->where('id', $hotel)->firstOrFail();

//         $hotel->delete();
//         return redirect()->back();
//     }
//     /**
//      * Remove the specified resource from storage.
//      */
//     public function deleteRatings(HotelRate $hotelRate)
//     {
//         $hotelRate->delete();
//         return redirect()->back();
//     }


//     /**
//      * Remove the specified resource from storage.
//      */
//     public function deleteOpinion(HotelOpinion $hotelOpinion)
//     {
//         $hotelOpinion->delete();
//         return redirect()->back();
//     }
// }