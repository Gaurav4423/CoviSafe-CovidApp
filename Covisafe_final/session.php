<?php

session_start();

if( isset($_SESSION["covisafeDBA"]) && $_SESSION["covisafeDBA"]===true)
{
    header("location: welcome.php");
}
?>