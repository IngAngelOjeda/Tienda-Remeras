<!-- barra lateral -->
<aside id="lateral">

    <div id="login" class="block_aside">
        <?php  if(!isset($_SESSION['identity'])):  ?>

        <h3>Entrar a la Web</h3>

        <form action="<?base_url?>usuario/login" method="POST">

            <label for="email">Email</label>
            <input type="email"name="email">

            <label for="password">Contrasena</label>
            <input type="password" name="password">

            <input type="submit" value="Enviar">

        </form>

        <?php else: ?>
                <h3><?=$_SESSION['identity']->nombre ?> <?=$_SESSION['identity']->apellido ?></h3>
        <?php endif; ?>

        <ul>

            <li>
                
                <a href="#">Mis pedidos</a>

            </li>
            
            <!-- Si la session es administrador puede ver los enlases -->
            <?php if(isset($_SESSION['admin'])): ?>

            <li>

                <a href="<?=base_url?>categoria/index">Gestionar Categorias</a>

            </li>

            <li>

                <a href="<?=base_url?>producto/gestion">Gestionar Productos</a>

            </li>

            <li>

            <a href="#">Gestionar Pedidos</a>

            </li>

            <?php endif; ?>
            <!-- Fin enlases administrador -->
            
            <!-- Si el usuario esta logeado mostrada el boton de cerrar sesion -->

            <?php if(isset($_SESSION['identity'])) : ?>

            <li>

                <a href ="<?=base_url?>usuario/logout">Gestionar categorias</a>

            </li>

            <?php else: ?>

            <li>

                <a href ="<?=base_url?>usuario/registro">Registrate Aqui</a>

            </li>

            <?php endif; ?>

        </ul>

    </div>

</aside>

<!-- contenido central -->

<div id="central">