<?php

include_once ("./connectionBD.php");
require_once ('./user.php');

$user = new User();
$user->setEmail($_POST['email']);

$conn = openConnection();

if (isset($user)) {
    $emailMyi = mysqli_real_escape_string($conn, $user->getEmail());
    $sql = ("select emailUser from tbUser where emailUser = '$emailMyi'");
    $result = mysqli_query($conn, $sql); // executa
    $result2 = mysqli_fetch_assoc($result); // pega o dado certo
    print_r($result2);
    
    if (empty($result2)) {
        header("Location:indexError.php");
    } else if (!empty($result2)) {
        session_start();
        $_SESSION['user'] = $result2;  // guarda o email do carinha
        header("Location:index_1.php");
    }
    closeConnection($conn);
}
?>
