<?php

namespace App\Http\Livewire\App\Users;

use App\Models\User;
use Livewire\Component;
use WireUi\Traits\Actions;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

     public function edit()
     {

        $this->name = $this->user->name;
        $this->email = $this->user->email;

        $this->modalUserUpdate = true;



     }


     public function update()
     {


        if($this->password){
            $this->validate([
                'name' => ['required'],
                'email' => ['required', 'email',],
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



        if($this->user->id == Auth::user()->id) {
            Auth::logout();
            return redirect()->intended(route('home'));
        }





         $this->notification([
            'title'       => 'Usuário editado!',
            'description' => 'Usuário editado com sucesso!',
            'icon'        => 'success'
        ]);


        $this->modalUserUpdate = false;

         $this->emit('updated');
     }

    public function render()
    {
        return view('livewire.app.users.edit');
    }
}
