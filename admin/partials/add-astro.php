<?php include('partials/sidebar.php');?> 
                    <div class="main-content border shadow">
                        <div class="main-content-header center shadow-2">Astrologer Managment</div>
                        <div class="primary-color">
                            <?php
                                if (isset($_SESSION['add'])) {
                                    echo $_SESSION['add'];
                                    unset($_SESSION['add']);
                                }
                            ?>
                        </div>
                        <div class="astro-nav"><a href="./pandit.php" class="btn-primary btn-border shadow-3">Go Back</a></div>
                            <div class="form-container primary-color center mar-t-0">
                                <form action="" method="POST" class="bg-secondry-color primary-color shadow border">
                                    <div class="form-group">
                                        <label for="fullname">Full Name</label>
                                        <input type="text" name="full_name" class="form-control" placeholder="Full name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="username">User Name</label>
                                        <input type="text" name="username" class="form-control" placeholder="User name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" name="password" class="form-control" placeholder="User name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="city">City</label>
                                        <input type="text" name="city" class="form-control" placeholder="City name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="phones">Mobile No.</label>
                                        <input type="tel" name="mob" class="form-control" placeholder="Enter Mobile no." required>
                                    </div>
                                    <div class="form-group">
                                        <label for="Experince">Experience</label>
                                        <input type="number" name="experience" class="form-control" placeholder="What's Your Experience" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Price</label>
                                        <input type="number" name="price" class="form-control" placeholder="Enter Price" required>
                                    </div>
                                    
                                   
                                    <button type="submit" name="submit" value="Add Admin" class="btn-primary secondry-color btn-border shadow-3">hello</button>
                                    <br>
                                    <?php
                                        // Process the value of form and save it in the datebase
                                        //check wether th esubmit botton is clicked or not

                                        if (isset($_POST['submit'])) {
                                            //// botton clicked 
                                            // echo "botton clicked !!";

                                            //Get the data from form
                                            $full_name = $_POST['full_name'];
                                            $username = $_POST['username'];
                                            $pass = md5($_POST['password']); //password encription md5
                                            $city = $_POST['city'];
                                            $mob = $_POST['mob'];
                                            $exp = $_POST['experience'];
                                            $price = $_POST['price'];
                                            
                                            //sql query to insert data in database

                                            $sql = "INSERT INTO astrologer SET
                                                full_name= '$full_name',
                                                username = '$username',
                                                password = '$pass',
                                                city = '$city',
                                                mob_no = '$mob',
                                                exp = '$exp',
                                                price = '$price'
                                            ";
                                            
                                            $res = mysqli_query($conn,$sql) or die(mysqli_error());

                                            //check weather query exicuted successfully or not
                                            if ($res==TRUE) {
                                                $_SESSION['add']="<div class='success'>New Astrologer Added Successfully!!</div>";
                                                //Redirect To manage Astrologer page With Message
                                                // header("location:http://localhost/deepkundali/admin/pandit.php");
                                            }
                                            else{
                                                $_SESSION['add']="<div class='error'>Failed to Add Astrologer!! Try Again....</div>";
                                                //Redirect To manage Astrologer page With Message
                                                // header("location:http://localhost/deepkundali/admin/pandit.php");
                                                
                                            }
                                            ?>
                                                <script>
                                                    window.location.href="http://localhost/deepkundali/admin/pandit.php";
                                                </script>
                                            <?php

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
