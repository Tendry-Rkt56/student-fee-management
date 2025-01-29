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

     public function liste(array $data = [])
     {
          $payments = $this->getManager(Payment::class)->getAll($data);
          $months = ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'];
          $currentYear = date('Y');
          return $this->render('payment.liste', compact('payments', 'months', 'data', 'currentYear'));
     }

}