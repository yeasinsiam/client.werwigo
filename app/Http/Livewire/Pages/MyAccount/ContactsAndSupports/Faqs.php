<?php

namespace App\Http\Livewire\Pages\MyAccount\ContactsAndSupports;

use App\Models\Faq;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;

class Faqs extends Component
{


    public string $search = "";

    protected $queryString = [
        'search' =>  ['except' => '']
    ];





    public function render()
    {

        $faqs = Faq::when(!empty($this->search), function (Builder $query) {
            $query->where('question', 'LIKE', '%' . $this->search . '%');
            $query->orWhere('answer', 'LIKE', '%' . $this->search . '%');
        })->get();


        return view('livewire.pages.my-account.contacts-and-supports.faqs', compact('faqs'));
    }
}
