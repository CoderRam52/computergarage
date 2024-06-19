<?php include "header.php";?>
<?php include "../config/connection.php"; ?>

<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="index.html" class="tip-bottom"><i class="icon-home"></i>
            Home </a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
            <div class="card">
            <h5>
                            <?php $res = mysqli_query($conn, "SELECT * FROM user_registration");

                            $row_count = mysqli_num_rows($res); 
                            
                            echo $row_count;                           
                            
                            ?>
                            
                        
                        </h5>

            </div>
        </div>

    </div>
</div>

<!--end-main-container-part-->

<!--Footer-part-->
<?php include "footer.php";?>

