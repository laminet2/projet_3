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
                    $ouvrage=find_all_details_on_ouvrage($id);
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
                            $emprunts=emprunt_of_someone($_SESSION["user"]["id"]);
                            if(isset($value)){
                                $emprunts=filter_emprunt_of_someone_by_retourner_or_en_cours($emprunts,$value);
                            }
                            $data["emprunts"]=$emprunts;
                            render_view("emprunt",$data,"adherent");
                        }
                        elseif($view=="demande_de_pret"){
                            $demandes=demande_de_pret_of_someone($_SESSION["user"]["id"]);
                            if(isset($filtre) && !empty($value)){
                                $demandes=filter($demandes,$filtre,$value);
                            }
                            $data["demandes"]=$demandes;
                            render_view("demande_de_pret",$data,"adherent");
                        }
                        else{
                            header("location:index.php?view=catalogue_dispo");
                        }
                    break;
                case 'RP':
                            switch($view){
                                case 'all_demande_de_pret':
                                    $demandes=demande_de_pret_sans_statut();
                                    $data["demandes"]=$demandes;
                                    render_view("all_demande_de_pret",$data,"rp");
                                    break;
                                case 'enregistrer_demande_de_pret':
                                     
                                    $demandes=demande_de_pret_accepter_et_pas_enregistrer();

                                    $data["demandes"]=$demandes;
                                    render_view("enregistrer_demande_de_pret",$data,"rp");
                                    break;
                                case 'pret_retardataire':
                                    $data["demandes"]=pret_retardataire();      
                                    render_view("pret_retardataire",$data,"rp");
                                    break;
                                case 'valider_retour':
                                    render_view("valider_retour",[],'rp');
                                    break;

                            }

                    break;
                case 'RB':
                        switch ($view) {
                            case 'archiver_exemplaire':
                                $data["exemplaires"]=find_all_exemplaire_perdu_or_deteriorer();
                                render_view("archiver_exemplaire",$data,"rb"); 
                                break;
                            
                            default:
                                # code...
                                break;
                        }
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
                                    //header("location:index.php?view=oeuvre_dispo");
                                    header("location:index.php?view=archiver_exemplaire");
                                    break;
                                case "RP":
                                    header("location:index.php?view=all_demande_de_pret");
                                    break;
                                default:
                                    # code...
                                    break;
                            }
                    }
                break;
            case 'creer_compte':
                    if(verifier_login_deja_existent($login)){
                        header("location:index.php?view=creer_compte");
                    }else{
                        $data=[
                            "login"=>$login,
                            "password"=> $password,
                            "id"=> uniqid(),
                            "nom"=> $nom,
                            "prenom"=> $prenom,
                            "role"=> "adherent"
                        ];
                        add("users",$data);
                        $_SESSION["user"]=$data;
                        header("location:index.php?view=catalogue_dispo");

                    }
                    break;
            
            //partie adherent 

            case 'filter_catalogue_dispo':
                    // $catalogues=find_all_catalogue_dispo();
                    // $catalogues=filter($catalogues,$filtre,$value);
                    // var_dump($catalogues);
                    // $data=[];
                    // $data["catalogues"]=$catalogues;
                    // render_view('catalogue_dispo',$data,"adherent");
                    // die;
                    header("location:index.php?view=catalogue_dispo&filtre=$filtre&value=$value");
                    break;
            case 'filter_demande_de_pret':
                    header("location:index.php?view=demande_de_pret&filtre=statut&value=$value");
                    break;
            
            case 'filter_emprunt_etat':
                    header("location:index.php?view=emprunt&value=$value");
                    break;
            case 'add_demande_de_pret':
                    if(!isset($_SESSION["user"])||verifier_demande_de_pret_idem_en_cours($id,$_SESSION["user"]["id"])==true){
                        header("location:index.php?view=catalogue_dispo");
                    }else{
                        $data=[
                                "id"=> (int) uniqid(),
                                "adherent_id"=> $_SESSION["user"]["id"],
                                "ouvrage_id"=> $id,
                        ];
                        add("demande_de_pret",$data);
                        header("location:index.php?view=demande_de_pret");
                    }
                    break;

            //partie Rp
            case 'accepter_refuser_demande_de_pret':
                add_statut_in_demande_de_pret($demande_de_pret_id,$statut);
                header("location:index.php?view=all_demande_de_pret");
                break;
            case "enregistrer_demande":

                enregistrer_demande($demande_id,$exemplaire_id);
                header("location:index.php?view=enregistrer_demande_de_pret");
                break;
            case "archiver":
                    archiver_exemplaire($id);
                    header("location:index.php?view=archiver_exemplaire");
                    break;

                
            default:
                # code...
                break;
        }
    }





    function render_view(string $view,array $data=[],string $base="vide"):void{
            if(!empty($data)){
                extract($data);
            }

            //chargement de l'en-tete d'utilisateur
            ob_start();
                require_once("views/layout/header.html.php");
            $HeaderPrincipal=ob_get_clean();
            

            //chargement de la vue
            ob_start();

                //RENOMMAGE DE L'adresse  relatif de view etant donné qu'il sont regrouper dans des dossiers specifique
                // relatif au rôle de chaque acteur

                //les pages mentionne en condition n'ont pas besoin de renommage car il ne sont pas dans des groupes
                //mais ils ont besoin de header

                if($view!="connexion" && $view!="acceuil" && $view!="creer_compte" && $view!="catalogue_dispo" && $view!="detail"){
                        
                        $view=$_SESSION["user"]["role"]."/".$view;

                }
                
                    require_once("views/$view.html.php");
            $ContentView=ob_get_clean();

            require_once("views/layout/".$base.".base.html.php");
    }
