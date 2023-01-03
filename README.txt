/* COMPREHENSION GENERAL */

    //Utilisation du JSON
    Je passe au fichier JSON par soucis au niveau de la fonction Ajout d'exemplaire , 
    Incapacite d'ajouter reelement dans une tables par les methode posterieur ,
    en effe la tables disparait automatiquement apres l'envoie d'une requete si 
    l'on tente de l'inserer dans une variable , par_contre si on la passe dans le tableau
    Global $_SESSION , elle disparaitra apres deconnexion et il sera impossible de la rajouter 
    au autres donnée de sa table correspondante.

    --> CREATION D'UN MODEL STRUCURE comme suit :  
            - fichier PHP : qui contient des functions et qui enregistre les modifications dans le fichier json 
            - fichier json : qui constitura ma base de donnée


/*  COMPREHENSION  MODEL */
OUVRRAGES
//on affiche pas l'exemplaire mais l'ouvrage,
//un ouvrage est disponible s' il a au moins un exemplaire qui n'est pas en prêt ou détérioré

EXEMPLAIRE
//les exemplaire sans l'attribut etat sont considerer comme neuf

DEMANDE DE PRET
//une demande de pret sans clé statut est en attente
//une demande de prêt avec une clé date_emprunt est un emprunt
//A defaut de ne pas creer une  table emprunt qui ne contient que des redondances de la table demande_de_prêt, on utilisera la table demande_de_prêt qui passe au statut emprunt sous certaines condition
//une demande de prêt termine son execution et devient  un emprunt si elle a un clé,valeur: statut,accepeter et a une clé date_d'emprunt;
//c'est a dire que si l'on veut plus d'informations sur l'etat de  l'emprunt ( "en cours ou retourner ") on cherche une demande de prêt avec un attribut statut="acceper" and l'existence de l'attribut date_emprunt;
//un exemplaire est actuellement en état de prêt que si la table emprunt associé a cette exemplaire n'a pas de clé date_r_reel


EMPRUNT
//emprunt en cours = emprunt accepter avec une date_pret,
//emprunt retourner= emprunt en cours avec une date_r_reel,

ARCHIVER
// archiver une fonction consiste à la supprimer de la table exemplaire et de l'ajouter dans la table archiver

USER 
//Afin d'eviter la creation de nouvelle tables en fonctions de l'acteur qui interagie avec le systeme
//j'ai decider de supprimer la table adherent 
//je cree une table user qui contiendra les differents acteurs du systeme
//ces personnes seront differencier par la clé rôle qui est par défaut sur adherent
//Personne na la possibiliter de creer un compte aux rôle diffenrent de adherent il faut une manipulations direct du fichier JSON pour cela




