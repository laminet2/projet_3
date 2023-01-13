<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/commun.css">
    <link rel="stylesheet" href="public/css/table_style2.css">
    <link rel="stylesheet" href="public/css/rb.css">

    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Cormorant:ital,wght@0,300;0,500;1,300;1,400&family=Josefin+Sans:wght@100&family=Lato:ital,wght@1,700&family=Orbitron&family=PT+Serif:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/32fc1d3f07.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <?= $HeaderPrincipal ?>
    <header class="secondaire">
            <table class="lien">
                    <thead>
                            <tr>
                                    <th class="cell1">LISTER</th>
                                    <th class="cell2">AJOUTER</th>
                                    <th class="cell3">ARCHIVER</th>
                            </tr>
                    </thead>
                    <tbody>     
                                <tr>
                                        <td class="cell1 <?php if($view=='RB/lister_oeuvre_dispo'){echo(" actif");} ?>"><a href="index.php?view=lister">Lister les oeuvres disponibles</a></td>
                                        <td class="cell2 <?php if($view=='RB/'){echo(" actif");} ?>" ><a href="index.php?view=ajouter">Ajouter des ouvrages</a></td>
                                        <td class="cell3 <?php if($view=='RB/archiver_exemplaire'){echo(" actif");} ?>"><a href="index.php?view=archiver_exemplaire">Archiver des exemplaires</a></td>
                                </tr>
                                <tr>
                                        <td class="cell1 <?php if($view=='RB/'){echo(" actif");} ?>"><a href="index.php?view=lister">Lister les ouvrages</a></td>
                                        <td class="cell2 <?php if($view=='RB/'){echo(" actif");} ?>"><a href="index.php?view=ajouter">Ajouter des exemplaire</a></td>
                                        <td class="cell3 <?php if($view=='RB/'){echo(" actif");} ?>"></td>
                                </tr>
                                <tr>
                                        <td class="cell1 <?php if($view=='RB/'){echo(" actif");} ?>"><a href="index.php?view=lister">Lister les exemplaires</a></td>
                                        <td class="cell2 <?php if($view=='RB/'){echo(" actif");} ?>"><a href="index.php?view=ajouter">Ajouter des rayons</a></td>
                                        <td class="cell3 <?php if($view=='RB/'){echo(" actif");} ?>"></td>
                                </tr>
                                <tr>
                                        <td class="cell1 <?php if($view=='RB/'){echo(" actif");} ?>"><a href="index.php?view=lister">Lister les rayons</a></td>
                                        <td class="cell2 <?php if($view=='RB/'){echo(" actif");} ?>"><a href="index.php?view=ajouter">Ajouter des auterus</a></td>
                                        <td class="cell3 <?php if($view=='RB/'){echo(" actif");} ?>"></td>
                                </tr>
                                <tr>
                                        <td class="cell1"><a href="index.php?view=lister">Lister les auteurs</a></td>
                                        <td class="cell2"><a href="index.php?view=ajouter">Assigner un auteurs a un auvrages</a></td>
                                        <td class="cell3"></td>
                                </tr>
                                
                    </tbody>
            </table>
    </header>
    <?= $ContentView ?>
</body>
</html>