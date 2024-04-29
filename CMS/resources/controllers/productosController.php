<?php 
    function post_productosAgregar(){
        $errores = [];
        $min = 5;
        if(isset($_POST['guardar'])){
            $prod_nombre = limpiar_string(trim($_POST['prod_nombre']));
            $prod_descri = limpiar_string(trim($_POST['prod_descri']));
            $prod_precio = limpiar_string(trim($_POST['prod_precio']));
            $prod_canti = limpiar_string(trim($_POST['prod_canti']));
            $prod_img = $_FILES['prod_img']['name'];
            $prod_img_tmp = $_FILES['prod_img']['tmp_name'];

            if(strlen($prod_nombre) < $min){
                $errores['nombre'] = "El campo nombre debe tener mas de {$min} caracteres";
            }
            if(strlen($prod_descri) < $min){
                $errores['descri'] = "El campo nombre debe tener mas de {$min} caracteres";
            }
            if($prod_precio <= 0){
                $errores['precio'] = "El precio debe ser mayor a 0";
            }
            if($prod_canti <= 0){
                $errores['canti'] = "La cantidad debe ser mayor a 0";
            }

            if(!empty($errores)){
                return $errores;
            }
            $prod_img = md5(uniqid()) . "." . explode(".", $prod_img)[1];
            move_uploaded_file($prod_img_tmp, "../img/{$prod_img}");
            query("INSERT INTO productos (prod_nombre, prod_descri, prod_precio, prod_canti, prod_img) VALUES ('{$prod_nombre}', '{$prod_descri}', {$prod_precio}, {$prod_canti}, '{$prod_img}')");
            set_mensaje(display_msj("El producto se almaceno correctamente", "success"));
            redirect("index.php?productos");
        }
    }

    function get_productos(){
        $query = query("SELECT * FROM productos");
        while ($fila = fetch_assoc($query)){
            $producto = <<<DELIMITADOR
            <tr>
                <td>{$fila['prod_nombre']}</td>
                <td>
                <img src="../img/{$fila['prod_img']}" alt="{$fila['prod_nombre']}" width="150px">
                </td>
                <td>{$fila['prod_descri']}</td>
                <td>S/ {$fila['prod_precio']}</td>
                <td>{$fila['prod_canti']}</td>
                <td>
                <a href="#" class="btn btn-warning">editar</a>
                <a href="#" class="btn btn-danger">borrar</a> 
                </td>
            </tr>
DELIMITADOR;
            echo $producto;
        }
    }

?>