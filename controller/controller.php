<?php require_once("controller/controller.php");

    if (isset($_GET['view'])) {
        extract($_GET['view']);
        if($view =="catalogue_dispo"||$view=="connexion"||$view=="creer_compte"){
            switch($view){
                case "connexion":
                    render_view("connexion");
                    
                    break;
                case "creer_compte":
                     render_view("creer_compte");
            
                    break;
                case "catalogue_dispo":
                    if(isset($filter)){
                    
                        #$data=;
                    }
                    else{
                        break;
                        
                        #$data=;
	
                    }
                    #render_view('catalogue_dispo',$data,...);
                    break;
            }

        }
        else{
            if(!isset($_SESSION["user"])){
                header("location: index.php?view=connexion");
            }
        }
    }else{
            render_view("acceuil");
        }
    
    function render_view(string $view,array $data=[],string $base="vide"):void{
            if(!empty($data)){
                extract($data);
            }
            ob_start();
                require_once("views/$view.html.php");
            $ContentView=ob_get_clean();
            require_once("views/layout/".$base.".html.php");

    }