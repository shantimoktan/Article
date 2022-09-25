<?php

function checkIfEmailExist($email, $conn)
{
    $selectEmailQuery = "SELECT email FROM users WHERE email='$email'";
    $result = $conn->query($selectEmailQuery);
    if ($result->num_rows > 0) {
        return false;
    } else {
        return true;
    }
}

function checkIfCategoryExist($name, $conn)
{
    $selectCategoryQuery = "SELECT name FROM category WHERE name='$name'";
    $result = $conn->query($selectCategoryQuery);
    if ($result->num_rows > 0) {
        return false;
    } else {
        return true;
    }
}

function isSamePassword($userPassword, $dbPassword)
{
    return password_verify($userPassword, $dbPassword);
}

function getCategorybyId($id, $conn)
{
    $selectCategoryQuery = "SELECT name FROM category WHERE id='$id'";
    $result = $conn->query($selectCategoryQuery);
    while ($row = $result->fetch_assoc()) {
        return $row['name'];
    }
}
