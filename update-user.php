<?php

$page_roles = array('admin', 'employee', 'customer');


include_once 'check_session.php';
include_once 'header.html';
include_once 'dbinfo.php';

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

if(isset($_GET['user_id'])){
	
$user_id = $_GET['user_id'];

$query = "SELECT * FROM users WHERE user_id = $user_id";
$result = $conn->query($query);
if(!$result) die($conn->error);

$rows = $result->num_rows;

for($j=0; $j<$rows; $j++)
{
	$row = $result->fetch_array(MYSQLI_ASSOC); 
	

echo <<<_END
    <form action='update-user.php' method='post'>
	<pre>
	User ID: $row[user_id]
	First Name: <input type='text' name='firstname' value='$row[firstname]'>
	Last Name: <input type='text' name='lastname' value='$row[lastname]'>
	Email: <input type='text' name='email' value='$row[email]'>
	Address: <input type='text' name='address1' value='$row[address1]'>
	Address 2: <input type='text' name='address2' value='$row[address2]'>
	City: <input type='text' name='city' value='$row[city]'>
	State: <input type='text' name='state' value='$row[state]'>
	Zip: <input type='text' name='zip' value='$row[zip]'>	
	Password: <input type='text' name='password' value='$row[password]'> 
	</pre>
	<input type='hidden' name='update' value='yes'>
		<input type='hidden' name='user_id' value='$row[user_id]'>
		<input type='submit' value='UPDATE RECORD'>	
	</form>
	
_END;

}

}


if (isset($_POST['update'])) {
    $user_id = $_POST['user_id'];
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$email = $_POST['email'];
	$address1 = $_POST['address1'];
	$address2 = $_POST['address2'];
	$city = $_POST['city'];
	$zip = $_POST['zip'];
	$state = $_POST['state'];
	$password = $_POST['password'];
	
	$update_user = "UPDATE users SET firstname='$firstname', lastname='$lastname', email='$email', address1='$address1', address2='$address2', city='$city', state='$state', zip='$zip', password='$password' WHERE user_id = $user_id";
    $result = $conn->query($update_user); 
	if (!$result) echo "ERROR2";

}

$conn->close();
include_once 'footer.html';

?>
<html>
<body>

<a href="admin.php">Back to Admin</a>
<br>
<a href='logout.php'>Log Out</a>

</body>
</html>
