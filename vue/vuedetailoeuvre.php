<div>
    <div class="wrapper">
            <div class="product-img">
            <?php echo "<img src='{$uneoeuvre->getimageoeuvre()}' width=630px />"?> 
            </div> 
            <div class="product-info">
                <div class="product-text">
            <?php echo "<h1>".$uneoeuvre->getnomoeuvre()."</h1>";?>
            <?php echo "<p>".$artisteoeuvre->getNomArtiste()."</p>";?>
            <?php echo "<p>".$museeoeuvre->getnommusee()."</p>";?> 
            <?php echo "<p>".$uneoeuvre->getprixdigital()."€</p>";?> 
            <div class="product-price-btn">
            <a href="./?action=acheter" class="btnbuy">Acheter</a>
                </div>
            </div>
</br></br>
            <form method="POST" action="./?action=nouveauavis">
            <textarea name="avis" class="input" placeholder="Avis"></textarea>  
            <input type="submit" class="button">
</br></br>   
</div>
    </div>
