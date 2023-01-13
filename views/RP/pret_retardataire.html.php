<main>
        <table class="style2">
            <thead>
                <tr>
                    <th>ID ADHERENT</th>
                    <th>NOM ADHERENT</th>
                    <th>OUVRAGE EMPRUNTER</th>
                    <th>ID EXEMPLAIRE</th>
                    <th>DATE RETOUR PREVU</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($demandes as $demande): ?>
                    <tr>    
                        <td><?= $demande["adherent_id"] ?></td>
                        <td><?= $demande["adherent_name"] ?></td>
                        <td><?= $demande["ouvrage_titre"] ?></td>
                        <td><?= $demande["exemplaire_id"] ?></td>
                        <td><?= $demande["date_r_prevue"] ?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
</main>