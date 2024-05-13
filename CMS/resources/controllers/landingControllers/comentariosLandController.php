<?php 
    function post_enviarComentario($prod_id){
        if(isset($_POST['comEnviar'])){
            if(!isset($_SESSION['user_rol'])){
                set_mensaje(display_msjLand("Debes de iniciar sesión para poder realizar un comentario!", "danger"));
                redirect("producto.php?id={$prod_id}");
            } else {
                $query = query("SELECT * FROM comentarios WHERE com_prod_id = {$prod_id} AND com_user_id = {$_SESSION['user_id']}");
                if(contar_filas($query) >= 1){
                    set_mensaje(display_msjLand("Lo sentimos, solo puede enviar un comenatrio por producto", "danger"));
                }   else{
                    $com_mensaje = limpiar_string(trim($_POST['com_mensaje']));
                    $com_puntaje = limpiar_string(trim($_POST['com_puntaje']));
                    query("INSERT INTO comentarios (com_user_id, com_prod_id, com_mensaje, com_puntaje, com_fecha)
                    VALUES ({$_SESSION['user_id']}, {$prod_id}, '{$com_mensaje}', {$com_puntaje}, NOW())");
                    set_mensaje(display_msjLand("Comentario realizado, espere a que el admin lo valide!", "success"));    
                }
            }
            redirect("producto.php?id={$prod_id}");
        }
    }
?>