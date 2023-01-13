<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <link rel="stylesheet" href="public/css/commun.css">
    <link rel="stylesheet" href="public/css/table_style1.css">
    <link rel="stylesheet" href="public/css/button_style1.css">
    <link rel="stylesheet" href="public/css/adherent.css">
    <?php if($_GET["view"]=="catalogue_dispo"||$_GET["view"]=="detail"): ?>
    <link rel="stylesheet" href="public/css/adherent-catalogue_dispo.css">
    <?php else: ?>
    <link rel="stylesheet" href="public/css/adherent-pret.css">
    <?php endif ?>
    
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Cormorant:ital,wght@0,300;0,500;1,300;1,400&family=Josefin+Sans:wght@100&family=Lato:ital,wght@1,700&family=Orbitron&family=PT+Serif:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/32fc1d3f07.js" crossorigin="anonymous"></script>
</head>
<body class="adherent">
        <?= $HeaderPrincipal ?>
        <?= $ContentView ?>
</body>
</html>