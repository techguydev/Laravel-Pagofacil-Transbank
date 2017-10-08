<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>

        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    </head>
    <body>


 <div class="flex-center position-ref full-height">
         
            <div class="content">

            <i style="font-size: 100px; color: red" class="fa fa-times-circle-o" aria-hidden="true"></i>

             <div class="title m-b-md">
                    <h2>Hubo un problema con su pago</h2>
                </div>


                <div class="title m-b-md">
                    <h2>Detalles de la Transacción </h2>
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">Id de compra :  {{$arregloFirmado['ct_order_id']}}</a>
                </div>
                 <div class="links">
                    <a href="https://laravel.com/docs">Valor: {{$arregloFirmado['ct_monto']}}</a>
                </div>
                <div class="links">
                    <a href="https://laravel.com/docs" >Status: <span style="color:red; font-weight: bold;">{{$arregloFirmado['ct_estado']}}</span></a>
                </div>

                 <div class="links">
                    <a href="/"> <button type="button" class="btn btn-primary" aria-label="Left Align"> Intentar nuevamente </button></a>
                </div>


            </div>

     <div class="row">

         <h2>Registrate en Pagofacil: <a href="https://goo.gl/7YQ9AN">https://goo.gl/7YQ9AN </a> </h2>

     </div>

     <div class="row" style="text-align: center">

         <a href="https://www.vultr.com/?ref=7224781"><img src="https://www.vultr.com/media/banner_1.png" width="728" height="90"></a>

     </div>


        </div>
    </body>
</html>
