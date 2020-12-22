<?php require_once 'login.php';
	global $object;
	if(isset($_GET['edit_hero'])){
	$herId = $_GET['edit_hero'];
	$getHero = "SELECT * FROM hero WHERE hero_id='$herId'";
	$runH = $object->query($getHero);
	$heroRow = mysqli_fetch_array($runH);
		$heroImage = $heroRow['heroImage'];
		$heroCat = $heroRow['heroCat'];
		$heroCol = $heroRow['heroCol'];
		$heroHeader = $heroRow['heroHeader'];
		$heroDescription = $heroRow['heroDescription'];

		$getCol = "SELECT col_title FROM collections WHERE col_id='$productCollection'";
		$runCol = $object->query($getCol);
		$fetchCol = mysqli_fetch_array($runCol);
		$pColTitle = $fetchCol['col_title'];

		$getCat = "SELECT cat_title FROM categories WHERE cat_id='$productCategory'";
		$runCat = $object->query($getCat);
		$fetchCat = mysqli_fetch_array($runCat);
		$pCatTitle = $fetchCat['cat_title'];
	}
  global $heroImage,global $heroCol,global $heroCat, global $heroHeader, global $heroDescription, global $hCatTitle, global $hColTitle;
?>
	<!DOCTYPE html>
	<html lang="en" xmlns="http://www.w3.org/1999/html">
	<head>
		<meta charset="utf-8">
		<title>Edit Hero</title>
		<link href="../styles/add_products_style.css" rel="stylesheet" type="text/css">
		<link href="../styles/normalize.css" rel="stylesheet" type="text/css">
		<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>  <!-- A text area that is pre made -->
		<script>tinymce.init({ selector:'textarea' });</script>
		<style>
		</style>
	</head>
	<body>
	<form action="" method="post" enctype="multipart/form-data">
		<h3>Updating the Hero Section</h3>
		<table>
		 
		 <tr>
			 <td><label>Hero Image</label></td>
			 <td><input type="file" title="" name="heroImage" required> </td>
			 <img src="uploaded_hero_images/<?php echo $heroImage?>" height="50" width="50">

					<label><?php echo $heroImage?></label>
		 </tr>
		  <tr>
			  <td><label>Hero Category</label></td>
			  <td>
				  <select title="Select a category" name="heroCategory" required>
					  <option value="<?php echo $heroCategory?>">Selected: <?php echo $hCatTitle?></option>
					  <?php
						  global $object;
							  $get_cat = "Select * from categories";
							  $run_cat = $object->query($get_cat );
						       if($object->error) die ($object->error);
							  while($cat_rows = mysqli_fetch_array($run_cat))
							  {
								  $cat_id = $cat_rows['cat_id'];
								   $cat_title = $cat_rows['cat_title'];
								  echo "<option value='$cat_id'>$cat_title</option>";
							  }
					  ?>
				  </select>
			  </td>
		  </tr>
		  <tr>
			  <td><label>Hero Collection</label> </td>
			  <td>
				  <select title="Select a collection" name="heroCollection" required>
					  <option value="<?php echo $heroCollection?>">Selected: <?php echo $hColTitle?></option>
					  <?php
						  global $object;
						  $get_col = "Select * from collections";
						  $run_col = mysqli_query($object ,$get_col );
						  if($object->error) die ($object->error);
						  while($col_rows = mysqli_fetch_array($run_col))
						  {
							  $col_id = $col_rows['col_id'];
							  $col_title = $col_rows['col_title'];
							  echo "<option value='$col_id'>$col_title</option>";
						  }
					  ?>
				  </select>
			  </td>
		  </tr>
		  <tr>
			 <td><label>Hero Header</label></td>
			 <td><input type="text" title="Hero Header" name="heroHeader" required><?php echo $heroHeader?></td>
		 </tr>
		  <tr>
			  <td><label>Hero Description</label> </td>
			  <td><textarea name="heroDescription" title="" cols="70" rows="10"><?php echo $heroDescription?></textarea></td> <!-- We can't add required at the text area field -->
		  </tr>
		  <tr>
			 <td><label>Hero Discount</label></td>
			 <td><input type="text" title="Hero Discount" name="heroDiscount" required><?php echo $heroDiscount?></td>
		 </tr>
	  </table>
	  <input type="submit" name="update_hero" value="Update Hero">
	</form>
	</body>
	</html>
<?php
	if(isset($_POST['update_hero']))
	{
		$hImage = $_FILES['heroImage']['name']; // When we insert a file we extract it form the _FILE array mot POST or GET
		$hCol = $_POST['heroCollection'];
		$hCat = $_POST['heroCategory'];
		$hHeader = $_POST['heroHeader'];
		$hDescription = $_POST['heroDescription'];
		$hDiscount = $_POST['heroDiscount'];

		$updatingHero = "UPDATE hero SET hero_img= '$hImage', hero_cat= '$hCat', hero_col='$hcol', hero_header='$hHeader', hero_details='$hDescription', hero_dicount='$hDiscount', WHERE hero_id='$heroId' ";
		$runHero = $object->query($updatingHero);

		if($runHero)
		{
			move_uploaded_file($hImage_tmp ,"uploaded_hero_images/$hImage" ); // Move the uploaded photos to the project folder to be used again when displaying the products
			echo "<script>alert('The Hero had been Updated successfully')</script>";
			echo "<script>window.open('index.php?viewHero' , '_self')</script>";
		}
		else
			echo "<script>alert('Could\'nt Update the product , Try again please')</script>" ;
	}
?>