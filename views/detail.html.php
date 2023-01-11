<main class="description">
        <section class="proverbe">
            <h1>
                "SI LA TERMITIERE VIT <br> QUELLE AJOUTE DE LA TERRE A LA TERRE"
            </h1>
            <h6>
                Norbert Zongo
            </h6>
        </section>
        <section class="button1">
                <div class="actif">
                    <a href="index.php?view=catalogue_dispo">
                        <button class="actif">OUVRAGE <br> DISPONIBLE</button>
                    </a> 
                </div>
                <div>
                    <a href="index.php?view=demande_de_pret">
                        <button>PRÊT</button>
                    </a> 
                </div>
                
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
                        <a href="index.php?view=catalogue_dispo"><button >Annuler</button></a>
                        <form action="index.php?"  method="post" ><input type="hidden" name="id" value=<?=$catalogue["id"]?>><a><button type="submit" name="btnsave" value="add_demande_de_pret"><i class="fas fa-paper-plane"></i></button></a></form>
                    </div>
                </section>
        </section>
        
</main>