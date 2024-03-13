<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catalogo de Productos</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>

<h1>Catalogo Productos - Registro</h1>
<form method="post" action="submit_catalogo_productos.php">
    ID: <input type="text" name="id"><br><br>
    Nombre: <input type="text" name="nombre"><br><br>
    Descripcion: <input type="text" name="descripcion"><br><br>
    Estante: <input type="text" name="estante"><br><br>
    ID_Categoria: <input type="text" name="id_categoria"><br><br>
    <input type="submit" value="Submit"><br><br>
</form>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>Estante</th>
            <th>ID_Categoria</th>
        </tr>
    </thead>
    <tbody>
  
    </tbody>
</table>

</body>
</html>
