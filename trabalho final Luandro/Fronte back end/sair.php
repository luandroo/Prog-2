<?php
session_start();
session_destroy();
header("Location: entrar.html");//volta para pagina entrar
?>