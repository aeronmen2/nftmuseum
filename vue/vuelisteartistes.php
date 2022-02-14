
<h1>Liste des artistes</h1>
<table style="width:100%"></table>
<tr>   
    <th>Nom Artiste</th>
    <th>Date de Naissance</th>
    <th>Age</th>
</tr>
<?php
for ($i = 0; $i < count($listeartistes); $i++) { ?>
<tr>
        <td> <?php echo "<p>".$listeartistes[$i]->getNomArtiste()."</p>";?> </td>
        <td> <?php echo "<p>".$listeartistes[$i]->getDateArtiste()."<p>";?> </td>
        <td> <?php echo "<p>".$listeartistes[$i]->getPaysArtiste()."</p>";?> </td>
</tr>
<?php } ?>
</table>


