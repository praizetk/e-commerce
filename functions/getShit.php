
<?php
	require_once 'login.php';
	$object = mysqli_connect($hn , $un ,"", $db) ;
	if($object->connect_error) die ($object->connect_error);

	function getHero()
	{
		global $object;
		$get_hero = "select * from hero";
		$run_hero = mysqli_query($object,$get_hero);

		while($heroRow = mysqli_fetch_array($run_hero));
		{
			$heroImage = $heroRow['hero_img'];
			$heroCat = $heroRow['hero_cat'];
			$heroCol = $heroRow['hero_col'];
			$heroHeader = $heroRow['hero_header'];
			$heroDescription = $heroRow['hero_details'];
			$heroDiscount = $heroRow['hero_discount'];
			echo "
			<div class='single-hero-items set-bg' data-setbg='admin_area/uploaded_hero_images/$heroImage'>
                <div class='container'>
                    <div class='row'>
                        <div class='col-lg-5'>
                            <span>$heroCat , $heroCol</span>
                            <h1>$heroHeader</h1>
                            <p$heroDescription</p>
                            <a href='./shop.php' class='primary-btn'>Shop Now</a>
                        </div>
                    </div>
                    <div class='off-card'>
                        <h2>Sale <span>$heroDiscount</span></h2>
                    </div>
                </div>
            </div>";
		}

	}

	function getCategories()   // That function works along with the get products function
	{
		global $object;  // We must globalize the object used in each function we make
		$get_cat = "Select * from categories";
		$run_cat = mysqli_query($object ,$get_cat );

		while($cat_rows = mysqli_fetch_array($run_cat))
		{
			$catId = $cat_rows['cat_id'];
			$cat_title = $cat_rows[1];
			echo "<li><a href='shop.php?cat=$catId'>$cat_title</a></li>";
		}
	}

	function getBrands()  // That function works along with the get products function throw the _GET array and the values sent to it
	{
	  global $object;
		$getBrands = "SELECT * FROM brands";
		$runBrands = mysqli_query($object , $getBrands);
		
		while($brandsRows = mysqli_fetch_array($runBrands , MYSQLI_NUM))
		{
			$brandId = $brandsRows[0];
			$brandsTitle = $brandsRows[1];
			echo "<li><a href='shop.php?brand=$brandId'>$brandsTitle</a></li>";
		}
	}

	function getProducts()
	{
		global $object;

		if (!isset( $_GET['cat'] )) {
			if (!isset( $_GET['brand'] )) {
				$getProducts = "SELECT * FROM products ORDER BY RAND() LIMIT 0,6";
				$runProducts = $object->query($getProducts);
				$products_number = $runProducts->num_rows;
				if ($products_number == 0)
					echo "<p style='text-align: center; font-weight: bold;font-size: 50px; margin: auto'>There is No products</p>";
				else {
					while ($productRow = mysqli_fetch_array($runProducts)) {
						$productId = $productRow['product_id'];
						$productTitle = $productRow['product_title'];
						$productCollection = $productRow['product_col'];
						$productCategory = $productRow['product_cat'];
						$productBrand = $productRow['product_brand'];
						$productImage = $productRow['product_image'];
						$productDescription = $productRow['product_description'];
						$productPrice = $productRow['product_price'];
						$productKeyword = $productRow['product_keyword'];
						echo "<div class='col-lg-4 col-sm-6'>
                                <div class='product-item'>
                                    <div class='pi-pic'>
                                        <img src='admin_area/uploaded_products_images/$productImage' alt='$productTitle' width='280' height='280' style='border: 2px solid #fff'>
                                        <div class='sale pp-sale'>Sale</div>
                                        <div class='icon'>
                                            <i class='icon_heart_alt'></i>
                                        </div>
                                        <ul>
                                            <li class='w-icon active'><a href='shop.php?add_cart=$productId'><i class='icon_bag_alt'></i></a></li>
                                            <li class='quick-view'><a href='details.php?pro_id=$productId'>+ Quick View</a></li>
                                            <li class='w-icon'><a href='#'><i class='fa fa-random'></i></a></li>
                                        </ul>
                                    </div>
                                    <div class='pi-text'>
                                        <div class='catagory-name'>$productKeyword</div>
                                        <a href='details.php?pro_id=$productId'>
                                            <h5>$productTitle</h5>
                                        </a>
                                        <div class='product-price'>
                                            $ $productPrice
                                            <span>$35.00</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

";

					}
				}
			}
		}
	 if (isset( $_GET['cat'] )) {
			$productCategory = $_GET['cat'];
			$getProducts = "SELECT * FROM products WHERE product_cat=$productCategory";
			$runProducts = $object->query($getProducts);
			$products_number = $runProducts->num_rows;
			if ($products_number == 0)
				echo "<p style='text-align: center; font-weight: bold;font-size: 50px; margin: auto'>There is No products</p>";
			else {
				while ($productRow = mysqli_fetch_array($runProducts)) {
					$productId = $productRow['product_id'];
					$productTitle = $productRow['product_title'];
					$productCollection = $productRow['product_col'];
					$productCategory = $productRow['product_cat'];
					$productBrand = $productRow['product_brand'];
					$productImage = $productRow['product_image'];
					$productDescription = $productRow['product_description'];
					$productPrice = $productRow['product_price'];
					$productKeyword = $productRow['product_keyword'];
					echo <<<_END
							<div class='col-lg-4 col-sm-6'>
                                <div class='product-item'>
                                    <div class='pi-pic'>
                                        <img src='admin_area/uploaded_products_images/$productImage' alt='$productTitle' width='280' height='280' style='border: 2px solid #fff'>
                                        <div class='sale pp-sale'>Sale</div>
                                        <div class='icon'>
                                            <i class='icon_heart_alt'></i>
                                        </div>
                                        <ul>
                                            <li class='w-icon active'><a href='shop.php?add_cart=$productId'><i class='icon_bag_alt'></i></a></li>
                                            <li class='quick-view'><a href='details.php?pro_id=$productId'>+ Quick View</a></li>
                                            <li class='w-icon'><a href='#'><i class='fa fa-random'></i></a></li>
                                        </ul>
                                    </div>
                                    <div class='pi-text'>
                                        <div class='catagory-name'>$productKeyword</div>
                                        <a href='details.php?pro_id=$productId'>
                                            <h5>$productTitle</h5>
                                        </a>
                                        <div class='product-price'>
                                            $ $productPrice
                                            <span>$35.00</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
_END;

				}
			}
		}
		if (isset( $_GET['brand'] ))
		{
			$productBrand = $_GET['brand'];
			$getProducts = "SELECT * FROM products WHERE product_brand=$productBrand";
			$runProducts = $object->query($getProducts);
			$products_number = $runProducts->num_rows;
			if ($products_number == NULL)
				echo "<p style='text-align: center; font-weight: bold;font-size: 50px; margin: auto'>There is No products</p>";
			else {
				while ($productRow = mysqli_fetch_array($runProducts)) {
					$productId = $productRow['product_id'];
					$productTitle = $productRow['product_title'];
					$productCollection = $productRow['product_col'];
					$productCategory = $productRow['product_cat'];
					$productBrand = $productRow['product_brand'];
					$productImage = $productRow['product_image'];
					$productDescription = $productRow['product_description'];
					$productPrice = $productRow['product_price'];
					$productKeyword = $productRow['product_keyword'];
					echo <<<_END
							<div class='col-lg-4 col-sm-6'>
                                <div class='product-item'>
                                    <div class='pi-pic'>
                                        <img src='admin_area/uploaded_products_images/$productImage' alt='$productTitle' width='280' height='280' style='border: 2px solid #fff'>
                                        <div class='sale pp-sale'>Sale</div>
                                        <div class='icon'>
                                            <i class='icon_heart_alt'></i>
                                        </div>
                                        <ul>
                                            <li class='w-icon active'><a href='shop.php?add_cart=$productId'><i class='icon_bag_alt'></i></a></li>
                                            <li class='quick-view'><a href='details.php?pro_id=$productId'>+ Quick View</a></li>
                                            <li class='w-icon'><a href='#'><i class='fa fa-random'></i></a></li>
                                        </ul>
                                    </div>
                                    <div class='pi-text'>
                                        <div class='catagory-name'>$productKeyword</div>
                                        <a href='details.php?pro_id=$productId'>
                                            <h5>$productTitle</h5>
                                        </a>
                                        <div class='product-price'>
                                            $ $productPrice
                                            <span>$35.00</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
_END;
				}
			}
		}
	}
	
	function getDetails()
	{
		if(isset($_GET['pro_id'])){
			$myPro = $_GET['pro_id'];
			global $object;
			$getProducts = "SELECT * FROM products WHERE product_id=$myPro";
			$runProducts = $object -> query($getProducts);

			while($productRow = mysqli_fetch_array($runProducts))
			{
				$productId = $productRow['product_id'];
				$productTitle = $productRow['product_title'];
				$productCollection = $productRow['product_col'];
				$productCategory = $productRow['product_cat'];
				$productBrand = $productRow['product_brand'];
				$productImage = $productRow['product_image'];
				$productDescription = $productRow['product_description'];
				$productPrice = $productRow['product_price'];
				$productKeyword = $productRow['product_keyword'];
				echo "<div class='col-lg-4 col-sm-6'>
                                <div class='product-item'>
                                    <div class='pi-pic'>
                                        <img src='admin_area/uploaded_products_images/$productImage' alt='$productTitle' width='280' height='280' style='border: 2px solid #fff'>
                                        <div class='sale pp-sale'>Sale</div>
                                        <div class='icon'>
                                            <i class='icon_heart_alt'></i>
                                        </div>
                                        <ul>
                                            <li class='w-icon active'><a href='shop.php?add_cart=$productId'><i class='icon_bag_alt'></i></a></li>
                                          
                       
                                        </ul>
                                    </div>
                                    <div class='pi-text'>
                                        <div class='catagory-name'>$productKeyword</div>
                                        <a href='details.php?pro_id=$productId'>
                                            <h5>$productTitle</h5>
                                        </a>
                                        <div class='product-price'>
                                            $ $productPrice
                                            <span>$35.00</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class='col-lg-8 col-sm-12'>
                                <div class='product-item'>
                                    <p  style='color:#3f3f3f; font-weight: bold; font-family: Tahoma, Arial, serif'>$productDescription</p>
                                </div>
                            </div>
			";
			}
		}
	}
	
