<?php

namespace App\Http\Livewire\App;

use App\Models\User;
use Livewire\Component;

class Color extends Component
{

    /** @var boolean */
    public $modalLikerColor = false;
     /** @var User $user */
     public $user;

     protected $listeners = [

        'colorLiked'=>'$refresh',
        'desvinculada'=>'$refresh'
    ];

    public function likerColor()
    {
        $this->modalLikerColor = true;
    }

    public function render()
    {
        return view('livewire.app.color',[
            'colors' => User::find($this->user->id)->colors
        ]);
    }






}
