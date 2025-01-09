<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Nouvel étudiant</title>
     <link rel="stylesheet" href="/assets/styles/base.css">
     <link rel="stylesheet" href="/assets/styles/bootstrap.min.css">
</head>
<body>

     <?php require_once 'components/base.html.php' ?>

     <div style="position:absolute;top:30%;left:220px;width:calc(100% - 200px)">
          <div class="container-fluid d-flex align-items-center justify-content-center flex-column gap-3">
               <h2 class="align-self-start">Nouveau</h2>
               <form method="POST" action="" class="justify-self-start align-self-start container d-flex align-items-center justify-content-start flex-column gap-4">
                    <div class="row container">
                         <div class="col-sm-6 d-flex align-items-center justify-content-center flex-row gap-1">
                              <label for="nom" class="fw-bolder">Nom:</label>
                              <input type="text" name="nom" id="nom" class="form-control" placeholder="Nom...">
                         </div>
                         <div class="col-sm-6 d-flex align-items-center justify-content-center flex-row gap-1">
                              <label for="prenom" class="fw-bolder">Prénom:</label>
                              <input type="text" name="prenom" id="prenom" class="form-control" placeholder="Prénom...">
                         </div>
                    </div>
                    <div class="row container">
                         <div class="col-sm-6 d-flex align-items-center justify-content-center flex-row gap-1">
                              <label for="classe" class="fw-bolder">Classe:</label>
                              <select name="classe" id="classe" class="form-select">
                                   <?php foreach($classes as $classe): ?>
                                        <option value="<?=$classe->id?>"><?=$classe->nom?></option>
                                   <?php endforeach ?>
                              </select>
                         </div>
                         <div class="col-sm-6 d-flex align-items-center justify-content-center flex-row gap-1">
                              <label for="dob" class="fw-bolder">Date de naissance:</label>
                              <input type="date" name="dob" id="dob" class="form-control" placeholder="Prénom...">
                         </div>
                    </div>
                    <input type="submit" class="ml-5 btn btn-primary" value="Enregistrer">
               </form>
          </div>
     </div>

</body>
</html>