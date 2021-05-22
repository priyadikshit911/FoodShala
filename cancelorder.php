<?php
session_start();
include 'config/db_config.php';
$id=$_GET['id'];


$reg_id=$_SESSION['customer_id'];
$timezone  = -7.5; //(GMT +5:30) IST (INDIA. & KOLKATA )
$currentTime= gmdate("Y/m/j H:i:s", time() + 3600*($timezone+date("I")));
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Admin Logout...!</title>
	<script type='text/javascript' src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/0.4.2/sweet-alert.min.js"></script>
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/0.4.2/sweet-alert.css">
</head>
<body>
<?php
$sql = "DELETE FROM orders WHERE order_id=$id";
if ($con->query($sql) === TRUE) {
    ?>
    <script>
				sweetAlert(
						{
							title: "Order successfully cancelled!",
							text: "Just wait for a Second",
							type: "success"
						},
						function () {
						window.location.href = 'cart.php';
				});
	</script>
    <?php
} else {
  echo "Error deleting record: " . $con->error;
}
?>	
			<!-- <script>
				sweetAlert(
						{
							title: "One Item Deleted!",
							text: "Just wait for a Second",
							type: "success"
						},
						function () {
						window.location.href = 'cart.php';
				});
			</script> -->
		
</body>
</html>