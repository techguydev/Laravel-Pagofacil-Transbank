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

            td{

font-weight: bolder;


            }
        </style>

        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    </head>
    <body>

            <div class="container">


                      <h2>INFORMACION DE LAS ORDENES PROCESADAS</h2>
                      <p>Detalle de las transacciones realizadas</p>            
                                  <table class="table table-hover">
                                        <thead>
                                              <tr>
                                                <th>Id de orden</th>
                                                <th>Monto</th>
                                                <th>Status</th>
                                              </tr>
                                        </thead>
                                        <tbody>
                                         @foreach ($orders as $order)
                                              <tr>
                                                <td>{{ $order->order_id }}</td>
                                                <td>{{ $order->amount }}</td>
                                               @if($order->status == 'COMPLETADA') 
                                                <td style="color:green; font-weight: bold;">{{ $order->status }}</td>
                                                 @else 
                                                    <td style="color:red; font-weight: bold;" >{{ $order->status }}</td> 
                                                    @endif
                                              </tr>
                                         @endforeach
                                        </tbody>
                                  </table>

                <div class="row">

                    <h2>Registrate en Pagofacil: <a href="https://goo.gl/7YQ9AN">https://goo.gl/7YQ9AN </a> </h2>

                </div>
            </div>

    </body>
</html>
