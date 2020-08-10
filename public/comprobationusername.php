<?php

      $user = $_POST['c'];
      if(!empty($user)) {
            comprobar1($user);
      }
      /*CAMBIAR DATOS DE LA BASE DE DATOS UNA VEZ EN EL HOSTING */

      function comprobar1($c) {    
        $mysqli = new PDO("sqlsrv:Server=CPX-VQY8CZBYLXC;Database=MuOnline", "sa", "Juampilomas99");        
      
        $sql = "SELECT * FROM MEMB_INFO WHERE memb___id = '$c'";
        $result = $mysqli->query($sql);
            if ($result->fetchColumn() == 0){
                  echo 'no';
            }else{
                  echo 'yes';
            }
      }
?>
