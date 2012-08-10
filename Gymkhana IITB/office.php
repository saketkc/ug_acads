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
						<b>
							<a href = "office.php">
								Office Bearers
							</a>
						</b>
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
						<h4>
							General Secretary for Hostel Affairs
						</h4>
						<h4>
							S S Chandra Mouli
						</h4>
						Room No. 273, Hostel 6
						<br />
						Phone No. +91 - 9987204312
						<br />
						Extn: +91 - 22 - 25764073
						<br />
						E-mail: 
						<a href = "mailto:gsecha@iitb.ac.in">
							gsecha@iitb.ac.in
						</a>
						<br />
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<a href = "mailto:chandramouli.iitb@gmail.com">
							chandramouli.iitb@gmail.com
						</a>
						<br /><br />
						<h4>
							General Secretary for Sports Affairs
						</h4>
						<h4>
							Rajesh Ghusinga
						</h4>
						Room No. 364, Hostel 3
						<br />
						Phone No. +91 - 9076331157
						<br />
						Extn: +91 - 22 - 25764070
						<br />
						E-mail: 
						<a href = "mailto:gsecsport@iitb.ac.in">
							gsecsport@iitb.ac.in
						</a>
						<br />
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<a href = "mailto:rajesh.jms@gmail.com">
							rajesh.jms@gmail.com
						</a>
						<br /><br />
						<h4>
							General Secretary for Cultural Affairs
						</h4>
						<h4>
							Poorna Chandra
						</h4>
						Room No. 261, Hostel 6
						<br />
						Phone No. +91 - 8655192782
						<br />
						Extn: +91 - 22 - 25764072
						<br />
						E-mail: 
						<a href = "mailto:gseccult@iitb.ac.in">
							gseccult@iitb.ac.in
						</a>
						<br />
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<a href = "mailto:poocha.29@gmail.com">
							poocha.29@gmail.com
						</a>
						<br /><br />
						<h4>
							General Secretary for Academic Affairs (UG)
						</h4>
						<h4>
							Ishan Shrivastava
						</h4>
						Room No. 116, Hostel 8
						<br />
						Phone No. +91 - 9920393439
						<br />
						Extn: +91 - 22 - 25764071
						<br />
						E-mail: 
						<a href = "mailto:gsecaaug@iitb.ac.in">
							gsecaaug@iitb.ac.in
						</a>
						<br />
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<a href = "mailto:ishanshrivastava1@gmail.com">
							ishanshrivastava1@gmail.com
						</a>
						<br /><br />
						<h4>
							General Secretary for Academic Affairs (PG)
						</h4>
						<h4>
							Bandana Singha
						</h4>
						Room No. 57, Hostel 11
						<br />
						Phone No. +91 - 9833722559
						<br />
						Extn: +91 - 22 - 25764087
						<br />
						E-mail: 
						<a href = "mailto:gsecaapg@iitb.ac.in">
							gsecaapg@iitb.ac.in
						</a>
						<br />
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<a href = "mailto:praptising@gmail.com">
							praptising@gmail.com
						</a>
						<br />
					</div>
					<br class="clearfix" />
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