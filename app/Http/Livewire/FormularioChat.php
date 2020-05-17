<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Mensaje;
use DB;

class FormularioChat extends Component
{

    // Estas propiedades son publicas
    // y se pueden utilizar directamente desde la vista
    public $texto;
    public $leido;
    public $de;
    public $para;
    public $mensajes;

  
    

    public function enviarMensaje()
    {                
       /* $validatedData = $this->validate([
            'usuario' => 'required',
            'mensaje' => 'required',    
        ]);*/

        // Guardamos el mensaje en la BBDD
        Mensaje::create([
            "texto" => $this->texto,
            "leido" => 0,
            "de" => auth()->user()->id,
            "para" => 3,
            "fecha" => now()
        ]);
        
        // Generamos el evento para Pusher
        // Enviamos en la "push" el usuario y mensaje (aunque en este ejemplo no lo utilizamos)
        // pero nos vale para comprobar en PusherDebug (y por consola) lo que llega...
    //   event(new \App\Events\NuevoMensaje($this->usuario, $this->mensaje));
        
        // Este evento es para que lo reciba el componente
        // por Javascript y muestre el ALERT BOOSTRAP de "enviado"
    //     $this->emit('enviadoOK', $this->mensaje);
    
    }   


    public function render()
    {
        $this->mensajes = Mensaje::all();
        return view('livewire.formulario-chat');
    }



}
