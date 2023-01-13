<?php
class User {

    public $email;
    public $psw;
    public $name;
    public $cognome;
    public $date;
    
function __construct($name, $cognome, $email, $date, $psw) {
    $this->email = $email;
    $this->psw = $psw;
    $this->name = $name;
    $this->cognome = $cognome;
    $this->date = $date;
}
}
function Controllo(){
    $ip = '127.0.0.1';
    $username = 'root';
    $pwd = '';
    $database ='pagella';
    $connection= new mysqli($ip, $username, $pwd, $database);
    if($connection->connect_error){
        die('c\è stato un errore: '.$connection->connect_error);
    }

}

function login($email, $psw){
    $file = fopen('credenziali.json', 'r');
    $json = fread($file, filesize('credenziali.json'));
    $json = json_decode($json);
    foreach($json as &$value) {
        if ($email == $value->email && md5($psw) == $value->psw) {
            return true;
        }
    }
    return false;
}
function signup($name, $cognome, $email, $data, $psw){

    $user = new User($name, $cognome, $email, $data, $psw);
    $file = fopen('credenziali.json', 'r');
    $json = fread($file, filesize('credenziali.json'));
    $json = json_decode($json);
        array_push($json, $user);
        $json = json_encode($json);
        file_put_contents('credenziali.json', $json);
        return true;
}
?>