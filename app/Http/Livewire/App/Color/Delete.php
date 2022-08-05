<?php

namespace App\Http\Livewire\App\Color;

use App\Models\Color;
use Livewire\Component;
use WireUi\Traits\Actions;

class Delete extends Component
{

    use Actions;

    /**
     * @property Color $color
     */
    public Color $color;

    public function delete()
    {

        $this->dialog()->confirm([
            'title'       => 'Tem certeza?',
            'description' => 'Desvincular cor '.$this->color->description.' do usuário '.$this->color->users()->first()->name.'?',
            'icon'        => 'question',
            'accept'      => [
                'label'  => 'Sim, desvicular',
                'method' => 'destroy',

            ],
            'reject' => [
                'label'  => 'Cancelar',

            ],
        ]);

    }
    public function render()
    {
        return view('livewire.app.color.delete');
    }

    public function destroy()
    {
        $this->color->users()->detach($this->color->users()->first()->id);
        $this->color->delete();
        $this->notification([
            'title'       => 'Cor desvinculada!',
            'description' => 'Cor desvinculada com sucesso!',
            'icon'        => 'success'
        ]);
        $this->emit('desvinculada');
    }
    
}
