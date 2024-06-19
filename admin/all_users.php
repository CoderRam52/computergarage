<?php include "header.php"; ?>
<?php include "../config/connection.php"; ?>



<!--main-container-part-->
<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Tables</a> </div>
        <h1 class="text-center">All Users</h1>

        <h2 class="btn btn-primary">
            <?php $res = mysqli_query($conn, "SELECT * FROM user_registration");

            $row_count = mysqli_num_rows($res);

            echo $row_count;

            ?>


        </h2>

    </div>
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
                        <h5>Users Table</h5>

                    </div>

                    <div class="widget-content nopadding">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th class="center">Sl No</th>
                                    <th class="center">First Name</th>
                                    <th class="center">Lasat Name</th>
                                    <th class="center">User Name</th>
                                    <th class="center">Role</th>
                                    <th class="center">Status</th>
                                    <th class="center">Edit</th>
                                    <th class="center">Delete</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php

                                $res = mysqli_query($conn, "SELECT * FROM user_registration");

                                $row_count = mysqli_num_rows($res);

                                $serialNumber = 1;
                                while ($row = mysqli_fetch_array($res)) {

                                ?>


                                    <tr class="odd gradeX text-center">
                                        <td class="center"><?php echo $serialNumber; ?></td>
                                        <td class="center"><?php echo $row["firstname"]; ?></td>
                                        <td class="center"><?php echo $row["lastname"]; ?></td>
                                        <td class="center"><?php echo $row["username"]; ?></td>
                                        <td class="center"> <?php echo $row["role"]; ?></td>
                                        <td class="center"><?php echo $row["status"]; ?></td>
                                        <td class="center"><a href="edit_user.php?id=<?php echo $row["id"];?>" class="btn btn-success">Edit</a></td>
                                        <td class="center"><a href="delete_user.php?id=<?php echo $row["id"]; ?>" class="btn btn-danger">Delete</a></td>




                                    </tr>

                                <?php

                                    $serialNumber++;
                                }


                                ?>

                            </tbody>
                        </table>
                    </div>

                </div>


            </div>
        </div>
    </div>
</div>
<!--end-main-container-part-->

<!--Footer-part-->
<?php include "footer.php"; ?>