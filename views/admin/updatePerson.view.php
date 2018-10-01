<?php require 'views/partials/header.php';?>
  <section>
    <form method="post" action="">
      <label>Prénom :</label>
        <input type="text" name="firstname" value="<?= $getPerson['firstname']; ?>"><?=$errorMessage['0']?>
        <br>
      <label>Nom :</label>
        <input type="text" name="lastname" value="<?= $getPerson['lastname']; ?>"><?=$errorMessage['1']?>
        <br>
      <label>Téléphone :</label>
        <input type="text" name="phone" value="<?= $getPerson['phone']; ?>"><?=$errorMessage['2']?>
        <br>
      <label>Mail :</label>
        <input type="email" name="email" value="<?= $getPerson['email']; ?>"> <?=$errorMessage['3']?>
        <br>
      <label>Société :</label>
        <select name='company'>
          <?php foreach ($getCompany as $company) { ?>
             <option value="<?= $company['id']; ?>"<?php if($company['id']==$getPerson['company']){echo 'selected';} ?>><?= $company['name']; ?></option>
           <?php } ?>
        </select> <?=$errorMessage['4']?>
      <br>
      <input type="submit" name="submit" value="Modifier">
    </form>
    <?=$message?>
  </section>
<?php require 'views/partials/footer.php';?>
