<?php
// Start output buffering
ob_start();

// Include connection and header files
include "../config/connection.php";
include "header.php";

// Get user ID from the URL
$get_id = $_GET['id'];

// Fetch the user's current data using a prepared statement

$select_data = "SELECT * FROM user_registration WHERE id=?";
$query = $conn->prepare($select_data);
$query->bind_param("i", $get_id);
$query->execute();
$result = $query->get_result()->fetch_assoc();

$user_id = $result['id'];
$user_firstname = $result['firstname'];
$user_lastname = $result['lastname'];
$user_username = $result['username'];
$user_password = $result['password'];
$user_role = $result['role'];
$user_status  = $result['status'];


$query->close();
?>

<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="index.html" class="tip-bottom"><i class="icon-home"></i> Home </a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">
        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
            <div class="card">
                <div class="span12 card">
                    <div class="widget-box">
                        <div class="widget-title">
                            <span class="icon"><i class="icon-align-justify"></i></span>
                            <h5>Edit User</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <form method="POST" class="form-horizontal" name="form_1">
                                <div class="control-group">
                                    <label class="control-label">First Name :</label>
                                    <div class="controls">
                                        <input type="text" class="span11" placeholder="First name" name="first_name" required value="<?php echo htmlspecialchars($user_firstname); ?>" />
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Last Name :</label>
                                    <div class="controls">
                                        <input type="text" class="span11" placeholder="Last name" name="last_name" required value="<?php echo htmlspecialchars($user_lastname); ?>"/>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">User Name :</label>
                                    <div class="controls">
                                        <input type="text" class="span11" placeholder="User name" name="user_name" required readonly value="<?php echo htmlspecialchars($user_username); ?>"/>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Password</label>
                                    <div class="controls">
                                        <input type="password" class="span11" placeholder="Enter Password" name="password" required value="<?php echo htmlspecialchars($user_password); ?>"/>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Select Role</label>
                                    <div class="controls">
                                        <select name="role" class="span11">

                                            <option><?php if($user_role=="admin") {echo "selected";} ?>Admin</option>
                                            <option <?php if($user_role=="user") {echo "selected";} ?> >User</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Select Status</label>
                                    <div class="controls">
                                        <select name="status" class="span11">
                                            <option <?php if($user_status=="active") {echo "selected";} ?>>Active</option>
                                            <option <?php if($user_status=="inactive") {echo "selected";} ?>>Inactive</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-actions">
                                    <button type="submit" class="btn btn-success" name="submitOne">Update</button>
                                </div>

                                <?php
                                
                                if (isset($_POST['submitOne'])) {
                                    // Escape input data
                                    $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
                                    $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
                                    $password = mysqli_real_escape_string($conn, $_POST['password']);
                                    $role = mysqli_real_escape_string($conn, $_POST['role']);
                                    $status = mysqli_real_escape_string($conn, $_POST['status']);

                                    // Re-hash password if it was updated
                                    if ($password !== $user_password) {
                                        $password = password_hash($password, PASSWORD_DEFAULT);
                                    }

                                    // Prepare update statement
                                    $update_data = "UPDATE user_registration SET firstname=?, lastname=?, password=?, role=?, status=? WHERE id=?";
                                    $stmt = $conn->prepare($update_data);
                                    $stmt->bind_param("sssssi", $first_name, $last_name, $password, $role, $status, $get_id);

                                    if ($stmt->execute()) {
                                        // Redirect to all_users.php after successful update
                                        header("Location: all_users.php");
                                        exit(); // Ensure script termination after the redirect
                                    } else {
                                        echo 'Data Not Updated: ' . $stmt->error;
                                    }

                                    $stmt->close();
                                }
                                ?>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "footer.php"; ?>

<?php
// End output buffering and flush
ob_end_flush();
?>
