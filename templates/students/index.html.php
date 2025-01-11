<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Les étudiants</title>
     <?php require_once 'components/head.html' ?>
</head>
<body>
     
     <?php require_once 'components/base.html.php' ?>

     <div class="containers">
          <div class="container-fluid d-flex align-items-center justify-content-center flex-column gap-3">
               <div class="container-sm d-flex align-items-center justify-content-between flex-row">
                    <h2 class="title">Les étudiants</h2>
                    <a href="<?=Path('students.create')?>" class="mr-5 btn btn-primary">Ajouter</a>
               </div>
               <?php if (isset($_SESSION)): ?>
                    <?php foreach($_SESSION as $key => $value): ?>
                         <?php if ($key == 'danger' || $key == 'success'):?>
                              <p class="d-flex align-items-center justify-content-center container-sm alert alert-<?=$key?>"><?=$value?></p>
                              <?php unset($_SESSION[$key])?>
                         <?php endif?>
                    <?php endforeach?>
               <?php endif ?>
               <form action="" class="gap-2 justify-self-start container-fluid d-flex align-items-start justify-content-start flex-row gap-2">
                    <input value="<?=$data['search'] ?? ''?>" style="width:15%;" name="search" type="text" placeholder="Rechercher..." class="form-control">
                    <select style="width:15%;" class="form-select" name="classe" id="">
                         <option value="">Tous</option>
                         <?php foreach($classes as $classe): ?>
                              <option <?php if (array_key_exists('classe', $data) && $data['classe'] == $classe->id): ?> selected <?php endif ?> value="<?=$classe->id?>"><?=$classe->nom?></option>     
                         <?php endforeach ?>
                    </select>
                    <input value="<?=$limit?>" id="limit" style="width:10%;" name="limit" type="number" placeholder="Pagination..." class="form-control">
                    <input type="submit" class="btn btn-sm btn-primary" value="Rechercher">
               </form>
               <table style="font-family:Poppins;" class="table table-striped">
                    <thead>
                         <tr>
                              <th></th>
                              <th>Nom</th>
                              <th>Prénom</th>
                              <th>Classe</th>
                              <th>Date de naissance</th>
                              <th></th>
                         </tr>
                    </thead>
                    <tbody>
                         <?php if (isset($students) && !empty($students)): ?>
                              <?php foreach($students as $student): ?>
                                   <tr>
                                        <td>
                                             <?php if (isset($student->image) && !empty($student->image)): ?>
                                                  <img src="<?=$student->image?>" style="width:40Px;height:40px;border-radius:50%;">
                                             <?php endif ?>
                                        </td>
                                        <td class="fw-bolder"><?=$student->nom?></td>
                                        <td><?=$student->prenom?></td>
                                        <td class="fw-bolder" style="color:<?=Color($student->nomClass)?>"><?=$student->nomClass?></td>
                                        <td><?=FormatDate($student->dob)?></td>
                                        <td>
                                             <div class="d-flex gap-1">
                                                  <a href="<?=Path('students.show', ['id' => $student->id])?>" class="btn btn-sm btn-success">Voir</a>
                                                  <form method="POST" action="<?=Path('students.remove', ['id' => $student->id])?>">
                                                       <input type="submit" class="btn btn-sm btn-danger" value="Supprimer">
                                                  </form>
                                             </div>
                                        </td>
                                   </tr>
                              <?php endforeach ?>
                         <?php else: ?>
                              <tr>
                                   <td colspan="5" class="text-center">Pas d'étudiants correspondants</td>
                              </tr>
                         <?php endif ?>
                    </tbody>
               </table>
               <div style="width:60%" class="my-5 d-flex justify-content-between flex-row gap-1 align-items-center">
                    <div class="justify-self-baseline fw-bolder"><?=$studentsLength?> / <?=$count?></div>
                    <div class="d-flex justify-content-center flex-row gap-1 align-items-center">
                         <?php for($i = 1; $i <= $maxPages; $i++): ?>
                              <?php 
                                   $query = isset($data['search']) ? 'search='.$data['search'] : '';
                                   $query .= isset($data['classe']) ? '&classe='.$data['classe'] : '';     
                                   $query .= isset($data['limit']) ? '&limit='.$data['limit'] : '';     
                              ?>
                         <?php $class = $i == $page ? 'btn-primary' : 'btn-outline-primary' ?>
                              <a style="border-radius:50%;border:none" class="btn <?=$class?>" href="/students?page=<?=$i?><?="&".$query?>"><?=$i?></a>
                         <?php endfor ?>
                    </div>
               </div>
          </div>
     </div>

     <script src="/assets/script/input.js"></script>

</body>
</html>