<?php

namespace App\Http\Livewire\App;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Users extends Component
{
    use WithPagination;

    /** @var string */
    public $search = '';

    protected $listeners = [
        'registered'=>'$refresh',
        'deleted'=>'$refresh',
        'updated'=>'$refresh',
        'colorLiked'=>'$refresh',
        'desvinculada'=>'$refresh'
        ];

    public function updatingSearch()
    {
        $this->resetPage();
    }


    public function render()
    {
        return view('livewire.app.users',[
            'users' => User::when($this->search, fn($q)=>$q->where('name','like','%'.$this->search.'%'))
            ->orderBy('id', 'desc')
            ->paginate(5)
        ]);

    }
}
