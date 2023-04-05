<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class ContactSellerForm extends Component
{ 

    public $name, $description, $article, $sellerEmail, $email;

  

    public function mount(){
        $this->name=$this->article->name;
        $this->sellerEmail=$this->article->user->email;


    }
    public function render()
    {
    
        return view('livewire.contact-seller-form');
    }
}
