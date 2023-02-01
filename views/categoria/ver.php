<?php if(isset($categoria)):  ?>

    <h1>$categoria->nombre</h1>

    <?php  if($productos->num_rows == 0): ?>

        <p>No hay productos para mostrar</p>

    <?php else:  ?>
        
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

            <a href="">Comprar</a>

        </div>

        <? endwhile; ?>

    <?php endif; ?>

<?php else: ?>

    <h1>La Categoria No Existe</h1>

<?php  endif; ?>