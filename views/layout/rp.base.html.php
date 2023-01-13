<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="public/css/commun.css">
    <link rel="stylesheet" href="public/css/table_style2.css">
    <link rel="stylesheet" href="public/css/button_style1.css">
    <link rel="stylesheet" href="public/css/rp.css">

    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Cormorant:ital,wght@0,300;0,500;1,300;1,400&family=Josefin+Sans:wght@100&family=Lato:ital,wght@1,700&family=Orbitron&family=PT+Serif:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/32fc1d3f07.js" crossorigin="anonymous"></script>
</head>
<body>
    <?= $HeaderPrincipal ?>
    <header class="secondaire">
        <section class="button1">
                <div <?php if ($view=="RP/all_demande_de_pret"){echo(" class= \"actif\" ");} ?> ><a href="index.php?view=all_demande_de_pret"  ><button>DEMANDE DE PRÊT</button></a></div>

                <div <?php if ($view=="RP/enregistrer_demande_de_pret"){echo(" class= \"actif\" ");} ?>><a href="index.php?view=enregistrer_demande_de_pret"  ><button>ENREGISTRER DEMANDE DE PRÊT</button></a></div>


                <div <?php if ($view=="RP/pret_retardataire"){echo(" class= \"actif\" ");} ?> ><a href="index.php?view=pret_retardataire" ><button>PRÊT RETARDATAIRE</button></a></div>

        </section>
    </header>
    <?= $ContentView ?>
</body>
</html>