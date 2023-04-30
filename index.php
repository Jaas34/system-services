<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de clientes y servicios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<body>
    <div class="container-lg">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Sistema de clientes y servicios</a>
            </div>
        </nav>
    </div>
    <div class="container-lg">
        <div class="d-grid gap-2 d-md-flex justify-content-md-end m-4">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#saveClientModal">
                Agregar Cliente
            </button>
        </div>
        <table class="table">
            <thead>
                <tr>
                <th scope="col">Compañia</th>
                <th scope="col">Tipo</th>
                <th scope="col">Plataforma</th>
                <th scope="col">Catálogo</th>
                <th scope="col">Contenido</th>
                <th scope="col">Otros</th>
                <th scope="col">Asesor</th>
                <th scope="col">Ejecutivo</th>
                <th scope="col">Acciones</th>
            </tr>
            </thead>
            <tbody id="clients-content-table"></tbody>
        </table>
        <!-- Modal store -->
        <?php include_once "views/clients/modal-store.php" ?>
        
        <!-- Modal delete -->
        <?php include_once "views/clients/modal-delete.php" ?>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="assets/js/clients.js"></script>
</body>
</html>