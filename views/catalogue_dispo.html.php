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
                <div class="actif">
                    <a href="index.php?view=catalogue_dispo">
                        <button>
                            OUVRAGE <br> DISPONIBLE 
                        </button>
                    </a>
                </div>
                <div>
                    <a href="index.php?view=demande_de_pret">
                        <button>
                            PRÊT
                        </button>
                    </a>
                </div>
                
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
                        <th class="cell1">TITRE</th>
                        <th class="auteurs">AUTEURS</th>
                        <th class="cell3">DATE D'EDITION</th>
                        <th class="cell4">RAYON</th>
                    </tr>
                </thead>
                <tbody>
                        <?php foreach($catalogues as $catalogue): $id=$catalogue["id"]; ?>
                            
                                <tr>
                                    <td class="cover"><a href="index.php?view=detail&id=<?=$id?>">  <img src=<?= $catalogue["cover"]?> alt="cover">   </a></td>
                                    <td class="cell1"><a href="index.php?view=detail&id=<?=$id?>">  <?= $catalogue["titre"] ?>  </a></td>
                                    <td class="cell2"><a href="index.php?view=detail&id=<?=$id?>">  <?= implode(" ",$catalogue["auteurs"]) ?> </a></td>
                                    <td class="cell3"><a href="index.php?view=detail&id=<?=$id?>">  <?= $catalogue["date_edition"] ?>   </a></td>
                                    <td class="cell4"><a href="index.php?view=detail&id=<?=$id?>">  <?= $catalogue["rayon"] ?> </a></td>
                                </tr>
                        <?php endforeach ?>
                </tbody>
            </table>
        </section>
</main>