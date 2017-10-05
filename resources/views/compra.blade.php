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

    <div class="alert alert-success" role="alert" style="margin-top: 20px;">
      <h3>Los datos de prueba de las tarjetas de crédito/debido los puedes encontrar en el siguiente link:</h3>
        <a target="_blank" href="http://wiki.cristiantala.cl/doku.php?id=datos_para_realizar_las_certificaciones_de_transbank">http://wiki.cristiantala.cl/doku.php?id=datos_para_realizar_las_certificaciones_de_transbank</a>
    </div>

    <div class="row">
        <h2> Los datos de la transaccion a procesar son: </h2>
        <div class="col-xs-12 well">
            <form action="https://dev-env.sv1.tbk.cristiantala.cl/tbk/v2/initTransaction" method="POST">
                <fieldset class="form-group">
                    <label for="recipetitle">Monto a cobrar: {{$pago_args['ct_monto']}}</label>
                    <input  class="form-control hidden" type="text" name="ct_monto" value="{{$pago_args['ct_monto']}}">
                </fieldset>
                <fieldset class="form-group">
                    <label for="recipe-editor-ingredients">Nro de Orden: {{$pago_args['ct_order_id']}}</label>
                    <input class="form-control hidden" type="text" name="ct_order_id" value="{{$pago_args['ct_order_id']}}">
                </fieldset>
                <fieldset class="form-group">
                    <label for="recipe-editor-directions">Direccion de Email: {{$pago_args['ct_email']}}</label>
                    <input class="form-control hidden" type="text" name="ct_email" value="{{$pago_args['ct_email']}}">
                </fieldset>
                <fieldset class="form-group">
                    <label for="recipe-editor-comments">Token de tienda: {{$pago_args['ct_token_tienda']}}</label>
                    <input class="form-control hidden" type="text" name="ct_token_tienda" value="{{$pago_args['ct_token_tienda']}}">
                </fieldset>
                <fieldset class="form-group">
                    <label for="recipe-editor-comments">Token de servicio: {{$pago_args['ct_token_service']}}</label>
                    <input class="form-control hidden" type="text" name="ct_token_service" value="{{$pago_args['ct_token_service']}}">
                </fieldset>
                <fieldset  class="form-group ">
                    <label for="recipe-editor-comments">Firma: {{$pago_args['ct_firma']}}</label>
                    <input class="form-control hidden" type="text" name="ct_firma" value="{{$pago_args['ct_firma']}}">
                </fieldset>

                <div class="row text-center">
                    <button type="submit" class="btn btn-primary " name="save-recipe-button" value="save-recipe-button">Procesar</button>

                </div>
            </form>
        </div>
    </div>
</div>



</body>
</html>
