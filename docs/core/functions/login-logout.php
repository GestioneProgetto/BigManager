<?php
include_once 'core/functions/connectToDB.php';
session_start();
// initializing variables
$username = "";
$email = "";
$errors = array();

// REGISTER USER
if (isset($_POST['reg_user'])) {
    // receive all input values from the form
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

    $name = mysqli_real_escape_string($db, $_POST['name']);
    $surname = mysqli_real_escape_string($db, $_POST['surname']);
    $birthday = mysqli_real_escape_string($db, $_POST['birthday']);
    $city = mysqli_real_escape_string($db, $_POST['city']);
    $address = mysqli_real_escape_string($db, $_POST['address']);
    $province = mysqli_real_escape_string($db, $_POST['province']);

    // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array
    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($email)) {
        array_push($errors, "Email is required");
    }
    if (empty($password_1)) {
        array_push($errors, "Password is required");
    }
    if ($password_1 != $password_2) {
        array_push($errors, "The two passwords do not match");
    }

    // first check the database to make sure
    // a user does not already exist with the same username and/or email
    $user_check_query = "SELECT * FROM users WHERE UserName='$username' OR Mail='$email' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user) { // if user exists
        if ($user['UserName'] == $username) {
            array_push($errors, "Username already exists");
        }

        if ($user['Mail'] == $email) {
            array_push($errors, "email already exists");
        }
    }

    // Finally, register user if there are no errors in the form
    if (count($errors) == 0) {
        $password = md5($password_1); //encrypt the password before saving in the database

        $query = "INSERT INTO users (username, Mail, Password) 
  			  VALUES('$username', '$email', '$password')";
        mysqli_query($db, $query);

        if ($birthday != "")
            $query = "INSERT INTO `usersData` (`UserName`, `Nome`, `Cognome`, `DataNascita`, `Indirizzo`, `Città`, `Provincia`)
            VALUES ('$username', '$name', '$surname', '$birthday', '$address', '$city', '$province')";
        else
            $query = "INSERT INTO `usersData` (`UserName`, `Nome`, `Cognome`, `Indirizzo`, `Città`, `Provincia`)
            VALUES ('$username', '$name', '$surname', '$address', '$city', '$province')";
        mysqli_query($db, $query);

        $_SESSION['username'] = $username;
        $_SESSION['success'] = "You are now logged in";
        header('location: /dashboard');
    }
}

// LOGIN USER
if (isset($_POST['login_user'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if (empty($username)) {
        array_push($errors, "Username or email is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }

    if (count($errors) == 0) {
        $password = md5($password);
        $query1 = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $results1 = mysqli_query($db, $query1);
        $query2 = "SELECT * FROM users WHERE mail='$username' AND password='$password'";
        $results2 = mysqli_query($db, $query2);
        if (mysqli_num_rows($results1) == 1 || mysqli_num_rows($results2) == 1) {
            if (mysqli_num_rows($results1) == 1)
                $_SESSION['username'] = $username;
            else
                $_SESSION['username'] = mysqli_fetch_all($results2)[0][0];
            $_SESSION['success'] = "You are now logged in";
            $query = "SELECT IDSupermercato FROM supermercati WHERE AdminUser = '" . $username . "'";
            $result = mysqli_query($db, $query);
            if (mysqli_num_rows($result) > 0) {
                $_SESSION['isSupermarketManager'] = 1;
            }
            header('location: /dashboard');
        } else {
            array_push($errors, "Wrong username/password combination");
        }
    }
}