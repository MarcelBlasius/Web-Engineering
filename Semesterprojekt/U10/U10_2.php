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
    <div class="dropdown">
      <button class="dropbtn">U1</button>
      <div class="dropdown-content">
        <a href="../u1/u1_1.html">Inventors of the Web</a>
      </div>
    </div>
    
    <div class="dropdown">
      <button class="dropbtn">U2</button>
      <div class="dropdown-content">
        <a href="../u2/u2_1.html">Sticky Ueberschrift</a>
        <a href="../u2/u2_2.html">Image Checkbox</a>
        <a href="../u2/u2_3.html">Survey Form</a>
      </div>
    </div>
    <div class="dropdown">
      <button class="dropbtn">U3</button>
      <div class="dropdown-content">
        <a href="../u3/u3_1.html">Flexbox Desktop-First</a>
        <a href="../u3/u3_2.html">Grid Mobile-First</a>
        <a href="../u3/u3_3.html">Responsive mit Grid</a>
      </div>
    </div>
    <div class="dropdown">
      <button class="dropbtn">U4</button>
      <div class="dropdown-content">
        <a href="../u4/u4_1.html">Funktionen</a>
        <a href="../u4/u4_2.html">Objekte</a>
        <a href="../u4/u4_3.html">Fibonacci</a>
      <a href="../u4/u4_4.html">Topsort</a>
      </div>
    </div>
    <div class="dropdown">
      <button class="dropbtn">U5</button>
      <div class="dropdown-content">
        <a href="../u5/u5_1.html">Klasse f�r Vorrangrelationen</a>
        <a href="../u5/u5_2.html">Topologische Iterierbarkeit</a>
        <a href="../u5/u5_3.html">Topologischer Generator</a>
      <a href="../u5/u5_4.html">Proxy</a>
      <a href="../u5/u5_5.html">DeepCopy</a>
      </div>
    </div>
    <div class="dropdown">
      <button class="dropbtn">U6</button>
      <div class="dropdown-content">
        <a href="u6_1">Funktionen in JavaScript</a>
        <a href="u6_2">Textanalyse mit filter-map-reduce</a>
      </div>
    </div>
    <div class="dropdown">
      <button class="dropbtn">U7</button>
      <div class="dropdown-content">
        <a href="#">Link 2</a>
        <a href="#">Link 2</a>
        <a href="#">Link 3</a>
      </div>
    </div><div class="dropdown">
      <button class="dropbtn">U8</button>
      <div class="dropdown-content">
        <a href="#">Link 2</a>
        <a href="#">Link 2</a>
        <a href="#">Link 3</a>
      </div>
    </div><div class="dropdown">
      <button class="dropbtn">U9</button>
      <div class="dropdown-content">
        <a href="#">Link 2</a>
        <a href="#">Link 2</a>
        <a href="#">Link 3</a>
      </div>
    </div>
    <div class="dropdown">
      <button class="dropbtn">U10</button>
      <div class="dropdown-content">
        <a href="#">Link 2</a>
        <a href="#">Link 2</a>
        <a href="#">Link 3</a>
      </div>
    </div>
    <div class="dropdown">
      <button class="dropbtn">U11</button>
      <div class="dropdown-content">
        <a href="#">Link 2</a>
        <a href="#">Link 2</a>
        <a href="#">Link 3</a>
      </div>
    </div>
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
      <p> Semesterprojekt Web-Engineering WS20/21</p>
        <p> von Marcel Blasius </p>
    <div>
</div>

</body>
</html>