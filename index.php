<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="style/style.css"/>
        <title>Studentenhuis</title>
    </head>
    <body>
        <h1>Welkom thuis...</h1>
        <div id="Inloggen">
            <form name="inloggen" method="post" action="check_login.php">
                <table>
                    <tr>
                        <td><input type="text" class="rounded" name="gebruikersnaam" placeholder="Loginnaam" required/></td>
                    </tr>
                    <tr></tr>
                    <tr>
                        <td><input type="password" class="rounded" name="wachtwoord" placeholder="Wachtwoord" required></td>
                    </tr>
                    <td></td>
                    <tr>
                        <td><input type="submit" name="Submit" value="Kom binnen!"/></td>
                    </tr>
                    <tr> <td><a href ="Registratie.php"><u>Meld je hier aan</u></a></td></tr>
                </table>              
            </form>
        </div>
    </body>
</html>
