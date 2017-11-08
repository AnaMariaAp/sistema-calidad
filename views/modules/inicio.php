<?php session_start();
if (!$_SESSION["nombreAdmin"]) 
    {
        header("location:ingreso");exit();
    } else if ($_SESSION['rol'] !== 'A') 
    {
        header('location:inicioUs');exit();
    }
?>
<body class="body">
    <div class="mains">
        <div class="card bg-primary text-white">
            <div class="card-block">
                Esta sección es exclusiva para  el Administrador del sistema.
            </div>
        </div>
        <br/>
    </div>
    <?php $admin = new Admin();
$admin->
    fecha();
?>
</br>
</div>
</body>
