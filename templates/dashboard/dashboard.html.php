<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Accueil</title>
     <?php require_once 'components/head.html' ?>
     <link rel="stylesheet" href="/assets/styles/dashboard.css">
</head>
<body>
     
     <?php require_once 'components/base.html.php' ?>

     <div class="containers">
          <div class="box">
               <a href="<?=path('students.index')?>" class="card">  
                    <h3>Total Étudiants</h3>
                    <p><?=$students?></p>
               </a>
               <a href="<?=path('payment.liste')?>" class="card">
                    <h3>Paiements du Mois</h3>
                    <p><?=number_format($payments, 0, '.', ' ')?> Ar</p>
               </a>
               <a href="<?=path('classes.index')?>" class="card">
                    <h3>Classes</h3>
                    <p><?=$classes?></p>
               </a>
          </div>
     </div>

</body>
</html>