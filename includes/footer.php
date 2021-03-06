                </div><!--end of page content -->

                <aside class="col-md-3">
                    

                    <!-- search bar includes -->
                    <?php include 'includes/req_search.php' ; ?>
                    <?php include 'includes/search_bar.php' ;?>
                  
                    <div class="border"></div>

                    <?php
                        if(!isset($_SESSION['pseudo'])){
                            echo '
                            <div class="aside-login">
                                <h5 class="aside-login__title">Login</h5>
        
                                <form class="form" action="target_login.php" method="POST"> 
        
                                    
                                <div class="form-group">
                                    <label for="inputUsername">Username :</label>
                                    <input type="text" class="form-control aside-login__input" id="inputUsername" name="inputUsername">
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword">Password :</label>
                                    <input type="password" class="form-control aside-login__input" id="inputPassword" name="inputPassword">
                                </div>
                                    
        
                                <button type="submit" class="btn btn-primary aside-login__btn">Login</button>
                                    
                                </form>
                            </div>';
                        } else {
                            echo '
                            <div class="user">
                                <h5 class="text-center">Hello !</h5>
                                <h4 class="text-center">'.$pseudo.'</h4>
                                <p class="text-center"><a href="profile.php">Edit your profile</a></p>
                            </div>';
                        }
                    ?>


                <!-- last posts section -->
                <?php include('includes/last_posts.php'); ?>
                <!-- last active users section -->
                <?php include('includes/last_active_users.php');?>

                </aside>
            </div><!-- end of row -->
        </main> <!-- End of main started in header.php -->
    </section> <!-- End of section background started in header.php -->
    
    <section class="social d-flex justify-content-center align-items-center">
        <a href="#"><div class="social__logo d-flex justify-content-center align-items-center"><span class="align-middle"><i class="fa fa-twitter" aria-hidden="true"></i></span></div></a>
        <a href="#"><div class="social__logo d-flex justify-content-center align-items-center"><span class="align-middle"><i class="fa fa-apple" aria-hidden="true"></i></span></div></a>
        <a href="#"><div class="social__logo d-flex justify-content-center align-items-center"><span class="align-middle"><i class="fa fa-facebook" aria-hidden="true"></i></span></div></a>
        <a href="#"><div class="social__logo d-flex justify-content-center align-items-center"><span class="align-middle"><i class="fa fa-codepen" aria-hidden="true"></i></span></div></a>
        <a href="#"><div class="social__logo d-flex justify-content-center align-items-center"><span class="align-middle"><i class="fa fa-google-plus" aria-hidden="true"></i></span></div></a>
        <a href="#"><div class="social__logo d-flex justify-content-center align-items-center"><span class="align-middle"><i class="fa fa-digg" aria-hidden="true"></i></span></div></a>
        <a href="#"><div class="social__logo d-flex justify-content-center align-items-center"><span class="align-middle"><i class="fa fa-pinterest-p" aria-hidden="true"></i></span></div></a>

        
    </section>

    <footer>
        <div class="container">
            <div class="row">
                <div class="footer__arianne col-md-3">
                    <p class ="text-center text-md-left"><?php echo $arianne; ?></p>
                </div>
                    
                <div class="footer__links col-md-9">
                    <p class ="text-center text-md-right align-middle">
                        <a href="#"><i class="fa fa-envelope" aria-hidden="true"></i> Contact us</a>
                        <a href="#"><i class="fa fa-shield" aria-hidden="true"></i> The team</a>    
                        <a href="#"><i class="fa fa-check" aria-hidden="true"></i> Terms</a>   
                        <a href="#"><i class="fa fa-lock" aria-hidden="true"></i> Privacy</a> 
                        <a href="#"><i class="fa fa-users" aria-hidden="true"></i> Members</a> 
                        <a href="#"><i class="fa fa-trash" aria-hidden="true"></i> Delete cookies</a> 
                        All times are UTC</p>
                </div>
            </div>
        </div>
    </footer>

    <?php include "includes/marked.php";?>
    
    <!-- link to BootStrap's script -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js" integrity="sha384-LtrjvnR4Twt/qOuYxE721u19sVFLVSA4hf/rRt6PrZTmiPltdZcI7q7PXQBYTKyf" crossorigin="anonymous"></script>

</body>
</html>