function getSearchedProducts()  
{
	global $object;
	if(isset($_GET['search'])&&$_GET['user_value']!= NULL)
	{
	  $userValue = sanitizeInput($_GET['user_value']);
		$getProducts = "SELECT * FROM products WHERE product_keyword LIKE '%$userValue%'";
		$runProducts = $object->query($getProducts);
		$resultRows = $runProducts->num_rows;
		if($resultRows == 0)
			echo "<p style='text-align: center; font-weight: bold;font-size: 50px; margin: auto'>There is No products</p>";
		else
		{
			while($productRow = mysqli_fetch_array($runProducts))
			{
				$productId = $productRow['product_id'];
				$productTitle = $productRow['product_title'];
				$productCollection = $productRow['product_col'];
				$productCategory = $productRow['product_cat'];
				$productBrand = $productRow['product_brand'];
				$productImage = $productRow['product_image'];
				$productDescription = $productRow['product_description'];
				$productPrice = $productRow['product_price'];
				$productKeyword = $productRow['product_keyword'];

				echo "
						<div class='col-lg-4 col-sm-6'>
                                <div class='product-item'>
                                    <div class='pi-pic'>
                                        <img src='admin_area/uploaded_products_images/$productImage' alt='$productTitle' width='280' height='280' style='border: 2px solid #fff'>
                                        <div class='sale pp-sale'>Sale</div>
                                        <div class='icon'>
                                            <i class='icon_heart_alt'></i>
                                        </div>
                                        <ul>
                                            <li class='w-icon active'><a href='shop.php?add_cart=$productId'><i class='icon_bag_alt'></i></a></li>
                                            <li class='quick-view'><a href='details.php?pro_id=$productId'>+ Quick View</a></li>
                                            <li class='w-icon'><a href='#'><i class='fa fa-random'></i></a></li>
                                        </ul>
                                    </div>
                                    <div class='pi-text'>
                                        <div class='catagory-name'>$productKeyword</div>
                                        <a href='details.php?pro_id=$productId'>
                                            <h5>$productTitle</h5>
                                        </a>
                                        <div class='product-price'>
                                            $ $productPrice
                                            <span>$35.00</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
";
			}
		}
	}
}

