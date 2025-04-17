<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class WebController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Lucky Adda',
            'page_heading' => 'Lucky Adda'
        ];

        return view('web/home', $data);
    }

    public function paymentResponse()
    {
        $data = [
            'title' => 'Lucky Adda',
            'page_heading' => 'Lucky Adda'
        ];

        return view('web/payment-response', $data);
    }
}
