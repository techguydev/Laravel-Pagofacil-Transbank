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
    </head>
    <body>
<div class="container">
    <div class="row">
        <img style="width: 200px;" src="http://programacion.net/files/article/20151030111039_laravel-logo-white.png">

        <img style="width: 200px;" src="https://i2.wp.com/www.pagofacil.org/wp-content/uploads/2017/04/logo.png?zoom=2&fit=226%2C90&ssl=1">

        <h1>Larafacil  =  Laravel  + Pagofacil</h1>
        <h2>Registrate en Pagofacil: <a href="https://goo.gl/7YQ9AN">https://goo.gl/7YQ9AN </a> </h2>

        <h2>Forma de compra </h2>
    <div class="col-xs-12 well">
        <form action="/process" method="POST">
            {{ csrf_field() }}
            <fieldset class="form-group">
            <label for="recipetitle">Monto a cobrar</label>
            <input  class="form-control" type="text" name="ct_monto" value="" required>
            <small class="text-muted">Monto a cobrar</small> 
            </fieldset>
            <fieldset class="form-group">
            <label for="recipe-editor-directions">Direccion de Email</label>
            <input class="form-control" type="text" name="ct_email" value="" required>
            <small class="text-muted">Direccion de correo del cliente</small>             
            </fieldset>

            <button type="submit" class="btn btn-primary" name="save-recipe-button" value="save-recipe-button">Comprar</button>
        </form>
    </div>

        <div class="row" style="text-align: center">

            <a href="https://www.vultr.com/?ref=7224781"><img src="https://www.vultr.com/media/banner_1.png" width="728" height="90"></a>

        </div>



    </div>
</div>


       
    </body>
</html>
