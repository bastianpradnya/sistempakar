<?php
    include('login_process.php'); // Memasuk-kan skrip Login 

    if(isset($_SESSION['login_user'])){
        header("location: ../tampilan_pakar/index.php");
    }
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>SISTEM PAKAR DIAGNOSA PENYAKIT AYAM BROILER</title>
</head>
<body>

            <h1>Login</h1>
            
                <form action="login_process.php" class="cmxform" id="contactForm" method="post" >
                    
                        <label for="name">Usename</label></span>
                        <input type="text" id="name" name="username" placeholder="username" /><br/>

                        <label for="email">Password</label></span>
                        <input type="password" id="name" name="password" placeholder="********" /><br/>
					
                        <input class="submit" type="submit" name="submit" value="Login"/>
            
               </form>
</body>
</html>
