<?php include('partials/sidebar.php');?> 
                    <div class="main-content border shadow">
                        <div class="main-content-header center shadow-2">Astrologer Managment</div>
                        <div class="primary-color">
                                <?php ob_start();
                                    //Get the ID of astrologer to update 
                                    $id = $_GET['id'];
                                

                                    //SQL query to get the all the data of the astrologer 
                                    $sql = "SELECT * FROM astrologer WHERE id=$id";

                                    //Execute the sql query 
                                    $res = mysqli_query($conn, $sql);
                                    $data = mysqli_fetch_array($res);

                                    if ($data != TRUE) {
                                        ?>
                                        <script>
                                            window.location.href="http://localhost/deepkundali/admin/pandit.php";
                                        </script>
                                        <?php
                                    }
                                    else if(isset($_POST['update'])){
                                        //Get the data from form
                                        $current_pass = md5($_POST['current_password']);
                                        $new_pass     = md5($_POST['new_password']);//password encription md5
                                        $con_pass     = md5($_POST['conform_password']);

                                        
                                        if ($current_pass == $data['password']) {
                                            if ($new_pass == $con_pass) {
                                                $update_sql = "UPDATE astrologer  SET
                                                        password = '$new_pass'
                                                            WHERE id=$id
                                                ";
                                                //Execute the Update data query
                                                $update = mysqli_query($conn, $update_sql);
                                                
                                                if ($update==TRUE) {
                                                    echo $_SESSION['updatePass']="<div class='success'>Astrologer's Password Updated Successfully!!</div>";
                                                    //Redirect To manage Astrologer page With Message
                                                    // header("location:http://localhost/deepkundali/admin/pandit.php");
                                                    ?>
                                                            <script>
                                                                window.location.href="http://localhost/deepkundali/admin/pandit.php";
                                                            </script>
                                                        <?php
                                                }
                                                else{
                                                    echo $_SESSION['updatePass']="<div class='error'>Failed to Update Pasword!! Try Again....</div>";
                                                    //Redirect To manage Astrologer page With Message
                                                    // header("location:http://localhost/deepkundali/admin/pandit.php");
                                                    
                                                }
        
                                            }
                                            else{
                                                $_SESSION['conPass'] = "<div class='error'>CONFORM password Not Matched!!</div>";
                                            }
                                        }
                                        else{
                                            $_SESSION['pass'] = "<div class='error'>Current password Not Matched!!</div>";
                                        }
                                    }
                                    ob_end_flush();?></div>

                        <div class="astro-nav"><a href="./pandit.php" class="btn-primary btn-border shadow-3">Go Back</a></div>
                            <div class="form-container center">
                                <form action="" method="POST" class="bg-secondry-color primary-color shadow border">
                                    <div class="form-group">
                                        <label for="password">Current Password</label>
                                        <input type="password" name="current_password" class="form-control" placeholder="current password !!" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">New Password</label>
                                        <input type="password" name="new_password" class="form-control" placeholder="New password !!" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Conform Password</label>
                                        <input type="password" name="conform_password" class="form-control" placeholder="Current password !!" required>
                                    </div>
                                   
                                    <button type="submit" name="update" value="Update Admin" class="btn-primary secondry-color btn-border shadow-3">Update</button>
                                  <?php 
                                    if (isset($_SESSION['pass'])) {
                                        echo $_SESSION['pass'];
                                        unset($_SESSION['pass']);
                                    }
                                    if (isset($_SESSION['conPass'])) {
                                        echo $_SESSION['conPass'];
                                        unset($_SESSION['conPass']);
                                    }
                                  ?>                   
                                </form>
                            </div>
                        </div>
    </main>
    <!-- partial -->
        <script src='https://cdn.rawgit.com/facebook/rebound-js/fe8994c1caca9f0e7ff27336c5ecf0a4abd807dc/rebound.min.js'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/hammer.js/2.0.4/hammer.min.js'></script>
        <script src='https://code.jquery.com/pep/0.3.0/pep.js'></script>
        <script src='https://cdn.rawgit.com/meandmax/lory/v1.6.6/dist/lory.min.js'></script>
        <script  src="./script.js"></script>

</body>
</html>