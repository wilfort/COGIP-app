    <?php
    require 'views/partials/header.php';
    ?>
    <section>
    <div class="model">
      <div class="general">
        <form action="#" method="post">
        <div class="row">
          <div class="col-sm-6 col-md-4 col-lg-4"><label for="date">La date de la Facture : </label></div>
          <div class="col-sm-6 col-md-4 col-lg-4"><input type="date" name="date" id="date" value="<?=$bill['date']?>"></div>
          <div class="col-sm-12 col-md-4 col-lg-4"><?=$errorMessage['0']?></div>
        </div>
        <div class="row">
          <div class="col-sm-6 col-md-4 col-lg-4"><label for="object">L'object de la Facture : </label></div>
          <div class="col-sm-6 col-md-4 col-lg-4"><input type="text" name="object" id="object" value="<?=$bill['object']?>"></div>
          <div class="col-sm-12 col-md-4 col-lg-4"><?=$errorMessage['1']?></div>
        </div>
        <div class="row">
          <div class="col-sm-6 col-md-4 col-lg-4"><label for="company">Quel société : </label></div>
          <div class="col-sm-6 col-md-4 col-lg-4"><select name="company" id="company">
                <?php foreach ($company as $key => $value) { ?>
                <option value="<?=$value['id']?>" <?=$selectCompany[$value['id']]?>><?=$value['name']?></option>
                <?php } ?>
            </select></div>
          <div class="col-sm-12 col-md-4 col-lg-4"><?=$errorMessage['2']?></div>
        </div>
        <div class="row">
          <div class="col-sm-6 col-md-4 col-lg-4"><label for="person">Quel personne : </label></div>
          <div class="col-sm-6 col-md-4 col-lg-4"><select name="person" id="person">
                <?php foreach ($person as $key => $value) { ?>
                <option value="<?=$value['id']?>" <?=$selectPerson[$value['id']]?>><?=$value['nom']?></option>
                <?php } ?>
            </select></div>
          <div class="col-sm-12 col-md-4 col-lg-4"><?=$errorMessage['3']?></div>
        </div>
        <div class="row">
        <div class="col-12 text-center">
            <button type="submit" name="modifier">modifier la Facture</button></div>
    </div>
        </form><div class="row">
        <div class="col-12">
        <?=$message;?>
        </div>
    </div></div>
    </div>
    </section>
    <?php
    require 'views/partials/footer.php';
    ?>