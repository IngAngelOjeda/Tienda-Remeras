<!-- Cuando la variable edit es true se cambiar el action del formulario -->

<?php  if(isset($edit) && isset($pro) && is_object($pro)):  ?>

    <h1>Editar Producto <?php $pro->nombre; ?></h1>

    <?php  $url_action = base_url.'producto/edit&id_producto='.$pro->id_producto;  ?>

<!-- Cuando la variable edit es false se cambiar el action del formulario -->

<?php else: ?>

    <h1>Crear Producto Nuevo</h1>

    <?php  $url_action = base_url.'producto/save';  ?>

<?php endif; ?>

<div class="form_container">

    <form action="<?$url_action?>" method="POST" enctype="multipart/form-data">
    
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" value="<?=isset($pro) && is_object($pro) ? $pro->nombre : "" ; ?>"/>
    
        <label for="descripcion">Descripcion</label>
        <textarea name="descripcion" required><?=isset($pro) && is_object($pro) ? $pro->descripcion : "" ; ?></textarea>
    
        <label for="precio">Precio</label>
        <input type="text" name="precio" required value="<?=isset($pro) && is_object($pro) ? $pro->precio : "" ; ?> "/>
    
        <label for="stock">Stock</label>
        <input type="number" name="stock" required value="<?=isset($pro) && is_object($pro) ? $pro->stock : "" ; ?>"/>>
    
        <label for="categoria">Categoria</label>

        <?php  $categorias = Utils::showCategorias(); ?>

        <select  name="categoria" >

            <?php while($cat = $categorias->fetch_object()): ?>

                <option value="<?=$cat->id_categoria?>" value="<?=isset($pro) && is_object($pro) && $cat->id_categoria == $pro->id_categoria ? 'selected' : "" ; ?>"/>>

                        <a href=""><?=$cat->nombre?></a>

                </option>

            <?php  endwhile; ?>

        </select>
    
        <label for="imagen">Imagen</label>

        <?php if(isset($pro) && is_object($pro) && !empty($pro->imagen)): ?>

            <img src="<?=base_url?>uploads/images/<?=$pro->imagen?>" class="thumb" alt="">
            
        <?php endif; ?>

        <input type="file" name="imagen">
    
        <input type="submit" value="Guardar">
    
    </form>

</div>