<nav class="nav">
        <div class="nav__menu">
            <a href="./">
            <img src="./img/Mesa de trabajo 6@LabelPleasure.png.tmp$$.png" alt=" "class="nav__menu--logo">
            </a>
            <div class="nav__menu__box">
                <ul class="nav__menu__box__caja">
                    <li class="nav__menu__box__caja__elements"><a href="./" class="nav__menu__box__caja__elements--link">
                        Nuestros Productos
                        <i class="fa-solid fa-angle-down"></i>
                    </a></li>
                    <li class="nav__menu__box__caja__elements"><a href="./" class="nav__menu__box__caja__elements--link">
                        Pleasure Market
                        <i class="fa-solid fa-angle-down"></i>
                    </a></li>
                    <li class="nav__menu__box__caja__elements"><a href="./" class="nav__menu__box__caja__elements--link">
                        Nosotros
                        <i class="fa-solid fa-angle-down"></i>
                    </a></li>
                    <li class="nav__menu__box__caja__elements"><a href="./" class="nav__menu__box__caja__elements--link">
                        Home
                        <i class="fa-solid fa-angle-down"></i>
                    </a></li>
                    <?php
                        if (isset($_SESSION['user_rol']) && $_SESSION['user_rol'] == 'admin'){
                            ?>
                                <li class="nav__menu__box__caja__elements"><a href="admin" class="nav__menu__box__caja__elements--link">
                                    ADMIN
                                    <i class="fa-solid fa-angle-down"></i>
                                </a></li>
                        <?php }
                    ?>
                </ul>
                    <a href="cart.php" class="nav__menu__box__cart">
                        <?php $fila = validarCarrito(); ?>
                        <div class="nav__menu__box__cart__shop">
                            <i class="fa-solid fa-cart-shopping"></i>
                        </div>
                        <div class="nav__menu__box__cart__shop">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </div>
                        <div class="nav__menu__box__cart__shop">
                        <i class="fa-solid fa-bars-staggered"></i>
                        <span><?php echo $fila['canti']; ?></span>
                        </div>
                    </a>
            </div>
        </div>
    </nav>