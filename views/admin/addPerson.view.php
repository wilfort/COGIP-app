<?php require 'views/partials/header.php';?>
  <section>
    <div class="model">
      <div class="general">
        <form method="post" action="?page=admin&admin=addperson">
        <div class="row">
          <div class="col-sm-6 col-md-4 col-lg-4"><label>Prénom :</label></div>
          <div class="col-sm-6 col-md-4 col-lg-4"><input type="text" name="firstname"></div>
          <div class="col-sm-12 col-md-4 col-lg-4"><?=$errorMessage['0']?></div>
        </div>
        <div class="row">
          <div class="col-sm-6 col-md-4 col-lg-4"><label>Nom :</label></div>
          <div class="col-sm-6 col-md-4 col-lg-4"><input type="text" name="lastname"></div>
          <div class="col-sm-12 col-md-4 col-lg-4"><?=$errorMessage['1']?></div>
        </div>
        <div class="row">
          <div class="col-sm-6 col-md-4 col-lg-4"><label>Téléphone :</label></div>
          <div class="col-sm-6 col-md-4 col-lg-4"><input type="text" name="phone"></div>
          <div class="col-sm-12 col-md-4 col-lg-4"><?=$errorMessage['2']?></div>
        </div>
        <div class="row">
          <div class="col-sm-6 col-md-4 col-lg-4"><label>Mail :</label></div>
          <div class="col-sm-6 col-md-4 col-lg-4"><input type="email" name="email"></div>
          <div class="col-sm-12 col-md-4 col-lg-4"><?=$errorMessage['3']?></div>
        </div>
        <div class="row">
          <div class="col-sm-6 col-md-4 col-lg-4"><label>Société :</label></div>
          <div class="col-sm-6 col-md-4 col-lg-4">
            <select name='company'>
              <?php foreach ($getCompany as $company) {
                  echo "<option value='".$company['id']."'>".$company['name']."</option>";
              } ?>
            </select>
          </div>
          <div class="col-sm-12 col-md-4 col-lg-4"><?=$errorMessage['4']?></div>
        </div>
        <div class="row">
        <div class="col-12 text-center">
          <input type="submit" name="submit" value="Ajouter"></div>
        </div>
        </form>
        <div class="row">
        <div class="col-12">
        <?=$message?></div>
        </div>
      </div>
    </div>
  </section>
  <?php require 'views/partials/footer.php';?>
