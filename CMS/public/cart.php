<?php require_once("../resources/config.php"); ?>

<?php include(VIEW_FRONT . DS . "head.php"); ?>
    
    <?php include(VIEW_FRONT . DS . "nav.php"); ?>

    <section class="cart">
        <div class="cart__container">
            <?php mostrar_msj(); ?>
            <table class="cart__container__table">
                <thead>
                <h2 class="contenedor2">Mis Compras<i class="fa-solid fa-cart-shopping"></i></h2>
                    <tr>
                        <th></th>
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
            <?php 
                carritoRestar();
                carritoAumentar();
                carritoBorrar();
            ?>
            
        </div>
    </section>

    <?php include(VIEW_FRONT . DS . "footer.php"); ?>