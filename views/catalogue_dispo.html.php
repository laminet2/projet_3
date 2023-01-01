<main class="catalogue_dispo">
    
        <section class="proverbe">
            <h1>
                "SI LA TERMITIERE VIT <br> QUELLE AJOUTE DE LA TERRE A LA TERRE"
            </h1>
            <h6>
                Norbert Zongo
            </h6>
        </section>
        <section class="button">
                <button class="actif">
                    <a href="index.php?view=catalogue_dispo">OUVRAGE <br> DISPONIBLE</a> 
                </button>
                <button>
                   <a href="index.php?view=demande_de_pret">PRÊT</a> 
                </button>
        </section>
        <section class="search">
                <p>
                    RECHERCHE AVANCE
                </p>
            <form action="index.php" method="post">
                
                <div>
                     <input type="text" name="value" placeholder="TROUVER UN OUVRAGE ...">
                </div>
                <div>
                    <select name="filtre" id="">
                        <option value="" disabled selected>RECHERCHER PAR</option>
                        <option value="titre">TITRE</option>
                        <option value="rayon">RAYON</option>
                        <option value="auteurs">AUTEUR</option>
                        <option value="mot_cle">MOT CLE</option>
                    </select>
                </div>
                <div>
                    <button type="submit" name="btnsave" value=filter_catalogue_dispo><i class="fas fa-search fa-2x"></i></button>
                </div>

            </form>
        </section>
        <section class="catalogue">
            <table class="style1">
                <thead>
                    <tr>
                        <th class="cover">COVER</th>
                        <th class="titre">TITRE</th>
                        <th class="auteurs">AUTEURS</th>
                        <th class="date_dedition">DATE D'EDITION</th>
                        <th class="rayon">RAYON</th>
                    </tr>
                </thead>
                <tbody>
                        <?php foreach($catalogues as $catalogue): $id=$catalogue["id"]; ?>
                            
                                <tr>
                                    <td class="cover"><a href="index.php?view=detail&id=<?=$id?>">  <img src=<?= $catalogue["cover"]?> alt="cover">   </a></td>
                                    <td class="titre"><a href="index.php?view=detail&id=<?=$id?>">   <?= $catalogue["titre"] ?>  </a></td>
                                    <td class="auteurs"><a href="index.php?view=detail&id=<?=$id?>">  <?= implode(" ",$catalogue["auteurs"]) ?> </a></td>
                                    <td class="date_dedition"><a href="index.php?view=detail&id=<?=$id?>">  <?= $catalogue["date_edition"] ?>   </a></td>
                                    <td class="rayon"> <a href="index.php?view=detail&id=<?=$id?>"> <?= $catalogue["rayon"] ?> </a></td>
                                </tr>
                        <?php endforeach ?>
                </tbody>
            </table>
        </section>
</main>