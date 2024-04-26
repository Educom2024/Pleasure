<?php
    function validar_user_reg(){
        $min = 3;
        $max = 10;
        $errores = [];

        if(isset($_POST['registrar'])) {
    
            $user_nombres = limpiar_string(trim($_POST['user_nombres']));
            $user_apellidos = limpiar_string(trim($_POST['user_apellidos']));
            $user_email = limpiar_string(trim($_POST['user_email']));
            $user_pass = limpiar_string(trim($_POST['user_pass']));
            $user_passConfirm = limpiar_string(trim($_POST['user_passConfirm']));

            if(strlen($user_nombres) < $min){
                $errores[] = "Tus nombres no deben ser menos de {$min} carateres";
            }

            if(strlen($user_nombres) > $max){
                $errores[] = "Tus nombres no deben ser más de {$max} carateres";
            }

            if(strlen($user_apellidos) < $min){
                $errores[] = "Tus apellidos no deben ser menos de {$min} carateres";
            }

            if(strlen($user_apellidos) > $max){
                $errores[] = "Tus apellidos no deben ser más de {$max} carateres";
            }

            if(email_existe($user_email)){
                $errores[] = "El correo ingresado ya existe, intenta con otro";
            }

            if($user_pass != $user_passConfirm){
                $errores[] = "Las contraseñas no coinciden";
            }

            if(!empty($errores)){
                foreach($errores as $error){
                    echo display_msj($error, 'danger');
                }
            } else {
                if(registro_usuario($user_nombres, $user_apellidos, $user_email, $user_pass)){
                    set_mensaje(display_msj("Registro satisfactorio. Por favor revisar tu bandeja o spam para la activación de tu cuenta. Esto puede tardar unos minutos", "success"));
                    redirect("register.php");
                } else {
                    set_mensaje(display_msj("Lo sentimos, no pudimos registrar tu cuenta, intentalo más tarde", 'danger'));
                    redirect("register.php");
                }
            }
        }
    }

    function registro_usuario($nombres, $apellidos, $email, $pass) {
        try {
            $user_token = md5($email);
            $user_pass = password_hash($pass, PASSWORD_BCRYPT, array('cost' => 12));
            query("INSERT INTO usuarios (user_nombres, user_apellidos, user_email, user_pass, user_token) VALUES ('{$nombres}', '{$apellidos}', '{$email}', '{$user_pass}', '{$user_token}')");
            $mensaje = "Por favor activa tu cuenta mediante este <a href='http://localhost/proyecto3/CMS/public/activate.php?email={$email}&token={$user_token}'>LINK</a>";
            send_email($email, 'Activar cuenta', $mensaje);
            return true;
        } 
        catch (Exception $error) {
            return false;
        }
    }

    function activar_usuario(){
        if(isset($_GET['email']) && isset($_GET['token'])){
            $user_email = limpiar_string(trim($_GET['email']));
            $user_token = limpiar_string(trim($_GET['token']));

            $query = query("SELECT user_id FROM usuarios WHERE user_email = '{$user_email}' AND user_token = '{$user_token}'");
            $fila = fetch_assoc($query);
            $user_id = $fila['user_id'];

            if(contar_filas($query) == 1){
                $query = query("UPDATE usuarios SET user_status = 1, user_token = '' WHERE user_id = {$user_id}");
                set_mensaje(display_msj("Su cuenta ha sido activada. Por favor inicie sesión", "success"));
                redirect("register.php");
            } else {
                set_mensaje(display_msj("Los datos no son validos. Por favor intente otra vez", "danger"));
                redirect("register.php");
            }
        }
    }
?>