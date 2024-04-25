<?php 
    function validar_user_reg(){
        $min = 3;
        $max = 10;
        $errorres = [];

        global $conexion;

        if(isset($_POST['registrar'])){
            $user_nombres = limpiar_string(trim($_POST['user_nombres']));
            $user_apellidos = limpiar_string(trim($_POST['user_apellidos']));
            $user_email = limpiar_string(trim($_POST['user_email']));
            $user_pass = limpiar_string(trim($_POST['user_pass']));
            $user_passConfirm = limpiar_string(trim($_POST['user_passConfirm']));

            if(strlen($user_nombres) < $min){
                $errores[] = "Tus nombres no deben ser menos de {$min} caracteres";
            }

            if(strlen($user_apellidos) < $min){
                $errores[] = "Tus apellidos no deben ser menos de {$min} caracteres";
            }
            
            if (!empty($errores)){
                foreach($errores as $error){
                    echo display_msj($error, 'warning');
                }
            
            }
        }
    }

?>