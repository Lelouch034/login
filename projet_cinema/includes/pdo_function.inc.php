<?php

//function pour sign-up

 function emptyInputSignup($name, $email, $username, $pwd, $pwdRepeat) {
    $result = "";

    if(empty($name) || empty($email) || empty($username)|| empty($pwd)|| empty($pwdRepeat)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result; 
}


function invalidUid($username) {
    $result = "";

    if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function invalidEmail($email) {
    $result = "";

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}




function pwdMatch($pwd, $pwdRepeat) {
    $result = "";

    if ($pwd !== $pwdRepeat) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}


function uidExist($conn, $username, $email) {
   $sql = "SELECT * FROM users WHERE usersUid = :username OR usersEmail = :email";;
   $stmt = $conn->prepare($sql);
   if(!$stmt) {
    header("Location: /projet_cinema/signup.php?error=stmtfailed");
exit();
   }


   $stmt->bindParam(":username", $username, PDO::PARAM_STR);
   $stmt->bindParam(":email", $email, PDO::PARAM_STR);
   $stmt->execute();

   $resultData = $stmt->fetch(PDO::FETCH_ASSOC);

   if($resultData) {
        return $resultData;
   }
   else {
    $result = false;
    return $result;
   }

   
}



function createUser($conn, $name, $email, $username, $pwd) {
    $sql = "INSERT INTO users (usersName, usersEmail, usersUid, usersPwd) VALUES (:name, :email, :username, :pwd); ";
    $stmt = $conn->prepare($sql);
    if(!$stmt) {
        header("Location: /projet_cinema/signup.php?error=stmtfailed");
        exit();
    }


    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
 
 
    $stmt->bindParam(":name", $name, PDO::PARAM_STR);
    $stmt->bindParam(":email", $email, PDO::PARAM_STR);
    $stmt->bindParam(":username", $username, PDO::PARAM_STR);
    $stmt->bindParam(":pwd", $hashedPwd, PDO::PARAM_STR);
    $stmt->execute();
    
    header("Location: /projet_cinema/signup.php?error=none");
exit();
 }
 

 //function de login


 function emptyInputLogin( $username, $pwd) {
    $result = "";

    if(empty($username) ||  empty($pwd)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result; 
}


function loginUser($conn, $username, $pwd) {
    $uidExists = uidExist($conn, $username, $username); 

    if($uidExists == false) {
        header("Location: /projet_cinema/login.php?error=wronglogin");
        exit();
    }

    $pwdHashed = $uidExists["usersPwd"];
    $checkPwd = password_verify($pwd, $pwdHashed);


    if($checkPwd == false) {
        header("Location: /projet_cinema/login.php?error=wronglogin");
        exit();
    }
    else if ($checkPwd == true) {
        session_start();
    $_SESSION["usersid"] = $uidExists["usersid"];
    $_SESSION["usersuid"] = $uidExists["usersUid"];

    header("Location: /projet_cinema/index.php");
    exit();
}
}