function addToCart()
{
	global $object;
	if(isset( $_GET['add_cart']))
	{
	  $pro_id = $_GET['add_cart'];
		$user_id = getUserIp();

		// Making a check that if the product was already added before by the same user
		$check = "SELECT * FROM `cart` WHERE `p_id`='$pro_id' AND `ip_address`='$user_id'";
		$run_check = mysqli_query($object,$check);
		$rows = $run_check->num_rows;
		if($rows > 0)
		{
			echo "<script>alert('You already have added this product')</script>";
		}
		else
		{
			$add_product = "INSERT INTO cart(`p_id`,`ip_address`) VALUES ('$pro_id','$user_id')";
		    $run_add_query = $object->query($add_product);
			if(empty( $run_add_query ))
			{
				echo "<script>alert('Sorry,You can not add this product now')</script>";
				echo "<script>window.open('index.php','_self')</script>";
			}
			else{
		    	echo "<script>alert('The product has been added')</script>";
				echo "<script>window.open('index.php','_self')</script>";
			}
     	}
	}
}

function countCartItems()
{
	global $object;
	if(isset( $_GET['add_cart'] ))
	{
		$userIp = getUserIp();
		$cntCart = "SELECT * FROM cart WHERE `ip_address`='$userIp'";
		$runQuery = $object->query($cntCart);

		$cartItems = $runQuery->num_rows;
	}
	else
	{
		$userIp = getUserIp();
		$cntCart = "SELECT * FROM cart WHERE `ip_address`='$userIp'";
		$runQuery = $object->query($cntCart);

		$cartItems = $runQuery->num_rows;
	}
	echo $cartItems;
}



	function cartPrice()
	{
		global $object;
		$totalPrice = 0;
		if (isset( $_GET['add_cart'] )) {
			$userIp = getUserIp();
			$query = "SELECT * FROM cart WHERE ip_address='$userIp'";
			$run_query = $object->query($query);
			while ($row = mysqli_fetch_array($run_query)) {
				$pro_id = $row['p_id'];
				$price_query = "SELECT * FROM products WHERE product_id='$pro_id'";
				$run_query = $object->query($price_query);

				$proGripper = mysqli_fetch_array($run_query);
				$proPrice = $proGripper['product_price'];
				$totalPrice += $proPrice;
			}
		}
		else
		{
			$userIp = getUserIp();
			$query = "SELECT * FROM cart WHERE ip_address='$userIp'";
			$run_query = $object->query($query);
			while ($row = mysqli_fetch_array($run_query)) {
				$pro_id = $row['p_id'];
				$price_query = "SELECT * FROM products WHERE product_id='$pro_id'";
				$run_price_query = $object->query($price_query);

				$proGripper = mysqli_fetch_array($run_price_query);
				$proPrice = $proGripper['product_price'];
				$totalPrice += $proPrice;
			}
		}
		echo "$ $totalPrice";
	}
	
	
	
	function getUserIp()
	{
		if(!empty($_SERVER['HTTP_CLIENT_IP']))
			$userId = $_SERVER['HTTP_CLIENT_IP'];
		else if(!empty( $_SERVER['HTTP_X_FORWARDED_FOR'] ))
			$userId = $_SERVER['HTTP_X_FORWARDED_FOR'];
		else
			$userId = $_SERVER['REMOTE_ADDR'];

		return $userId;
	}

