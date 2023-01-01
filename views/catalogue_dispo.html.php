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
                     OUVRAGE <br> DISPONIBLE
                </button>
                <button>
                    PRÊT
                </button>
        </section>
        <section class="search"></section>
        <section class="catalogue">
            <table >
                <thead>
                    <tr >
                        <th class="cover">COVER</th>
                        <th class="titre">TITRE</th>
                        <th class="auteurs">AUTEURS</th>
                        <th class="date_dedition">DATE D'EDITION</th>
                        <th class="rayon">RAYON</th>
                    </tr>
                </thead>
                <tbody>
                        <?php foreach($catalogues as $catalogue):?>
                            <tr>
                                <td class="cover"><img src=<?= $catalogue["cover"]?> alt="cover"></td>
                                <td class="titre"><?= $catalogue["titre"] ?></td>
                                <td class="auteurs"><?= implode(" ",$catalogue["auteurs"])  ?></td>
                                <td class="date_dedition"><?= $catalogue["date_edition"] ?></td>
                                <td class="rayon"><?= $catalogue["rayon"] ?></td>
                            </tr>
                            
                        <?php endforeach ?>
                </tbody>
            </table>
        </section>
</main>