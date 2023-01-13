login = true;
login ="<div class=center_form><form method='POST' action='index.php'><h1>Login</h1><label for='email'>Email</label><input type='email' name='em' placeholder='email' required ><label for='password'>Password</label><input type='password' name='psw' placeholder='password' required><input type='submit' value='Sign in'></form><p>Non ti sei ancora registrato? <button id='submit' class='button'>SIGN UP</button></p></div>";
signup ="<div class=center_form><form method='POST' action='index.php'><h1>Registrati</h1><label for='nome'>Nome</label><input type='text' name='nome' placeholder='nome' required autocomplete='off'><label for='cognome'>Cognome</label><input type='text' name='cognome' placeholder='cognome' required autocomplete='off'><label for='email'>Email</label><input type='email' name='email' placeholder='email' autocomplete='off' required><label for='password'>Password</label><input type='password' name='password' placeholder='password' required autocomplete='off'><input type='submit' value='Sign up'></form><p>Ti sei già registrato? <a href='index.php'>Sign in</a></p></div>";
if(login) document.getElementById("form").innerHTML = login;
else document.getElementById("form").innerHTML = signup;

document.getElementById('submit').onclick = () => {
    if (login) login = false 
    else login = true
    Change(login)
}

function Change(login){
    if(login) document.getElementById('form').innerHTML = login;
    else document.getElementById("form").innerHTML = signup;
}