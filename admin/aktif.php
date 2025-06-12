<?php                    
                      $koneksi=mysqli_connect("localhost","root","","db_tanaman");                
                      if (isset($_GET['id'])){ 
                          $tampil_id=$_GET['id'];                 
                 
                          $sql="UPDATE `akun` SET                 
                              `status`=1 WHERE id='$tampil_id'";                  
                 
                          // Execute the query 
                          mysqli_query($koneksi,$sql);         
                      } 

                      // Go back to course-page.php 
                      header('location:dataakun.php'); 
                  ?>
                 
