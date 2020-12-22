<?php
	require_once "login.php";
	global $object;
?>
<!DOCTYPE html>
<html>
<head>
<style>
	#nav1
	{
		height:35px;
		background: #9e9e9e;
		color:#2c2c2c;
		padding:10px;
		font-weight: bold;
	}
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
		padding: 5px;
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
<h3 align="center">Hero Section</h3>
<table>
	<tr>
		<th>Hero Id</th>
		<th>Hero Image</th>
		<th>Hero Category</th>
		<th>Hero Collection</th>
		<th>Hero Header</th>
		<th>Hero Description</th>
		<th>Hero Discount</th>
	</tr>
<?php
	 $getHero = "SELECT * FROM hero";
	$runHero = $object->query($getHero);
	while($heroRow = mysqli_fetch_array($runHero))
	{
		$heroImage = $heroRow['heroImage'];
		$heroCat = $heroRow['heroCat'];
		$heroCol = $heroRow['heroCol'];
		$heroHeader = $heroRow['heroHeader'];
		$heroDescription = $heroRow['heroDescription'];
		$heroDiscount = $heroRow['heroDiscount'];

		$getCol = "SELECT col_title FROM collections WHERE col_id='$productCollection'";
		$runCol = $object->query($getCol);
		$fetchCol = mysqli_fetch_array($runCol);
		$pColTitle = $fetchCol['col_title'];

		$getCat = "SELECT cat_title FROM categories WHERE cat_id='$productCategory'";
		$runCat = $object->query($getCat);
		$fetchCat = mysqli_fetch_array($runCat);
		$pCatTitle = $fetchCat['cat_title'];
		echo <<<END
<tr>
<td>$herotId</td>
<td><img src="uploaded_hero_images/$heroImage" width="50" height="50"></td>
<td>$pCatTitle</td>
<td>$pColTitle</td>
<td>$heroHeader</td>
<td>$heroDescription</td>
<td>$heroDiscount %</td>
<td><a href="viewhero.php?delete=$heroId">Delete</a></td>
<td><a href="index.php?edit_hero=$heroId">Edit</a></td>
 </tr>
END;
	}
?>
	</table>
</body>
</html>
 <?php
	 if(isset($_GET['delete']))
	 {
		$delete_id = $_GET['delete'];
		 $delete = "DELETE FROM hero WHERE hero_id='$delete_id'";
		 $runDelete = $object->query($delete);

		 if($runDelete)
		 {
			 echo "<script>alert('The hero has been deleted successfully')</script>";
			 echo "<script>window.open('index.php?viewHero' , '_self')</script>";
		 }
		 else
			 echo "<script>alert('Could\'nt delete the product')</script>" ;
	 }
	?>