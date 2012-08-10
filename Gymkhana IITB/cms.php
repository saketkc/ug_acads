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
						<b>
							<a href = "cms.php">
								Complaints
							</a>
						</b>
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
					<h3>
						Fill up the details to lodge your complaint
					</h3>
					<h4>
						All fields are compulsory
					</h4>
					<h6>
						For LAN Port Complaints, click
						<a href = "http://gymkhana.iitb.ac.in/~network/complaint">
							here
						</a>
					</h6>
					<h6>
						For Electrical complaints, call 5182 (within campus) or +91 - 22 - 25765182 (outside campus)
					</h6>
					<br />
					<form method = "post" action = "cms_process.php" enctype = "multipart/form-data" name = "cms">
						<table cellspacing = "5">
							<tr>
								<td>
									LDAP User ID
								</td>
								<td>
									:&nbsp;
									<input type = "text" name = "ldapuser" style = "width:300px; height:25px;" />
									&nbsp;
									@iitb.ac.in
								</td>
							</tr>
							<tr>
								<td>
									Password
								</td>
								<td>
									:&nbsp;
									<input type = "password" name = "password" style = "width:300px; height:25px;" />
								</td>
							</tr>
							<tr>
								<td>
									Hostel No.
								</td>
								<td>
									:&nbsp;
									<select name = "hostel" style = "width:302px; height:25px; text-align:center">
										<option value = "1">
											1
										</option>
										<option value = "2">
											2
										</option>
										<option value = "3">
											3
										</option>
										<option value = "4">
											4
										</option>
										<option value = "5">
											5
										</option>
										<option value = "6">
											6
										</option>
										<option value = "7">
											7
										</option>
										<option value = "8">
											8
										</option>
										<option value = "9">
											9
										</option>
										<option value = "10">
											10
										</option>
										<option value = "11">
											11
										</option>
										<option value = "12">
											12
										</option>
										<option value = "13">
											13
										</option>
										<option value = "14">
											14
										</option>
										<option value = "15">
											Tansa
										</option>
									</select>
								</td>
							</tr>
							<tr>
								<td>
									Room No
								</td>
								<td>
									:&nbsp;
									<input type = "text" name = "room" style = "width:300px; height:25px;" />
								</td>
							</tr>
							<tr>
								<td>
									Category
								</td>
								<td>
									:&nbsp;
									<select name = "category" style = "width:302px; height:25px; text-align:center">
										<option value = "general">
											General
										</option>
										<option value = "maint">
											Maintenance
										</option>
										<option value = "mess">
											Mess
										</option>
										<option value = "cult">
											Cultural
										</option>
										<option value = "sports">
											Sports
										</option>
										<option value = "tech">
											Tech
										</option>
										<option value = "alumni">
											Alumni Relations
										</option>
										<option value = "mi">
											Mood Indigo
										</option>
										<option value = "tf">
											Techfest
										</option>
										<option value = "ecell">
											Entrepreneurship cell
										</option>
										<option value = "insight">
											InsIghT
										</option>
										<option value = "aawaaz">
											आवाज़
										</option>
									</select>
								</td>
							</tr>
							<tr>
								<td>
									Subject
								</td>
								<td>
									:&nbsp;
									<input type = "text" name = "subject" style = "width:300px; height:25px;" />
								</td>
							</tr>
							<tr>
								<td valign = "top">
									Complaint/Feedback/Suggestion
									&nbsp;&nbsp;
								</td>
								<td valign = "top">
									&nbsp;&nbsp;
									<textarea name = "complaint" style = "width:300px; height:200px"></textarea>
								</td>
							</tr>
						</table>
						<br />
						<center>
							<input type = "submit" value = "&nbsp;&nbsp;Submit Complaint&nbsp;&nbsp;" name = "submit" />
						</center>
					</form>
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