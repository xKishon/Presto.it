<?php

namespace App\Http\Livewire;

use Livewire\Component;

class LoginForm extends Component
{

    public $username;
    public $email;
    public $password;
    public $password_confirmation;
 
     protected $rules = [
         'username' => 'unique:App\Models\User,name|required|min:3|max:15',
         'email' => 'required|email',
         'password' => 'unique:App\Models\User,email|required|min:8',
         'password_confirmation' => 'same:password'
     ];

     protected $messages = [
        'email.required' => 'The Email Address cannot be empty.',
        'email.email' => 'The Email Address format is not valid.',
    ];
 
      public function updated($propertyName)
      {
         $this->validateOnly($propertyName);
 
      }


    public function render()
    {
        return view('livewire.login-form');
    }
}
