<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="style/style.css"/>
        <title>Studentenhuis- Registratie</title>
    </head>
    <body>
        <form action="create_persoon.php" method="post">
        <div id="Registreren">
            <table>
                <tr>
                    <td><h2>Registreer hier</h2></td>
                <tr>
                <tr>
                    <td>Loginnaam</td>
                    <td><input type="text" class="rounded" name="loginnaam" placeholder="Verplicht" required></td>

                </tr>
                <tr>
                    <td>Wachtwoord</td>          
                    <td><input type="text" class="rounded" name="wachtwoord" placeholder="Verplicht" required></td>

                </tr>
                <tr>
                    <td>Voornaam</td>
                    <td><input type="text" class="rounded" name="voornaam" placeholder="Verplicht" required></td>

                </tr>
                <tr>
                    <td>Achternaam</td>
                    <td><input type="text" class="rounded" name="achternaam" placeholder="Verplicht" required></td>

                </tr>
                <tr>
                    <td>Geboortedatum</td>
                    <td><input type="date" class="rounded" name="geboortedatum" placeholder="jjjj-mm-dd" required></td>

                </tr>
                <tr>
                    <td>Geslacht</td>
                    <td><input type='radio' name='geslacht' value='0' checked>Vrouw 
                        <input type='radio' name='geslacht' value='1'>Man
                    </td>
                </tr>
                <tr>
                    <td>Studie</td>
                    <td><input type="text" class="rounded" name="studie" placeholder="Bijv: ICT" ></td>

                </tr>
                <tr>
                    <td>Studiejaar</td>
                    <td><input type="text" class="rounded" name="studiejaar" placeholder='Bijv: 3' ></td>

                </tr>
                <tr>
                    <td>Bijbaan</td>
                    <td><input type="text" class="rounded" name="bijbaan" placeholder="Bijv: Serveerster" ></td>

                </tr>
                <tr>
                    <td>Bijzonder eetgewoonte</td>
                    <td><input type="text" class="rounded" name="eetgewoonte" placeholder="Bijv: Vegetarisch"></td>

                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="Registreer"/>
                        <a href='index.php'><button type="button">Ga terug</button></a></td
                </tr>
            </table>
        </div>
            </form>
    </body>
</html>

