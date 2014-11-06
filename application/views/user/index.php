<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title><?php $title ?></title>
    </head>
    <body>
        <div id="container">
            <h1>List of Users</h1>
            <div id="body">
                <table>
                    <thead>
                        <tr>
                            <th>Cédula</th>
                            <th>Nombre</th>
                            <th>Nombre de usuario</th>
                            <th>Contrasenna</th>
                            <th>Role administrativo</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($users as $key => $user) {
                            echo 
                        "<tr>
                                <td>{$user->cedula}</td>
                                    <td>{$user->nombre}</td>
				<td>{$user->nombre_usuario}</td>
				<td>{$user->contrasenna}</td>
                                    <td>{$user->role_fk}</td>
			</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>