<main>
        <table class="style2">
                <thead>
                    <tr>
                        <th class="cell1"></th>
                        <th class="cell2">EXEMPLAIRE ID</th>
                        <th class="cell3">DATE D'ENREGISTREMENT</th>
                        <th class="cell4"></th>
                    </tr>      
                </thead>
                <tbody>
                    <?php foreach($exemplaires as $exemplaire): ?>
                        <tr>
                            <td class="cell1"></td>
                            <td class="cell2"><?=$exemplaire["id"]?></td>
                            <td class="cell3"><?=$exemplaire["date_enregistrement"]?></td>
                            <td class="cell4"><form action="index.php?id=<?=$exemplaire["id"]?>" method="post"><button type="submit" name="btnsave" value="archiver">ARCHIVER</button></form></td>  
                        </tr>
                    <?php endforeach ?>
                </tbody>
        </table>
</main>