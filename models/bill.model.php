<?php

  function inputFilter($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);

    return $data;
  }

  function lireBill() {
    require "assets/config/php/config.php";
    $requestSQL=
      "SELECT bill.*, CONCAT(person.firstname,' ',person.lastname) as person FROM bill, person where bill.person=person.id ORDER BY bill.date DESC";

    $requete = $pdo->prepare($requestSQL);

    $requete->execute();

    $bill = $requete->fetchAll();

    $requete->closeCursor();

    return $bill;
  }

  function deleteBill($number){
    require "assets/config/php/config.php";
    $requestSQL=
      "DELETE from bill
      WHERE number = $number";

    $requete = $pdo->prepare($requestSQL);

    $requete->execute();

    $requete->closeCursor();
    $message='vous avez bien supprimé la facture';

    return $message;
  }

  function billCreate()
    {
      require "assets/config/php/config.php";

      $data=array();
      $error=array();$errorMessage=array("","","","","");
      $message="";
      if(isset($_POST['creer']))
        {

          $date = inputFilter($_POST["date"]);
          $object = inputFilter($_POST["object"]);
          $company = inputFilter($_POST["company"]);
          $person = inputFilter($_POST["person"]);

          if (filter_var($date, FILTER_SANITIZE_STRING)) {
              $date_valid = $date;
            }else{
              $error['0']="error on date";
              $errorMessage['0']="mauvaise date";
            }
          if (filter_var($object, FILTER_SANITIZE_STRING)) {
              $object_valid = $object;
            }else{
              $error['1']="error on object";
              $errorMessage['1']="mauvaise object";
            }

          $company_san=filter_var($company, FILTER_SANITIZE_NUMBER_INT);
              if (filter_var($company_san, FILTER_VALIDATE_INT)) 
                {
                  $company_valid = $company_san;
                }
              else{
                $error['2']="error on company";
                $errorMessage['2']="mauvaise société";
              }
          $person_san=filter_var($person, FILTER_SANITIZE_NUMBER_INT);
              if (filter_var($person_san, FILTER_VALIDATE_INT)) 
                {
                  $person_valid = $person_san;
                }
              else{
                $error['3']="error on personne";
                $errorMessage['3']="mauvaise personne";
              }
          if(isset($error))
            {
              $requestSQL=
                "INSERT INTO bill (date, object, company, person)
                  VALUES ( :date, :object, :company, :person);";

              $requete = $pdo->prepare($requestSQL);

              $requete->bindParam(":date", $date_valid);
              $requete->bindParam(":object", $object_valid);
              $requete->bindParam(":company", $company_valid);
              $requete->bindParam(":person", $person_valid);

              $requete->execute();
              $message="La Facture a été ajoutée avec succès.";
              $requete->closeCursor();
            }
        }
      $data['0']=$message;
      $data['1']=$errorMessage;
      return $data;
    }


  function typeDataBill(){
    $data=array();
    require "assets/config/php/config.php";
    $requestSQL=
      "SELECT id, name
      FROM company";

    $requete = $pdo->prepare($requestSQL);

    $requete->execute();
    $company = $requete->fetchAll();

    $requete->closeCursor();


    $requestSQL=
    "SELECT id, CONCAT(lastname,' ',firstname) AS nom
    FROM person";

    $requete = $pdo->prepare($requestSQL);

    $requete->execute();
    $person = $requete->fetchAll();

    $requete->closeCursor();

    $data['0']=$company;
    $data['1']=$person;

    return $data;
  }


  function billUpdate(){
    $error=array();
    $message="";
    $errorMessage=array("","","","","");
    require "assets/config/php/config.php";
    $number=inputFilter($_GET['number']);
    if(isset($_POST['modifier'])) 
      {
        

        $date = inputFilter($_POST["date"]);
        $object = inputFilter($_POST["object"]);
        $company = inputFilter($_POST["company"]);
        $person = inputFilter($_POST["person"]);

        if (filter_var($date, FILTER_SANITIZE_STRING)) 
          {
            $date_valid = $date;
          }
        else
          {
            $error['0']="error on date";
            $errorMessage['0']="mauvaise date";
          }

        if (filter_var($object, FILTER_SANITIZE_STRING)) 
          {
            $object_valid = $object;
          }
        else
          {
            $error['1']="error on object";
            $errorMessage['1']="mauvaise object";
          }

        $company_san=filter_var($company, FILTER_SANITIZE_NUMBER_INT);
        if (filter_var($company_san, FILTER_VALIDATE_INT)) 
          {
            $company_valid = $company_san;
          }
        else
          {
            $error['2']="error on company";
            $errorMessage['2']="mauvaise société";
          }
        $person_san=filter_var($person, FILTER_SANITIZE_NUMBER_INT);
        if (filter_var($person_san, FILTER_VALIDATE_INT)) 
          {
            $person_valid = $person_san;
          }
        else
          {
            $error['3']="error on personne";
            $errorMessage['3']="mauvaise personne";
          }
        if(isset($error))
          {

            $requestSQL=
              "UPDATE bill
              SET date=:date, object=:object, company=:company, person=:person
              WHERE number = $number";

            $requete = $pdo->prepare($requestSQL);

            $requete->bindParam(":date", $date_valid);
            $requete->bindParam(":object", $object_valid);
            $requete->bindParam(":company", $company_valid);
            $requete->bindParam(":person", $person_valid);

            $requete->execute();
            $requete->closeCursor();
            $message="Vous avez modifié la facture";
          }
      }
    $selectCompany=array();
    $selectPerson=array();
    $requestSQL=
      "SELECT bill.*
      FROM bill
      WHERE number = $number";

    $requete = $pdo->prepare($requestSQL);

    $requete->execute();

    $bill = $requete->fetch();
    $requete->closeCursor();

    $data['0']=$bill;
    $dataBill=typeDataBill();

    foreach ($dataBill['0'] as $key => $value) {
      if($value['id']==$bill['company']) {
        $selectCompany[$value['id']]="selected";
      }
      else {
        $selectCompany[$value['id']]="";
      }
    }

    $data['1']=$dataBill['0'];

    foreach ($dataBill['1'] as $key => $value) {
      if($value['id']==$bill['person']) {
        $selectPerson[$value['id']]="selected";
      }
      else {
        $selectPerson[$value['id']]="";
      }
    }

    $data['2']=$dataBill['1'];
    $data['3']=$selectCompany;
    $data['4']=$selectPerson;
    $data['5']=$message;
    $data['6']=$errorMessage;
    return $data;
  }


  function detailBill() {
    require "assets/config/php/config.php";
    $id=intval($_GET['number']);

    $requestSQL=
      "SELECT bill.*,company.name,person.lastname, person.firstname
      FROM bill,company,person
      WHERE bill.number=:number
      AND bill.company=company.id
      AND bill.person=person.id";
      $requete = $pdo->prepare($requestSQL);

      $requete->bindParam(":number", $id);

    $requete->execute();
    $detailBill = $requete->fetch();

    $requete->closeCursor();

    return $detailBill;
  }

?>
