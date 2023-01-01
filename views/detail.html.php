<main class="description">
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
        <section class="bottom">    
                <section class="cover">
                    <img src=<?= $catalogue["cover"] ?> alt="cover">
                </section>
                <section class="description">
                    <table class="detail">
                            <tr>
                                <th>Titre</th>
                                <td><?= $catalogue["titre"] ?></td>
                            </tr>
                            <tr>
                                <th>Auteurs</th>
                                <td><?= implode(" ",$catalogue["auteurs"])?></td>
                            </tr>
                            <tr>
                                <th>Date d'edition</th>
                                <td><?= $catalogue["date_edition"] ?></td>
                            </tr>
                            <tr>
                                <th>RAYON</th>
                                <td><?= $catalogue["rayon"] ?></td>
                            </tr>
                            <tr>
                                <th>MOT CLE</th>
                                <td><?=implode(" ,",$catalogue["mot_cle"] ) ?></td>
                            </tr>
                    </table>
                    <div class="button">
                        <button ><a href="index.php?view=catalogue_dispo">Annuler</a></button>
                        <button class="submit"><a href="index.php?btnsave=demande_de_pret&ouvrages=$id"></a><i class="fas fa-paper-plane"></i></button>
                    </div>
                </section>
        </section>
        
</main>