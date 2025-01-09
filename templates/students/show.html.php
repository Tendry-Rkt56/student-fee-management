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
                                        <th>Status</th>
                                   </tr>
                              </thead>
                              <tbody>
                                   <tr>
                                        <td>Janvier</td>
                                        <td>50 000</td>
                                        <td>05 Janvier 2023</td>
                                        <td>Payé</td>
                                   </tr>
                                   <tr>
                                        <td>Février</td>
                                        <td>50 000</td>
                                        <td>07 Février 2023</td>
                                        <td>Payé</td>
                                   </tr>
                                   <tr>
                                        <td>Mars</td>
                                        <td>50 000</td>
                                        <td>-</td>
                                        <td>En attente</td>
                                   </tr>
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