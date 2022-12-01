<?php 
    function find_all_rayons():array{
        $rayons=[["id"=>5,"nom"=>"mathematique"],
               ["id"=>1,"nom"=>"communication"],
               ["id"=>2,"nom"=>"marketing"],
               ["id"=>3,"nom"=>"developpement personnel"],
               ["id"=>4,"nom"=>"religion"],
               ["id"=>6,"nom"=>"roman"]
         ];
         return $rayons;
    }
    //on affiche pas l'exemplaire mais l'ouvrage,
    //un ouvrage est disponible s' il a au moins un exemplaire qui n'est pas en prêt ou détérioré

    function find_all_ouvrages():array{
        $ouvrages=[["id"=>1,"image_id"=>9782100033355290,"titre"=>"statistique et probabilité","date_edition"=>"mars 1997","mot_cle"=>["statistique","probabilite","khie-deux","student","loie"],"rayon_id"=>5],
                  ["id"=>2,"titre"=>"Maths pratiques terminale D","date_edition"=>"2019","mot_cle"=>["maths","terminale","denombrement","geometrie"],"rayon_id"=>5],
                  ["id"=>3,"image_id"=>95555555555555555555558452,"titre"=>"le jeûne de ramadan ethique & preceptes ","date_edition"=>"fevrier 2017","mot_cle"=>["jeune","ramadan","ethique","preceptes"],"rayon_id"=>4],
                  ["id"=>4,"titre"=>"Introduction au marketing","date_edition"=>"Octobre 2001","mot_cle"=>["marketing","introduction","initiation"],"rayon_id"=>2],
                  ["id"=>5,"titre"=>"Methode de communication ecrite et orale","date_edition"=>"2008","mot_cle"=>["ecrite","communication","orale"],"rayon_id"=>1],
                  ["id"=>6,"image_id"=>4116955252236556669,"titre"=>"l'art subtile de s'en foutre","date_edition"=>"2016","mot_cle"=>["art","subtile","foutre"],"rayon_id"=>3] ,
                  ["id"=>7,"image_id"=>85245523522352,"titre"=>"Comment se faire des amis","date_edition"=>"1981","mot_cle"=>["amis","influence","communication"],"rayon_id"=>3]   ,
                  ["id"=>8,"titre"=>"l'alchimiste","date_edition"=>"1994","mot_cle"=>["Alchimiste","passion"],"rayon_id"=>6],
                  ["id"=>9,"image_id"=>42545454654787,"titre"=>"les mains sales","date_edition"=>"1948","mot_cle"=>["mains","sales","Sarte","pragmatique","theatres"],"rayon_id"=>6],
                  ["id"=>10,"image_id"=>52552512587,"titre"=>"l'enfant noir","date_edition"=>"1953","mot_cle"=>["enfant","noir","autobiographie"],"rayon_id"=>6]   
                 ];
        return $ouvrages;
    }
   

    function find_all_auteurs():array{
        $auteurs=[["id"=>1,"nom"=>"Camara","prenom"=>"Laye","profession"=>["ecrivain"]],
                 ["id"=>2,"nom"=>"Sarte","prenom"=>"Jean Paul","profession"=>['dramaturge']],
                 ["id"=>3,"nom"=>"Coelho","prenom"=>"Paulo","profession"=>["ecrivain"]],
                 ["id"=>4,"nom"=>"Dale","prenom"=>"Canergie","profession"=>["conferencier"]],
                 ["id"=>5,"nom"=>"Manson","prenom"=>"Mark","profession"=>["blogger"]],
                 ["id"=>6,"nom"=>"Gnamou","prenom"=>"Oubele Yao Norbert","profession"=>["Inspecteur","Professeur"]],
                 ["id"=>7,"nom"=>"Kastit","prenom"=>"Mustafa","profession"=>["Theoligien","Imam"]],
                 ["id"=>8,"nom"=>"Fayet","prenom"=>"Michelle","profession"=>["professeur"]],    //same c
                 ["id"=>9,"nom"=>"Commeignes","prenom"=>"Jean-Denis","profession"=>["formateur","consultant"]], //same c
                 ["id"=>10,"nom"=>'Fourastier',"prenom"=>"Jacqueline","profession"=>["Chargé de risque"]],//same mat
                 ["id"=>11,"nom"=>"Laslier","prenom"=>"Jean-Francois","profession"=>["Actuaire"]],//same mat
                 ["id"=>12,"nom"=>"Chirouze","prenom"=>"Yves","profession"=>["professeur"]], //same mark
                 ["id"=>13,"nom"=>"Chirouze","prenom"=>"Alexandre","profession"=>["professeur"]],//same mark
                ];
                return $auteurs;
    }
    
    
    function find_all_ecrie():array{
            $ecries=[["id"=>1,"ouvrage_id"=>1,"auteur_id"=>10],
                    ["id"=>2,"ouvrage_id"=>1,"auteur_id"=>11],
                    ["id"=>3,"ouvrage_id"=>2,"auteur_id"=>6],
                    ["id"=>4,"ouvrage_id"=>3,"auteur_id"=>7],
                    ["id"=>5,"ouvrage_id"=>4,"auteur_id"=>12],
                    ["id"=>6,"ouvrage_id"=>4,"auteur_id"=>13],
                    ["id"=>7,"ouvrage_id"=>5,"auteur_id"=>8],
                    ["id"=>8,"ouvrage_id"=>5,"auteur_id"=>9],
                    ["id"=>9,"ouvrage_id"=>6,"auteur_id"=>5],
                    ["id"=>10,"ouvrage_id"=>7,"auteur_id"=>4],
                    ["id"=>11,"ouvrage_id"=>8,"auteur_id"=>3],
                    ["id"=>12,"ouvrage_id"=>9,"auteur_id"=>2],
                    ["id"=>13,"ouvrage_id"=>10,"auteur_id"=>1],
                ];
            return $ecries;
    }
    

    //les exemplaire sans l'attribut etat sont considerer comme neuf

    function find_all_exemplaire():array{
        $exemplaires=[["id"=>1,"date_enregistrement"=>"01/01/2020","ouvrage_id"=>1],
                    ["id"=>2,"date_enregistrement"=>"01/01/2020","ouvrage_id"=>1],
                    ["id"=>3,"date_enregistrement"=>"20/05/2017","ouvrage_id"=>1], // les tables avec l'attribut etat sont deterioirer ou perdu
                    ["id"=>4,"date_enregistrement"=>"12/08/2020","ouvrage_id"=>2],
                    ["id"=>5,"date_enregistrement"=>"12/08/2020","ouvrage_id"=>2],
                    ["id"=>6,"date_enregistrement"=>"12/12/2017","ouvrage_id"=>3],
                    ["id"=>7,"date_enregistrement"=>"25/08/2016","ouvrage_id"=>4],
                    ["id"=>8,"date_enregistrement"=>"12/08/2014","ouvrage_id"=>4],
                    ["id"=>9,"date_enregistrement"=>"18/08/2014","ouvrage_id"=>5],
                    ["id"=>10,"date_enregistrement"=>"21/08/2017","ouvrage_id"=>6],
                    ["id"=>11,"date_enregistrement"=>"18/08/2017","etat"=>"perdu","ouvrage_id"=>6 ],
                    ["id"=>12,"date_enregistrement"=>"17/08/2014","ouvrage_id"=>7],
                    ["id"=>13,"date_enregistrement"=>"17/08/2014","ouvrage_id"=>7],
                    ["id"=>14,"date_enregistrement"=>"17/08/2014","ouvrage_id"=>7],
                    ["id"=>15,"date_enregistrement"=>"17/08/2014","ouvrage_id"=>8],
                    ["id"=>16,"date_enregistrement"=>"17/08/2014","ouvrage_id"=>8],
                    ["id"=>17,"date_enregistrement"=>"17/08/2014","ouvrage_id"=>9],
                    ["id"=>18,"date_enregistrement"=>"17/08/2014","ouvrage_id"=>9],
                    ["id"=>19,"date_enregistrement"=>"17/08/2014","ouvrage_id"=>10],
                    ["id"=>20,"date_enregistrement"=>"17/08/2014","etat"=>"deteriore","ouvrage_id"=>10],
        ];
        return $exemplaires;
    }
    
    function find_all_adherent():array{

        $adherent=[["id"=>1,"nom"=>"Traore","prenom"=>"Kamiya","sexe"=>"M","naissance"=>"12/09/2002"],
                  ["id"=>2,"nom"=>"Sissoko","prenom"=>"Saba","sexe"=>"F","naissance"=>"14/08/2003"],
                  ["id"=>3,"nom"=>"Hamit","prenom"=>"Ahmat","sexe"=>"M","naissance"=>"23/09/2002"],
                  ["id"=>4,"nom"=>"Keita","prenom"=>"Hawa","sexe"=>"F","naissance"=>"20/09/2004"],
                  ["id"=>5,"nom"=>"Ndeye","prenom"=>"Binta","sexe"=>"F","naissance"=>"20/09/2003"],
                  ["id"=>6,"nom"=>"Barkiré","prenom"=>"Ramatoulaye","sexe"=>"F","naissance"=>"2/2/2003"]
                    ];

        return $adherent; 
    }

    //une demande de pret sans clé statut est en attente
    //une demande de prêt avec une clé date_emprunt est un emprunt

    //emprunt en cours = emprunt accepter avec une date_pret,
    //emprunt retourner= emprunt en cours avec une date_r_reel,
    
    function find_all_demande_de_pret():array{
            $demande_de_pret=[["id"=>1,"adherent_id"=>1,"exemplaire_id"=>1,"statut"=>"accepter"],//accepter mais pas encore passer a la bibliotheque
                              ["id"=>2,"adherent_id"=>5,"exemplaire_id"=>5,"statut"=>"accepter","date_emprunt"=>"25/11/2022","date_r_prevue"=>"9/12/2022",],//accepter et passer a la bibliotheque
                              ["id"=>3,"adherent_id"=>3,"exemplaire_id"=>4],//en attente
                              ["id"=>4,"adherent_id"=>4,"exemplaire_id"=>3,"statut"=>"rejeter"],//rejeter
                              ["id"=>5,"adherent_id"=>2,"exemplaire_id"=>5,"statut"=>"accepter","date_emprunt"=>"20/11/2022","date_r_prevue"=>"4/12/2022"],//accepter et passer en bibliotheque
                              ["id"=>6,"adherent_id"=>6,"exemplaire_id"=>8,"statut"=>"accepter","date_emprunt"=>"20/11/2022","date_r_prevue"=>"4/12/2022","date_r_reel"=>"4/12/2022"],//livre retoruner 
                            ];      

            return $demande_de_pret;
    }
    //A defaut de ne pas creer une  table emprunt qui ne contient que des redondances de la table demande_de_prêt, on utilisera la table demande_de_prêt qui passe au statut emprunt sous certaines condition
    //une demande de prêt termine son execution et devient  un emprunt si elle a un clé,valeur: statut,accepeter et a une clé date_d'emprunt;
    //c'est a dire que si l'on veut plus d'informations sur l'etat de  l'emprunt ( "en cours ou retourner ") on cherche une demande de prêt avec un attribut statut="acceper" and l'existence de l'attribut date_emprunt;
    ///un exemplaire est actuellement en état de prêt que si la table emprunt associé a cette exemplaire n'a pas de  clé date_r_reel


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


    // archiver une fonction consiste à la supprimer de la table exemplaire et de l'ajouter dans la table archiver
?>