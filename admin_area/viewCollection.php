<?php
	require_once "login.php";
	global $object;
?>
	<!DOCTYPE html>
	<html>
	<head>
		<link href="../styles/normalize.css" rel="stylesheet" type="text/css">

		<style>
			h3
			{
				margin: 10px;
				color:#2c2c2c;
			}
			table {margin-top: 2px;}
			th{color: #007e36; font-weight: 600 }
			table ,tr,td,th
			{
				align-content: center;
				border:1px solid #007e36;
				padding: 10px;
				text-align: center;
			}
			td{font-weight: 500}
			a
			{
				text-decoration: none;
				color:#2c2c2c;
				font-weight: bold;
			}
			a:hover
			{
				text-decoration: none;
				color:#007e36;
				font-weight: bold;
			}
		</style>
	</head>
	<body>
	<h3 align="center">All Collections</h3>
	<table>
		<tr>
			<th>Collection Id</th>
			<th>Collection Title</th>
		</tr>
		<?php
			$getcols = "SELECT * FROM collections";
			$runcols = $object->query($getcols);
			while($colRow = mysqli_fetch_array($runcols))
			{
				$colId = $colRow['col_id'];
				$colTitle = $colRow['col_title'];

				echo <<<END
<tr>
<td>#$colId</td>
<td>$colTitle</td>
<td><a href="viewCollection.php?delete_col=$colId">Delete</a></td>
<td><a href="index.php?edit_col=$colId">Edit</a></td>
 </tr>
END;
			}
		?>
	</table>
	</body>
	</html>
<?php
	if(isset($_GET['delete_col']))
	{
		$delete_id = $_GET['delete_col'];
		$delete = "DELETE FROM collections WHERE col_id='$delete_col'";
		$runDelete = $object->query($delete);

		if($runDelete)
		{
			echo "<script>alert('The product has been deleted successfully')</script>";
			echo "<script>window.open('index.php?viewCollection' , '_self')</script>";
		}
		else
			echo "<script>alert('Could\'nt delete the product')</script>" ;
	}
?>