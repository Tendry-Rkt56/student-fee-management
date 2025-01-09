<!DOCTYPE html>
<html lang="fr">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Nouvel étudiant</title>
     <?php require_once 'components/head.html' ?>
</head>
<body>

     <?php require_once 'components/base.html.php' ?>

     <div style="position:absolute;top:30%;left:220px;width:calc(100% - 200px)">
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
               <form method="POST" action="" enctype="multipart/form-data" class="justify-self-start align-self-start container d-flex align-items-center justify-content-start flex-column gap-4">
                    <div class="row container">
                         <div class="col-sm-6 d-flex align-items-center justify-content-center flex-row gap-1">
                              <label style="width:20%" for="nom" class="fw-bolder">Nom:</label>
                              <input style="width:80%" type="text" name="nom" id="nom" class="form-control" placeholder="Nom...">
                         </div>
                         <div class="col-sm-6 d-flex align-items-center justify-content-center flex-row gap-1">
                              <label style="width:20%" for="prenom" class="fw-bolder">Prénom:</label>
                              <input style="width:80%" type="text" name="prenom" id="prenom" class="form-control" placeholder="Prénom...">
                         </div>
                    </div>
                    <div class="row container">
                         <div class="col-sm-6 d-flex align-items-center justify-content-center flex-row gap-1">
                              <label style="width:20%" for="classe" class="fw-bolder">Classe:</label>
                              <select style="width:80%" name="classe" id="classe" class="form-select">
                                   <?php foreach($classes as $classe): ?>
                                        <option value="<?=$classe->id?>"><?=$classe->nom?></option>
                                   <?php endforeach ?>
                              </select>
                         </div>
                         <div class="col-sm-6 d-flex align-items-center justify-content-center flex-row gap-1">
                              <label style="width:20%" for="dob" class="fw-bolder">Date de naissance:</label>
                              <input style="width:80%" type="date" name="dob" id="dob" class="form-control" placeholder="Date de naissance...">
                         </div>
                    </div>
                    <div class="row container">
                         <div class="col-sm-6 d-flex align-items-center justify-content-center flex-row gap-1">
                              <label style="width:20%" for="image" class="fw-bolder">Image:</label>
                              <input type="file" name="image" class="form-control" style="width:80%" placeholder="Image associée">
                         </div>
                         <div class="col-sm-6 d-flex align-items-center justify-content-center flex-row gap-1">
                              <label style="width:20%" for="dob" class="fw-bolder">Date de naissance:</label>
                              <input style="width:80%" type="date" name="contact" id="dob" class="form-control" placeholder="Date de naissance...">
                         </div>
                    </div>
                    <input type="submit" class="ml-5 btn btn-primary" value="Enregistrer">
               </form>
          </div>
     </div>

</body>
</html>