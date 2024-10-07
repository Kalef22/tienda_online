<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <form action="" name="formulario" onsubmit="return validar()" method="post">
        Nombre: <input type="text" name="nombre">
        <div id="campoVacioNombre"></div>

        apellido:<input type="text" name="apellido">
        <div id="campoVacioApellido"></div>

        <input type="submit" name="enviar">
    </form>

    <script>
    function validar() {
        let x = document.forms["formulario"]["nombre"].value;
        let y = document.forms["formulario"]["apellido"].value;

        if (x == "") {
            document.getElementById("campoVacioNombre").innerHTML = "<h1>El campo no puede estar vacío!</h1>";
            return false
        }

        if (y == "") {
            document.getElementById("campoVacioApellido").innerHTML = "<h1>El campo no puede estar vacío!</h1>";
            return false;
        }

        //if ((x && y) != "") {
        //document.write("bienvenido " + x + " " + y);
        //}
    }
    </script>

</body>

</html>