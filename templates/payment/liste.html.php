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
               <h3 class="table-title">Liste des Paiements</h3>
               <table class="table table-striped">
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
                                             <a href="<?=Path('classes.edit', ['id' => $payment->id])?>" class="btn btn-sm btn-success">Editer</a>
                                             <form method="POST" action="<?=Path('classes.remove', ['id' => $payment->id])?>">
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

</body>
</html>