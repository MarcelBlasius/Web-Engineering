<!-- angelehnt an den Code Vorlesung 9 PHP !-->
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
    <h1>Registrierung</h1>
<form method="post">
    <fieldset>
        <legend>Einen Account registrieren</legend>
        Anzeigename:<br>
        <input type="text" name="anzeigename">
        <br>
        Password:<br>
        <input type="password" name="passwort">
        <br>
        <br>
        <input type="submit" value="registrieren">
    </fieldset>
</form>


<?php
    if(isset($_POST['anzeigename']) && isset($_POST['passwort'])){
        $anzeigename = $_POST['anzeigename'];
        $passwort = $_POST['passwort'];
        $file = './raw_pwd.csv';
        $new_line = hash("sha384", $anzeigename) . ',' . hash("sha384", $passwort) . "\n";
        if(file_put_contents($file, $new_line, FILE_APPEND | LOCK_EX)){
            echo "<script>alert('Erfolgreich registriert')</script>";
        }
    }
?>
    </div>
    <div class="footer">
    <script src="../structure/getFooter.js"></script>
  </div>
</div>

</body>
</html>