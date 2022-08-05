<?php

namespace App\Http\Livewire\App\Users;

use App\Models\Color;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use WireUi\Traits\Actions;

class Delete extends Component
{
        use Actions;

    /**
    * @property User $user
    */

    public User $user;

    public function delete()
    {

        $this->dialog()->confirm([
            'title'       => 'Tem certeza?',
            'description' => 'Ao deletar o usuário '.$this->user->name.', todos os dados serão perdidos.',
            'icon'        => 'question',
            'accept'      => [
                'label'  => 'Sim, deletar',
                'method' => 'destroy',

            ],
            'reject' => [
                'label'  => 'Cancelar',

            ],
        ]);

    }



    public function render()
    {
        return view('livewire.app.users.delete');
    }

    public function destroy()
    {

         $this->user->delete();

         $this->notification([
            'title'       => 'Usuário deletado!',
            'description' => 'Usuário deletado com sucesso!',
            'icon'        => 'success'
        ]);


        if($this->user->id == Auth::user()->id) {
            Auth::logout();
            return redirect()->intended(route('home'));
        }





        $this->emit('deleted');
    }
}
