<footer class="footer">
    <div class="footer__padre">
            <div class="footer__padre__hijo1">
                <div class="footer__padre__hijo1__hijo2">
                    <h3 class="footer__padre__hijo1__hijo2--text1">Contacto</h3>
                    <div class="footer__padre__hijo1__hijo2__box1">
                        <i class="fa-solid fa-phone"></i>
                        <h5 class="footer__padre__hijo1__hijo2__box1--text2"> +51 961 888 267</h5>
                    </div>
                    <div class="footer__padre__hijo1__hijo2__box1">
                        <i class="fa-regular fa-envelope"></i>
                        <h4 class="footer__padre__hijo1__hijo2__box1--text2">PlacerNatural@pleasure.com.pe</h4>
                    </div>
                </div>
                <div class="footer__padre__hijo1__hijo2__img">
                <img src="./img/logo2.png" alt="">
                </div>
                 <div class="footer__padre__hijo1__hijo2__img__registro">
                <?php 
                    if(!isset($_SESSION['user_rol'])){
                      ?>
                        <a href="login.php" class="footer__padre__hijo1__hijo2__img__registro--reg">Iniciar Sesión</a>
                        <a href="register.php" class="footer__padre__hijo1__hijo2__img__registro--reg1">Registrate!</a>
                    <?php } else {
                        ?>
                         <a href="perfil.php" class="footer__padre__hijo1__hijo2__img__registro--reg1">
                         <i class="fa-solid fa-user"></i>Hola! <?php echo $_SESSION['user_nombres']; ?>
                         </a>
                    <?php }
                ?>
                </div>
            </div>
            <div class="footer__padre__hijo1__hijo2__img__registro__whts contenedor2">
                <i class="fa-brands fa-whatsapp"></i>
            </div>
            <div class="footer__padre__hijo1__hijo2__hijo3">
                <i class="fa-brands fa-whatsapp"></i>
                <i class="fa-brands fa-facebook"></i> 
                <i class="fa-brands fa-instagram"></i>
                <i class="fa-brands fa-twitter"></i>
            </div>
    </div>
    <div>
        <h5 class="footer__padre__hijo1__hijo2__hijo3--text4">Copyright 2024 @pleasure. Todos los derechos reservados.</h5>
    </div>
</footer>
<script src="./js/codigo.js"></script>
</body>
</html>