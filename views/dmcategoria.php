<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Categoria</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>

<h1>Registro de Categoria </h1>
<form method="post" action="categoria.php">
    ID: <input type="text" name="id"><br><br>
    Nombre: <input type="text" name="nombre"><br><br>
    Descripcion: <input type="text" name="descripcion"><br>
    <input type="submit" value="Agregar"><br><br>
</form>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Descripcion</th>
        </tr>
    </thead>
    <tbody>
  
    </tbody>
</table>

</body>
</html>