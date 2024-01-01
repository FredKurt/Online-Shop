<?php
?>

<div class="col mb-5">
    <div class="card h-100">
        <img src="<?=$product['image']?>" class="card-img-top" alt="...">
        <div class="card-body p-4">
            <div class="text-center">
                <!-- Product name -->
                <h5 class="card-title fw-bolder"><?=$product['name']?></h5>
                <!-- Product price -->
                <?=$product['price']?>
            </div> 
        </div> 
        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent"> 
            <div class="text-center">
                <a href="/product/<?=$product['id']?>" class="btn btn-outline-dark mt-auto">View product</a>
            </div>       
        </div>         
    </div>
</div>