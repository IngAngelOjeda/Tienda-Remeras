<?php if(isset($pro)):  ?>

    <h1>$pro->nombre</h1>

    <div class="detail_product">
        
        <div class="image">

            <?php if($pro->imagen !=null ): ?>
        
                <img src="<?=base_url?>uploads/images/<?=$pro->imagen?>" alt="imagen" />
        
            <?php else:  ?>
        
                <img src="<?=base_url?>assets/img/ola.png"/>
        
            <?php endif; ?>

        </div>

        <div class="data">
            
            <p class="description"><?=$pro->descripcion ?></p>
        
            <p class="price"><?=$pro->precio ?>$</p>
        
            <a href="<?=base_url?>carrito/add&id_producto=<?=$pro->id_producto ?>">Comprar</a>

        </div>

    </div>

<?php  else: ?>

    <p>No hay productos para mostrar</p>

<?php endif; ?>

