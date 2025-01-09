<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Paiement</title>
    <?php require_once 'components/head.html' ?>
    <link rel="stylesheet" href="/assets/styles/payment/index.css">
</head>
<body>

     <?php require_once 'components/base.html.php' ?>

     <div class="containers">
          <div class="form-container">
               <h3 class="form-title">Ajouter un Paiement</h3>
               <form action="add_payment.php" method="POST">
                    <!-- Champ pour sélectionner l'étudiant -->
                    <div class="mb-3">
                         <label for="student_id" class="form-label">Étudiant</label>
                         <select class="form-select" id="student_id" name="student_id" required>
                              <option value="">Sélectionnez un étudiant</option>
                              <!-- Options dynamiques -->
                              <option value="1">Alice</option>
                              <option value="2">Bob</option>
                         </select>
                    </div>
                    <!-- Champ pour le mois -->
                    <div class="mb-3">
                         <label for="month" class="form-label">Mois</label>
                         <select class="form-select" id="month" name="month" required>
                              <option value="">Sélectionnez un mois</option>
                              <option value="01">Janvier</option>
                              <option value="02">Février</option>
                              <option value="03">Mars</option>
                              <option value="04">Avril</option>
                              <option value="05">Mai</option>
                              <option value="06">Juin</option>
                              <option value="07">Juillet</option>
                              <option value="08">Août</option>
                              <option value="09">Septembre</option>
                              <option value="10">Octobre</option>
                              <option value="11">Novembre</option>
                              <option value="12">Décembre</option>
                         </select>
                    </div>
                    <!-- Champ pour l'année -->
                    <div class="mb-3">
                         <label for="year" class="form-label">Année</label>
                         <select class="form-select" id="year" name="year" required>
                              <option value="">Sélectionnez une année</option>
                              <?php
                              // PHP pour générer dynamiquement les options d'année
                              $currentYear = date('Y');
                              for ($i = $currentYear; $i >= $currentYear - 10; $i--) {
                              echo "<option value='$i'>$i</option>";
                              }
                              ?>
                         </select>
                    </div>
                    <!-- Champ pour le montant -->
                    <div class="mb-3">
                         <label for="amount" class="form-label">Montant</label>
                         <input type="number" class="form-control" id="amount" name="amount" step="0.01" min="0" placeholder="Entrez le montant payé" required>
                    </div>
                    <!-- Bouton de soumission -->
                    <div class="d-grid">
                         <button type="submit" class="btn btn-primary">Enregistrer le Paiement</button>
                    </div>
               </form>
          </div>
     </div>
</body>
</html>
