<?php
if(!function_exists("protect")){

  function protect(){

    if(!isset($_SESSION['suario_logado'])){

      
      echo "<script>location.href='login.php';</script>";
      exit('Login inválido: Redirecionando...');

    }

  }

}

protect();
?>