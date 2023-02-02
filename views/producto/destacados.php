<h1>Algunos de Nuestros Productos</h1>


<?php while($productos = $productos->fetch_object()):  ?>

<div class="product">

    <a href="<?=base_url?>producto/ver&id_producto=<?=$productos->id_producto?>">

        <?php if($productos->imagen !=null ): ?>

            <img src="<?=base_url?>uploads/images/<?=$productos->imagen?>" alt="imagen" />

        <?php else:  ?>

            <img src="<?=base_url?>assets/img/ola.png"/>

        <?php endif; ?>

        <h2><?=$productos->nombre ?></h2>

        <p><?=$productos->precio ?></p>

    </a>

    <a href="<?=base_url?>carrito/add&id_producto=<?=$pro->id_producto ?>">Comprar</a>

</div>

<? endwhile; ?>