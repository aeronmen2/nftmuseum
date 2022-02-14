<div class="box">
<h1>Résultats de la recherche :</h1>
<div class=center-div">
<?php 
for ($i = 0; $i < count($oeuvrebynom); $i++) { ?>
        <div class="card">
            <div class="photocard">
            <?php
                echo "<a href='./?action=detailoeuvre&idoeuvre=".$oeuvrebynom[$i]->getidoeuvre()."'/>";
                echo "<img src='{$oeuvrebynom[$i]->getimageoeuvre()}'/>";?>
            <?php $j=0; ?>
            </div>
            <?php echo "<h1>".$oeuvrebynom[$i]->getnomoeuvre()."</h1>";?>
            <?php echo "<h1>".$oeuvrebynom[$i]->getprixdigital()."€</h1>";?>
<?php } ?>
</div>
