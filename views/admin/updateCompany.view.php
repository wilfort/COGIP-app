<?php require 'views/partials/header.php';?>
  <section>    <div class="model">
      <div class="general">
      <form action="#" method="post">
      <div class="row">
          <div class="col-sm-6 col-md-4 col-lg-4"></div>
          <div class="col-sm-6 col-md-4 col-lg-4"></div>
          <div class="col-sm-12 col-md-4 col-lg-4"></div>
        </div>
        <label for="name">La désignation sociale de la société : </label><input type="text" name="name" id="name" value="<?=$company['name']?>"><?=$errorMessage['0']?><br>
        <label for="street">Le nom de la rue : </label><input type="text" name="street" id="street" value="<?=$company['street']?>"><?=$errorMessage['1']?><br>
        <label for="number">Le numéro de la rue : </label><input type="number" name="number" id="number" value="<?=$company['number']?>"><?=$errorMessage['2']?><br>
        <label for="zip">Le code postale : </label><input type="number" name="zip" id="zip" value="<?=$company['zip']?>"><?=$errorMessage['3']?><br>
        <label for="city">Le nom de la commune : </label><input type="text" name="city" id="city" value="<?=$company['city']?>"><?=$errorMessage['4']?><br>
        <label for="country">Le nom du pays : </label><input type="text" name="country" id="country" value="<?=$company['country']?>"><?=$errorMessage['5']?><br>
        <label for="VAT">Le numéro de TVA : </label><input type="number" name="VAT" id="VAT" value="<?=$company['VAT']?>"><?=$errorMessage['6']?><br>
        <label for="phone">Le numéro de téléphone : </label><input type="tel" name="phone" id="phone" value="<?=$company['phone']?>"><?=$errorMessage['7']?><br>
        <label>Type de société : </label>
        <?php foreach ($type as $key => $value) { ?>
            <input type="radio" name="type" id="type<?=$value['id']?>" value='<?=$value['id']?>' <?=$checkType[$value['id']]?>><label for="type<?=$value['id']?>"><?=$value['type']?></label>
        <?php } ?>
        <?=$errorMessage['8']?>
        <div class="row">
        <div class="col-12 text-center">
        <button type="submit" name="modifier">modifier la société</button></div>
    </div>
      </form><div class="row">
        <div class="col-12">
      <?=$message;?></div>
    </div></div>
    </div>
  </section>
<?php require 'views/partials/footer.php';?>
