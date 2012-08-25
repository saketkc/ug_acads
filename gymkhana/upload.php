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
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta name = "description" content = "" />
		<meta name = "keywords" content = "" />
		<title>
			Gymkhana, IIT Bombay
		</title>
		<meta http-equiv = "content-type" content = "text/html; charset=utf-8" />
		<link rel = "stylesheet" type = "text/css" href = "style.css" />
		<script type = "text/javascript" src = "jquery-1.7.1.min.js">
		</script>
		<script type = "text/javascript" src = "jquery.dropotron-1.0.js">
		</script>
		<script type = "text/javascript" src = "jquery.slidertron-1.1.js">
		</script>
		<script type = "text/javascript">
			$(function() {
				$('#menu > ul').dropotron({
					mode: 'fade',
					globalOffsetY: 11,
					offsetY: -15
				});
			});
		</script>
		<script type = "text/javascript">
			function setDay (selected)
			{
				var day = document.uploadposter.day;
				day.options.length = 0;
				if (selected == "0")
				{
					day.options[day.options.length] = new Option ("Day", "0");
				}
				else if ((selected == "1") || (selected == "3") || (selected == "5") || (selected == "7") || (selected == "8") || (selected == "10") || (selected == "12"))
				{
					day.options[day.options.length] = new Option ("Day", "0");
					var i;
					for (i = 1; i <= 31; i++)
					{
						day.options[day.options.length] = new Option (i, i);
					}
				}
				else if ((selected == "4") || (selected == "6") || (selected == "9") || (selected == "11"))
				{
					day.options[day.options.length] = new Option ("Day", "0");
					var i;
					for (i = 1; i <= 30; i++)
					{
						day.options[day.options.length] = new Option (i, i);
					}
				}
				else if (selected == "2")
				{
					day.options[day.options.length] = new Option ("Day", "0");
					var year = document.uploadposter.year.value;
					if ((year % 4) == 0)
					{
						if ((year % 100) == 0)
						{
							if ((year % 400) == 0)
							{
								for (i = 1; i <= 29; i++)
								{
									day.options[day.options.length] = new Option (i, i);
								}
							}
							else
							{
								for (i = 1; i <= 28; i++)
								{
									day.options[day.options.length] = new Option (i, i);
								}
							}
						}
						else
						{
							for (i = 1; i <= 29; i++)
							{
								day.options[day.options.length] = new Option (i, i);
							}
						}
					}
					else
					{
						for (i = 1; i <= 28; i++)
						{
							day.options[day.options.length] = new Option (i, i);
						}
					}
				}
			}
			function subCat (selected)
			{
				var subcat = document.uploadposter.subcat;
				subcat.options.length = 0;
				if (selected == "0")
				{
					subcat.disabled = true;
					subcat.options[subcat.options.length] = new Option ("Choose a sub-category", "0");
				}
				else if (selected == "acads")
				{
					subcat.disabled = false;
					subcat.options[subcat.options.length] = new Option ("Choose a sub-category", "0");
					subcat.options[subcat.options.length] = new Option ("Academics (UG)", "acadsug");
					subcat.options[subcat.options.length] = new Option ("Academics (PG)", "acadspg");
				}
				else if (selected == "tech")
				{
					subcat.disabled = false;
					subcat.options[subcat.options.length] = new Option ("Choose a sub-category", "0");
					subcat.options[subcat.options.length] = new Option ("Aeromodelling", "techaero");
					subcat.options[subcat.options.length] = new Option ("Electronics", "techelec");
					subcat.options[subcat.options.length] = new Option ("Krittika", "techkrtka");
					subcat.options[subcat.options.length] = new Option ("Math & Physics", "techmnp");
					subcat.options[subcat.options.length] = new Option ("Robotics", "techrobo");
					subcat.options[subcat.options.length] = new Option ("Web & Coding Club", "techwncc");
				}
				else if (selected == "cult")
				{
					subcat.disabled = false;
					subcat.options[subcat.options.length] = new Option ("Choose a sub-category", "0");
					subcat.options[subcat.options.length] = new Option ("Fourth Wall", "cultdram");
					subcat.options[subcat.options.length] = new Option ("InSync", "cultinsync");
					subcat.options[subcat.options.length] = new Option ("Literary", "cultlit");
					subcat.options[subcat.options.length] = new Option ("Music", "cultmusic");
					subcat.options[subcat.options.length] = new Option ("Pixels", "cultpix");
					subcat.options[subcat.options.length] = new Option ("Rang", "cultpfa");
					subcat.options[subcat.options.length] = new Option ("Silverscreen", "cultfilm");
					subcat.options[subcat.options.length] = new Option ("Speaking", "cultspeak");
				}
				else if (selected == "ib")
				{
					subcat.disabled = false;
					subcat.options[subcat.options.length] = new Option ("Choose a sub-category", "0");
					subcat.options[subcat.options.length] = new Option ("Mood Indigo", "ibmi");
					subcat.options[subcat.options.length] = new Option ("Techfest", "ibtf");
					subcat.options[subcat.options.length] = new Option ("SARC", "ibsarc");
					subcat.options[subcat.options.length] = new Option ("Entrepreneurship Cell", "ibecell");
					subcat.options[subcat.options.length] = new Option ("InsIghT", "ibinsight");
					subcat.options[subcat.options.length] = new Option ("आवाज़", "ibaawaaz");
				}
				else if (selected == "sports")
				{
					subcat.disabled = false;
					subcat.options[subcat.options.length] = new Option ("Choose a sub-category", "0");
					subcat.options[subcat.options.length] = new Option ("Athletics", "spoathletics");
					subcat.options[subcat.options.length] = new Option ("Badminton", "spobaddy");
					subcat.options[subcat.options.length] = new Option ("Basketball", "spobasky");
					subcat.options[subcat.options.length] = new Option ("Cricket", "spocricket");
					subcat.options[subcat.options.length] = new Option ("Football", "spofooter");
					subcat.options[subcat.options.length] = new Option ("Hockey", "spohockey");
					subcat.options[subcat.options.length] = new Option ("Kho-kho", "spokhokho");
					subcat.options[subcat.options.length] = new Option ("Snooker", "sposnooker");
					subcat.options[subcat.options.length] = new Option ("Squash", "sposquash");
					subcat.options[subcat.options.length] = new Option ("Swimming", "sposwim");
					subcat.options[subcat.options.length] = new Option ("Table Tennis", "spott");
					subcat.options[subcat.options.length] = new Option ("Tennis", "spotennis");
					subcat.options[subcat.options.length] = new Option ("Volleyball", "spovolley");
					subcat.options[subcat.options.length] = new Option ("Weightlifting", "spoweight");
				}
				else if (selected == "hostel")
				{
					subcat.disabled = true;
					subcat.options[subcat.options.length] = new Option ("No sub-categories", "0");
				}
				else if (selected == "misc")
				{
					subcat.disabled = true;
					subcat.options[subcat.options.length] = new Option ("No sub-categories", "0");
				}
			}
		</script>
		<?php
			date_default_timezone_set ('Asia/Kolkata');
			include 'includes/db.inc.php';
			$points = mysqli_query($link, "SELECT * FROM pointstally");
			$hostels = array();
			$sports = array();
			$tech = array();
			$cult = array();
			$i = 1;
			while ($row = mysqli_fetch_array($points))
			{
				$hostels[$i] = $row['name'];
				$sports[$i] = $row['sports'];
				$cult[$i] = $row['cult'];
				$tech[$i] = $row['tech'];
				$i++;
			}
			function getDirectoryList ($directory) 
			{
				// create an array to hold directory list
				$results = array();
				// create a handler for the directory
				$handler = opendir($directory);
				// open directory and walk through the filenames
				while ($file = readdir($handler))
				{
					// if file isn't this directory or its parent, add it to the results
					if ($file != "." && $file != "..")
					{
						$results[] = $file;
					}
				}
				// tidy up: close the handler
				closedir($handler);
				// done!
				return $results;
			}
			function print_images ()
			{
				include 'includes/db.inc.php';
				$level1 = getDirectoryList ('posters/');
				$count1 = count ($level1);
				for ($i = 0; $i < $count1; $i++)
				{
					if (!(($level1[$i] == 'hostel') || ($level1[$i] == 'misc')))
					{
						$path1 = 'posters/' . $level1[$i] . '/';
						$level2 = getDirectoryList ($path1);
						$count2 = count ($level2);
						for ($j = 0; $j < $count2; $j++)
						{
							$path2 = $path1 . $level2[$j] . '/';
							$images = getDirectoryList ($path2);
							$count3 = count ($images);
							for ($k = 0; $k < $count3; $k++)
							{
								$imagepath = $path2 . $images[$k];
								$currentdate = date("Y-m-d");
								$datecheck = "SELECT event_date FROM poster WHERE path_poster='$imagepath'";
								$sqllink = mysqli_query ($link, $datecheck);
								$array = mysqli_fetch_array ($sqllink);
								if ($array['event_date'] < $currentdate)
								{
									continue;
								}
								echo "<a href = '";
								echo $path2 . $images[$k];
								echo "'><img src = '";
								echo $path2 . $images[$k];
								echo "' width = '75' height = '75' /></a>";
								echo "&nbsp;&nbsp;&nbsp;&nbsp;";
								echo "<a href = 'delete.php?file=";
								echo $path2 . $images[$k];
								echo "'>Delete</a><br />";
							}
						}
					}
					else
					{
						$path1 = 'posters/' . $level1[$i] . '/';
						$images = getDirectoryList ($path1);
						$count2 = count ($images);
						for ($j = 0; $j < $count2; $j++)
						{
							$imagepath = $path2 . $images[$k];
							$currentdate = date("Y-m-d");
							$datecheck = "SELECT event_date FROM poster WHERE path_poster='$imagepath'";
							$sqllink = mysqli_query ($link, $datecheck);
							$array = mysqli_fetch_array ($sqllink);
							if ($array['event_date'] < $currentdate)
							{
								continue;
							}
							echo "<a href = '";
							echo $path1 . $images[$k];
							echo "'><img src = '";
							echo $path1 . $images[$k];
							echo "' width = '75' height = '75' /></a>";
							echo "&nbsp;&nbsp;&nbsp;&nbsp;";
							echo "<a href = 'delete.php?file=";
							echo $path1 . $images[$k];
							echo "'>Delete</a><br />";
						}
					}
				}
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
						<a href = "index.php">
							Home
						</a>
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
							if (isset ($_COOKIE['login']))
							{
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
								<b>
									<a href = "upload.php">
										Upload Posters
									</a>
								</b>
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
							}
							else
							{
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
			<div id = "page">
				<div id = "content">
					<?php
						if (isset ($_COOKIE['login']))
						{
					?>
					<h4>
						Upload a new poster
					</h4>
					<div class="box">
						<form action = "upload_process.php" method = "post" enctype = "multipart/form-data" name = "uploadposter">
							<table>
								<tr>
									<td>
										Select picture to upload
									</td>
									<td>
										:&nbsp;
										<input type="file" name="image" id="image"/>
									</td>
								</tr>
								<tr>
									<td>
										Category
									<td>
										:&nbsp;
										<select name = "category" onchange = "subCat (document.uploadposter.category.options[document.uploadposter.category.selectedIndex].value)" style = "width:250px; height:20px; text-align:center">
											<option value = "0" selected = "selected">
												Choose a category
											</option>
											<option value = "acads">
												Academics
											</option>
											<option value = "cult">
												Cultural
											</option>
											<option value = "sports">
												Sports
											</option>
											<option value = "tech">
												Technical
											</option>
											<option value = "hostel">
												Hostel
											</option>
											<option value = "ib">
												Independent Bodies
											</option>
											<option value = "misc">
												Miscellaneous
											</option>
										</select>
									</td>
								</tr>
								<tr>
									<td>
										Sub-category
									</td>
									<td>
										:&nbsp;
										<select name = "subcat" style = "width:250px; height:20px; text-align:center" disabled = "true">
											<option value = "0" selected = "selected">
												Choose a sub-category
											</option>
										</select>
									</td>
								</tr>
								<tr>
									<td>
										Location
									</td>
									<td>
										:&nbsp;
										<input type = "text" name = "location" id = "location" style = "width:248px; height:20px;" />
									</td>
								</tr>
								<tr>
									<td>
										Date
									</td>
									<td>
										:&nbsp;
										<input type = "text" name = "year" id = "year" style = "width:50px; height:20px;" />
										<select name = "month" onchange = "setDay (document.uploadposter.month.options[document.uploadposter.month.selectedIndex].value)" style = "width:100px; height:20px; text-align:center">
											<option value = "0" selected = "selected">
												Month
											</option>
											<option value = "1">
												January
											</option>
											<option value = "2">
												February
											</option>
											<option value = "3">
												March
											</option>
											<option value = "4">
												April
											</option>
											<option value = "5">
												May
											</option>
											<option value = "6">
												June
											</option>
											<option value = "7">
												July
											</option>
											<option value = "8">
												August
											</option>
											<option value = "9">
												September
											</option>
											<option value = "10">
												October
											</option>
											<option value = "11">
												November
											</option>
											<option value = "12">
												December
											</option>
										</select>
										<select name = "day" style = "width:50px; height:20px; text-align:center">
											<option value = "0" selected = "selected">
												Day
											</option>
										</select>
									</td>
								</tr>
								<tr>
									<td>
										Name and phone number
										&nbsp;
									</td>
									<td>
										:&nbsp;
										<input type = "text" name = "contact" id = "contact" style = "width:248px; height:20px;" />
									</td>
								</tr>
								<tr>
									<td>
										of contact person
									</td>
								</tr>
							</table>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<input type="submit" name="submit" value="Upload" />
							<br/><br />
							Note: Please ensure that the image is not larger than 2 MB
						</form>
					</div>
					<h4>
						Existing posters
					</h4>
					<?php
						print_images();
					?>
					<br />
					<?php
						}
						else
						{
					?>
					<h4>
						You have to login to see this page
					</h4>
					<?php
						header ("Refresh: 1; URL = 'login.php'");
						}
					?>
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
								for ($i = 1; $i < 16; $i++)
								{
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