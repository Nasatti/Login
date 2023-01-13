<?php include "functions.php"; 
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styles.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <title>Login</title>
    </head>
    <body>
        <div class=Contacts>
            <?php include 'menu.html'; ?>
        </div><br>
        <div id="form"></div>
        <?php
        $ip = '127.0.0.1';
        $username = 'root';
        $pwd = '';
        $database ='credenziali';
        $connection= new mysqli($ip, $username, $pwd, $database);
        if($connection->connect_error){
            die('c\è stato un errore: '.$connection->connect_error);
        }

        if(isset($_POST['em']) and isset($_POST['psw'])){
            $email = $_POST['em'];
            $password = $_POST['psw'];
            $sql = 'SELECT * FROM credentials WHERE email="'.$email.'" AND password="'.md5($password).'";';
            $response = $connection->query($sql);
            if ($response->num_rows > 0) {
                $data = $response->fetch_array();
                $_SESSION['nome']=$data['nome'];
                $_SESSION['cognome']=$data['cognome'];
                $_SESSION['email']=$data['email'];
                $_SESSION['password']=$data['password'];
                header('Location: dashboard.php');
            }
            else {
                echo '<div class="alert alert-danger my-4">Credenziali sbagliate</div>';
            }
        }
        else if(isset($_POST['email'])){
            $nome = $_POST['nome'];
            $cognome = $_POST['cognome'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            
            $sql = 'INSERT INTO credentials (email, password, nome, cognome) VALUES ("'.$_POST['email'].'","'.md5($_POST['password']).'", "'.$_POST['nome'].'", "'.$_POST['cognome'].'")';
            echo $sql;
            if ($connection->query($sql)) {
                header('Location: index.php?error=none');
            }
        }
        else if(isset($_GET['error'])){
            if ($_GET['error'] == 'credenziali') {
                echo '<div class="alert alert-danger" role="alert">Login incoretto!</div>';
            }
        }
        
        ?>
    <script src="script.js"></script>
    </body>
</html>