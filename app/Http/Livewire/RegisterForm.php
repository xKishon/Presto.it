<?php

namespace App\Http\Livewire;

use Livewire\Component;

class RegisterForm extends Component
{
   public $username;
   public $email;
   public $password;
   public $password_confirmation;

    protected $rules = [
        'username' => 'unique:App\Models\User,name|required|min:3|max:15',
        'email' => 'unique:App\Models\User,email|required|email',
        'password' => 'unique:App\Models\User,email|required|min:8',
        'password_confirmation' => 'same:password'
    ];

     public function updated($propertyName)
     {
        $this->validateOnly($propertyName);

     }

    public function render()
    {
        return view('livewire.register-form');
    }
}
