<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="../styles/indexStyle.css" rel="stylesheet" type="text/css">
<style>

</style>
</head>
<body>

<div class="header">
<script src="../structure/getHeader.js"></script>
</div>

    <div class=main> 
    <h1>Login</h1>
<form method="post">
    <fieldset>
        <legend>Einloggen</legend>
        Anzeigename:<br>
        <input type="text" name="anzeigename">
        <br>
        Password:<br>
        <input type="password" name="passwort">
        <br>
        <br>
        <input type="submit" value="anmelden">
    </fieldset>
</form>
<?php
    $anzeigename = $_POST['anzeigename'];
    $passwort = $_POST["passwort"];

    $lines = file("./raw_pwd.csv");
    $gefunden = false;
    foreach($lines as $line_num => $line){
        list( $csvanzeigename, $csvpasswort) = explode(",", $line);
        if($csvanzeigename === hash("sha384", $anzeigename)){
            if($csvpasswort === hash("sha384", $passwort) . "\n"){
                echo "<script>alert('Login erfolgreich!')</script>";
                $gefunden = true;
                break;
            }
        }
    }
    if(!$gefunden){
        echo "<script>alert('Name oder Passwort falsch!')</script>";
    }

?>
    </div>
    <div class="footer">
    <script src="../structure/getFooter.js"></script>
  </div>
</div>

</body>
</html>