<?php 
    function limpiar_string($str){
        global $conexion; 
        return mysqli_real_escape_string($conexion, $str);
    }

    function display_msj($msj, $tipo){
        $msj = <<<DELIMITADOR
            <div class="alert alert-{$tipo} alert-dismissible fade show" role="alert">
                <strong>Tienes una alerta!</strong> {$msj}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
DELIMITADOR;
        return $msj;
    }
?>