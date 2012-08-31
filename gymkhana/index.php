<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--
Design by Free CSS Templates
http://www.freecsstemplates.org
Released for free under a Creative Commons Attribution 3.0 License

Name       : Big Business 2.0
Description: A two-column, fixed-width design with a bright color scheme.
Version    : 1.0
Released   : 20120624
-->
<html xmlns = "http://www.w3.org/1999/xhtml">
    <head>
        <meta name = "description" content = "" />
        <meta name = "keywords" content = "" />
        <title>
            Gymkhana, IIT Bombay
        </title>
        <meta http-equiv = "content-type" content = "text/html; charset=utf-8" />
        <link rel = "stylesheet" type = "text/css" href = "style.css" />



        <!-- Add mousewheel plugin (this is optional) -->





        +		
        <script type="text/javascript" src="jquery-1.7.1.min.js"></script>
        <script type = "text/javascript" src = "jquery.dropotron-1.0.js">
        -		</script>
        	<script type = "text/javascript" src = "jquery.slidertron-1.1.js">
        -		</script>
        <script type="text/javascript" src="/fancybox/lib/jquery.mousewheel-3.0.6.pack.js"></script>

        <!-- Add fancyBox -->
        <link rel="stylesheet" href="fancybox/source/jquery.fancybox.css?v=2.1.0" type="text/css" media="screen" />
        <script type="text/javascript" src="fancybox/source/jquery.fancybox.pack.js?v=2.1.0"></script>



        <script>
                  
		
              
            $(document).ready(function() {
                        
                $('#menu > ul').dropotron({mode: 'fade',globalOffsetY: 11,offsetY: -15 });
                    -				$('#slider').slidertron({viewerSelector: '.viewer',indicatorSelector: '.indicator span',reelSelector: '.reel',slidesSelector: '.slide',speed: 'slow',advanceDelay: 4000});
                        
                        
                /*
                 *  Simple image gallery. Uses default settings
                 */

                $(".fancybox").fancybox();

                /*
                 *  Different effects
                 */

                // Change title type, overlay closing speed
            });
	
                    
			
        </script>
        <?php
        include 'includes/db.inc.php';
        date_default_timezone_set('Asia/Kolkata');
        $points = mysqli_query($link, "SELECT * FROM pointstally"); //get all the data from the database
        // variables to store the data
        $hostels = array();
        $sports = array();
        $tech = array();
        $cult = array();
        $i = 1; // Loop
        while ($row = mysqli_fetch_array($points)) {
            $hostels[$i] = $row['name'];
            $sports[$i] = $row['sports'];
            $cult[$i] = $row['cult'];
            $tech[$i] = $row['tech'];
            $i++;
        }

        // Getting the posters from the directory
        function getDirectoryList($directory) {
            // create an array to hold directory list
            $results = array();
            // create a handler for the directory
            $handler = opendir($directory);
            // open directory and walk through the filenames
            while ($file = readdir($handler)) {
                // if file isn't this directory or its parent, add it to the results
                if ($file != "." && $file != "..") {
                    $results[] = $file;
                }
            }
            // tidy up: close the handler
            closedir($handler);
            // done!
            return $results;
        }

        // Function to output the images
        function print_images() {
            include 'includes/db.inc.php';
            $level1 = getDirectoryList('posters/');
            $count1 = count($level1);
            $imagecount = 0;
            echo "<div class = 'viewer'>";
            echo "<div class = 'reel'>";
            for ($i = 0; $i < $count1; $i++) {
                if (!(($level1[$i] == 'hostel') || ($level1[$i] == 'misc'))) {
                    $path1 = 'posters/' . $level1[$i] . '/';
                    $level2 = getDirectoryList($path1);
                    $count2 = count($level2);
                    for ($j = 0; $j < $count2; $j++) {
                        $path2 = $path1 . $level2[$j] . '/';
                        $images = getDirectoryList($path2);
                        $count3 = count($images);
                        for ($k = 0; $k < $count3; $k++) {
                            $imagepath = $path2 . $images[$k];
                            $currentdate = date("Y-m-d");
                            $datecheck = "SELECT event_date FROM poster WHERE path_poster='$imagepath'";
                            $sqllink = mysqli_query($link, $datecheck);
                            $array = mysqli_fetch_array($sqllink);
                            if ($array['event_date'] < $currentdate) {
                                continue;
                            }
                            echo "<div class = 'slide'><img src='";
                            echo $path2 . $images[$k];
                            echo "' /></div>";
                            $imagecount++;
                        }
                    }
                } else {
                    $path1 = 'posters/' . $level1[$i] . '/';
                    $images = getDirectoryList($path1);
                    $count2 = count($images);
                    for ($j = 0; $j < $count2; $j++) {
                        $imagepath = $path2 . $images[$k];
                        $currentdate = date("Y-m-d");
                        $datecheck = "SELECT event_date FROM poster WHERE path_poster='$imagepath'";
                        $sqllink = mysqli_query($link, $datecheck);
                        $array = mysqli_fetch_array($sqllink);
                        if ($array['event_date'] < $currentdate) {
                            continue;
                        }
                        echo "<div class = 'slide'><img src='";
                        echo $path1 . $images[$j];
                        echo "' /></div>";
                        $imagecount++;
                    }
                }
            }
            if ($imagecount == 0) {
                echo "<div class = 'slide'><img src = 'images/iitb.jpg' /></div>";
                $imagecount++;
            }
            echo "</div></div>";
            echo "<div class = 'indicator'>";
            for ($i = 0; $i < $imagecount; $i++) {
                $j = $i + 1;
                echo "<span>";
                echo $j;
                echo "</span>";
            }
            echo "</div>";
        }

        function ends_With($haystack, $needle) {
            $length = strlen($needle);
            if ($length == 0) {
                return true;
            }
            return (substr($haystack, -$length) === $needle);
        }
        ?>
    </head>
    <body>
        <div id = "wrapper">
            <div id = "header">
                <div id = "logo">
                    <h1>


                        <a href = "index.php">
                            Gymkhana, IIT Bombay
                        </a>
                    </h1>
                </div>
                <div id = "slogan">
                    <h2>
                        Hub for all student activities
                    </h2>
                </div>
            </div>
            <div id = "menu">
                <ul>
                    <li>
                        <b>
                            <a href = "index.php">
                                Home
                            </a>
                        </b>
                    </li>
                    <li>
                        <a href = "office.php">
                            Office Bearers
                        </a>
                    </li>
                    <li>
                        <span class = "opener">
                            Other Gymkhana Links
                        </span>
                        <ul>
                            <li>
                                <a href = "http://gymkhana.iitb.ac.in/~hostels/" target = "_blank">
                                    IIT Bombay Hostel Affairs
                                </a>
                            </li>
                            <li>
                                <a href = "http://gymkhana.iitb.ac.in/~sports/" target = "_blank">
                                    IIT Bombay Sports
                                </a>
                            </li>
                            <li>
                                <a href = "http://gymkhana.iitb.ac.in/~cultural/" target = "_blank">
                                    IIT Bombay Cultural
                                </a>
                            </li>
                            <li>
                                <a href = "http://sarc-iitb.org/" target = "_blank">
                                    Student Alumni Relations Cell
                                </a>
                            </li>
                            <li>
                                <a href = "http://www.moodi.org/" target = "_blank">
                                    Mood Indigo, IIT Bombay
                                </a>
                            </li>
                            <li>
                                <a href = "http://www.techfest.org/" target = "_blank">
                                    Techfest, IIT Bombay
                                </a>
                            </li>
                            <li>
                                <a href = "http://gymkhana.iitb.ac.in/~ugacademics/" target = "_blank">
                                    IIT Bombay Academics (UG)
                                </a>
                            </li>
                            <li>
                                <a href = "http://gymkhana.iitb.ac.in/~academics/pgacademics/" target = "_blank">
                                    IIT Bombay Academics (PG)
                                </a>
                            </li>
                            <li>
                                <a href = "http://stab-iitb.org/" target = "_blank">
                                    Students' Technical Activities Body
                                </a>
                            </li>
                            <li>
                                <a href = "http://ecell.in" target = "_blank">
                                    Entrepreneurship Cell
                                </a>
                            </li>
                            <li>
                                <a href = "http://www.insightiitb.org/" target = "_blank">
                                    InsIghT
                                </a>
                            </li>
                            <li>
                                <a href = "http://www.iitb.ac.in/students/aawaaz.html" target = "_blank">
                                    आवाज़
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href = "cms.php">
                            Complaints
                        </a>
                    </li>
                    <li>
