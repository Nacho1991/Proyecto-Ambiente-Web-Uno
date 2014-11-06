<!DOCTYPE HTML>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Universidad Técnica Nacional</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="/var/www/html/ProyectoWebInaigter/public/CSS/bootstrap.css">
        <!-- Optional theme -->
        <link rel="stylesheet" href="/var/www/html/ProyectoWebInaigter/public/CSS/bootstrap.min.css">
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>

    </head>
    <form action="<?php echo base_url('user/insert') ?>" method="post" accept-charset="utf-8">
        <fieldset>
            <legend>Registrar usuario</legend>
            <label for="cedula">Cédula:</label>
            <input type="text" name="cedula" placeholder="Cédula"> <br/>
            <label for="role">Rol administrativo:</label>
            <input type="text" name="role" placeholder="Role"> <br/>
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" placeholder="Nombre y apellidos"> <br/>
            <label for="username">Nombre usuario:</label>
            <input type="text" name="nombreusuario" placeholder="Nombre de usuario"> <br/>
            <label for="contrasenna">Contraseña:</label>
            <input type="password" name="contrasenna" placeholder="Contraseña"> <br/>
            <input type="submit" value="Registrar">
        </fieldset>
    </form>	
    <form action="<?php echo base_url('user/delete') ?>" method="post" accept-charset="utf-8">
        <fieldset>
            <legend>Eliminar usuario</legend>
            <label for="cedula">Eliminar usuario:</label>
            <input type="text" name="cedula" size="40" placeholder="Cédula del usuario a eliminar">
            <input type="submit" value="Eliminar">
        </fieldset>
    </form>
    <form action="<?php echo base_url('user/actualizar') ?>" method="post" accept-charset="utf-8">
        <fieldset>
            <legend>Actualizar datos</legend>
            <label for="cedula">Cédula:</label>
            <input type="text" name="cedula" placeholder="Cédula"> <br/>
            <label for="role">Rol administrativo:</label>
            <input type="text" name="role" placeholder="Role"> <br/>
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" placeholder="Nombre y apellidos"> <br/>
            <label for="nombreusuario">Nombre usuario:</label>
            <input type="text" name="nombreusuario" placeholder="Nombre de usuario"> <br/>
            <label for="contrasenna">Contraseña:</label>
            <input type="password" name="contrasenna" placeholder="Contraseña"> <br/>
            <input type="submit" name="" value="Registrar">
        </fieldset>
    </form>	
</body>
</html>