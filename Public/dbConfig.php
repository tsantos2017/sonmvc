<?php
// try{
//     $DBcon = new PDO("mysql:host=localhost;dbname=imoveisprudente_prudente", "imoveisprudente_2017", "s@NEnf5u(0#+");
// }
// catch (PDOException $e){
//     header("location:index.php");
// }
?>

<?php
try{
    $DBcon = new PDO("mysql:host=localhost;dbname=mvc", "root", "");
}
catch (PDOException $e){
    header("location:index.php");
}
?>