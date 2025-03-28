<?php

$uri = $_SERVER['REQUEST_URI'];

?>
<header>
     <i class='bx bx-menu' id="menu-icon"></i>
     <h3>Dashboard</h3>
     <a href="<?=path('app.profil.edit')?>" class="profil-details">
          <?php if (isset($_SESSION['user']->image)): ?>
               <img src="<?=$_SESSION['user']->image?>" alt="">
          <?php endif ?>
          <span class="admin-name"><?=$_SESSION['user']->nom?> <?=$_SESSION['user']->prenom?></span>
     </a>
</header>
<div class="sidebar">
     <div class="title">
          <h3><span>A</span>dmin</h3>
     </div>
     <div class="navbars">
          <div class="nav-items">
               <a href="/" style="text-decoration:none;" class="<?=strlen($uri) == 1 ? 'active' : ''?>">
                    <span class="icons"><i class='bx bxs-home'></i></span>
                    <span class="text">Accueil</span>
               </a>
               <a class="<?=str_contains($uri, '/students') ? 'active' : ''?>" style="text-decoration:none;" href="<?=Path('students.index')?>">
                    <span class="icons"><i class='bx bxs-user'></i></span>
                    <span class="text">Etudiants</span>
               </a>
               <a class="<?=str_contains($uri, '/classes') ? 'active' : ''?>" style="text-decoration:none" href="<?=Path('classes.index')?>">
                    <span class="icons"><i class='bx bxs-school'></i></span>
                    <span class="text">Classes</span>
               </a>
               <a href="<?=path('payment.liste')?>" style="text-decoration:none;" class="<?=str_contains($uri, '/payment') ? 'active' : ''?>">
                    <span class="icons"><i class='bx bx-wallet'></i></span>
                    <span class="text">Payements</span>
               </a>
               <?php if (isset($_SESSION['user'])): ?>
                    <form class="mt-4" action="<?=path('app.logout')?>" method="POST">
                         <input type="hidden" name="token">
                         <button type="submit" class="btn btn-danger">Se déconnecter</button>
                    </form>     
               <?php endif ?>
          </div>
     </div>
</div>