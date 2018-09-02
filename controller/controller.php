<?php
$url="http://localhost/COGIP-app/";//http://localhost/COGIP-app/
    function directoryPage(){
        global $url;
        require "models/person.model.php";
        $reponse = getDirectory();
        require "views/directory.view.php";
        $reponse->closeCursor();
    }
    function detailPersonPage(){
        global $url;
        require "models/person.model.php";
        $person = getDetailPerson();
        require "views/detailPerson.view.php";
    }

    function billPage(){
        global $url;
      require "models/model_bill.php";
      require "views/view_bill.php";
      $req->closeCursor();
    }
    function detailBillPage(){
        global $url;
      require "models/model_billDetail.php";
      require "views/view_billDetail.php";
      $req->closeCursor();
    }


    
    function companyPage(){
        require "models/company.model.php";
        global $url;
        $company=companyView();
        require "views/company.view.php";
    }
    function detailCompanyPage(){
        require "models/company.model.php";
        $id=companyDetail($_GET['id']);
        $donnees=companyRead($id);
        $company=$donnees['0'];
        $person=$donnees['1'];
        $bill=$donnees['2'];
        require 'views/companyDetail.view.php';
    }
    function companyClientPage(){
        require "models/company.model.php";
        global $url;
        $company=companyClientView();
        require "views/client.view.php";
    }
    function companyProviderPage(){
        require "models/company.model.php";
        global $url;
        $company=companyProviderView();
        require "views/provider.view.php";
    }
    function companyAddPage(){
        require "models/company.model.php";
        global $url;
        $message=companyCreate();
        $donneesInfoType=lireTypeCompany();
        $type=$donneesInfoType['0'];
        $checkType=$donneesInfoType['1'];
        require "views/CRUD/company/create.php";
    }

    function companyDeletePage(){
        require "models/company.model.php";
        global $url;
        $message=companyDelete($_GET['id']);
        require "views/CRUD/company/delete.php";}
    function companyUpdatePage(){
        require "models/company.model.php";
        global $url;
        $donneesCompanyModife=companyUpdate();
        $company=$donneesCompanyModife['0'];
            $checkType=$donneesCompanyModife['1'];
            $type=$donneesCompanyModife['2'];
            $message=$donneesCompanyModife['3'];
        require "views/CRUD/company/modife.php";
    
    }
    function loginPage(){
        global $url;
        require "views/login.php";
    }
/*
            page home
*/
    // function homePage(){require 'views/home.view.php';}

?>
