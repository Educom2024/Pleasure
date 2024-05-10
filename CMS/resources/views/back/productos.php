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
        <?php mostrar_msj(); ?>
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
                    </tbody>
                </table>
                <?php post_productoDelete(); ?>
            </div>
        </div>
    </div>
</div>