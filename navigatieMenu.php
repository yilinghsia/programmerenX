        <div id='cssmenu'>
            <ul>
                <li class='active'><a href='overzicht.php'><span>Dag overzicht</span></a></li>
                <li class='has-sub'><a href='inbox.php'><span>Berichten</span></a>
                    <ul>
                        <li><a href='inbox.php'><span>Inbox</span></a></li>
                        <li class='last'><a href='create_bericht.php'><span>Stuur bericht</span></a></li>
                    </ul>
                </li>
                <li><a href='create_aanwezig.php'><span>Wie is er thuis?</span></a></li>
                <li class='last'><a href='create_maandoverzicht.php'><span>Maand overzicht</span></a></li>
            </ul>
        </div>
        <?php
        echo "Welkom thuis <a href='gebruikerGegevens.php'>" . $_SESSION['loginnaam'] . "</a> !";
        echo"</br>";
        echo "<a href='logOut.php'>Log uit</a>";
        ?>