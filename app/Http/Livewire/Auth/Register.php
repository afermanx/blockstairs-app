<?php

namespace App\Http\Livewire\Auth;

use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Livewire\Component;

class Register extends Component
{
    /** @var string */
    public $name = '';

    /** @var string */
    public $email = '';

    /** @var string */
    public $password = '';

    /** @var string */
    public $passwordConfirmation = '';
    
    protected $rules=[
        'name' => ['required'],
        'email' => ['required', 'email', 'unique:users'],
        'password' => ['required', 'min:6', 'same:passwordConfirmation'],

    ];
    /** @var array*/
    #uso para fazer o translate do error message
     protected $messages = [
        'name.required' => 'O campo Nome é obrigatório.',
        'email.required' => 'O campo Email é obrigatório.',
        'email.unique' => 'Este e-mail ja está cadastrado.',
        'email.email' => 'O campo Email deve ser um e-mail válido.',
        'password.required' => 'O campo Senha é obrigatório.',
        'password.min' => 'O campo Senha deve ter no mínimo 6 caracteres.',
        'password.same' => 'O campo Senha e Confirmação de Senha devem ser iguais.',

    ];

    public function register()
    {
        $this->validate();

        $user = User::create([
            'email' => $this->email,
            'name' => $this->name,
            'password' => Hash::make($this->password),
        ]);

        event(new Registered($user));

        Auth::login($user, true);

        return redirect()->intended(route('dashboard'));
    }

    public function render()
    {
        return view('livewire.auth.register')->extends('layouts.auth');
    }
}
