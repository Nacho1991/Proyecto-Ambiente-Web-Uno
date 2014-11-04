//Creamos una funcion de click para el inicio de sesión
$("#btnIniciarSesion").bind("click", function()
{
    //Cargamos el vector con los datos de todos los usuarios registrados
    var vectorUsuariosLogin = JSON.parse(localStorage.getItem('Usuario'));
    //Validamos si el vector se encuentra vacio
    if (vectorUsuariosLogin === null)
    {
        //Le enviamos una alerta
        alert('No hay datos registrados en la base de datos');
    } 
    //En caso de contener datos
    else {
        //Creamos las variables necesarias para recoger los datos del formulario
        var $txtCedulaLogin = $('#txtCedulaLogin');
        var $txtContrasenna = $('#txtContrasennaLogin');
        //Creamos una variable para darnos cuenta si existe
        var existe;
        //Cargamos las variables con los datos y utilizamos Trim() para la eliminacion 
        //de los espacios vacios al principio y al final
        var strCedulaLogin = $.trim($txtCedulaLogin.val());
        var strContrasenna = $.trim($txtContrasenna.val());
        //Recorremos el vector cargado de datos de los usuarios
        for (var pos = 0; pos < vectorUsuariosLogin.length; pos++) {
            //Validamos si los datos ingresados en el formulario coinciden con los registros del LocalStorage
            if ((vectorUsuariosLogin[pos].cedulaUsuario === strCedulaLogin) && (vectorUsuariosLogin[pos].contrasennaUsuario === strContrasenna))
            {
                //En caso de coincidir cargamos la pagina en la misma pestaña
                $(location).attr('href', 'DashBoard.html');
                //Frenamos el ciclo para evitar todo el recorrido
                break;
            } 
            //En caso de no existir datos
            else
            {
                //Igualamos la variable en Cero
                existe = 0;
            }
        }
        //Validamos si la variable
        if (existe === 0) {
            //Le enviamos una alerta informandole de su inexistencia
            alert('No existe un usuario registrado con los datos ingresados');
        }
    }
    //Fin de la funcion
});