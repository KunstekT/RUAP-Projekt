<html>
<head>
 <Title>Registration Form</Title>
 <style type="text/css">
 body {
 background-color: #fff;
 border-top: solid 10px #000;
 color: #333;
 font-size: .85em;
 margin: 20;
 padding: 20;
 font-family: "Segoe UI", Verdana, Helvetica, Sans-Serif;
 }
 h1,
 h2,
 h3,
 {
 color: #000;
 margin-bottom: 0;
 padding-bottom: 0;
 }
 h1 {
 font-size: 2em;
 }
 h2 {
 font-size: 1.75em;
 }
 h3 {
 font-size: 1.2em;
 }
 table {
 margin-top: 0.75em;
 }
 th {
 font-size: 1.2em;
 text-align: left;
 border: none;
 padding-left: 0;
 }
 td {
 padding: 0.25em 2em 0.25em 0em;
 border: 0 none;
 }
 </style>
</head>
<body>
 <h1>Register here!</h1>
 <p>Fill in your name and email address, then click <strong>Submit</strong> to
register.</p>
 <form method="post" action="index.php" enctype="multipart/form-data">
 Name
 <input type="text" name="name" id="name" />
 </br> Email
 <input type="text" name="email" id="email" />
 </br>
 <input type="submit" name="submit" value="Submit" />
 </form>
 <?php
// DB connection info
// TODO: Update the values for $host, $user, $pwd, and $db //using the values you retrieved
// earlier from the Azure Portal. $host = "value of Data Source";
$host = "kunstappx-server.database.azure.com";
$user = "kunstappx-server-admin";
$pwd = "1Z6U763WIN76IYX6$";
$db = "kunstappx-database";
// Connect to database.
$conn = mysqli_connect($host, $user, $pwd, $db);
if (mysqli_connect_errno())
{
echo "<h3>Failed to connect to MySQL:</h3> " . mysqli_connect_error();
}
 else
{
// echo '<h3>Connected successfully</h3>';
}
// Insert registration info
if (!empty($_POST))
{
$name = $_POST['name'];
$email = $_POST['email'];
$date = date("Y-m-d");
// Insert data
$sql_insert = "INSERT INTO registration_tbl (name, email, date)
VALUES ('$name','$email','$date')";
if ($conn->query($sql_insert) === TRUE)
{
echo "<h3>Your're registered!</h3>";
// // Retrieve data
$sql_select = "SELECT * FROM registration_tbl";
$registrants = $conn->query($sql_select);
if ($registrants->num_rows > 0)
{
echo "<h2>People who are registered:</h2>";
echo "<table>";
echo "<tr><th>Name</th>";
echo "<th>Email</th>";
echo "<th>Date</th></tr>";
while ($registrant = $registrants->fetch_assoc())
{
echo "<tr><td>" . $registrant['name'] . "</td>";
echo "<td>" . $registrant['email'] . "</td>";
echo "<td>" . $registrant['date'] . "</td></tr>";
}
echo "</table>";
}
 else
{
echo "<h3>No one is currently registered.</h3>";
}
}
 else
{
U terminalu idite na putanju mape vaše aplikacije i upišite sljedeću naredbu:
Sada možete u pregledniku otići na adresu http://localhost:8000/ kako biste testirali vašu
aplikaciju.
6. Objavljivanje vaše aplikacije
Nakon što ste testirali vašu aplikaciju lokalno, možete ju objaviti na Web Apps-u korištenjem
Git-a. Prvo ćete inicijalizirati svoj lokalni Git repozitorij ili klonirati novi repozitorij koji ste
kreirali na GitHub-u, te potom objaviti aplikaciju.
1. Kako biste povezali svoj lokalni Git repozitorij s Azure Web App-om, potrebno je prvo
definirati deployment opciju na Azure upravljačkoj konzoli vašeg Web App servisa.
Odaberite Local Git Repository ili GitHub ukoliko ste se odlučili koristiti GitHub
udaljeni repozitorij.
echo "Insert Failed";
}
}
?>
</body>
</html>