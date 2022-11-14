<?php
function getSupermarketIDs($username)
{
    $query = "SELECT IDSupermercato FROM supermercati WHERE AdminUser = '" . $username . "'";
    $result = mysqli_query($GLOBALS['db'], $query);
    $toReturn = [];
    foreach (mysqli_fetch_all($result) as $current) {
        array_push($toReturn, $current[0]);
    }
    return $toReturn;
}

function getSupermarketNameFromID($supermarketID)
{
    $query = "SELECT Nome FROM `supermercati` WHERE IDSupermercato = " . $supermarketID;
    return mysqli_fetch_assoc(mysqli_query($GLOBALS['db'], $query))["Nome"];
}

function getSupermarketCityFromID($supermarketID)
{
    $query = "SELECT Città FROM `supermercati` WHERE IDSupermercato = " . $supermarketID;
    return mysqli_fetch_assoc(mysqli_query($GLOBALS['db'], $query))["Città"];
}