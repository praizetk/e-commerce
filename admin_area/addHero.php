<?php require_once 'login.php' ?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
	<meta charset="utf-8">
	<title>Add Hero</title>
	<link href="../styles/add_products_style.css" rel="stylesheet" type="text/css">
	<link href="../styles/normalize.css">
	<link rel="stylesheet" href="../styles/Astyle.css" type="text/css" media="all">
	<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>  <!-- A text area that is pre made -->
</head>
<body>
  <form action="addHero.php" method="post" enctype="multipart/form-data">
	  <h3>Add Hero Section</h3>
	  <table>
		 
		 <tr>
			 <td><label>Hero Image</label></td>
			 <td><input type="file" title="" name="heroImage" required> </td>
		 </tr>
		  <tr>
			  <td><label>Hero Category</label></td>
			  <td>
				  <select title="Select a category" name="heroCategory" required>
					  <option></option>
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
					  <option></option>
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
			 <td><input type="text" title="Hero Header" name="heroHeader" required></td>
		 </tr>
		  <tr>
			  <td><label>Hero Description</label> </td>
			  <td><textarea name="heroDescription" title="" cols="70" rows="10"></textarea></td> <!-- We can't add required at the text area field -->
		  </tr>
		  <tr>
			  <td><label>Hero Discount</label> </td>
			  <td><input type="text" name="heroDiscount" title="Hero Discount" required></td>
		  </tr>
	  </table>
	  <input type="submit" name="add_hero" value="Add Hero">
  </form>
</body>
</html>
<?php
	global $object;
  if(isset($_POST['add_hero']))
	{
		$heroImage = $_FILES['heroImage']['name']; // When we insert a file we extract it form the _FILE array mot POST or GET
		$heroCol = $_POST['heroCollection'];
		$heroCat = $_POST['heroCategory'];
		$heroHeader = $_POST['heroHeader'];
		$heroDescription = $_POST['heroDescription'];
		$heroDiscount = $_POST['heroDiscount'];

		$insertHero = "INSERT INTO `hero` (`hero_img`, `hero_cat`, `hero_col`, `hero_header`, `hero_details`, 'hero_discount' ) 
            VALUES ('$heroImage','$heroCat','$heroCol', '$heroHeader','$heroDescription', '$heroDiscount')";

		$runHero = $object->query($insertHero);

		if(!$object->error)
		{
			move_uploaded_file($heroImage_tmp ,"uploaded_hero_images/$heroImage" ); // Move the uploaded photos to the project folder to be used again when displaying the products
			echo "<script>alert('The hero has been added successfully')</script>";
           echo "<script>window.open('index.php?newHero' , '_self')</script>";
     	}
		else
		  echo "<script>alert('Could\'nt add the product')</script>" ;
	}
	?>