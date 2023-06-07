<?php
session_start();
if($_SESSION['login']!= 'oui'){
    header('Location: login.php');

}
include 'connection.php';

$sql = 'SELECT * 
		FROM `reserver-hotel` 
        where statu = "En cours"';

$sql2 = 'SELECT * 
		FROM `reserver-hotel` 
        where statu = "Acceptée"';

$sql3 = 'SELECT * 
		FROM `reserver-hotel` 
        where statu = "Refusée"';

 $statement = $pdo->query($sql);
 $statement2 = $pdo->query($sql2);
 $statement3 = $pdo->query($sql3);
 $publishers = $statement->fetchAll(PDO::FETCH_ASSOC);
 $publishers1 = $statement2->fetchAll(PDO::FETCH_ASSOC);
 $publishers2 = $statement3->fetchAll(PDO::FETCH_ASSOC);
?>



<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Discover Draa tafilalt</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
   <!-- Google Fonts
		============================================ -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
        <!-- Bootstrap CSS
            ============================================ -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        
        <!-- font awesome CSS
            ============================================ -->
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <!-- owl.carousel CSS
            ============================================ -->
        <link rel="stylesheet" href="css/owl.carousel.css">
        <link rel="stylesheet" href="css/owl.theme.css">
        <link rel="stylesheet" href="css/owl.transitions.css">
        <!-- meanmenu CSS
            ============================================ -->
        <link rel="stylesheet" href="css/meanmenu/meanmenu.min.css">
        <!-- animate CSS
            ============================================ -->
        <link rel="stylesheet" href="css/animate.css">
        <!-- normalize CSS
            ============================================ -->
        <link rel="stylesheet" href="css/normalize.css">
        <!-- wave CSS
            ============================================ -->
        <link rel="stylesheet" href="css/wave/waves.min.css">
        <link rel="stylesheet" href="css/wave/button.css">
        <!-- mCustomScrollbar CSS
            ============================================ -->
        <link rel="stylesheet" href="css/scrollbar/jquery.mCustomScrollbar.min.css">
        <!-- Notika icon CSS
            ============================================ -->
        <link rel="stylesheet" href="css/notika-custom-icon.css">
        <!-- Data Table JS
            ============================================ -->
        <link rel="stylesheet" href="css/jquery.dataTables.min.css">
        <!-- main CSS
            ============================================ -->
        <link rel="stylesheet" href="css/main.css">
        <!-- style CSS
            ============================================ -->
        <link rel="stylesheet" href="style.css">
        <!-- responsive CSS
            ============================================ -->
        <link rel="stylesheet" href="css/responsive.css">
        <!-- modernizr JS
            ============================================ -->
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    
<!-- Start Header Top Area -->

    <?php include 'tophead.php' ?>

    <!-- End Header Top Area -->
    <!-- Mobile Menu start -->
    <div class="mobile-menu-area">
    <?php include 'mobile-menu-area.html' ?>
    </div>
    <!-- Mobile Menu end -->
    <!-- Main Menu area start-->
    <div class="main-menu-area mg-tb-40">
    <?php include 'main-menu-area.html' ?>
    </div>
    <!-- Main Menu area End-->
    <!-- Start Status area -->
    <div class="notika-status-area">
        <div class="container">
            <div class="row">
            <?php 
                  if(isset($_GET['success'])){ ?>
                    <div class="alert alert-success" role="alert">
                      <?php echo$_GET['success']; ?>
                    </div>
                <?php } ?>
                <?php 
                  if(isset($_GET['error'])){ ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo$_GET['error']; ?>
                    </div>
                <?php } ?>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="data-table-list">
                        <div class="basic-tb-hd">
                            <h2>Réservation des hôtels</h2>
                        </div>
                        <div class="status">
                            <button id='encours' value="En cours">En cours</button>
                            <button id='accepter' value='Acceptee'>Acceptée</button>
                            <button id='reffuse' value="refuse">Refusée</button>
                        </div>
                        <div id='encours_div'>

                        
                        <div class="table-responsive">
                            <table id="data-table-basic" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Hotel id</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>type</th>
                                      
                                        <th>Date-debut	</th>
                                   
                                        <th>Date-fin</th>
                                        <th>Date-reservartion</th>
                                        <th>Status</th>
                                        <th>Modifier</th>
                                        <th>Supprimer</th>
                                    </tr>
                                </thead>
                                <tbody>
                                         
                                <?php
                                
                                
                                if ($publishers) {
                                    // show the publishers
                                    foreach ($publishers as $publisher) {?>
                                    <tr>
                                        <td><?php  echo $publisher['id-hotel'] ?></td>
                                        <td><?php  echo $publisher['email'] ?></td>
                                        <td><?php  echo $publisher['phone'] ?></td>
                                        <td><?php  echo $publisher['type'] ?></td>
                                        <td><?php  echo $publisher['date-debut'] ?></td>
                                        <td><?php  echo $publisher['date-fin'] ?></td>
                                        <td><?php  echo $publisher['date-reservartion'] ?></td>
                                        <td><?php  echo $publisher['statu'] ?></td>
                                        <td><a href="update-resehotel.php?modi=<?php echo $publisher['id-resh'] ?>"> <i class="bi bi-pencil"></i></a></td>
                                        <td><a href="delete-reshtl.php?id=<?php echo $publisher['id-resh'] ?>"> <i class="bi bi-trash"></i></a></td>
                                       
                                     </tr>
                                    
                               <?php }}
                                ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                    
                                    <th>Hotel id</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>type</th>
                                      
                                        <th>Date-debut	</th>
                                   
                                        <th>Date-fin</th>
                                        <th>Date-reservartion</th>
                                        <th>Status</th>
                                        <th>Modifier</th>
                                       <th>Supprimer</th>
                                </tfoot>
                            </table>
                        </div>
                        </div>
                        <div id='acceptee_div'>
                        <div class="table-responsive">
                            <table id="data-table-basic" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Hotel id</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>type</th>
                                      
                                        <th>Date-debut	</th>
                                   
                                        <th>Date-fin</th>
                                        <th>Date-reservartion</th>
                                        <th>Status</th>
                                        <th>Modifier</th>
                                        <th>Supprimer</th>
                                    </tr>
                                </thead>
                                <tbody>
                                         
                                <?php
                                
                                
                                if ($publishers1) {
                                    // show the publishers
                                    foreach ($publishers1 as $publisher) {?>
                                    <tr>
                                        <td><?php  echo $publisher['id-hotel'] ?></td>
                                        <td><?php  echo $publisher['email'] ?></td>
                                        <td><?php  echo $publisher['phone'] ?></td>
                                        <td><?php  echo $publisher['type'] ?></td>
                                        <td><?php  echo $publisher['date-debut'] ?></td>
                                        <td><?php  echo $publisher['date-fin'] ?></td>
                                        <td><?php  echo $publisher['date-reservartion'] ?></td>
                                        <td><?php  echo $publisher['statu'] ?></td>
                                        <td><a href="update-resehotel.php?modi=<?php echo $publisher['id-resh'] ?>"> <i class="bi bi-pencil"></i></a></td>
                                        <td><a href="delete-reshtl.php?id=<?php echo $publisher['id-resh'] ?>"> <i class="bi bi-trash"></i></a></td>
                                       
                                     </tr>
                                    
                               <?php }}
                                ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                    
                                    <th>Hotel id</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>type</th>
                                      
                                        <th>Date-debut	</th>
                                   
                                        <th>Date-fin</th>
                                        <th>Date-reservartion</th>
                                        <th>Status</th>
                                        <th>Modifier</th>
                                       <th>Supprimer</th>
                                </tfoot>
                            </table>
                        </div>               
                        
                        </div>
                        <div id='refuse_div'>

                        <div class="table-responsive">
                            <table id="data-table-basic" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Hotel id</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>type</th>
                                      
                                        <th>Date-debut	</th>
                                   
                                        <th>Date-fin</th>
                                        <th>Date-reservartion</th>
                                        <th>Status</th>
                                        <th>Modifier</th>
                                        <th>Supprimer</th>
                                    </tr>
                                </thead>
                                <tbody>
                                         
                                <?php
                                
                                
                                if ($publishers2) {
                                    // show the publishers
                                    foreach ($publishers2 as $publisher) {?>
                                    <tr>
                                        <td><?php  echo $publisher['id-hotel'] ?></td>
                                        <td><?php  echo $publisher['email'] ?></td>
                                        <td><?php  echo $publisher['phone'] ?></td>
                                        <td><?php  echo $publisher['type'] ?></td>
                                        <td><?php  echo $publisher['date-debut'] ?></td>
                                        <td><?php  echo $publisher['date-fin'] ?></td>
                                        <td><?php  echo $publisher['date-reservartion'] ?></td>
                                        <td><?php  echo $publisher['statu'] ?></td>
                                        <td><a href="update-resehotel.php?modi=<?php echo $publisher['id-resh'] ?>"> <i class="bi bi-pencil"></i></a></td>
                                        <td><a href="delete-reshtl.php?id=<?php echo $publisher['id-resh'] ?>"> <i class="bi bi-trash"></i></a></td>
                                       
                                     </tr>
                                    
                               <?php }}
                                ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                    
                                    <th>Hotel id</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>type</th>
                                      
                                        <th>Date-debut	</th>
                                   
                                        <th>Date-fin</th>
                                        <th>Date-reservartion</th>
                                        <th>Status</th>
                                        <th>Modifier</th>
                                       <th>Supprimer</th>
                                </tfoot>
                            </table>
                        </div>                  
                               
                         </div>
                </div>
            </div>
            
          
        </div>
    </div>
    <!-- End Status area-->
    <!-- Start Footer area-->
    <div class="footer-copyright-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="footer-copy-right">
                        <p>Copyright © 2023 
