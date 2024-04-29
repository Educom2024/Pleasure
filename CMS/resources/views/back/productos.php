 <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Productos</h1>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card shadow mb-3">
            <div class="card-body">
                <a href="index.php?productos_add" class="btn btn-primary">
                <i class="fas fa-plus"></i> Agregar productos</a>
            </div>
        </div>
        <div class="card shadow">
            <div class="card-header">
                <h6 class="text-primary">Lista de Productos</h6>
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Imagen</th>
                            <th>Descripción</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php get_productos();?>
                        <!-- <tr>
                            <td>Mantequilla</td>
                            <td>
                                <img src="../img/chocomani.png" alt="Mantequilla Chocomani" width="200px">
                            </td>
                            <td>Mantequilla de mani</td>
                            <td>S/ 40.00</td>
                            <td>100</td>
                            <td>
                                <a href="#" class="btn btn-warning">editar</a>
                                <a href="#" class="btn btn-danger">borrar</a>
                            </td>
                        </tr> -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>