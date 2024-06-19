<?php include "header.php"; ?>
<?php include "../config/connection.php"; ?>



<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="index.html" class="tip-bottom"><i class="icon-user"></i>
                Add New User </a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">



        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
            <div class="row-fluid">
                <div class="span12 card">
                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                            <h5>Add New User</h5>
                        </div>
                        <div class="widget-content nopadding">

                            <form method="POST" class="form-horizontal" name="form_1">
                                <div class="control-group">
                                    <label class="control-label">First Name :</label>
                                    <div class="controls">
                                        <input type="text" class="span11" placeholder="First name" name="first_name" required/>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Last Name :</label>
                                    <div class="controls">
                                        <input type="text" class="span11" placeholder="Last name" name="last_name" required/>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">User Name :</label>
                                    <div class="controls">
                                        <input type="text" class="span11" placeholder="User name" name="user_name" required/>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Password</label>
                                    <div class="controls">
                                        <input type="password" class="span11" placeholder="Enter Password" name="password" required/>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Select Role</label>
                                    <div class="controls">
                                        <select name="role" class="span11">
                                            <option>Admin</option>
                                            <option>User</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-actions">
                                    <button type="submit" class="btn btn-success" name="submitOne">Save</button>
                                </div>

                            </form>
                            
                            <?php
                            if (isset($_POST['submitOne'])) {

                                $first_name = $_POST['first_name'];
                                $last_name = $_POST['last_name'];
                                $user_name = $_POST['user_name'];
                                $password = $_POST['password'];
                                $role = $_POST['role'];

                                $select_username = "SELECT * FROM user_registration WHERE username='$user_name'";
                                $exc = mysqli_query($conn, $select_username);
                                
                                $count = mysqli_num_rows($exc);

                                if ($count > 0) { ?>
                                    <div class="alert alert-danger" id="error">
                                        <strong>This Username Alrady Exist. Please try another</strong>
                                    </div>
                                    <?php
                                } else {

                                    $sql =  "INSERT INTO user_registration(firstname,lastname,username,password,role,status) VALUES ('$first_name','$last_name','$user_name','$password','$role','active')";

                                    if (mysqli_query($conn, $sql) == TRUE) {
                                    ?>
                                        <div class="alert alert-success" id="error">
                                            <strong>Good Job Record Inserted</strong>

                                            <script type="text/javascript">
                                                setTimeout (function(){
                                                        window.location.href=window.location.href;
                                                        
                                                },3000);
                                            </script>
                                        </div>
                            <?php
                                    }
                                }
                            }

                            ?>
                        </div>



                    </div>


                </div>

            </div>
        </div>

    </div>
</div>

<!--end-main-container-part-->

<!--Footer-part-->
<?php include "footer.php"; ?>