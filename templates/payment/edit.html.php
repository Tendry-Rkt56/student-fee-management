<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Paiement</title>
    <?php require_once 'components/head.html' ?>
    <link rel="stylesheet" href="/assets/styles/payment/index.css">
    <script src="/assets/script/payment.js" defer></script>
</head>
<body>

     <?php require_once 'components/base.html.php' ?>

     <div class="containers">
          <div class="form-container">
               <h3 class="form-title">Ajouter un Paiement</h3>
               <form action="" method="POST">
                    <!-- Champ pour sélectionner l'étudiant -->
                    <div class="mb-3">
                         <label for="student_id" class="form-label">Étudiant</label>
                         <input readonly type="text" id="student" class="form-control" placeholder="Séléctionner un étudiant..." value="<?=$student->nom?> <?=$student->prenom?>">
                    </div>
                    <!-- Champ pour le mois -->
                    <div class="mb-3">
                         <label for="month" class="form-label">Mois</label>
                         <select class="form-select" id="month" name="mois" required>
                              <option value="<?=$payment->mois?>"><?=$payment->mois?></option>
                         </select>
                    </div>
                    <!-- Champ pour l'année -->
                    <div class="mb-3">
                         <label for="year" class="form-label">Année</label>
                         <select class="form-select" id="year" name="annee" required>
                              <option value="<?=$payment->annee?>"><?=$payment->annee?></option>
                         </select>
                    </div>
                    <!-- Champ pour le montant -->
                    <div class="mb-3">
                         <label for="amount" class="form-label">Montant</label>
                         <input value="<?=$payment->amount?>" type="number" class="form-control" id="amount" name="amount" step="0.01" min="0" placeholder="Entrez le montant payé" required>
                    </div>
                    <!-- Bouton de soumission -->
                    <div class="d-grid">
                         <button type="submit" class="btn btn-primary">Enregistrer</button>
                    </div>
               </form>
          </div>
     </div>
</body>
</html>
