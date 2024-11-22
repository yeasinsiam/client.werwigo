 <div class="overflow-x-auto border-t border-x">
     <table class="w-full table-auto">
         <thead class="border-b">
             <tr class="bg-gray-100">
                 <th class="p-4 font-medium text-left">
                     ID
                 </th>
                 <th class="p-4 font-medium text-left">
                     Title
                 </th>
                 {{-- <th class="p-4 font-medium text-left">
                     Icon (140x80)
                 </th> --}}
                 <th class="p-4 font-medium text-left">
                     Slug
                 </th>
                 <th class="p-4 font-medium text-left">
                     Action
                 </th>
             </tr>
         </thead>
         <tbody wire:sortable="handleSort">

             @foreach ($categories as $category)
                 <tr wire:sortable.item='{{ $category->id }}' wire:key='category-list-{{ $category->id }}'
                     class="border-b hover:bg-gray-50">
                     <td class="p-4">
                         <i class="fas fa-sort"></i>
                         {{ $category->id }}
                     </td>
                     <td class=" p-4">
                         {{ $category->title }}

                     </td>
                     {{-- <td class="p-4 min-w-[150px]">
                         @if ($category->icon)
                             <img class="w-[140px] h-[80px] object-contain" src="{{ $category->icon?->getUrl() }}"
                                 alt="">
                         @endif
                     </td> --}}
                     <td class="p-4">
                         {{ $category->slug }}
                     </td>
                     <td class="  p-4">
                         <div class="flex gap-3 items-center h-full">
                             <a href="{{ route('admin.hotel-categories.index', ['id' => $category->id]) }}"
                                 class='inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2'>
                                 Edit
                             </a>
                             <form action="{{ route('admin.hotel-categories.destroy', $category->id) }}" method="POST">
                                 @csrf @method('DELETE')
                                 <button type='submit' onclick="return confirm('Are you sure going to delete this ?')"
                                     class='inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2'>
                                     Delete
                                 </button>

                             </form>
                         </div>
                     </td>
                 </tr>
             @endforeach

         </tbody>
     </table>
 </div>
