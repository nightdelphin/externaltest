<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

abstract class BasicController extends Controller
{
    protected function decodeInputData($data)
    {
        //TODO: decode text
        return json_decode($data);
    }
    protected function sendResponse($resp, $status="OK", $debug = NULL)
    {
        if (is_array($resp))
        {
            $resp["status"] = $status;
            if ($debug != NULL)
            {
                $resp["debug"]=$debug;
            }
        }
        else
        {
            $resp->status = $status;
            if ($debug != NULL)
            {
                $resp->debug=$debug;
            }
        }
        $str = json_encode($resp, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        //TODO: encode text
        return $str;
    }
}