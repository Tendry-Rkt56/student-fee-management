<!DOCTYPE html>
     <html lang="fr">
     <head>
          <meta charset="UTF-8">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <title>Edition de profil</title>
          <?php require_once 'components/head.html' ?>
          <script src="/assets/script/nameFormatter.js" defer></script>
     </head>
     <body>

          <?php require_once 'components/base.html.php' ?>

          <div style="box-shadow:-4px 4px 10px 0Px rgba(0,0,0,0.4);padding:30px;position:absolute;top:20%;left:220px;width:calc(100% - 200px)">
               <div class="container-fluid d-flex align-items-center justify-content-center flex-column gap-3">
                    <h2 class="align-self-start">Edition de profil</h2>
                    <?php if (isset($_SESSION)): ?>
                         <?php foreach($_SESSION as $key => $value): ?>
                              <?php if ($key == 'danger' || $key == 'success'):?>
                                   <p class="d-flex align-items-center justify-content-center container-sm alert alert-<?=$key?>"><?=$value?></p>
                                   <?php unset($_SESSION[$key])?>
                              <?php endif?>
                         <?php endforeach?>
                    <?php endif ?>
                    <form method="POST" action="" enctype="multipart/form-data" class="justify-self-start align-self-start container d-flex align-items-center justify-content-start flex-column gap-3">
                         <div class="row container">
                              <div class="col-sm-6 d-flex align-items-center justify-content-center flex-row gap-1">
                                   <label style="width:30%" for="nom" class="fw-bolder">Nom:</label>
                                   <input id="name" value="<?=$user->nom?>" style="width:70%" type="text" name="nom" id="nom" class="form-control" placeholder="Nom...">
                              </div>
                              <div class="col-sm-6 d-flex align-items-center justify-content-center flex-row gap-1">
                                   <label style="width:30%" for="prenom" class="fw-bolder">Prénom:</label>
                                   <input id="prenom" value="<?=$user->prenom?>" style="width:70%" type="text" name="prenom" id="prenom" class="form-control" placeholder="Prénom...">
                              </div>
                         </div>
                         <div class="row container">
                              <div class="col-sm-6 d-flex align-items-center justify-content-center flex-row gap-1">
                                   <label style="width:30%" for="email" class="fw-bolder">Email:</label>
                                   <input value="<?=$user->email?>" type="email" style="width:70%;" name="email" placeholder="Email..." class="form-control" id="email">
                              </div>
                              <div class="col-sm-6 d-flex align-items-center justify-content-center flex-row gap-1">
                                   <label style="width:30%" for="image" class="fw-bolder">Mot de passe:</label>
                                   <input type="text" name="password" class="form-control" style="width:70%" placeholder="Mot de passe actuel...">
                              </div>
                         </div>
                         <div class="row container">
                              <div class="col-sm-6 d-flex align-items-center justify-content-center flex-row gap-1">
                                   <label style="width:30%" for="image" class="fw-bolder">Nouveau mot de passe:</label>
                                   <input type="text" name="new" class="form-control" style="width:70%" placeholder="Nouveau mot de passe...">
                              </div>
                              <div class="col-sm-6 d-flex align-items-center justify-content-center flex-row">
                                   <label style="width:30%" for="email" class="fw-bolder">Image:</label>
                                   <input type="file" style="width:70%;" name="image" placeholder="Image associée..." class="form-control" id="image">
                              </div>
                         </div>
                         <input type="submit" class="my-3 btn btn-primary" value="Enregistrer">
                    </form>
               </div>
          </div>

     </body>
     </html>