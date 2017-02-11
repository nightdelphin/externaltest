<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

abstract class SocialAuthController extends BasicController
{

    public function authFBUser($fbid, $fbName, $avatar)
    {
        return ['id'=>1,'name' => $fbName, 'avatar'=>$avatar];
    }

}