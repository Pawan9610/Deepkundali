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
                                        $full_name = $_POST['full_name'];
                                        $username = $_POST['username'];
                                        $pass = md5($_POST['password']); //password encription md5
                                        $city = $_POST['city'];
                                        $mob = $_POST['mob'];
                                        $exp = $_POST['experience'];
                                        $price = $_POST['price'];

                                        $update_sql = "UPDATE astrologer  SET
                                                full_name= '$full_name',
                                                username = '$username',
                                                password = '$pass',
                                                city = '$city',
                                                mob_no = '$mob',
                                                exp = '$exp',
                                                price = '$price'
                                                    WHERE id=$id
                                        ";
                                        //Execute the Update data query
                                        $update = mysqli_query($conn, $update_sql);

                                        if ($update==TRUE) {
                                            $_SESSION['update']="<div class='success'>Astrologer's Details Updated Successfully!!</div>";
                                            //Redirect To manage Astrologer page With Message
                                            // header("location:http://localhost/deepkundali/admin/pandit.php");
                                        }
                                        else{
                                            $_SESSION['update']="<div class='error'>Failed to update!! Try Again....</div>";
                                            //Redirect To manage Astrologer page With Message
                                            // header("location:http://localhost/deepkundali/admin/pandit.php");
                                            
                                        }
                                        ?>
                                            <script>
                                                window.location.href="http://localhost/deepkundali/admin/pandit.php";
                                            </script>
                                        <?php

                                    }
                                    ob_end_flush();?></div>
                        <div class="astro-nav"><a href="./pandit.php" class="btn-primary btn-border shadow-3">Go Back</a></div>
                            <div class="form-container center">
                                <form action="" method="POST" class="bg-secondry-color primary-color shadow border">
                                <div class="form-group">
                                        <label for="fullname">Full Name</label>
                                        <input type="text" name="full_name" class="form-control" value="<?php echo $data['full_name'];?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="username">User Name</label>
                                        <input type="text" name="username" class="form-control" value="<?php echo $data['username'];?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="city">City</label>
                                        <input type="text" name="city" class="form-control" value="<?php echo $data['city'];?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="phones">Mobile No.</label>
                                        <input type="tel" name="mob" class="form-control" value="<?php echo $data['mob_no'];?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="Experince">Experience</label>
                                        <input type="number" name="experience" class="form-control" value="<?php echo $data['exp'];?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Price</label>
                                        <input type="number" name="price" class="form-control" value="<?php echo $data['price'];?>" required>
                                    </div>
                                    
                                   
                                    <button type="submit" name="update" value="Update Admin" class="btn-primary secondry-color btn-border shadow-3">Update</button>
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