<?php

namespace App\Http\Livewire\App;

use App\Models\User;
use Livewire\Component;

class Color extends Component
{
     /** @var User $user */
     public $user;

     protected $listeners = [

         'colorLiked'=>'$refresh',
         'desvinculada'=>'$refresh'
         ];

    public function render()
    {
        return view('livewire.app.color',[
            'colors' => User::find($this->user->id)->colors
        ]);
    }






}
