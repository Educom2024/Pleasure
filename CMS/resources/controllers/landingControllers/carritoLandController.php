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

    function carritoRestar(){
        if(isset($_GET['restar'])){
            $cart_id = limpiar_string(trim($_GET['restar']));
            $query = query("SELECT cart_canti FROM carrito WHERE cart_id = {$cart_id}");
            $fila = fetch_assoc($query);
            $cart_canti = $fila['cart_canti'];
            if($cart_canti > 1) {
                query("UPDATE carrito SET cart_canti = cart_canti - 1 WHERE cart_id = {$cart_id}");
            } else{
                set_mensaje(display_msjLand("El item no puede ser menor a 1", "danger"));
            }
            redirect("cart.php");
        }
    }

    function carritoAumentar(){
        if(isset($_GET['aumentar'])){
            $cart_id = limpiar_string(trim($_GET['aumentar']));
            $query = query("SELECT a.cart_canti, b.prod_canti FROM carrito a INNER JOIN productos b ON a.cart_prod_id = b.prod_id WHERE a.cart_id = {$cart_id}");
            $fila = fetch_assoc($query);
            $prod_stock = $fila['prod_canti'];
            $cart_canti = $fila['cart_canti'];
            if($cart_canti < $prod_stock){
                query("UPDATE carrito SET cart_canti = cart_canti + 1 WHERE cart_id = {$cart_id}");
            } else{
                set_mensaje(display_msjLand("No puedes agregar mas de {$prod_stock} items del producto al carrito", "danger"));
            }
            redirect("cart.php");
        }
    }

    function carritoBorrar(){
        if(isset($_GET['borrar'])){
            $cart_id = limpiar_string(trim($_GET['borrar']));
            query("DELETE FROM carrito WHERE cart_id = {$cart_id}");
            set_mensaje(display_msjLand("El item fue retirado del carrito correctamente", "success"));
            return redirect("cart.php");
        }
    }

    require_once 'vendor/autoload.php';
    use MercadoPago\MercadoPagoConfig;
    use MercadoPago\Client\Preference\PreferenceClient;
    MercadoPagoConfig::setAccessToken("TEST-7560431901813289-052716-73aa88e545d5fa9f597891a8ad89bde1-1830137275");
    $client = new PreferenceClient();

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
                        <a href="cart.php?restar={$fila['cart_id']}" class="btn btn-warning"><i class="fa-solid fa-minus"></i></a>
                        <a href="cart.php?aumentar={$fila['cart_id']}" class="btn btn-success"><i class="fa-solid fa-plus"></i></a>
                        <a href="cart.php?borrar={$fila['cart_id']}" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></a>
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

            global $client;

            $preference = $client->create([
                "items" => array(
                    array(
                        "title" => "Total a pagar",
                        "quantity" => 1,
                        "currency_id" => "PE",
                        "unit_price" => $total
                    )
                )
            ]);
            return [$total, $preference->id];
        }
    }
?>