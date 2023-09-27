<?php
//Faz o logout do sistema

//Destrói as variáveis de sessão
session_start();
session_unset();
session_destroy();

header("location: index.php");