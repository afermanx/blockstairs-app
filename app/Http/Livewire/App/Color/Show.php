<?php

namespace App\Http\Livewire\App\Color;

use App\Models\Color;
use Livewire\Component;

class Show extends Component
{
    public function render()
    {
        return view('livewire.app.color.show',[
            'colors' => Color::all()
        ]);

    }
}
