<?php

      $user = $_POST['b'];
      if(!empty($user)) {
            comprobar($user);
      }
      /*CAMBIAR DATOS DE LA BASE DE DATOS UNA VEZ EN EL HOSTING */

      function comprobar($b) {    
        $mysqli = new PDO("sqlsrv:Server=CPX-VQY8CZBYLXC;Database=MuOnline", "sa", "Juampilomas99");        
      
        $sql = "SELECT * FROM MEMB_INFO WHERE mail_addr = '$b'";
        $result = $mysqli->query($sql);
            if ($result->fetchColumn() == 0){
                  echo 'no';
            }else{
                  echo 'yes';
            }
      }
?>
