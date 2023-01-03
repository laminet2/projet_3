<main class="demande_de_pret">
    <section class="button">
        <div class="actif">
            <a href="index.php?view=demande_de_pret">
                <button >
                    Demande de pret  
                </button>
            </a>
        </div>
          <div>
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
                    <option value="accepter">ACCEPTER</option>
                    <option value="EN ATTENTE">EN ATTENTE</option>
                    <option value="rejeter">REJETER</option>
                </select>
            </div>
            <div>
                <button type="submit" name="btnsave" value="filter_demande_de_pret">SEARCH</button>
            </div>
        </form>
    </section>
    <section>
                <table class="style1">
                    <thead>
                            <tr>
                                <td class="cover">COVER</td>
                                <td class="cell1">TITRE</td>
                                <td class="cell2">AUTEURS</td>
                                <td class="cell3">STATUT</td>
                            </tr>
                    </thead>
                    <tbody>
                            <?php foreach($demandes as $demande): ?>
                                <tr>
                                        <td class="cover"><img src=<?=$demande["ouvrage"]["cover"]?>></td>
                                        <td class="cell1"><?=$demande["ouvrage"]["titre"]?></td>
                                        <td class="cell2"><?=implode(",",$demande["ouvrage"]["auteurs"])?></td>
                                        <td class="cell3"><?=$demande["statut"]?></td>
                                </tr>
                            <?php endforeach ?>
                    </tbody>
                </table>
    </section>
</main>