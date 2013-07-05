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
            <?php
            $huidigeDag = date('Y-m-d');
            $dql = "SELECT k FROM Kalenderpunt k WHERE k.Datum='$huidigeDag'";
            $query = $entityManager->createQuery($dql)
                    ->getResult();

            foreach ($query AS $gebruiker) {
                $gebruikerId = $gebruiker->getNaam();

                echo $gebruikerId;
            }

            function draw_calendar($month, $year) {
                /* draw table */
                $calendar = '<table cellpadding="0" cellspacing="5" class="calendar">';

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
                    $calendar.= '<td class="calendar-day">';
                    /* add in the day number */
                    $calendar.= '<div class="day-number">' . $list_day . '</div>';


                    /** QUERY THE DATABASE FOR AN ENTRY FOR THIS DAY !!  IF MATCHES FOUND, PRINT THEM !! * */

                    $calendar.= str_repeat('<p></p>', 1);

                    $calendar.= '</td>';
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

            $currentDate = date('F Y');
            $maandnummer = date('m', strtotime($currentDate));
            $jaarnummer = date('Y', strtotime($currentDate));
            echo "<h2>" . $currentDate . "</h2>";
            echo draw_calendar($maandnummer, $jaarnummer);
            ?>
            <a href="create_kalenderpunt.php"> Maak nieuwe punt aan</a>
        </div>  