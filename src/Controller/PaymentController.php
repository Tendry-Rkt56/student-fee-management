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
          return $this->redirect('payment.liste');
     }

     public function edit(int $id)
     {
          $payment = $this->getManager(Payment::class)->find($id);
          $student = $this->getManager(Payment::class)->findWithStudent($id);
          return $this->render('payment.edit', compact('payment', 'student'));
     }

     public function update(int $id, array $data = [])
     {
          $update = $this->getManager(Payment::class)->update($id, $data);
          return $this->redirect('payment.liste');
     }

     public function liste()
     {
          $payments = $this->getManager(Payment::class)->getAll();
          return $this->render('payment.liste', compact('payments'));
     }

}