<?php
if (isset($_COOKIE['login'])) {
    ?>
                            <span class = "opener">
                                Admin Menu
                            </span>
                            <ul>
                                <li>
                                    <a href = "admin.php">
                                        Admin Home
                                    </a>
                                </li>
                                <li>
                                    <a href = "upload.php">
                                        Upload Posters
                                    </a>
                                </li>
                                <li>
                                    <a href = "points.php">
                                        Edit GC Points Tally
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href = "logout.php">
                                Logout
                            </a>
    <?php
} else {
    ?>
                            <a href="login.php">
                                Admin Login
                            </a>
    <?php
}
?>
                    </li>
                </ul>
                <br class = "clearfix" />
            </div>
            <center>
                <div id = "slider">
                        <?php
                        print_images();
                        ?>
                </div>
            </center>
            <div id = "page">
                <div id = "content">
                    <div class = "box">
                        <p align = "justify">
                            <a class="fancybox" rel="group" href="1_b.jpg"><img src="1_s.jpg" alt="" /></a>
                            The Students’ Gymkhana along with its infrastructure is an organization to foster and develop all student activities in the Institute. It aims at promoting and developing organizational abilities in students. It has been successful over the years in evolving a well-informed, articulate and participatory student community life. It has been instrumental in identifying student issues and promoting discussion on them. It functions as the office for all election and nominations of students for gymkhana activities. The official year for all working shall be from the first day of April to the thirty-first day of March of the ensuing Calendar Year. This is also the period during which student officials of the Gymkhana hold tenure.
                        </p>
                    </div>
                    <br class = "clearfix" />
                </div>
                <div id = "sidebar">
                    <div class = "box">
                        <h3>
                            Events
                        </h3>
                        <iframe src = "https://www.google.com/calendar/embed?title=IIT&amp;height=450&amp;wkst=2&amp;bgcolor=%23FFFFFF&amp;src=pratyushnalam08%40gmail.com&amp;color=%232952A3&amp;src=%23contacts%40group.v.calendar.google.com&amp;color=%23875509&amp;src=en.indian%23holiday%40group.v.calendar.google.com&amp;color=%232F6309&amp;ctz=Asia%2FCalcutta" style = "border-width:0" width = "220" height = "450" frameborder = "0" scrolling = "no">
                        </iframe>
                    </div>
                    <div class = "box">
                        <h3>
                            GC Points Tally
                        </h3>
                        <table cellspacing = "5">
                            <tr>
                                <th>
                                    Hostel
                                </th>
                                <th>
                                    Tech
                                </th>
                                <th>
                                    Cult
                                </th>
                                <th>
                                    Sports
                                </th>
                            </tr>
<?php
for ($i = 1; $i < 16; $i++) {
    echo "<tr><th align = 'center'>";
    echo $i == 15 ? "Tansa" : $i;
    echo "</th><td align = 'center'>";
    echo "$tech[$i]";
    echo "</td><td align = 'center'>";
    echo "$cult[$i]";
    echo "</td><td align = 'center'>";
    echo "$sports[$i]";
    echo "</td></tr>";
}
?>
                        </table>
                    </div>
                </div>
                <br class = "clearfix" />
            </div>
            <div id = "page-bottom">
                <div id = "page-bottom-content">
                            <?php
                            include 'includes/footer.inc.php';
                            ?>
                </div>
                <br class = "clearfix" />
            </div>
        </div>




    </body>
</html>
