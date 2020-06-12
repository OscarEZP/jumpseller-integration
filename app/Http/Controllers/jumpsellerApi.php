<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class jumpsellerApi extends Controller
{
    public function testDataDummy()
    {
        $secretKey = "external_payment_gateway_password";

        $params = array( "x_account_id" => "223504", "x_amount" => "123.0", "x_currency" => "EUR", "x_reference" => "1001", "x_result" => "completed",  "x_timestamp" => '2014-03-24T12:15:41Z', "x_message" => "\\nProducto:\\n1 x Energise EDT 125 ML: 29.500 EUR\\nImpuesto: €6.785,00" );

        $keys = array_keys($params);
        sort($keys);

        $toSign = "";
        foreach ($keys as $key) { $toSign .= $key . $params[$key]; }

        $sign = hash_hmac('sha256', $toSign, $secretKey);
        return $sign;
    }


    public function dataJumpseller(Request $data)
    {
        // Secreto expuesto en Jumpseller
        // $secretKey = "U2FsdGVkX19bIGAUNlpgT+ulyUCZ3QE2bBAlgO1qCbWYXJ8vsppCU95xg2MFDklx";

        $secretKey = "external_payment_gateway_password";
        
        // $params = array( "x_account_id" => $data->x_account_id, "x_amount" => $data->x_amount, "x_currency" => $data->x_currency, "x_reference" => $data->x_reference, "x_result" => "completed",  "x_timestamp" => '2020-06124T12:15:41Z', "x_message" => $data->x_message );
        $params = array( "x_account_id" => "223504", "x_amount" => "123.0", "x_currency" => "EUR", "x_reference" => "1001", "x_result" => "completed",  "x_timestamp" => '2014-03-24T12:15:41Z', "x_message" => "\\nProducto:\\n1 x Energise EDT 125 ML: 29.500 EUR\\nImpuesto: €6.785,00" );
        $keys = array_keys($params);
        sort($keys);
        

        $toSign = "";
        foreach ($keys as $key) { $toSign .= $key . $params[$key]; }
        var_dump($toSign);
        $sign = hash_hmac('sha256', $toSign, $secretKey);
        return $sign;
    }
}
