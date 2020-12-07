<?php

  $login = $_POST["login"];
  $starehaslo = $_POST["starehaslo"];
  $nowehaslo = $_POST["nowehaslo"];
  $pnowehaslo = $_POST["pnowehaslo"];

  $conn = mysqli_connect("localhost","root","", "logowanie");

if($conn){

    $query1="SELECT * FROM `logowanie` WHERE uzytkownik='$login';";
    $query2="SELECT * FROM `logowanie` WHERE haslo='$starehaslo';";

    $result1 = mysqli_query($conn, $query1);
    $result2 = mysqli_query($conn, $query2);

      if(mysqli_num_rows($result1)>0){

        if(mysqli_num_rows($result2)>0){

          if($nowehaslo==$pnowehaslo){
            $query3="UPDATE `logowanie` SET haslo='$nowehaslo' WHERE uzytkownik='$login';";
            $result3 = mysqli_query($conn, $query3);
            echo "Hasło zostało zmienione.";
          }
          else{ echo "Hasło nie zostało powtórzone.";}
        }
        else{ echo "Błędne hasło."; }

      }
      else{
        if($nowehaslo==$pnowehaslo){
          $query4="INSERT INTO `logowanie`VALUES ('$login', '$nowehaslo');";
          $result4 = mysqli_query($conn, $query4);
          echo "Nowy użytkownik został dodany.";
        }
        else{ echo "Użytkownik nie został dodany.";}

      }
      mysqli_close($conn);

  } else{ echo "Nie udało się połączyć z bazą danych"; }

?>
