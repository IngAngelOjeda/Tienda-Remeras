<h1>Registrarse</h1>

<form action="index.php?controller=usuario&action=save" method="POST">
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