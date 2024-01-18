<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $td = $_POST['txtTD'];
    $id = $_POST['txtDoc'];
    $nom = $_POST['txtNombres'];
    $ape = $_POST['txtApellidos'];
    $tel = $_POST['txtTelefono'];
    $dir = $_POST['txtDir'];
    $fech = $_POST['txtFecha'];
    $hora = $_POST['txtHora'];
    $mot = $_POST['txtMotivo'];

    require_once('conexion.php');

    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = 'UPDATE personas SET td = :td, identificacion = :id, nombre = :nom, apellido = :ape, telefono = :tel, direccion = :dir, fecha_ing = :fech, hora_ing = :hora, motivo = :mot WHERE identificacion = :ident';

    $stmt = $conexion->prepare($sql);
    $stmt->bindParam(':td', $td);
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':ape', $ape);
    $stmt->bindParam(':tel', $tel);
    $stmt->bindParam(':dir', $dir);
    $stmt->bindParam(':fech', $fech);
    $stmt->bindParam(':hora', $hora);
    $stmt->bindParam(':mot', $mot);
    $stmt->bindParam(':ident', $id);

    if ($stmt->execute()) {
        echo "Datos actualizados correctamente";
    } else {
        echo "Error al actualizar los datos. Por favor, verifique la conexión a la base de datos y los datos ingresados.";
    }
} else {
    echo "Error: No se ha enviado el formulario.";
}
?>