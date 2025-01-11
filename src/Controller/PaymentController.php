<?php

namespace App\Controller;

use App\Entity\Payment;

class PaymentController extends Controller
{

     public function index()
     {
          return $this->render('payment.index');
     }

     public function store(array $data = [])
     {
          $store = $this->getManager(Payment::class)->store($data);
          return $this->redirect('students.index');
     }

     public function liste()
     {
          $payments = $this->getManager(Payment::class)->getAll();
          return $this->render('payment.liste', compact('payments'));
     }

}