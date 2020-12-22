<?php require_once 'login.php';
	global $object;
   $colId = $_GET['edit_col'];
	$getCol = "SELECT * FROM collections WHERE col_id='$colId'";
	$runCol = $object->query($getCol);
	$fetchCol = mysqli_fetch_array($runCol);

	$col_Title = $fetchCol['col_Title'];
	 global $col_Title;
?>
	<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Edit Collection</title>
		<link href="../styles/normalize.css" rel="stylesheet" type="text/css">
		<style>
			#nav1
			{
				height:35px;
				background: #9e9e9e;
				color:#2c2c2c;
				padding:10px;
				font-weight: bold;
			}
			form
			{
				height:250px;
				width: 500px;
				margin: auto;
				margin-top: 30px;
			}
			form label
			{
				display: block;
				color:#2c2c2c;
				font-weight: bold;
			}
			form input[type="text"]
			{
				width:100%;
				background-color:#4B5557;
				border:0;
				color:whitesmoke;
				padding:3px;
				margin-left: 5px;
			}
			::-webkit-input-placeholder{color:#8bb4c2}
			::-moz-placeholder{color:#8bb4c2}
			:-ms-input-placeholder{color:#8bb4c2}
			form input[type="submit"]
			{
				border:0;
				padding:10px 20px ;
				background-color:#191E22;
				color:#fff;
				margin-left: 220px;
				margin-top:15px
			}
			form input[type="submit"]:hover{color:#007e36}
		</style>
		
	</head>
	<body>

	<form action="" method="post" enctype="multipart/form-data">
		<h3>Updating the Collection</h3> <br>
		<table>
			<tr>
				<td><label>Collection Title</label></td>
				<td><input type="text" title="" name="colTitle" value="<?php echo $col_Title?>"></td>
			</tr>
		</table>
		<input type="submit" name="update_col" value="Update Collection">
	</form>
	</body>
	</html>
<?php
	if(isset($_POST['update_col']))
	{
		$colTitle = $_POST['colTitle'];
		$updatingCol = "UPDATE collections SET col_title= '$colTitle' WHERE col_id='$colId' ";
		$runCol = $object->query($updatingCol);

		if($runCol)
		{
			echo "<script>alert('The Collection has been Updated successfully')</script>";
			echo "<script>window.open('index.php?viewCollection' , '_self')</script>";
		}
		else
			echo "<script>alert('Could\'nt Update the Collection , Try again please')</script>" ;
	}
?>