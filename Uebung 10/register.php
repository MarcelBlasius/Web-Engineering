<!doctype html>
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