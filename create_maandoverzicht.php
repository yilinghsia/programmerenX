<!DOCTYPE html>
<?php
require "Bootstrap.php";
require 'src/Kalenderpunt.php';
session_start();
if (!isset($_SESSION['loginnaam'])) {
    header("location:index.php");
}
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="style/style.css"/>
        <title>Studentenhuis</title>
    </head>
    <body>
        <?php
        include('navigatieMenu.php');
        ?>
        <div id="content">
            <a href="create_kalenderpunt.php"> Maak nieuwe punt aan</a>
            <?php
            $naamInSession = $_SESSION['loginnaam'];
            $dql = "SELECT g FROM Persoon g WHERE g.Loginnaam='$naamInSession'";
            $query = $entityManager->createQuery($dql)
                    ->getResult();

            foreach ($query AS $gebruiker) {
                $gebruikerId = $gebruiker->getId();
            }
            function draw_calendar($month, $year, $events = array()) {
                /* draw table */
                $calendar = '<table cellpadding="0" cellspacing="0" class="calendar">';

                /* table headings */
                $headings = array('Zondag', 'Maandag', 'Dinsdag', 'Woensdag', 'Donderdag', 'Vrijdag', 'Zaterdag');
                $calendar.= '<tr class="calendar-row"><td class="calendar-day-head">' . implode('</td><td class="calendar-day-head">', $headings) . '</td></tr>';

                /* days and weeks vars now ... */
                $running_day = date('w', mktime(0, 0, 0, $month, 1, $year));
                $days_in_month = date('t', mktime(0, 0, 0, $month, 1, $year));
                $days_in_this_week = 1;
                $day_counter = 0;
                $dates_array = array();

                /* row for week one */
                $calendar.= '<tr class="calendar-row">';

                /* print "blank" days until the first of the current week */
                for ($x = 0; $x < $running_day; $x++):
                    $calendar.= '<td class="calendar-day-np"> </td>';
                    $days_in_this_week++;
                endfor;


                /* keep going with days.... */
                for ($list_day = 1; $list_day <= $days_in_month; $list_day++):
                    $calendar.= '<td class="calendar-day"><div style="position:relative;height:100px;">';
                    /* add in the day number */
                    if ($list_day < 10) {
                        $list_day = str_pad($list_day, 2, '0', STR_PAD_LEFT);
                    }

                    $calendar.= '<div class="day-number">' . $list_day . '</div>';

                    $event_day = $year . '-' . $month . '-' . $list_day;
                    if (isset($events[$event_day])) {
                        foreach ($events[$event_day] as $event) {

                            $calendar.= '<a href="kalenderpunt_info.php?id=' . $event['id'] . '">' . $event['Naam'] . '</a>';
                        }
                    } else {
                        $calendar.= str_repeat('<p></p>', 2);
                    }
                    $calendar.= '</div></td>';
                    if ($running_day == 6):
                        $calendar.= '</tr>';
                        if (($day_counter + 1) != $days_in_month):
                            $calendar.= '<tr class="calendar-row">';
                        endif;
                        $running_day = -1;
                        $days_in_this_week = 0;
                    endif;
                    $days_in_this_week++;
                    $running_day++;
                    $day_counter++;
                endfor;

                /* finish the rest of the days in the week */
                if ($days_in_this_week < 8):
                    for ($x = 1; $x <= (8 - $days_in_this_week); $x++):
                        $calendar.= '<td class="calendar-day-np"> </td>';
                    endfor;
                endif;

                /* final row */
                $calendar.= '</tr>';

                /* end the table */
                $calendar.= '</table>';

                /* all done, return result */
                return $calendar;
            }

            /* date settings */
            $currentDate = date('F Y');
            $month = date('m', strtotime($currentDate));
            $year = date('Y', strtotime($currentDate));


            /* haal alle events op voor de maand */
            $events = array();
            $host = "localhost";
            $username = "root";
            $password = "";
            $db_name = "studentenhuis";
            $con = mysql_connect($host, $username, $password);
            $db_link = mysql_select_db($db_name, $con);

            $sql = "SELECT id,Naam,Persoon_id_id,Datum AS Datum FROM Kalenderpunt WHERE Datum LIKE '$year-$month%' AND Persoon_id_id='$gebruikerId'";

            $result = mysql_query($sql, $con) or die('lukt niet' . mysql_error());
            while ($row = mysql_fetch_assoc($result)) {
                $events[$row['Datum']][] = $row;
            }

            echo "<h2>" . $currentDate . "</h2>";

            echo draw_calendar($month, $year, $events);
            ?>

        </div>  