<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;


use ctala\transaccion\classes\Transaccion;
use ctala\transaccion\classes\Response;



class pagofacil extends Controller
{

     public function process(Request $request)
    {
        //
        $order_id_tienda = rand();
        $amount = $request->input('ct_monto'); 
        $email = $request->input('ct_email');
        $token_servicio = env('PAGOFACIL_TOKEN_SERVICE');
        $token_secret =  env('PAGOFACIL_TOKEN_SECRET');
        $token_tienda =  env('PAGOFACIL_TOKEN_TIENDA');


        $transaccion = new Transaccion(
             $order_id_tienda,
             $token_tienda,
             $amount,
             $token_servicio,
             $email
             );

        $transaccion->setCt_token_secret($token_secret);
        $pago_args = $transaccion->getArrayResponse();


        // Guardando orden en base de datos
        $order = new Order;
        $order->order_id = $order_id_tienda;
        $order->amount = $amount;
        $order->email = $email;
        $order->status = 'PENDIENTE';
        $order->save();


       return view('compra', compact('pago_args'));


    }

     public function callback(Request $request)
    {

        $token_secret = env('PAGOFACIL_TOKEN_SECRET');



        $ct_accounting_date =  $request->input('ct_accounting_date'); 
        $ct_authorization_code =  $request->input('ct_authorization_code');
        $ct_card_expiration_date =  $request->input('ct_card_expiration_date');
        $ct_card_number =  $request->input('ct_card_number'); 
        $ct_estado = $request->input('ct_estado');
        $ct_monto =  $request->input('ct_monto'); 
        $ct_order_id = $request->input('ct_order_id');
        $ct_order_id_mall =  $request->input('ct_order_id_mall');
        $ct_payment_type_code =   $request->input('ct_payment_type_code');
        $ct_shares_number =  $request->input('ct_shares_number');
        $ct_token_service =   $request->input('ct_token_service');
        $ct_token_tienda =  $request->input('ct_token_tienda'); 
        $ct_transaction_date =  $request->input('ct_transaction_date');   




        if (empty(order::where('order_id',$ct_order_id)->first())) {
            /*
             * Ojo, en este caso solo corroboramos contra una orden.
             * En general lo haremos contra la BdD.
             */
            /*
             * Error 404
             * Orden no encontrada
             * Se finaliza
             */

            return 'Esta orden no existe en nuestra base de datos';
        }





        $response = new Response($ct_order_id, $ct_token_tienda, $ct_monto, $ct_token_service, $ct_estado, $ct_authorization_code, $ct_payment_type_code, $ct_card_number, $ct_card_expiration_date, $ct_shares_number, $ct_accounting_date, $ct_transaction_date, $ct_order_id_mall);


        $response->setCt_token_secret($token_secret);
        $arregloFirmado = $response->getArrayResponse();


         //Verificando si la firma hace match con la que recibimos del metodo POST y la que creamos partiendo de las funciones en las clases

        if ($arregloFirmado["ct_firma"] != $request->input('ct_firma')) {
            /*
             * Firmas no corresponden. Posible inyección de datos.
             * Se termina el proceso.
             */

            return 'Hay un error en la firma de la compra, no se puede proceder, contacte a soporte tecnico.';


            }


        if ($arregloFirmado["ct_monto"] != order::where('order_id',$ct_order_id)->first()->amount) {
            /*
             * Montos no corresponden. POsible inyección de datos.
             * Se termina el proceso.
             */

            return 'Hay un error de monto en la compra, no se puede proceder, contacte a soporte técnico.';

            }



        if ($arregloFirmado["ct_estado"] == "COMPLETADA") {
            /*
             * Aca debes de marcar la orden como completa
             */

           $order= order::where('order_id',$ct_order_id)->first();
           $order->status = $arregloFirmado["ct_estado"];
           $order->save();


        } else {
            /*
             * Acá la puedes marcar como pendiente o fallida.
             */
           $order= order::where('order_id',$ct_order_id)->first();
           $order->status = $arregloFirmado["ct_estado"];
           $order->save();


        }

    }

     public function end(Request $request)
    {
        //

       $token_secret = env('PAGOFACIL_TOKEN_SECRET');



        $ct_accounting_date =  $request->input('ct_accounting_date'); 
        $ct_authorization_code =  $request->input('ct_authorization_code');
        $ct_card_expiration_date =  $request->input('ct_card_expiration_date');
        $ct_card_number =  $request->input('ct_card_number'); 
        $ct_estado = $request->input('ct_estado');
        $ct_monto =  $request->input('ct_monto'); 
        $ct_order_id = $request->input('ct_order_id');
        $ct_order_id_mall =  $request->input('ct_order_id_mall');
        $ct_payment_type_code =   $request->input('ct_payment_type_code');
        $ct_shares_number =  $request->input('ct_shares_number');
        $ct_token_service =   $request->input('ct_token_service');
        $ct_token_tienda =  $request->input('ct_token_tienda'); 
        $ct_transaction_date =  $request->input('ct_transaction_date');   




        if (empty(order::where('order_id',$ct_order_id)->first())) {
            /*
             * Ojo, en este caso solo corroboramos contra una orden.
             * En general lo haremos contra la BdD.
             */
            /*
             * Error 404
             * Orden no encontrada
             * Se finaliza
             */

            return 'Esta orden no existe en nuestra base de datos';
        }





        $response = new Response($ct_order_id, $ct_token_tienda, $ct_monto, $ct_token_service, $ct_estado, $ct_authorization_code, $ct_payment_type_code, $ct_card_number, $ct_card_expiration_date, $ct_shares_number, $ct_accounting_date, $ct_transaction_date, $ct_order_id_mall);

        $response->setCt_token_secret($token_secret);
        
        $arregloFirmado = $response->getArrayResponse();


         //Verificando si la firma hace match con la que recibimos del metodo POST y la que creamos partiendo de las funciones en las clases

        if ($arregloFirmado["ct_firma"] != $request->input('ct_firma')) {
            /*
             * Firmas no corresponden. Posible inyección de datos.
             * Se termina el proceso.
             */

            return 'Hay un error en la firma de la compra, no se puede proceder, contacte a soporte tecnico.';


            }


        if ($arregloFirmado["ct_monto"] != order::where('order_id',$ct_order_id)->first()->amount) {
            /*
             * Montos no corresponden. POsible inyección de datos.
             * Se termina el proceso.
             */

            return 'Hay un error de monto en la compra, no se puede proceder, contacte a soporte técnico.';

            }



        if ($arregloFirmado["ct_estado"] == "COMPLETADA") {
            /*
             * Aca debes de marcar la orden como completa
             */

           $order= order::where('order_id',$ct_order_id)->first();
           $order->status = $arregloFirmado["ct_estado"];
           $order->save();


            return view('completed', compact('arregloFirmado'));


        } else {
            /*
             * Acá la puedes marcar como pendiente o fallida.
             */
               $order= order::where('order_id',$ct_order_id)->first();
               $order->status = $arregloFirmado["ct_estado"];
               $order->save();


            return view('fail', compact('arregloFirmado'));

        }


    }


}
