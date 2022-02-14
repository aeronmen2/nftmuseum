
<div class="box">
    <?php
    for ($i = 0; $i < count($listeoeuvres); $i++) { ?>
            <div class="card">
                <div class="photocard">
                <?php
                    echo "<a href='./?action=detailoeuvre&idoeuvre=".$listeoeuvres[$i]->getidoeuvre()."'/>";
                    echo "<img src='{$listeoeuvres[$i]->getimageoeuvre()}'/>";?>
                <?php $j=0; ?>
                </div>
                <?php while($listeoeuvres[$i]->getidmusee()!=$listemusees[$j]->getidmusee()){
                    $j++;
                }?>
                <?php $e=0; ?>
                <?php while($listeoeuvres[$i]->getidartiste()!=$listeartistes[$e]->getIDArtiste()){
                    $e++;
                }?>
                <div class="descrCard">
                    <div class="type">
                        <?php   echo "<h1>".$listeoeuvres[$i]->getnomoeuvre()."</h1>";
                                echo "</a>";?>
                            <div class="type2">
                            <?php
                                    echo "<a href='./?action=detailartistes&idartiste=".$listeartistes[$e]->getIDArtiste()."'/>";
                                    echo "<h1>".$listeartistes[$e]->getNomArtiste()."</h1>";
                                    echo "</a>"; ?>
                            </div>

                            <div class="prix">
                            <?php echo "<h1>".$listeoeuvres[$i]->getprixdigital()."€</h1>";?>
                            <a href="./?action=acheter" class="btnbuy">Acheter</a>
                            </div>
                    </div>
            </div>
        </div>
<?php } ?>
</div>

