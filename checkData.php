<?php

include_once ('./connectionBD.php');
$name = $_POST['registeredName'];
$lastName = $_POST['registeredLastName'];
$email = $_POST['registeredEmail'];
$nickname = $_POST['registeredNickname'];
$password = $_POST['registeredPassword'];
$password2 = $_POST['registeredPassword'];
$genre = $_POST['registeredGenre'];
// senha criptografada
$password = sha1($password);
if ($genre == "masculino") {
    $photo = "imagens/icones/OutrosIcones/userPatternMale.png";
} else {
    $photo = "imagens/icones/OutrosIcones/userPatternFamale.png";
}

$conn = openConnection();

$sql = ("select emailUser from tbUser where emailUser = '$email'");
$result = mysqli_query($conn, $sql);
$sql2 = ("select nicknameUser from tbUser where nicknameUser = '$nickname'");
$result2 = mysqli_query($conn, $sql2);

if (mysqli_num_rows($result) > 0) {
    echo '<script>alert("email já cadastrado.");</script>';
}
if (mysqli_num_rows($result2) > 0) {
    echo '<script>alert("nickname já cadastrado.");</script>';
}

if (mysqli_num_rows($result2) == 0 && mysqli_num_rows($result2) == 0) {
    $sql = ("insert into tbUser(nameUser, lastNameUser ,emailUser,passwordUser,nicknameUser,photoUser, genreUser) values ('$name', '$lastName','$email','$password','$nickname', '$photo', '$genre')");
    if (mysqli_query($conn, $sql)) {
        header("Location:index.php");
    } else {
        echo('Não cadastrou não e.e');
    }
}
closeConnection($conn);

/* VERIFICAR SE O EMAIL EXISTE PARA LOGAR */

// guardar isso aqui no banco de dados mysql phpMyAdmin
// aqui fazer verificação de nickname = não pode ter palavrão, e ser menor que 5 letras
// verificar se a senha está segura(segundo nós)
// verificar se o email existe mesmo
?>
