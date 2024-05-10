<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Comentarios</h1>
</div>
<div class="row">
    <div class="col-md-12">
        <?php mostrar_msj(); ?>
        <div class="card shadow">
            <div class="card-header">
                <h6 class="text-primary">
                    Lista de comentarios por validar  
                </h6>
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Usuario</th>
                            <th>Producto</th>
                            <th>Mensaje</th>
                            <th>Puntaje</th>
                            <th>Fecha</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php get_comentarios(); ?>
                        <?php post_aprobarComentario(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>