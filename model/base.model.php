<?php 
    define("FILENAME","model/base_de_donne.json");
    // function find_all_rayons($filename="base_de_donne.json"):array{
    //     $data=file_get_contents($filename);
    //     $data=json_decode($data,true);
    //     return $data["rayon"];
    // }

    // function add_rayon($rayon,$filename="base_de_donne.json"):void{
    //     $new_rayon=["id"=>uniqid(),
    //             "nom"=>$rayon["nom"]
    //     ];
    //     $data=file_get_contents($filename);
    //     $data=json_decode($data,true);
    //     $data["rayons"][]=$new_rayon;

    //     $data=json_encode($data,JSON_PRETTY_PRINT);
    //     $data=file_put_contents($filename,$data);
    // }
    
    //afin d'eviter la redondance des deux precedentes operations dans les #functions , 
    //il nous es plus profitable de passer de creer des  qui gere ce cas fonctions:

    function find_all(string $names,string $filename=FILENAME):array{
        $data=file_get_contents($filename);
        $data=json_decode($data,true);
        return $data[$names];
    }
    //M'assurer de bien formater $new_data
    function add(string $names,$new_data,string $filename=FILENAME):void{
        $data=file_get_contents($filename);
        $data=json_decode($data,true);
        $data[$names][]=$new_data;
        $data=json_encode($data,JSON_PRETTY_PRINT);
        file_put_contents($filename,$data);
    }   
    
    function find_tuple_by_id(string $names,int $id,int $option=0,string $filename=FILENAME):array|int|null{
       //l'option 0 consiste a retourner le tuples;
        //l'option 1 consite a retourner la clé;

        $tables=find_all($names);
        foreach ($tables as $key => $tuple){
            if($tuple["id"]==$id){
                if($option==0){
                    return $tuple;
                }
                return $key;
            }
        }
        return null;
    }
    

    function supprimer(string $names,int $id,$filename=FILENAME):void{
        $data=file_get_contents($filename);
        $data=json_decode($data,true);
        $key=find_tuple_by_id($names,$id,1);
        unset($data[$names][$key]);
        $data=json_encode($data,JSON_PRETTY_PRINT);
        file_put_contents($filename,$data);
       
    }
   // function filter(string $names,$filtre)

    function archiver_exemplaire(int $id,$filename=FILENAME):void{
         /*usecase*/
        $tuple=find_tuple_by_id("exemplaire",$id);
        $data=file_get_contents($filename);
        $data=json_decode($data,true);
        add("archive",$tuple);
        supprimer("exemplaire",$id);

    }
    function find_user_by_login_and_password($login,$password,$filename=FILENAME):array|null{
        $data=file_get_contents($filename);
        $data=json_decode($data,true);
        foreach($data["users"] as $user){
            if($user["login"]==$login && $user["password"]==$password){
                return $user;
            }
        }
        return null;
    }

    /*          PARTIE CATALOGUE_DISPO               */

    function find_all_emprunt():array{
        /*usecase*/
        $demandes=find_all("demande_de_pret");
        $emprunts=[];
        foreach($demandes as $demande){
            if(  isset($demande["date_r_prevue"]) && !isset($demande["date_r_reel"])  ){
                $emprunts[]=$demande;
            }
        }
        return $emprunts;
    }
    function find_all_exemplaire_perdu_or_deteriorer():array{
        $exemplaires=find_all("exemplaires");
        $exemplaireDeteriorer=[];
        foreach ($exemplaires as $exemplaire) {
            if(isset($exemplaire["etat"])){
                $exemplaireDeteriorer[]=$exemplaire;
            }
        }
        return $exemplaireDeteriorer;
    }

    function find_all_exemplaire_by_ouvrage($id):array{

        $exemplaires=find_all("exemplaires");
        $ouvrageExemplaires=[];
        foreach ($exemplaires as $exemplaire){
            if($exemplaire["ouvrage_id"]==$id){
                $ouvrageExemplaires[]=$exemplaire;
            }
        }
        return $ouvrageExemplaires;
    }

    function verifier_exemplaire_in_emprunt($id):bool{
        $emprunts=find_all_emprunt();
        foreach($emprunts as $emprunt){
            if($emprunt["id"]==$id){
                return True;
            }
        }
        return False;
    }
    function verifier_exemplaire_deteriore_ou_perdu(int $id):bool{
        $exemplaireD=find_all_exemplaire_perdu_or_deteriorer();
        foreach ($exemplaireD as $eD) {
            if($eD["id"]==$id){
                return True;
            }
        }
        return False;
    }
    function verifier_exemplaire_dispo_by_id(int $id):bool{
        if(!verifier_exemplaire_in_emprunt($id) && !verifier_exemplaire_deteriore_ou_perdu($id)){
            return True;
        }
        return False;
    }

    function verifier_ouvrage_dispo_by_id(int $id):bool{
        //objectif : -verifier si au moins un exemplaire de l'ouvrage concerné 
        //n'est pas dans la table emprunts (un emprunt est une demande de pret avec une date de retour prévu & sans date de retour_reel);
        // - verifier si ils sont deterioré ou perdu
        $OuvrageExemplaires=find_all_exemplaire_by_ouvrage($id);
        //$emprunts=find_all_emprunt();
        
        //verifier si l'exemplaire est dispo 
        //$exemplaire_indispo=find_all_exemplaire_perdu_or_deteriorer();
        foreach ($OuvrageExemplaires as $O_E) {
            if(verifier_exemplaire_dispo_by_id($O_E["id"])){
                return True;
            }
        }
        return False;
    }
    
    function find_all_catalogue_dispo($filename=FILENAME){
        /*usecase*/
        $ouvrages=find_all("ouvrages");
        $ouvrageDispo=array();
        foreach ($ouvrages as $ouvrage) {
            if(verifier_ouvrage_dispo_by_id($ouvrage["id"])){
                    $ouvrageDispo[]=$ouvrage;
            }
        }
        if($ouvrageDispo!=null){
            find_all_auteurs_ouvrages($ouvrageDispo);
            find_rayons_ouvrages($ouvrageDispo);
            find_source_cover($ouvrageDispo);
        }
        return $ouvrageDispo;
    }
    function find_source_cover(array &$ouvrages):void{
        foreach ($ouvrages as $key=>$ouvrage) {
            if(isset($ouvrage["image_id"])){
                $src=$ouvrage["image_id"];
            }else{
                $src="cover default";
            }
            $ouvrages[$key]["cover"]="public/image/cover"."/"."$src";
        }
    }
    function auteurs_by_ouvrage(int $id):array{
        $ecries=find_all("ecries");
        $auteurs=[];
        foreach($ecries as $ecrie){
            if($ecrie["ouvrage_id"]==$id){
                $auteur=find_tuple_by_id("auteurs",$ecrie["auteur_id"]);
                $auteurs[]=$auteur["nom"]." ".$auteur["prenom"];
            }
        }
        return $auteurs;
    }

    function find_all_auteurs_ouvrages(array &$ouvrages):void{
        foreach ($ouvrages as $key=>$ouvrage) {
            $auteurs=auteurs_by_ouvrage($ouvrage["id"]);
            $ouvrages[$key]["auteurs"]=$auteurs;
        }
    }

    function find_rayons_ouvrages(array &$ouvrages):void{
        foreach($ouvrages as $key=>$ouvrage){
            $rayon=find_tuple_by_id("rayons",$ouvrage["rayon_id"]);
            $ouvrages[$key]["rayon"]=$rayon["nom"];
        }
    }
    
    // function pret_accepter():array{
    //     $demande_de_pret=find_all_demande_de_pret();
    //     $prets=[];
    //     $i=0
    //     foreach ($demande_de_pret as $demande) {
    //         if($demande["statut"]=="accepter"){
    //             $i++;
    //             $pret=[ "id"=>$i,
    //                     "date"=>""

    //             ]
    //             $prets[]=$demande_de_pret;
    //         }
    //     }
    //     return $prets;
    // }
    // function find_all_emprunt():array{
    //       $emprunts=[["id"=>1,"date_pret"=>"25/11/2022","date_r_prevue"=>"9/12/2022","adherent_id"=>5],
     //               ["id"=>2,"date_pret"=>"20/11/2022","date_r_prevue"=>"4/12/2022","adherent_id"=>2],
    //              ["id"=>3,"date_pret"=>"20/11/2022","date_r_prevue"=>"4/12/2022","date_r_reel"=>"4/12/2022","adherent_id"=>6]

    //         ];
    //         return $emprunts;
    // }
    // function pret():array{
    //     $pret=[["id"=>1,"emprunt_id"=>1,"exemplaire_id"=>],
    //            ["id"=>1,"emprunt_id"=>,"exemplaire_id"=>],

    //     ]

    // }
?>