<?php



if(isset($_POST["submit"])) {

    $name = $_POST["name"]; 
    $email = $_POST["email"]; 
    $username = $_POST["uid"]; 
    $pwd = $_POST["pwd"]; 
    $pwdRepeat = $_POST["pwdRepeat"]; 


    require_once 'dbh.inc.php';
    require_once 'function.inc.php';

if(emptyInputSignup($name, $email, $username, $pwd, $pwdRepeat) !== false) {
    header("Location: /projet_cinema/signup.php?error=imptyinput");
exit();
}

if(invalidUid($username) !== false) {
    header("Location: /projet_cinema/signup.php?error=invalidUsername");
exit();
}

if(invalidEmail($email) !== false) {
    header("Location: /projet_cinema/signup.php?error=invalideEmail");
exit();
}

if(pwdMatch($pwd, $pwdRepeat) !== false) {
    header("Location: /projet_cinema/signup.php?error=passwordnotsame");
exit();
}

if(uidExist($conn, $username, $email) !== false) {
    header("Location: /projet_cinema/signup.php?error=usernametaken");
exit();
}


createUser($conn, $name, $email, $username, $pwd);


}else {
    header("Location: /projet_cinema/signup.php?error=none");
exit();
}