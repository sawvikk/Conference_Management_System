<?php
require_once 'database/connection.php';

function validateEmail($conn,$data){
    $emailErr = $email= "";
    extract($data);
    if (empty($email)) {
        $emailErr = "Email must be provided";
    } else {
        $email = test_input($email);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email";
        }
    }
    function escapeString($conn, $str)
    {
        return mysqli_real_escape_string($conn, $str);
    }
    $email = $emailErr ? escapeString($conn, $emailErr) : escapeString($conn, $email);
    $emailarr = [ "email" => $email];
    return $emailarr;

}

function validateData($conn, $data)
{

    $nameErr = $emailErr = $passwordErr = $confirm_passwordErr = $contactErr = "";
    $name  = $email = $password = $confirm_password = $contact = "";
    extract($data);

    if (empty($name)) {
        $nameErr = "Name must be provided";
    } else {
        $name = test_input($name);

        if (!preg_match("/[a-zA-Z\s]{3,25}/", $name)) {
            $nameErr = "Invalid name";
        }
    }
    if (empty($email)) {
        $emailErr = "Email must be provided";
    } else {
        $email = test_input($email);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email";
        }
    }
    if (empty($password)) {
        $passwordErr = "Password must be provided";
    } else {
        $password = test_input($password);
        if (!preg_match("/(?!.*\s).{4,10}/", $password)) {
            $passwordErr = "Invalid password";
        }
    }
    if (empty($confirm_password)) {
        $confirm_passwordErr = "Password must be provided";
    } else {
        $confirm_password = test_input($confirm_password);
        if (!preg_match("/(?!.*\s).{4,10}/", $confirm_password)) {
            $confirm_passwordErr = "Invalid password";
        }
    }
    if (empty($contact)) {
        $contactErr = "Contact must be provided";
    } else {
        $contact = test_input($contact);
        if (!preg_match("/01[3-9]{1}[0-9]{8}/", $contact)) {
            $contactErr = "Invalid contact";
        }
    }

    function escapeString($conn, $str)
    {
        return mysqli_real_escape_string($conn, $str);
    }
    $name = $nameErr ? escapeString($conn, $nameErr) : escapeString($conn, $name);
    $email = $emailErr ? escapeString($conn, $emailErr) : escapeString($conn, $email);
    $contact = $contactErr ? escapeString($conn, $contactErr) : escapeString($conn, $contact);
    $password = $passwordErr ? escapeString($conn, $passwordErr) : escapeString($conn, $password);
    $confirm_password = $confirm_passwordErr ? escapeString($conn, $confirm_passwordErr) : escapeString($conn, $confirm_password);

    $arr = ["name" => $name, "email" => $email, "contact" => $contact, "password" => $password, "confirm_password" => $confirm_password];
    return $arr;
}

function validateLoginData($conn, $loginData)
{

    $emailErr = $passwordErr = "";
    $email = $password = "";
    extract($loginData);
    // print_r($loginData);

    if (empty($email)) {
        $emailErr = "Email must be provided";
    } else {
        $email = test_input($email);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email";
        }
    }
    if (empty($password)) {
        $passwordErr = "Password must be provided";
    } else {
        $password = test_input($password);
        if (!preg_match("/(?!.*\s).{4,10}/", $password)) {
            $passwordErr = "Invalid password";
        }
    }

    function escapeLoginString($conn, $str)
    {
        return mysqli_real_escape_string($conn, $str);
    }

    $email = $emailErr ? escapeLoginString($conn, $emailErr) : escapeLoginString($conn, $email);
    $password = $passwordErr ? escapeLoginString($conn, $passwordErr) : escapeLoginString($conn, $password);

    $loginArr = ["email" => $email, "password" => $password];
    return $loginArr;
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = strip_tags($data);
    $data = htmlspecialchars($data);
    return $data;
}

