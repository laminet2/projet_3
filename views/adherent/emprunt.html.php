<main>
<section class="button1">
        <div >
            <a href="index.php?view=demande_de_pret">
                <button >
                    Demande de pret  
                </button>
            </a>
        </div>
          <div class="actif">
                <a href="index.php?view=emprunt">
                    <button>
                        EMPRUNT 
                    </button>
                </a>
          </div>
</section>
    <section>
        <form action="index.php" method="post" class="search2">
            <div>
                <select name="value" id="">
                    <option value="" disabled selected> FILTRER LES RESULTAT PAR ...</option>
                    <option value="en cours">EN COURS</option>
                    <option value="retourner">RETOURNER</option>
                </select>
            </div>
            <div>
                <button type="submit" name="btnsave" value="filter_emprunt_etat">SEARCH</button>
            </div>
        </form>
    </section>
    <section>
                <table class="style1">
                    <thead>
                            <tr>
                                <th class="cell1">TITRE</th>
                                <th class="cell2">DATE EMPRUNT</th>
                                <th class="cell2">DATE RETOUR PREVU</th>
                                <th class="cell2">DATE RETOUR REEL</th>
                            </tr>
                    </thead>
                    <tbody>
                        <?php foreach($emprunts as $emprunt): ?>
                            <tr>
                                <td class="cell1"><?=$emprunt["ouvrage"]["titre"] ?></td>
                                <td class="cell2"><?=$emprunt["date_emprunt"] ?></td>
                                <td class="cell2"><?=$emprunt["date_r_prevue"] ?></td>
                                <td class="cell2"><?=$emprunt["date_r_reel"] ?></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
    </section>
</main>