function sanitizeInput($input)
{
	global $object;
	$input = strtolower($input);
	if(get_magic_quotes_gpc())
	     $input=stripcslashes($input);
$input = $object->real_escape_string($input);
	$input = htmlentities($input);
	return $input;
}

function iter($qty)
{
	
	while($qty<100)
	{
    	echo "<option>$qty</option>";
        $qty+=1;
    }
}

function showCartProducts()
{
	global $object;
	$userIp = getUserIp();
	$getCartElements = "SELECT * FROM cart WHERE ip_address='$userIp'";
	$run_query = $object->query($getCartElements);
	while($elements = mysqli_fetch_array($run_query)) {
		$proId = $elements['p_id'];
		$getFromProducts = "SELECT * FROM products WHERE product_id='$proId'";
		$run_query2 = $object->query($getFromProducts);
		$proGripper = mysqli_fetch_array($run_query2);
		$pro_Title = $proGripper['product_title'];
		$pro_img = $proGripper['product_image'];
		$pro_price = $proGripper['product_price'];
		echo "
<tr>
	<td align='center'><input type='checkbox' name='remove[]'' value='$proId'></td>
	<td class='cart-pic first-row'>
	<img src='admin_area/uploaded_products_images/$pro_img' alt='$pro_Title' width='400px' height='200px' align='center'>
	</td>
  	
  	<td class='cart-title first-row'>
  	<h5>$pro_Title</h5>
  
	</td>
  	<td class='p-price first-row'>$ $pro_price</td>
  	<td class='qua-col first-row'>
        <div class='quantity'>
           	<div class='pro-qty'>
                <input type='text' name='qty'>
            </div>
        </div>
   	</td>
   	<td class='total-price first-row'><td>
</tr>
";
	}
}

