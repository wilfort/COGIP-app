<?php require 'views/partials/header.php';?>
  <section>
  <div class="model">
      <div class="general">
    <form action="#" method="post">
      <div class="row">
          <div class="col-sm-6 col-md-4 col-lg-4"><label for="name">La désignation sociale de la société : </label></div>
          <div class="col-sm-6 col-md-4 col-lg-4"><input type="text" name="name" id="name"></div>
          <div class="col-sm-12 col-md-4 col-lg-4"><?=$errorMessage['0']?></div>
        </div>
        <div class="row">
          <div class="col-sm-6 col-md-4 col-lg-4"><label for="street">Le nom de la rue : </label></div>
          <div class="col-sm-6 col-md-4 col-lg-4"><input type="text" name="street" id="street"></div>
          <div class="col-sm-12 col-md-4 col-lg-4"><?=$errorMessage['1']?></div>
        </div>
        <div class="row">
          <div class="col-sm-6 col-md-4 col-lg-4"><label for="number">Le numéro de la rue : </label></div>
          <div class="col-sm-6 col-md-4 col-lg-4"><input type="number" name="number" id="number"></div>
          <div class="col-sm-12 col-md-4 col-lg-4"><?=$errorMessage['2']?></div>
        </div>
        <div class="row">
          <div class="col-sm-6 col-md-4 col-lg-4"><label for="zip">Le code postale : </label></div>
          <div class="col-sm-6 col-md-4 col-lg-4"><input type="number" name="zip" id="zip"></div>
          <div class="col-sm-12 col-md-4 col-lg-4"><?=$errorMessage['3']?></div>
        </div>
        <div class="row">
          <div class="col-sm-6 col-md-4 col-lg-4"><label for="city">Le nom de la commune : </label></div>
          <div class="col-sm-6 col-md-4 col-lg-4"><input type="text" name="city" id="city"></div>
          <div class="col-sm-12 col-md-4 col-lg-4"><?=$errorMessage['4']?></div>
        </div>
        <div class="row">
          <div class="col-sm-6 col-md-4 col-lg-4"><label for="country">Le nom du pays : </label></div>
          <div class="col-sm-6 col-md-4 col-lg-4"><input type="text" name="country" id="country"></div>
          <div class="col-sm-12 col-md-4 col-lg-4"><?=$errorMessage['5']?></div>
        </div>
        <div class="row">
          <div class="col-sm-6 col-md-4 col-lg-4"><label for="VAT">Le numéro de TVA : </label></div>
          <div class="col-sm-6 col-md-4 col-lg-4"><input type="number" name="VAT" id="VAT"></div>
          <div class="col-sm-12 col-md-4 col-lg-4"><?=$errorMessage['6']?></div>
        </div>
        <div class="row">
          <div class="col-sm-6 col-md-4 col-lg-4"><label for="phone">Le numéro de téléphone : </label></div>
          <div class="col-sm-6 col-md-4 col-lg-4"><input type="tel" name="phone" id="phone"></div>
          <div class="col-sm-12 col-md-4 col-lg-4"><?=$errorMessage['7']?></div>
        </div>
        <div class="row">
          <div class="col-sm-6 col-md-4 col-lg-4">Type de société :</div>
          <div class="col-sm-6 col-md-4 col-lg-4">
            <?php foreach ($type as $key => $value) { ?>
              <input type="radio" name="type" id="type<?=$value['id']?>" value='<?=$value['id']?>' <?=$checkType[$value['id']]?>><label for="type<?=$value['id']?>"><?=$value['type']?></label>
            <?php } ?>
          </div>
          <div class="col-sm-12 col-md-4 col-lg-4"><?=$errorMessage['8']?></div>
        </div>
        <div class="row">
        <div class="col-12 text-center">
        <button type="submit" name="creer">créer</button></div>
        </div>
    </form>
    <div class="row">
        <div class="col-12"><?=$message?></div>
        </div>
    </div>
    </div>
  </section>
<?php require 'views/partials/footer.php';?>
