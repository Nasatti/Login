<?php

$ip = 'localhost';
$username = 'root';
$pwd = '';
$database ='credenziali';
$connection= new mysqli($ip, $username, $pwd, $database);
if($connection->connect_error){
    die('c\è stato un errore: '. $connection->connect_error);
}

$sql = 'CREATE TABLE `credenziali`.`credentials` ( `id` INT NOT NULL AUTO_INCREMENT , `email` VARCHAR(255) NOT NULL , `password` VARCHAR(255) NOT NULL , `nome` VARCHAR(255) NOT NULL , `cognome` VARCHAR(255) NOT NULL , PRIMARY KEY (`id`), UNIQUE `idx_email` (`email`)) ENGINE = InnoDB;';
$connection->query($sql);

?>