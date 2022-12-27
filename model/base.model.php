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
    
    function find_table_by_id(string $names,int $id,int $option=0,string $filename=FILENAME):array|int|null{
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
        $key=find_table_by_id($names,$id,1);
        unset($data[$names][$key]);
        $data=json_encode($data,JSON_PRETTY_PRINT);
        file_put_contents($filename,$data);
       
    }
   // function filter(string $names,$filtre)

    function archiver_exemplaire(int $id,$filename=FILENAME):void{
        
        $tuple=find_table_by_id("exemplaire",$id);
        $data=file_get_contents($filename);
        $data=json_decode($data,true);
        add("archive",$tuple);
        supprimer("exemplaire",$id);

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