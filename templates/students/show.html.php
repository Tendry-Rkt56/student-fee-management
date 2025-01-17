<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title><?=$student->nom ?? 'Etudiant en particulier'?></title>
     <?php require_once 'components/head.html' ?>
     <link rel="stylesheet" href="/assets/styles/students/profil.css">
</head>
<body>
     
     <?php require_once 'components/base.html.php' ?>

     <?php if (isset($student) && !empty($student)): ?>
          <div class="containers">
               <div class="student-profile">
                    <div class="profile-header">
                         <img src="<?=$student->image?>" class="profile-photo">
                         <div class="student-info">
                              <h1>Nom : <?=$student->nom?> <?=$student->prenom?></h1>
                              <p>Date de Naissance : <?=FormatDate($student->dob)?></p>
                              <p>Classe : <?=$student->nomClass?></p>
                              <p>Contact : 034 64 131 85</p>
                              <a href="<?=Path('students.edit', ['id' => $student->id])?>" class="btn btn-sm btn-success">Editer</a>
                         </div>
                    </div>
                    <section class="payments">
                         <h2>Écolage Annuel</h2>
                         <table>
                              <thead>
                                   <tr>
                                        <th>Mois</th>
                                        <th>Montant Payé (Ar)</th>
                                        <th>Date de Paiement</th>
                                        <th>Dérnière modification</th>
                                        <th>Status</th>
                                        <th></th>
                                   </tr>
                              </thead>
                              <tbody>
                                   <?php foreach($payments as $payment): ?>
                                        <tr>
                                             <?php $rest = amount($payment->amount, $student->ecolage) ?>
                                             <td><?=$payment->mois?> <?=$payment->annee?></td>
                                             <td><?=number_format($payment->amount, 0, '.', ' ')?> <?php if ($rest > 0): ?> <span style="color:red">(-<?=number_format($rest, 0, '.', ' ')?>)</span> <?php endif ?></td>
                                             <td><?=formatDate($payment->payment_date)?></td>
                                             <td><?=formatDate($payment->updated_at)?></td>
                                             <td><?=status($payment->amount, $student->ecolage)?></td>
                                             <td>
                                                  <div class="d-flex mx-1">
                                                       <a href="<?=path('payment.edit', ['id' => $payment->id])?>" class="btn btn-sm btn-success">Modifier</a>
                                                  </div>
                                             </td>
                                        </tr>
                                   <?php endforeach ?>
                              </tbody>
                         </table>
                    </section>
               </div>
          </div>
     <?php else: ?>
          <div style="position:fixed;top:50%;left:50%;transform:translate(-50%,-50%);">Pas d'étudiant correspondant</div>
     <?php endif ?>

</body>
</html>