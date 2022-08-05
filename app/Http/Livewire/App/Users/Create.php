<?php

namespace App\Http\Livewire\App\Users;

use App\Models\User;
use Livewire\Component;
use WireUi\Traits\Actions;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;



class Create extends Component
{
        use Actions;

      /** @var boolean */
      public $modalUserCreate = false;

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



         $this->notification([
            'title'       => 'Usuário salvo!',
            'description' => 'Usuário criado com sucesso!',
            'icon'        => 'success'
        ]);

        $this->modalUserCreate = false;

        $this->reset([
            'name',
            'email',
            'password',
            'passwordConfirmation']);


         $this->emit('registered');
     }


    public function render()
    {
        return view('livewire.app.users.create');
    }


}
