<?php

namespace App\Http\Livewire\App\Color;

use App\Models\Color;
use Livewire\Component;

class Create extends Component
{

    /** @var User $user */
    public $user;

    /** @var string */
    public $color = '';


      /** @var string */
      public $description = '';

      protected $rules=[
        'description' => ['required'],
        'color' => ['required'],
    ];

    /** @var array*/
    #uso para fazer o translate da message do errro
    protected $messages = [
        'description.required' => 'O campo descrição é obrigatório.',
        'color.required' => 'Escolha um cor antes de continuar.',


    ];



    # converte de hexadecimal para rgb e retorna uma string no fromato rgb(r,g,b)
    function hex2Rgb($hex):string
    {

        $hex = str_replace("#", "", $hex);

        if(strlen($hex) == 3) {
            $r = hexdec(substr($hex,0,1).substr($hex,0,1));
            $g = hexdec(substr($hex,1,1).substr($hex,1,1));
            $b = hexdec(substr($hex,2,1).substr($hex,2,1));
        } else {
            $r = hexdec(substr($hex,0,2));
            $g = hexdec(substr($hex,2,2));
            $b = hexdec(substr($hex,4,2));
        }
            $rgbArray = array($r, $g, $b);

            return  $rgb ="rgb(" . $rgbArray[0] . ", " . $rgbArray[1] . ", " . $rgbArray[2]. ")"; // Retorna uma string do tipo rgb(255,255,255) com os valores RGB
    }

    public function render()
    {
        return view('livewire.app.color.create',[
            'colors' => Color::all()
        ]);

    }

    # vincular nova color
    public function addColor()
    {

        $this->validate();
        $this->user->colors()-> create([
            'description' => $this->description,
            'hex' => $this->color,
            'rgb' => $this->hex2Rgb($this->color)
        ]);

        $this->emit('colorLiked');

    }
}
