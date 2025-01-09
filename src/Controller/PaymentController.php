<?php

namespace App\Controller;

class PaymentController extends Controller
{

     public function index()
     {
          return $this->render('payment.index');
     }

}