<!DOCTYPE html>
<html lang="fr">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Nouvelme classe</title>
     <?php require_once 'components/head.html' ?>
</head>
<body>

     <?php require_once 'components/base.html.php' ?>

     <div style="box-shadow:-4px 4px 10px 0Px rgba(0,0,0,0.4);padding:30px;position:absolute;top:30%;left:220px;width:calc(100% - 200px)">
          <div class="container-fluid d-flex align-items-center justify-content-center flex-column gap-3">
               <h2 class="align-self-start">Nouveau</h2>
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
                         <div class="col-sm-12 d-flex align-items-center justify-content-center flex-row gap-1">
                              <label style="width:20%" for="nom" class="fw-bolder">Nom de la nouvelle classe:</label>
                              <input style="width:40%" type="text" name="nom" id="nom" class="form-control" placeholder="Nom...">
                         </div>
                    </div>
                    <input type="submit" class="my-3 btn btn-primary" value="Enregistrer">
               </form>
          </div>
     </div>

</body>
</html>