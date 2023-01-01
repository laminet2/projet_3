<?php require_once("model/base.model.php");

    if (isset($_GET['view'])) {
        extract($_GET);
        if($view =="catalogue_dispo"||$view=="connexion"||$view=="creer_compte"||$view=="deconnexion"|| $view=="detail"){
            switch($view){
                case "connexion":
                    render_view("connexion");
                    
                    break;
                case "creer_compte":

                     render_view("creer_compte");
            
                    break;
                case "catalogue_dispo":
                    $catalogues=find_all_catalogue_dispo();
                    if(isset($filtre) & !empty($value) &!empty($filtre)){
                       $catalogues=filter($catalogues,$filtre,$value);
                    }
                    
                    $data["catalogues"]=$catalogues;

                    render_view('catalogue_dispo',$data,"adherent");

                    break;
                case "detail":
                    $ouvrage=find_all_details_on_ouvrages($id);
                    $data["catalogue"]=$ouvrage;
                    render_view("detail",$data,"adherent");
                    break;
                case "deconnexion":
                    session_destroy();
                    unset($_SESSION);
                    header("location:index.php?view=connexion");
                    break;
            }
        }
        else{
            if(!isset($_SESSION["user"])){
                header("location: index.php?view=connexion");
            }
            switch ($_SESSION["user"]["role"]) {
                case 'adherent':
                        if($view=='emprunt'){

                        }
                        elseif($view=="demande_de_pret"){

                        }
                        else{
                            header("location:index.php?view=catalogue_dispo");
                        }
                    break;
                case 'RP':
                    break;
                case 'RB':
                    break;
                default:
                    break;
            }
        }
    }else{
            render_view("acceuil");
        }
    
    
    if(isset($_POST["btnsave"])){
        extract($_POST);
        switch ($btnsave) {
            case 'connexion':
                   $user=find_user_by_login_and_password($_POST["login"],$_POST["password"]);
                   if($user==null){
                        header("location:index.php?view=connexion");
                    }
                    else{
                            $_SESSION["user"]=$user;
                            switch ($_SESSION["user"]["role"]) {
                                case 'adherent':
                                    header("location:index.php?view=catalogue_dispo");
                                    break;
                                case "RB":
                                    // header("location:index.php?view=oeuvre_dispo")
                                default:
                                    # code...
                                    break;
                            }
                    }
                break;
            case 'filter_catalogue_dispo':
                    extract($_POST);
                    // $catalogues=find_all_catalogue_dispo();
                    // $catalogues=filter($catalogues,$filtre,$value);
                    // var_dump($catalogues);
                    // $data=[];
                    // $data["catalogues"]=$catalogues;
                    // render_view('catalogue_dispo',$data,"adherent");
                    // die;
                    header("location:index.php?view=catalogue_dispo&filtre=$filtre&value=$value");
            
            default:
                # code...
                break;
        }
    }





    function render_view(string $view,array $data=[],string $base="vide"):void{
            if(!empty($data)){
                extract($data);
            }
            
            ob_start();

                if($view!="connexion" && $view!="acceuil" && $view!="creer_compte"){
                    if($view!="catalogue_dispo" & $view!="detail"){
                        $view=$_SESSION["user"]["role"]."/".$view;
                        
                    }
                        
                    require_once("views/layout/header.html.php");
                }
                
                require_once("views/$view.html.php");
            $ContentView=ob_get_clean();
            require_once("views/layout/".$base.".base.html.php");
    }

