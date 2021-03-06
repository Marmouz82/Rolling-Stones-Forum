<?php 
    session_start();
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    $arianne = '<p><a href="index.php"><i class="fa fa-home" aria-hidden="true"></i> Home</a> > Profile</p>';
    $titre = "Profile - Rolling Stones Forum";
    $css = 'form';
?>

<?php

include "includes/connect.php";
include "includes/header.php";
 
if(isset($_SESSION['id'])) {

   $req = $db->prepare("SELECT * FROM users WHERE user_id = ". $_SESSION['id'] ."");
   $req->execute();
   $user = $req->fetch();


   if(isset($_POST['inputUsername']) AND !empty($_POST['inputUsername']) AND $_POST['inputUsername'] != $user['user_name']) {
        $newInputUsername = htmlspecialchars($_POST['inputUsername']);
        $insertUsername = $db->prepare("UPDATE users SET user_name = ? WHERE user_id = ?");
        $insertUsername->execute(array($newInputUsername, $_SESSION['id']));
        $_SESSION['pseudo'] = $newInputUsername;
    }

    if(isset($_POST['inputUserSignature']) AND !empty($_POST['inputUserSignature']) AND $_POST['inputUserSignature'] != $user['user_signature']) {
        $newInputUserSignature = htmlspecialchars($_POST['inputUserSignature']);
        $insertSignature = $db->prepare("UPDATE users SET user_signature = ? WHERE user_id = ?");
        $insertSignature->execute(array($newInputUserSignature, $_SESSION['id']));
    }

    if(isset($_POST['inputPassword']) AND !empty($_POST['inputPassword']) AND isset($_POST['inputPassword2']) AND !empty($_POST['inputPassword2'])) {
        $password1 = hash('sha256', $_POST['inputPassword']);
        $password2 = hash('sha256', $_POST['inputPassword2']);

        if($password1 == $password2) {
            $insertmdp = $db->prepare("UPDATE users SET user_pass = ? WHERE user_id = ?");
            $insertmdp->execute(array($password1, $_SESSION['id']));
            
        } else {
            $msg = "Password and password* must be the same !";
        }
    }

// CHANGEMENT DE L'AVATAR PAR LE USER AVEC LE BOUTON "PARCOURIR"

    if(isset($_FILES['avatar']) AND !empty($_FILES['avatar']['name'])) {  //if(isset($_FILES['avatar']) AND $_FILES['avatar']['error'] == 0) {
        $maxSize = 2097152; //octets
        $validExtensions = array('jpg', 'jpeg', 'png', 'gif');

        if($_FILES['avatar']['size'] <= $maxSize) {
            $extensionUpload = strtolower(substr(strrchr($_FILES['avatar']['name'], '.'), 1));

            if(in_array($extensionUpload, $validExtensions)) {
                $path ="avatars/".$_SESSION['id'].".".$extensionUpload;
                $result = move_uploaded_file($_FILES['avatar']['tmp_name'], $path);

                if($result) {
                    $updateavatar = $db->prepare('UPDATE users SET user_avatar = :avatar WHERE user_id = :id');
                    $updateavatar->execute(array(
                    'avatar' =>"avatars/" . $_SESSION['id'].".".$extensionUpload,
                    'id' => $_SESSION['id']
                    ));
                
                   // header('Location: profile.php?id='.$_SESSION['id']);
                } else {
                    $msg = "Error importing your profile picture";
                }
            } else {
                $msg = "Your profile picture must be in jpg, jpeg, png or gif format";
            }
        } else {
            $msg = "Your profile picture must not exceed 2MB";
        }
    }
}
?>


<h2 class="title">Your profile has been updated</h2>



<p class="resume">Username : <?php echo htmlspecialchars($_POST["inputUsername"]); ?></p>
<p class="resume">Signature : <?php echo htmlspecialchars($_POST["inputUserSignature"]);?></p>
<p class="resume">Avatar : <img src= "<?php echo $path; ?>" class="imgAvatar" width="40" alt="Avatar"/></p>


<?php 
    include "includes/footer.php";
?>