<?php
    function get_productosLand(){
        $query = query("SELECT * FROM productos");
        if(contar_filas($query) !=0){
            while($fila = fetch_assoc($query)){
                $producto = <<<DELIMITADOR
                <div class="tipos__contenedor__variedad1">
                    <img src="img/{$fila['prod_img']}" alt="{$fila['prod_nombre']}"/>
                    <h4 class="tipos__contenedor__variedad1--tex1">
                    {$fila['prod_nombre']}
                    </h4>
                    <span class="tipos__contenedor__variedad1--tex2">S/ {$fila['prod_precio']}
                    </span>
                    <a href="producto.php?id={$fila['prod_id']}" class="tipos__contenedor__variedad1--tex3">Comprar</a>
                </div>
DELIMITADOR;
                echo $producto; 
            }
        } else {
            echo <<<DELIMITADOR
            <div class="tipos__contenedor__variedad1"
                <h2>Aun no se igreso ningun producto</h2>
            </div>
DELIMITADOR;
        }
    }
    function get_productoLand(){
        if(!isset($_GET['id'])){
            redirect("./");
        } else{
            $id = limpiar_string(trim($_GET['id']));
            $query = query("SELECT a.prod_id, a.prod_nombre, a.prod_precio, a.prod_img, a.prod_descri, a.prod_canti, COUNT(a.prod_id) AS total_com, SUM(b.com_puntaje) AS total_puntaje FROM productos a LEFT JOIN comentarios b ON a.prod_id = b.com_prod_id WHERE prod_id = {$id}");
            if(contar_filas($query) == 0){
                redirect("./");
            } else{
                return fetch_assoc($query);
            }
        }
    }
?>