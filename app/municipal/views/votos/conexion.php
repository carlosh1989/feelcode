          <?php
          $link = mysqli_connect("localhost", "root", "Adm15.", "redcomand");

              /* verificar la conexión */
              if (mysqli_connect_errno()) {
                  printf("Conexión fallida: %s\n", mysqli_connect_error());
                  exit();
              }
              ?>