@if (session('status'))
    <div class="alert alert-primary alert-dismissible fade show" role="alert">
        <?php
        $cadena_status = session('status');
        $cadena_busc = "modificad";
        $coincidencia = strpos($cadena_status, $cadena_busc);
        if ($coincidencia === false)
        {
            echo "";
        }
        else 
        {
            $ruta_im = "/img/guardado.svg";
            echo "<img src=\"".asset($ruta_im)."\" alt=\"#\" width=\"30px\">";
        }
        $cadena_busc = "cread";
        $coincidencia = strpos($cadena_status, $cadena_busc);
        if ($coincidencia === false)
        {
            echo "";
        }
        else 
        {
            $ruta_im = "/img/guardado.svg";
            echo "<img src=\"".asset($ruta_im)."\" alt=\"#\" width=\"30px\">";
        }
        $cadena_busc = "eliminad";
        $coincidencia = strpos($cadena_status, $cadena_busc);
        if ($coincidencia === false)
        {
            echo "";
        }
        else 
        {
            $ruta_im = "/img/elim.svg";
            echo "<img src=\"".asset($ruta_im)."\" alt=\"#\" width=\"30px\">";
        }
    ?>
            {{ session('status')  }} 

        <button
        type="button"
        class="close"
        data-dismiss="alert"
        aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    
@endif