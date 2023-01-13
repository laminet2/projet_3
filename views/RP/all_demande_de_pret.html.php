<main>
        <table class="style2">
                <thead>
                        <tr>
                            <th>ID ADHERANT</th>
                            <th>NOM ADHERENT</th>
                            <th >OUVRAGE DEMANDE</th>
                            <th class="cell2" colspan="2" >ACTION</th>
                        </tr>
                </thead>
                <tbody>
                    <?php foreach($demandes as $demande): ?>

                        <tr>
                            <td><?= $demande["adherent_id"]?></td>
                            <td><?= $demande["adherent_name"]?> </td>
                            <td><?= $demande["ouvrage_titre"]?></td>
                            <td class="cell2">
                                    <form action="index.php" method="post">
                                            <input type="hidden" name="statut" value="accepter">
                                            <input type="hidden" name="demande_de_pret_id" value="<?= $demande['id'] ?>">
                                            <button type="submit" name="btnsave" value="accepter_refuser_demande_de_pret">
                                                ACCEPTER
                                            </button>
                                    </form>
                            </td>
                            <td class="cell2"><form action="index.php" method="post"><input type="hidden" name="statut" value="refuser"><input type="hidden" name="demande_de_pret_id" value="<?= $demande["id"] ?>"><button type="submit" name="btnsave" value="accepter_refuser_demande_de_pret">REFUSER</button></form></td>

                        </tr>
                    <?php endforeach ?>

                </tbody>
        </table>
       
</main>