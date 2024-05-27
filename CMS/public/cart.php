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
                    <?php $validarItems = get_mostrarItemsCarrito(); ?>
                </tbody>
            </table>

            <div id="wallet_container"></div>
            <?php 
                carritoRestar();
                carritoAumentar();
                carritoBorrar();
            ?>
            
        </div>
    </section>

    <script src="https://sdk.mercadopago.com/js/v2"></script>

    <script>
        const mp = new MercadoPago('TEST-7008c1fa-67f1-44e5-b642-a8ba4886f50d');
        const bricksBuilder = mp.bricks();

        mp.bricks().create("wallet", "wallet_container", {
            initialization: {
                preferenceId: "<?php echo $validarItems[1]; ?>",
                redirectMode: "modal",
            },
        });
    </script>

    <?php include(VIEW_FRONT . DS . "footer.php"); ?>