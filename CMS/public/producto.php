<?php require_once("../resources/config.php"); ?>

<?php include(VIEW_FRONT . DS . "head.php"); ?>
    
    <?php include(VIEW_FRONT . DS . "nav.php"); ?>

    <section class="producto">
        <div class="producto__container contenedor2">
            <?php $item = get_productoLand(); ?>
            <div class="producto__container__imgBox">
                <img src="img/<?php echo $item['prod_img']; ?>" alt="<?php echo $item['prod_nombre']; ?>">
            </div>
            <div class="producto__container__data">
                <h3 class="producto__container__data__titulo">
                    <?php echo $item['prod_nombre']; ?>
                </h3>
                <div class="producto__container__data_stars mt-2">
                    <i class="fa-regular fa-star star"></i>
                    <i class="fa-regular fa-star star"></i>
                    <i class="fa-regular fa-star star"></i>
                    <i class="fa-regular fa-star star"></i>
                    <i class="fa-regular fa-star star"></i>    
                </div>
                <div class="producto__container__data__precio mt-4">
                    s/40.00           
                </div>
                <div class="producto__container__data__descri mt-4">
                   Mantequilla de mani 100% natural
                </div>
                <form class="producto__container__data__form mt-5" method="post">
                    <input type="hidden" name="prod_id" value="1">
                    <label for="cantidad">Cantidad</label>
                    <input type="number" name="prod_canti" value="1" min="1" max="10">
                    <input type="submit" value="Agregar al carrito" name="carritoAdd">
                </form>
            </div>
        </div>
    </section>
    <section class="comentarios">
        <div class="comentarios__container contenedor2">
            <h2 class="comentarios__container__titulo">
                Comentarios
            </h2>
            <form class="comentarios__container__form mt-2" method="post">
                <div class="comentarios__container__form__group">
                    <textarea name="com_mensaje" cols="30" rows="3" placeholder="Deja tu comentario"></textarea>
                </div>
                <div class="comentarios__container__form__group">
                    <label for="puntaje">Puntaje</label>
                    <input type="number" name="com_puntaje" id="puntaje" min="0" max="5" value="1">
                </div>
                <div class="comentarios__container__form__group text-right">
                    <input type="submit" value="Enviar" name="comEnviar">
                </div>
            </form>
            <div class="comentarios__container__box">
            </div>
        </div>
    </section>
    <script type="module" src="js/comentarios.js"></script>
    <?php include(VIEW_FRONT . DS . "footer.php"); ?>