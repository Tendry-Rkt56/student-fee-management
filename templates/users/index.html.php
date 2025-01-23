<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Les utilisateurs</title>
     <?php require_once 'components/head.html' ?>
</head>
<body>
     <?php require_once 'base.html.php' ?>

     <div class="containers">
          <div class="container-fluid d-flex align-items-center justify-content-center flex-column gap-3">
               <div class="container-sm d-flex align-items-center justify-content-between flex-row">
                    <h2 class="title">Les utilisateurs</h2>
                    <a href="<?=path('classes.create')?>" class="mr-5 btn btn-primary">Ajouter</a>
               </div>
               <?php if (isset($_SESSION)): ?>
                    <?php foreach($_SESSION as $key => $value): ?>
                         <?php if ($key == 'danger' || $key == 'success'):?>
                              <p class="d-flex align-items-center justify-content-center container-sm alert alert-<?=$key?>"><?=$value?></p>
                              <?php unset($_SESSION[$key])?>
                         <?php endif?>
                    <?php endforeach?>
               <?php endif ?>
               <table style="font-family:Poppins;" class="table table-striped">
                    <thead>
                         <tr>
                              <th></th>
                              <th>Nom</th>
                              <th>Prénom</th>
                              <th>Date de création</th>
                              <th></th>
                         </tr>
                    </thead>
                    <tbody>
                         <?php if (isset($classes) && !empty($classes)): ?>
                              <?php foreach($classes as $classe): ?>
                                   <tr>
                                        <td></td>
                                        <td class="fw-bolder"><?=$classe->nom?></td>
                                        <td class="fw-bolder" style="color:blueviolet"><?=number_format($classe->amount, 0, '.', ' ')?> Ar</td>
                                        <td><?=formatDate($classe->created_at)?></td>
                                        <td>
                                             <div class="d-flex gap-1">
                                                  <a href="<?=path('classes.edit', ['id' => $classe->id])?>" class="btn btn-sm btn-success">Editer</a>
                                                  <a href="/students?classe=<?=$classe->id?>" class="btn btn-sm btn-primary">Les étudiants</a>
                                                  <form method="POST" action="<?=path('classes.remove', ['id' => $classe->id])?>">
                                                       <input type="submit" class="btn btn-sm btn-danger" value="Supprimer">
                                                  </form>
                                             </div>
                                        </td>
                                   </tr>
                              <?php endforeach ?>
                         <?php else: ?>
                              <tr>
                                   <td colspan="5" class="text-center">Pas de classes correspondantes</td>
                              </tr>
                         <?php endif ?>
                    </tbody>
               </table>
          </div>
     </div>

</body>
</html>