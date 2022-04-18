<?php

namespace App\Controller;

use App\Core\{Request, Response};

class HomeController extends BaseController
{
    public function index(Request $request): Response
    {
        return Response::json(['data' => 'home page']);
    }
}