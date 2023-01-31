<h1>Gestion de Productos</h1>

<a href="<?=base_url?>producto/crear" class="button button-small">

    Crear Producto

</a>

<!-- AGREGAR UN PRODUCTO -->
<?php  if(isset($_SESSION['producto']) && $_SESSION['producto'] == 'complete'): ?>

    <strong class="alert_green">EL producto se creo correctamente</strong>

<?php elseif(isset($_SESSION['producto']) && $_SESSION['producto'] == 'failed'): ?>

    <strong class="alert_red">Error al cargar producto</strong>

<?php endif ?>

<?php Utils::deleteSession('producto'); ?>
<!-- FIN AGREGAR PRODUCTO -->

<!-- BORRAR PRODUCTO -->
<?php  if(isset($_SESSION['delete']) && $_SESSION['delete'] == 'complete'): ?>

<strong class="alert_green">EL producto eliminado correctamente</strong>

<?php elseif(isset($_SESSION['delete']) && $_SESSION['delete'] == 'failed'): ?>

<strong class="alert_red">Error al borrar producto</strong>

<?php endif ?>

<?php Utils::deleteSession('delete'); ?>
<!-- FIN BORRAR PRODUCTO -->

<table border="1">

<tr>

    </th>ID<th>

    </th>Nombre<th>

    </th>Precio<th>

    </th>Stock<th>

    </th>Acciones<th>

</tr>
    
    <?php while($pro = $productos->fetch_object()):  ?>
        <tr>

            <td>

                <?=$pro->id_producto ?>

            </td>

            <td>

                <?=$pro->nombre ?>

            </td>

            <td>

                <?=$pro->precio ?>

            </td>

            <td>

                <?=$pro->stock ?>

            </td>

            <td>

                <a href="<?base_url?>producto/editar&id_producto=<?=$pro->id_producto?>" class="button button-gestion">Editar</a>
                <a href="<?base_url?>producto/eliminar&id_producto=<?=$pro->id_producto?>" class="button button-red">Eliminar</a>

            </td>

        </tr>
    
    <?php endwhile; ?>

</table>