. All rights reserved Discover Draa Tafilalt.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
   <!-- End Footer area-->
    <!-- jquery
		============================================ -->
        <script src="js/vendor/jquery-1.12.4.min.js"></script>
        <!-- bootstrap JS
            ============================================ -->
        <script src="js/bootstrap.min.js"></script>
        <!-- wow JS
            ============================================ -->
        <script src="js/wow.min.js"></script>
        <!-- price-slider JS
            ============================================ -->
        <script src="js/jquery-price-slider.js"></script>
        <!-- owl.carousel JS
            ============================================ -->
        <script src="js/owl.carousel.min.js"></script>
        <!-- scrollUp JS
            ============================================ -->
        <script src="js/jquery.scrollUp.min.js"></script>
        <!-- meanmenu JS
            ============================================ -->
        <script src="js/meanmenu/jquery.meanmenu.js"></script>
        <!-- counterup JS
            ============================================ -->
        <script src="js/counterup/jquery.counterup.min.js"></script>
        <script src="js/counterup/waypoints.min.js"></script>
        <script src="js/counterup/counterup-active.js"></script>
        <!-- mCustomScrollbar JS
            ============================================ -->
        <script src="js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
        <!-- sparkline JS
            ============================================ -->
        <script src="js/sparkline/jquery.sparkline.min.js"></script>
        <script src="js/sparkline/sparkline-active.js"></script>
        <!-- flot JS
            ============================================ -->
        <script src="js/flot/jquery.flot.js"></script>
        <script src="js/flot/jquery.flot.resize.js"></script>
        <script src="js/flot/flot-active.js"></script>
        <!-- knob JS
            ============================================ -->
        <script src="js/knob/jquery.knob.js"></script>
        <script src="js/knob/jquery.appear.js"></script>
        <script src="js/knob/knob-active.js"></script>
        <!--  Chat JS
            ============================================ -->
        <script src="js/chat/jquery.chat.js"></script>
        <!--  todo JS
            ============================================ -->
        <script src="js/todo/jquery.todo.js"></script>
        <!--  wave JS
            ============================================ -->
        <script src="js/wave/waves.min.js"></script>
        <script src="js/wave/wave-active.js"></script>
        <!-- plugins JS
            ============================================ -->
        <script src="js/plugins.js"></script>
        <!-- Data Table JS
            ============================================ -->
        <script src="js/data-table/jquery.dataTables.min.js"></script>
        <script src="js/data-table/data-table-act.js"></script>
        <!-- main JS
            ============================================ -->
        <script src="js/main.js"></script>
    <script>
        $('#refuse_div').hide();
        $('#acceptee_div').hide();

        $(document).ready(function() {
 
                $('#reffuse').click(function() {
            
                    $('#refuse_div').show();
                    $('#acceptee_div').hide();
                    $('#encours_div').hide();
        });
        });

        $(document).ready(function() {
 
        $('#accepter').click(function() {

            $('#refuse_div').hide();
            $('#acceptee_div').show();
            $('#encours_div').hide();
        });
        });

            $(document).ready(function() {
            
            $('#encours').click(function() {

                $('#refuse_div').hide();
                $('#acceptee_div').hide();
                $('#encours_div').show();
            });
            });

    </script>
    
</body>

</html>