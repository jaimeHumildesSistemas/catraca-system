<?php

namespace Modules\AccessControl\Http\Controllers;

use App\Http\Controllers\Controller;

class AccessControlController extends Controller
{
    public function index()
    {
        return view('accesscontrol::index');

        
    }
}
