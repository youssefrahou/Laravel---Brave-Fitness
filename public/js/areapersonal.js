$(document).ready(function() {


    //Mostrar imagenes al cargar MEDICION IMAGENES

    if (document.getElementById('delante') != null) {

        document.getElementById("delante").onchange = function(e) {
            // Creamos el objeto de la clase FileReader
            let reader = new FileReader();

            // Leemos el archivo subido y se lo pasamos a nuestro fileReader
            reader.readAsDataURL(e.target.files[0]);
            //alert(reader.readAsDataURL(e.target.files[0]));

            // Le decimos que cuando este listo ejecute el código interno
            reader.onload = function() {
                let preview = document.getElementById('previewDelante'),
                    image = document.createElement('img');
                image.setAttribute("width", "200x");
                image.src = reader.result;

                preview.innerHTML = '';
                preview.append(image);
            };
        }

    }


    if (document.getElementById('lado') != null) {

        document.getElementById("lado").onchange = function(e) {
            let reader = new FileReader();
            reader.readAsDataURL(e.target.files[0]);

            reader.onload = function() {
                let preview = document.getElementById('previewLado'),
                    image = document.createElement('img');
                image.setAttribute("width", "200x");
                image.src = reader.result;

                preview.innerHTML = '';
                preview.append(image);
            };
        }

    }




    if (document.getElementById('atras') != null) {

        document.getElementById("atras").onchange = function(e) {

            let reader = new FileReader();

            reader.readAsDataURL(e.target.files[0]);

            reader.onload = function() {
                let preview = document.getElementById('previewAtras'),
                    image = document.createElement('img');
                image.setAttribute("width", "200x");
                image.src = reader.result;

                preview.innerHTML = '';
                preview.append(image);
            };
        }

    }


    //Mostrar imagenes al cargar MEDICION IMAGENES



    $("#cancelarAct").click(function() {
        ocultarTodo();

    });


    $('#anadirMedicion').click(function() {

        $("#modalAnadirMedicion").modal("show");

    });

    $('#lateralMiProgreso').click(function() {

        ocultarTodo();
        $("#progreso").show();

    });


    $('#compararMedicion').click(function() {

        ocultarTodo();
        $("#compararFecha").show();

    });

    $('#lateralChat').click(function() {

        ocultarTodo();
        $("#chat").show();

    });







});



function ocultarTodo() {
    $("#bienvenida").hide();
    $("#editarPerfil").hide();
    $("#progreso").hide();
    $("#compararFecha").hide();
    $("#chat").hide();
    $("#ensenarUsuarios").hide();







}