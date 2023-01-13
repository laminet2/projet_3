<main>
            <table class="style2">
                    <thead>
                            <tr>
                                <th>ID ADHERENT</th>
                                <th>NOM ADHERENT</th>
                                <th >OUVRAGE DEMANDER</th>
                                <th >ID EXEMPLAIRE REMIS</th>
                                <th class="cell3">ACTION</th>
                            </tr>
                    </thead>
                    <tbody>
                        <?php foreach($demandes as $demande): ?>
                            <tr>
                                    <td ><?= $demande["adherent_id"] ?></td>
                                    <td><?= $demande["adherent_name"] ?></td>
                                    <td><?= $demande["ouvrage_titre"] ?></td>
                                    <td class="cell3" colspan="2">
                                        <form action="index.php" method="post" class="enregistrer">
                                            <input type="hidden" name="demande_id" value="<?=$demande["id"] ?>">
                                            
                                            <select name="exemplaire_id" id="" required>
                                                <?php foreach($demande["exemplaires"] as $exemplaire): ?>
                                                    <option value="<?php $x=$exemplaire["id"];echo($x) ?>"><?= $x ?></option>
                                                <?php endforeach ?>
                                            </select>

                                            <button type="submit" name="btnsave" value="enregistrer_demande">ENREGISTRER</button>
                                        </form>
                                    </td>
                            </tr>
                       <?php endforeach ?>

                    </tbody>
            </table>
</main>