<?php

namespace App\Http\Livewire\App\Users;

use App\Models\Color;
use App\Models\User;
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
            'description' => 'A o deletar o usuário '.$this->user->name.', todos os dados serão perdidos.',
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

     
        $this->emit('deleted');
    }
}
