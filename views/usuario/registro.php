<h1>Registrarse</h1>

<?php if(isset($_SESSION['register']) && $_SESSION['register'] == 'complete' ) : ?>

    <strong class="alert_green">Registro Completado Correctamente!</strong>

<?php  elseif( isset($_SESSION['register']) && $_SESSION['register'] == 'failed' ):  ?>

    <strong class="alert_red">Registro Fallido, Introduce Bien los Datos</strong>

<?php endif; ?>

//funcion para borrar session
<?php Utils::deleteSession('register') ?>

<form action="<?base_url?>usuario/save" method="POST">

    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" required>

    <label for="apellido">Apellido</label>
    <input type="text" name="apellido" required>

    <label for="email">Email</label>
    <input type="email" name="email" required>

    <label for="password">Contrase;a</label>
    <input type="password" name="contrasena" required>

    <input type=submit" value="Registrarse">

</form>