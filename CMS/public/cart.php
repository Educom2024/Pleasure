<?php require_once("../resources/config.php"); ?>

<?php include(VIEW_FRONT . DS . "head.php"); ?>
    
    <?php include(VIEW_FRONT . DS . "nav.php"); ?>

    <section class="cart">
        <div class="cart__container contenedor">
            <?php mostrar_msj(); ?>
            <table class="cart__container__table">
                <thead>
                    <tr>
                        <th>Imagen</th>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Sub Total</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php get_mostrarItemsCarrito(); ?>
                </tbody>
            </table>
           

        </div>
    </section>

    <?php include(VIEW_FRONT . DS . "footer.php"); ?>