<?php
session_start();
if(!session_is_registered('id')){
header("location:login.php");
}
?>

<html>
<body>
<form action="bookroom.php" method="POST">
<table id="bookroom">

<tr>
<td><b>Event Name<span style="color:rgb(255,70,0);">*</span> :</b></td>
<td><input type="text" name="event" style="background-color:#ffffff; opacity: 0.5; color:#000000; width:200px; height:40px; border:0; font-size:18px; padding:5px;"/></td>
</tr>
<tr></tr>
<tr></tr>
<tr></tr>
<tr>
<td><b>Event Description :</b></td>
<td><input type="textarea" name="description" style="background-color:#ffffff; opacity: 0.5; color:#000000; width:200px; height:40px; border:0; font-size:18px; padding:5px;"/></td>
</tr>
<tr></tr>
<tr></tr>
<tr></tr>
<tr>
<td><b>Date<span style="color:rgb(255,70,0);">*</span> :</b></td>
<td>
<select name="mydate" >
<option></option>
<option>01</option>
<option>02</option>
<option>03</option>
<option>04</option>
<option>05</option>
<option>06</option>
<option>07</option>
<option>08</option>
<option>09</option>
<option>10</option>
<option>11</option>
<option>12</option>
<option>13</option>
<option>14</option>
<option>15</option>
<option>16</option>
<option>17</option>
<option>18</option>
<option>19</option>
<option>20</option>
<option>21</option>
<option>22</option>
<option>23</option>
<option>24</option>
<option>25</option>
<option>26</option>
<option>27</option>
<option>28</option>
<option>29</option>
<option>30</option>
<option>31</option>

</select>

<select name="month">
<option></option>
<option>01</option>
<option>02</option>
<option>03</option>
<option>04</option>
<option>05</option>
<option>06</option>
<option>07</option>
<option>08</option>
<option>09</option>
<option>10</option>
<option>11</option>
<option>12</option>
</select>

<select name="year">
<option></option>
<option>2012</option>
<option>2013</option>
</select>
<i>dd/mm/yyyy</i>
</td>
</tr>

<tr></tr>
<tr></tr>
<tr></tr>

<tr>
<td><b>Time<span style="color:rgb(255,70,0);">*</span> :</b></td>
<td>
<select name="hours">
<option></option>
<option>00</option>
<option>01</option>
<option>02</option>
<option>03</option>
<option>04</option>
<option>05</option>
<option>06</option>
<option>07</option>
<option>08</option>
<option>09</option>
<option>10</option>
<option>11</option>
<option>12</option>
<option>13</option>
<option>14</option>
<option>15</option>
<option>16</option>
<option>17</option>
<option>18</option>
<option>19</option>
<option>20</option>
<option>21</option>
<option>22</option>
<option>23</option>
</select>

<select name="minutes">
<option></option>
<option>00</option>
<option>15</option>
<option>30</option>
<option>45</option>
<option>60</option>
</select>
<i>hh/mm</i>
</td>
</tr>

<tr></tr>
<tr></tr>
<tr></tr>

<tr>
<td><b>Duration<span style="color:rgb(255,70,0);">*</span> :</b></td>
<td>
<select name="durhours">
<option></option>
<option>00</option>
<option>01</option>
<option>02</option>
<option>03</option>
<option>04</option>
<option>05</option>
<option>06</option>
<option>07</option>
<option>08</option>
<option>09</option>
<option>10</option>

</select>

<select name="durminutes">
<option></option>
<option>00</option>
<option>15</option>
<option>30</option>
<option>45</option>

</select>
<i>hh/mm</i>
</td>
</tr>

<tr></tr>
<tr></tr>
<tr></tr>

<tr>
<td><b>Room<span style="color:rgb(255,70,0);">*</span> :</b></td>
<td>
<select name="room">
<option></option>
<option>Room_01</option>
<option>Room_02</option>
<option>Room_03</option>
</select>
</td>
</tr>

</table>
</br></br></br>
<span style="color:rgb(255,70,0); font-size:0.85em; text-decoration:underline;"><i>( Fields marked with * are mandatory )</i></span>
</br></br></br>
<input type="submit" value="Register" style="border:0; background-color:#ffffff; opacity:0.5; color:#000000; font-weight:bold; width:75px; height:30px; cursor:pointer;"/>

</form>
</body>
</html>