function hoverShowCartProducts()
{
	global $object;
	$userIp = getUserIp();
	$getCartElements = "SELECT * FROM cart WHERE ip_address='$userIp'";
	$run_query = $object->query($getCartElements);
	while($elements = mysqli_fetch_array($run_query)) {
		$proId = $elements['p_id'];
		$getFromProducts = "SELECT * FROM products WHERE product_id='$proId'";
		$run_query2 = $object->query($getFromProducts);
		$proGripper = mysqli_fetch_array($run_query2);
		$pro_Title = $proGripper['product_title'];
		$pro_img = $proGripper['product_image'];
		$pro_price = $proGripper['product_price'];
		echo <<<END
			<div class="select-items">
                <table>
                  	<tbody>
                       	<tr>
                            <td class="si-pic"><img src="admin_area/uploaded_products_images/$pro_img" alt="$pro_Title"></td>
                            <td class="si-text">
                            	<div class="product-selected">
                                <p>$ $pro_price</p>
                                <h6>$pro_Title</h6>
                            	</div>
                     		</td>
                            <td class="si-close">
                                <i class="ti-close"></i>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
END;
	}
	echo "<div class='select-total'>
             <span>total:</span>
             <h5>$120.00</h5>
         </div>";
}

	function update()
	{
		global $object;
		$userIp = getUserIp();
		if(isset( $_POST['update'] )&&isset( $_POST['remove'] ))
		{
			foreach($_POST['remove'] as $removeId)
			{
				$deleteQuery = "DELETE FROM `cart` WHERE `p_id`='$removeId' AND `ip_address`='$userIp'";
				$runDeleteQuery = $object->query($deleteQuery);
				if($runDeleteQuery)
					echo "<script>window.open('cart.php','_self')</script>";
			}
		}
	}

function getInformation() 
	{
 					global $object;
                        $user = $_SESSION['user_email'];
                        $getUser = "SELECT * FROM customers WHERE user_email='$user'";
                        $runUser = $object->query($getUser);
                        $fetchUser = mysqli_fetch_array($runUser);


                        $userEmail = $fetchUser['user_email'];
                        $userCountry = $fetchUser['user_country'];
                        $userContact = $fetchUser['customer_contact'];
                        echo "
                    <div class='contact-widget'>
                        
                        <div class='cw-item'>
                            <div class='ci-icon'>
                                <i class='ti-email'></i>
                            </div>
                            <div class='ci-text'>
                                <span>Your Email:</span>
                                <p>$userEmail</p>
                            </div>
                        </div>
                        <div class='cw-item'>
                            <div class='ci-icon'>
                                <i class='ti-location-pin'></i>
                            </div>
                            <div class='ci-text'>
                                <span>Your Country:</span>
                                <p>$userCountry</p>
                            </div>
                        </div>
                        <div class='cw-item'>
                            <div class='ci-icon'>
                                <i class='ti-mobile'></i>
                            </div>
                            <div class='ci-text'>
                                <span>Your Phone:</span>
                                <p>$userContact</p>
                            </div>
                        </div>
                        
                    </div>";
                    
	}