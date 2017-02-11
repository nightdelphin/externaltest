<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthFacebookController extends SocialAuthController
{

    public function debugAuthFB($token)
    {
        return $this->doAuth($token, 'ava');
    }

    public function authFB(Request $request)
    {
        $data = $this->decodeInputData($request->input("data"));
        return $this->doAuth($data->token, $data->avatar);
    }

    private function doAuth($token, $avatar)
    {
        $url = "https://graph.facebook.com/me?fields=id,name&anticache=".rand()."&access_token=".$token;
        $res = NULL;
        try
        {
            $fb = json_decode(file_get_contents($url));
            $res = $this->sendResponse($this->authFBUser($fb->id, $fb->name, $avatar));
        }
        catch (\Exception $e)
        {
            $res = $this->sendResponse([],$e->getMessage());//'incorrect_token');
        }
        return $res;
    }

}