<?php
    session_start();
    include "includes/connect.php";
    include "includes/header.php";


?>


<h1>Register</h1>

<form class="form" action="" method="POST">
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputUserId">ID User</label>
            <input type="text" class="form-control" id="inputUserId" name="inputUserId" placeholder="Enter your ID">
        </div>
        <div class="form-group col-md-6">
            <label for="inputUsername">Username</label>
            <input type="text" class="form-control" id="inputUsername" name="inputUsername" placeholder="Enter your name">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputEmail">E-mail</label>
            <input type="email" class="form-control" id="inputEmail" name="inputEmail" placeholder="Enter your e-mail">
        </div>
        <div class="form-group col-md-6">
            <label for="inputAvatar">Avatar</label>
            <input type="text" class="form-control" id="inputAvatar" name="inputAvatar" placeholder="Enter your Avatar">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputUserSignature">Signature</label>
            <input type="text" class="form-control" id="inputUserSignature" name="inputUserSignature" placeholder="Enter your Signature">
        </div>
        <div class="form-group col-md-6">
            <label for="inputPassword">Password</label>
            <input type="password" class="form-control" id="inputPassword" name="inputPassword" placeholder="Enter your Password">
        </div>
    </div>
        <button type="submit" class="btn btn-primary">Submit</button>
</form>


    


<?php
    include "includes/footer.php";
?>