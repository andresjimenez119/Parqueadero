<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--Incluyendo JQuery-->
    <script src="{{asset('js/jquery-3.5.1.js')}}"></script>
    <title>Practica Js</title>
    <style>
        li {
            float: left;
            list-style: none;
            margin: 0 25px 25px 0;
            display: none;
        }

        li img {
            width: 100px;
            height: 100px;
        }
    </style>
</head>

<body>

    <section>
        <h1>Practica Js 1</h1>
        <script>
            $(document).ready(function() {
                $("a").click(function(evento) {
                    alert("Has pulsado el enlace...Ahora serás enviado a DesarrolloWeb.com");
                });
            });
        </script>
        <a href="https://google.com">Ir a Google.com</a>

    </section>

    <section>
        <h1>Manejo Secuencial de Imagenes</h1>

        <a href="#" id="mostrar">Mostrar</a> / <a href="#" id="ocultar">Ocultar</a>

        <ul>
            <li><img src="{{asset('img/1.png')}}"></li>
            <li><img src="{{asset('img/2.png')}}"></li>
            <li><img src="{{asset('img/3.png')}}"></li>
            <li><img src="{{asset('img/1.png')}}"></li>
            <li><img src="{{asset('img/2.png')}}"></li>
            <li><img src="{{asset('img/3.png')}}"></li>
            <li><img src="{{asset('img/1.png')}}"></li>
            <li><img src="{{asset('img/2.png')}}"></li>
            <li><img src="{{asset('img/3.png')}}"></li>
        </ul>

        <script>
            $(document).ready(function() {
                var lista = $('li').hide();
                $('#mostrar').click(function(evento) {
                    alert("Ahora se mostraran las imagenes");
                    var i = 0;
                    (function mostrarimg() {
                        lista.eq(i++).fadeIn(400, mostrarimg);
                    })();
                });
                $('#ocultar').click(function(evento) {
                    alert("Ahora se Ocultaran las imagenes");
                    var i = $('li').length;
                    (function ocultarimg() {
                        lista.eq(--i).fadeOut(200, ocultarimg);
                    })();
                });
            });
        </script>
    </section>







</body>

</html>