<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Liste des paiements</title>
     <?php require_once 'components/head.html' ?>
     <link rel="stylesheet" href="/assets/styles/payment/index.css">
</head>
<body>
     
     <?php require_once 'components/base.html.php' ?>

     <div class="containers">
          <div class="table-container">
               <div class="container-fluid d-flex align-items-center justify-content-center flex-column gap-3">
                    <div class="container-fluid d-flex align-items-center justify-content-between">
                         <h3 class="table-title">Liste des Paiements</h3>
                         <a class="btn btn-primary btn-sm" href="<?=path('payment.create')?>">Nouveau</a>
                    </div>
                    <form action="" class="gap-2 justify-self-start container-fluid d-flex align-items-start justify-content-start flex-row gap-2">
                         <input value="<?=$data['search'] ?? ''?>" style="width:15%;" name="search" type="text" placeholder="Rechercher..." class="form-control">
                         <select style="width:20%;" class="form-select" name="month" id="">
                              <option value="">Tous</option>
                              <?php foreach($months as $month): ?>
                                   <option <?php if (array_key_exists('month', $data) && $data['month'] == $month): ?> selected <?php endif ?> value="<?=$month?>"><?=$month?></option>     
                              <?php endforeach ?>
                         </select>
                         <select style="width:20%;" name="annee" id="" class="form-select"">
                              <option value="" <?php if (!isset($data['annee']) || empty($data['annee'])): ?> selected <?php endif ?>>Tous</option>
                              <option <?php if (array_key_exists('annee', $data) && $data['annee'] == $currentYear - 1): ?> selected <?php endif ?> value="<?=$currentYear - 1?>"><?=$currentYear - 1?></option>
                              <option <?php if (array_key_exists('annee', $data) && $data['annee'] == $currentYear): ?> selected <?php endif ?> value="<?=$currentYear?>"><?=$currentYear?></option>
                         </select>
                         <input type="submit" class="btn btn-sm btn-primary" value="Rechercher">
                    </form>
                    <table class="table table-striped my-4">
                         <thead>
                              <tr>
                              <th>Étudiant</th>
                              <th>Montant</th>
                              <th>Mois</th>
                              <th>Date de Paiement</th>
                              <th>Actions</th>
                              </tr>
                         </thead>
                         <tbody>
                              <?php foreach($payments as $payment): ?>
                                   <tr>
                                        <td class="fw-bolder"><?=$payment->nom?> <?=$payment->prenom?></td>
                                        <td style="color:blueviolet" class="fw-bolder"><?=number_format($payment->amount, 0, '.', ' ')?> Ar</td>
                                        <td><?=$payment->mois?> <?=$payment->annee?></td>
                                        <td><?=FormatDate($payment->payment_date)?></td>
                                        <td>
                                             <div class="d-flex gap-1">
                                                  <a href="<?=path('payment.edit', ['id' => $payment->id])?>" class="btn btn-sm btn-success">Editer</a>
                                                  <form method="POST" action="">
                                                       <input type="submit" class="btn btn-sm btn-danger" value="Supprimer">
                                                  </form>
                                             </div>
                                        </td>
                                   </tr>
                              <?php endforeach ?>
                         </tbody>
                    </table>
               </div>
          </div>
     </div>

</body>
</html>