<?php

      $user = $_POST['c'];
      $email = $_POST['d'];
      if(!empty($user)) {
            comprobar1($user, $email);
      }
      /*CAMBIAR DATOS DE LA BASE DE DATOS UNA VEZ EN EL HOSTING */

      function comprobar1($c, $d) {    
        $mysqli = new PDO("sqlsrv:Server=DESKTOP-1I9L6OA\SQLEXPRESS;Database=MuOnlineS6", "sa", "Juampilomas99");              
        $sql = "SELECT * FROM MEMB_INFO WHERE mail_addr = '$d'";                
        $result = $mysqli->query($sql);
        $verification = false; 
        foreach ($result as $row) {
            if($row['security'] == $c){                  
                  $verification = true;                  
            }                                    
            
        }
        if($verification){
            echo 'yes';
      }else{
            echo 'no';
      }
      }
?>
