<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"> 
    <title>Proyecto SENA | Eliminar Personas</title> 
</head> 
<body> 
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary"> 
        <a class="navbar-brand" href="index.php">Proyecto SENA </a> 
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> 
            <span class="navbar-toggler-icon"></span> </button> 
            <div class="collapse navbar-collapse" id="navbarSupportedContent"> 
            <ul class="navbar-nav mr-auto"> 
                <li class="nav-item"> <a class="nav-link" href="registrar.php">Registrar <span class="sr-only">(current)</span></a> 
            </li> 
                <li class="nav-item"> <a class="nav-link" href="consultar.php">Consultar <span class="sr-only">(current)</span></a> 
            </li> 
            <li class="nav-item"> <a class="nav-link" href="eliminar.php">Eliminar <span class="sr-only">(current)</span></a> 
        </li> 
            <li class="nav-item"> <a class="nav-link" href="actualizar.php">Actualizar <span class="sr-only">(current)</span></a> 
        </li> 
    </ul> 
</div> 
</nav> 

<div class="container">
    <div class="container-sm" style="margin-top:1%">
        <div class="alert alert-danger" role="alert">
            <b>Aviso:</b> La persona sera eliminada permanentemente </div>
        <form action="eliminar.php" method="POST">
            <div class="form-group">
                <label for="txtTD">Tipo Documento</label>
                <select name="txtTD" class="form-control">
                    <option value="CC">Cedula de ciudadania</option>
                    <option value="TI">Tarjeta de Identidad</option>
                    <option value="CE">Cedula de Extranjeria</option>
                </select>
            </div>
            <div class="form-group">
                <label for="txtID">Ingrese una Identificacion</label>
                <input type="text" class="form-control" name="txtID" placeholder="Identificacion" required>
            </div>
            <input type="submit" class="btn btn-danger" value="Eliminar">
        </form>
        <?php
        if ($_POST) {
            $td = $_POST['txtTD'];
            $id = $_POST['txtID'];
            require_once('conexion.php');
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $SQL = 'DELETE FROM personas WHERE td=:td AND identificacion=:id';
            $stmt = $conexion->prepare($SQL);
            $stmt->bindParam('td', $td);
            $stmt->bindParam('id', $id);
            $stmt->execute();
            echo "Registro eliminado exitosamente.";
        }
        ?>
    </div>
</div>
</body>
</html>