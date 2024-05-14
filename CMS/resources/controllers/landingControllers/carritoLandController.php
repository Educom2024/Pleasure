<?php 
    function post_carritoAdd(){
        if(isset($_POST['carritoAdd'])){
            validarSesion();
            $prod_id = limpiar_string(trim($_POST['prod_id']));
            $prod_canti = limpiar_string(trim($_POST['prod_canti']));
            $query = query("SELECT * FROM carrito WHERE cart_user_id = {$_SESSION['user_id']} AND cart_prod_id = {$prod_id}");
            if(contar_filas($query) == 1){
                set_mensaje(display_msjLand("El producto ya se agrego al carrito", "danger"));
                return redirect("producto.php?id={$prod_id}");
            }
            query("INSERT INTO carrito (cart_user_id, cart_prod_id, cart_canti) VALUES ({$_SESSION['user_id']}, {$prod_id}, {$prod_canti})");
            set_mensaje(display_msjLand("Producto agregado correctamente al carrito", "success"));
            redirect("producto.php?id={$prod_id}");
        }
    }

    function get_mostrarItemsCarrito(){
        validarSesion();
        $query = query("SELECT * FROM carrito a INNER JOIN productos b ON a.cart_prod_id = b.prod_id WHERE a.cart_user_id= {$_SESSION['user_id']}");
        if(contar_filas($query) >= 1){
            $total =0;
            while($fila = fetch_assoc($query)){
                $sub_total = $fila['prod_precio'] * $fila['cart_canti'];
                $total += $sub_total;
                $item = <<<DELIMITADOR
                <tr>
                    <td>
                        <img src="img/{$fila['prod_img']}" alt="{$fila['prod_nombre']}">
                    </td>
                    <td>{$fila['prod_nombre']}</td>
                    <td>S/ {$fila['prod_precio']}</td>
                    <td>{$fila['cart_canti']}</td>
                    <td>S/ {$sub_total}</td>
                    <td>
                        <a href="" class="btn btn-warning"><i class="fa-solid fa-minus"></i></a>
                        <a href="" class="btn btn-success"><i class="fa-solid fa-plus"></i></a>
                        <a href="" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></a>
                    </td>
                </tr>
DELIMITADOR;
                echo $item;
            }
            $trTotal = <<<DELIMITADOR
                <tr>
                    <td colspan="3"></td>
                    <td style="padding: 10px 0; font-weight: 600; font-size:1.4rem;">Total:</td>
                    <td>S/ {$total}</td>
                </tr>
DELIMITADOR;
            echo $trTotal;
        }
    }

    function validarCarrito(){
        if(isset($_SESSION['user_id'])){
            $query = query("SELECT COUNT(a.cart_id) AS canti, SUM(b.prod_precio * a.cart_canti) AS total FROM carrito a INNER JOIN productos b ON a.cart_prod_id = b.prod_id WHERE a.cart_user_id = {$_SESSION['user_id']}");
            if(contar_filas($query) >= 1){
                return fetch_assoc($query);
            }
        }   else {
                return ["canti" => 0, "total" => 0];
        }
    }
?>