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
		<?php
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
			// Login function
			function login()
			{
				include 'includes/db.inc.php';
				if (empty ($_POST['username']))
				{
					return false;
				}
				if (empty ($_POST['password']))
				{
					return false;
				}
				$username = trim ($_POST['username']);
				$password = trim ($_POST['password']);
				$scrambled = md5 ($password . 'iitbombay');
				$sql = "SELECT COUNT(*) FROM admin WHERE username = '$username' AND password = '$scrambled'";
				$result = mysqli_query ($link, $sql);
				if (!$result)
				{
					echo "Error";
					return false;
					exit ();
				}
				$row = mysqli_fetch_array ($result);
				if ($row[0] > 0)
				{
					return true;
				}
				else
				{
					return false;
				}
			}
			if (login ())
			{
				$expire = (60 * 60 * 24) + time ();
				setcookie('login', 'iitb', $expire);
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
							if (login () || (isset ($_COOKIE['login'])))
							{
						?>
						<span class = "opener">
							Admin Menu
						</span>
						<ul>
							<li>
								<b>
									<a href = "admin.php">
										Admin Home
									</a>
								</b>
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
					<div class = "box">
						<?php
							if (login() || (isset ($_COOKIE['login'])))
							{	
						?>
						<h2>
							Welcome Administrator
						</h2>
						<h3>
							What do you want to do today?
						</h3>
						I want to:
						<br />
						&nbsp;&nbsp;&nbsp;&nbsp;
						&#8226;&nbsp;
						<a href="upload.php">
							Upload Posters
						</a>
						<br />
						&nbsp;&nbsp;&nbsp;&nbsp;
						&#8226;&nbsp;
						<a href="points.php">
							Edit GC Points Tally
						</a>
						<?php
							}
							else
							{
								echo "Incorrect login details. Please login";
								header ("Refresh: 0.5; URL = 'login.php'");
							}
						?>
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