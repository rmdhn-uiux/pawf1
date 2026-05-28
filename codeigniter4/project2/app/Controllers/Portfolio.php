<?php

namespace App\Controllers;

class Portfolio extends BaseController
{
    public function index(): string
    {
        return view('v_portfolio');
    }
}
