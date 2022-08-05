<?php

namespace App\Http\Livewire\App\Users;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use WireUi\Traits\Actions;

class Edit extends Component
{

    use Actions;
    /** @var User $user */
    public $user;


      /** @var boolean */
      public $modalUserUpdate = false;

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

     public function mount()
     {
        $this->name = $this->user->name;
        $this->email = $this->user->email;



     }


     public function edit()
     {
        if($this->password){
            $this->validate([
                'name' => ['required'],
                'email' => ['required', 'email', 'unique:users'],
                'password' => ['required', 'min:6', 'same:passwordConfirmation'],
            ]);

        }elseif($this->email == $this->user->email){
            $this->validate([
                'name' => ['required'],
                'email' => ['required', 'email',],
            ]);
        }
        else{
            $this->validate();
        }

            if($this->email == $this->user->email){
            $user = User::find($this->user->id)->update([
                'name' => $this->name,
                'password' => $this->password ? Hash::make($this->password) : $this->user->password,
             ]);


            }else{
                $user = User::find($this->user->id)->update([
                    'name' => $this->name,
                    'email' => $this->email,
                    'password' => $this->password ? Hash::make($this->password) : $this->user->password,
                 ]);
            }



         $this->notification([
            'title'       => 'Usuário editado!',
            'description' => 'Usuário editado com sucesso!',
            'icon'        => 'success'
        ]);



         $this->emit('updated');
     }

    public function render()
    {
        return view('livewire.app.users.edit');
    }
}
