<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>
    <link href="css/css.css" rel="stylesheet" type="text/css">
</head>
<body>

<div align="center">
    <form action="login1" id = form1 method="post">
    <p>Login</p>
    <table border="1" wedth=200 align="center">
        <tr align="center" >
            <td>name</td>
            <td ><input id="idname" type="text" name="name"/></td>
        </tr>
        <tr align="center">
            <td >password</td>
            <td ><input id="idpassword" type="password" name="password"/></td>
        </tr>
        <tr >
            <td colspan="2" align="center"><button id="add_submit" name="submit">送出</button></td>
        </tr>
    </form>
</div>
</body>
</html>

