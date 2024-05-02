<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Agregar Productos</h1>
</div>
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow">
           <div class="card-body">
            <?php 
                mostrar_msj();
                $fila = get_productoEdit();
                $errores = post_productoEdit($fila['prod_id'], $fila['prod_img']);
            ?>
                <form method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="prod_nombre">Nombre:</label>
                        <input type="text" class="form-control" id="prod_nombre" name="prod_nombre" value="<?php echo $fila['prod_nombre']; ?>">
                        <div class="text-danger">
                            <?php echo !empty($errores['nombre']) ? $errores['nombre'] : ""; ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="prod_descri">Descripcion</label>
                        <textarea name="prod_descri" id="prod_descri" cols="30" rows="3" class="form-control"><?php echo $fila['prod_descri']; ?>
                        </textarea>
                        <div class="text-danger">
                            <?php echo !empty($errores['descri']) ? $errores['descri'] : ""; ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="prod_precio">Precio:</label>
                        <input type="number" class="form-control" id="prod_precio" name="prod_precio" step="any" value="<?php echo $fila['prod_precio']; ?>">
                        <div class="text-danger">
                            <?php echo !empty($errores['precio']) ? $errores['precio'] : ""; ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="prod_canti">Cantidad:</label>
                        <input type="number" class="form-control" id="prod_canti" name="prod_canti" value="<?php echo $fila['prod_canti']; ?>">
                        <div class="text-danger">
                            <?php echo !empty($errores['canti']) ? $errores['canti'] : ""; ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="prod_img">Imagen:</label>
                        <br>
                        <img src="../img/<?php echo $fila['prod_img']; ?>" alt="<?php echo $fila['prod_nombre']; ?>" width="150">
                        <input type="file" class="form-control" id="prod_img" name="prod_img">
                        <div class="text-danger">
                            <!-- El nombre del producto no debe estar vacio -->
                        </div>
                    </div>
                    <input type="submit" value="Editar" name="editar" class="btn btn-success">
                </form>
           </div>     
        </div>
    </div>
</div>
