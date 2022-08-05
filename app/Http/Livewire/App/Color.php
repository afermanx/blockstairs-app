<?php

namespace App\Http\Livewire\App;

use App\Models\User;
use Livewire\Component;

class Color extends Component
{
     /** @var User $user */
     public $user;

     protected $listeners = [
         'registered'=>'$refresh',
         'deleted'=>'$refresh',
         'updated'=>'$refresh',
         'colorLiked'=>'$refresh'
         ];

    public function render()
    {
        return view('livewire.app.color',[
            'colors' => User::find($this->user->id)->colors
        ]);
    }






}
