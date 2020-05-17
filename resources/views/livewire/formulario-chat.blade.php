<div class="container-fluid px-4">
    <!-- For demo purpose-->
    <div class="row rounded-lg overflow-hidden shadow" id="cajaMensajes">


        <div class="col-12 px-0">
            <div class="px-4 py-5 chat-box bg-white">

                @foreach ($mensajes as $mensaje)

                @if($mensaje->de == auth()->user()->id)

                <!-- Sender Message-->
                <div class="media w-100 mb-3"><img
                        src="https://res.cloudinary.com/mhmd/image/upload/v1564960395/avatar_usae7z.svg" alt="user"
                        width="50" class="rounded-circle">

                    <div class="media-body ml-3">
                        <div class="bg-light rounded py-2 px-3 mb-2">
                            <p class="text-small mb-0 text-muted">{{ $mensaje->texto }}</p>
                        </div>
                        <p class="small text-muted">{{ $mensaje->fecha }}</p>
                    </div>
                </div>

                @elseif($mensaje->para == auth()->user()->id)

                <!-- Reciever Message-->
                <div class="media w-100 ml-auto mb-3">
                    <div class="media-body">
                        <div class="bg-primary rounded py-2 px-3 mb-2">
                            <p class="text-small mb-0 text-white">{{ $mensaje->texto }}</p>
                        </div>
                        <p class="small text-muted">{{ $mensaje->fecha }}</p>
                    </div>
                </div>
                @endif
                
                @endforeach

                

            </div>
            
            <!-- Typing area -->
                @csrf

                <div class="form-group">

                </div>


                <div class="input-group">
                    <input type="text" id="textoEnviar" placeholder="Escribe un mensaje" aria-describedby="button-addon2"
                        class="form-control rounded-0 border-0 py-4 bg-light" wire:model="texto">
                    <div class="input-group-append">
                        <button id="button-addon2" type="button" id="botonEnviarMensaje" class="btn btn-link" wire:click="enviarMensaje"> <i
                                class="fa fa-paper-plane"></i></button>
                    </div>
                </div>



                


        </div>
    </div>


    <script>

        $("#botonEnviarMensaje").click(function() {
            $("#textoEnviar").html();
        });
        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;
    
        var pusher = new Pusher('b7fd28c714585deddbc4', {
          cluster: 'eu'
        });
    
        var channel = pusher.subscribe('chat-channel');
        channel.bind('chat-event', function(data) {
          //alert(JSON.stringify(data));
          //$("#divv").html(JSON.stringify(data));
          window.livewire.emit('mensajeRecibido', data);
        });
    </script>

</div>