<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Les étudiants</title>
     <link rel="stylesheet" href="/assets/styles/base.css">
     <link rel="stylesheet" href="/assets/styles/bootstrap.min.css">
</head>
<body>
     
     <?php require_once 'components/base.html.php' ?>

     <div class="containers">
          <div class="container-fluid d-flex align-items-center justify-content-center flex-column gap-3">
               <div class="container d-flex align-items-center justify-content-between flex-row">
                    <h2 class="title">Les étudiants</h2>
                    <a href="" class="btn btn-primary btn-sm">Ajouter</a>
               </div>
               <form action="" class="gap-4 justify-self-start container-fluid d-flex align-items-start justify-content-start flex-row gap-2">
                    <input value="<?=$data['search'] ?? ''?>" style="width:20%;" name="search" type="text" placeholder="Rechercher..." class="form-control">
                    <select style="width:20%;" class="form-select" name="classe" id="">
                         <option value="">Tous</option>
                         <?php foreach($classes as $classe): ?>
                              <option <?php if (array_key_exists('classe', $data) && $data['classe'] == $classe->id): ?> selected <?php endif ?> value="<?=$classe->id?>"><?=$classe->nom?></option>     
                         <?php endforeach ?>
                    </select>
                    <input type="submit" class="btn btn-sm btn-primary">
               </form>
               <table class="table table-striped">
                    <thead>
                         <tr>
                              <th>Nom</th>
                              <th>Prénom</th>
                              <th>Classe</th>
                              <th>Date de naissance</th>
                              <th></th>
                         </tr>
                    </thead>
                    <tbody>
                         <?php foreach($students as $student): ?>
                              <tr>
                                   <td class="fw-bolder"><?=$student->nom?></td>
                                   <td><?=$student->prenom?></td>
                                   <td class="fw-bolder     " style="color:<?=Color($student->nomClass)?>"><?=$student->nomClass?></td>
                                   <td><?=$student->dob?></td>
                                   <td>
                                        <div class="d-flex gap-1">
                                             <a href="" class="btn btn-sm btn-success">Editer</a>
                                             <form action="">
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