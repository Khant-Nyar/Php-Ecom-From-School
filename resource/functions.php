<?php

	function set_message($msg){
		if(!empty($msg)){
			$_SESSION['message']=$msg;
		}else{
			$msg="";
		}
	}

	function display_message(){
		if(isset($_SESSION['message'])){
			echo $_SESSION['message'];
			unset($_SESSION['message']);
		}
	}

	// echo "Hello Diploma Students";
	function redirect($location){
		header("location:$location");
	}

	function query($sql){
		global $connect;
		return mysqli_query($connect,$sql);
	}

	function confirm($result){
		global $connect;
		if(!$result){
			die("Query Fail".mysqli_error($connect));
		}
	}

	function escape_string($string){
		global $connect;
		return mysqli_real_escape_string($connect,$string);
	}

	function fetch_array($result){
		return mysqli_fetch_array($result);
	}

	//====================================================

	//get product
	function get_product(){
		$query=query("SELECT * FROM `products`");
		confirm($query);
		while($row=fetch_array($query)){
			$id=$row['id'];
			$title=$row['product_title'];
			$price=$row['product_price'];
			$image=$row['product_image'];
			$products=<<<DELIMETER
			        <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <a href="item.php?id={$id}">
                            	<img src="{$image}" alt="">
                            </a>
                            <div class="caption">
                                <h4 class="pull-right">$price</h4>
                                <h4><a href="item.php?id={$id}">$title</a>
                                </h4>
                                <p>See more snippets like this online store item at <a target="_blank" href="http://www.bootsnipp.com">Bootsnipp - http://bootsnipp.com</a>.</p>
                                <a class="btn btn-primary" href="cart.php?add={$id}">Add To Cart</a>
                            </div>
                        </div>
                    </div>
DELIMETER;
echo $products;
		}
	}


	// get category
	function get_category(){
		$query = query("SELECT * FROM `category`");
		confirm($query);
		while($row=fetch_array($query)){
			$id=$row['id'];
			$cat_title=$row['cat_title'];
			$category=<<<DELIMETER
			<a class="list-group-item" href="category.php?id={$id}">$cat_title</a>
DELIMETER;
echo $category;
		}
	}


	//get category page
	function category_page(){
		$id=$_GET['id'];
		$query=query("SELECT * FROM `products` WHERE product_category_id=".escape_string($id)."");
		confirm($query);
		while($row=fetch_array($query)){
			$id=$row['id'];
			$title=$row['product_title'];
			$price=$row['product_price'];
			$image=$row['product_image'];
			$short_description=substr($row['product_short_description'],0,50)." ....";
			$products=<<<DELIMETER
			        <div class="col-md-3 col-sm-6 hero-feature">
		                <div class="thumbnail">
		                    <img src="http://placehold.it/800x500" alt="">
		                    <div class="caption">
		                        <h3>{$title}</h3>
		                        <p>{$short_description}</p>
		                        <p>
		                            <a href="#" class="btn btn-primary">Buy Now!</a> <a href="#" class="btn btn-default">More Info</a>
		                        </p>
		                    </div>
		                </div>
		            </div>
DELIMETER;
echo $products;
		}
	}


	// shop page
	function shop_page(){
		$query=query("SELECT * FROM `products`");
		confirm($query);
		while($row=fetch_array($query)){
			$id=$row['id'];
			$title=$row['product_title'];
			$price=$row['product_price'];
			$image=$row['product_image'];
			$short_description=substr($row['product_short_description'],0,20)." ....";
			$products=<<<DELIMETER
			        <div class="col-md-3 col-sm-6 hero-feature">
		                <div class="thumbnail">
		                    <img src="images/{$image}" alt="" width="300px" height="50px">
		                    <div class="captiongg">
		                        <h3>{$title}</h3>
		                        <p>{$short_description}</p>
		                        <p>
		                            <a href="cart.php?add={$id}" class="btn btn-primary">Buy Now!</a> <a href="#" class="btn btn-default">More Info</a>
		                        </p>
		                    </div>
		                </div>
		            </div>
DELIMETER;
echo $products;
		}
	}

	//login page user login
	function login_user(){
		if(isset($_POST['login'])){
			$useremail=escape_string($_POST['useremail']);
			$userpassword=escape_string($_POST['userpassword']);

			$query=query("SELECT * FROM `user` WHERE email='$useremail' AND password='$userpassword'");
			confirm($query);
			while($row=fetch_array($query)){
				$admin=$row['name'];
			}
			if(mysqli_num_rows($query)==0){
				set_message("Your Email or Password are Wrong ..");
				redirect('login.php');
			}else{
				$_SESSION['admin']=$admin;
				redirect('admin');
			}
		}
	}

	// contact page send email
	function send_message(){
		if(isset($_POST['send'])){
			// echo "hello";
			$username=$_POST['username'];
			$useremail=$_POST['useremail'];
			$subject=$_POST['subject'];
			$message=$_POST['usermessage'];
			$header="From : {$username} ";
			$to="mgmg@gmail.com";
			$result=mail($to,$subject,$message,$header);
			if(!$result){
				set_message("Sorry We Could Not Send Your Message.");
			}else{
				set_message('Successfully Sent');
			}
		}
	}
	function cart(){
		$total=0;
		$item_quantity=0;
		//sandbox
		//======
		$item_name=1;
		$item_number=1;
		$amount=1;
		$quantity=1;

		foreach($_SESSION as $key=>$value){

			if($value > 0){
				if(substr($key,0,8)=='product_'){

					$length=strlen($key)-8;
					$id=substr($key,8,$length);

					$item_quantity+=$value;
					$query=query("SELECT * FROM products WHERE id=".escape_string($id)."");
					confirm($query);
					while($data=fetch_array($query)){
					$sub=$data['product_price']*$value;//sub total
					$product=<<<DELIMETER
					<tr>
						<td>{$data['product_title']}</td>
						<td>{$data['product_price']}</td>
						<td>{$value}</td>
						<td>{$sub}</td>
						<td><a href="cart.php?remove={$data['id']}" class="btn btn-warning"><span class="glyphicon glyphicon-minus"></span></a></td>
						<td><a href="cart.php?add={$data['id']}" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span></a></td>
						<td><a href="cart.php?delete={$data['id']}" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></a></td>
					</tr>
  <input type="hidden" name="item_name_{$item_name}" value="{$data['product_title']}">
  <input type="hidden" name="item_number_{$item_number}" value="{$data['id']}">
  <input type="hidden" name="amount_{$amount}" value="{$data['product_price']}">
  <input type="hidden" name="quantity_{$quantity}" value="{$data['product_quantity']}">
DELIMETER;
		echo $product;
		//sandbox
		$item_name++;
		$item_number++;
		$amount++;
		$quantity++;
		//echo $total+=$sub;
						}//end of while
					$_SESSION['item_total'] = $total+=$sub;
					$_SESSION['item_quantity']=$item_quantity;
					}// end of if
			}// end of session

		} // end of foreach
		
	} //end of function
// 	chunk_split() - Split a string into smaller chunks
// preg_split() - Split string by a regular expression
// explode() - Split a string by a string
// count_chars() - Return information about characters used in a string
// str_word_count() - Return information about words used in a string

	function user(){
		$no=1;
		$query=query("SELECT * FROM user");
		confirm($query);
		while($data=fetch_array($query)){
			//echo $data['name'];
		$namearr=explode(" ",$data['name']);
		//echo $data['image'];
		$users=<<<DELIMETER
		<tr>
	        <td>{$no}</td>
	        <td><img class="admin-user-thumbnail user_image" src="../images/{$data['image']}" alt=""
	        width="100px" height="100px"></td>  
	        <td>{$data['name']}
	              <div class="action_links">
	                <a href="users.php?delete_id={$data['id']}">Delete</a>
	                <a href="users.php?edit_id={$data['id']}">Edit</a>                
	            </div>
	        </td>
	        <td>{$namearr[0]}</td>
	       <td>{$namearr[1]}</td>
    </tr>
DELIMETER;
echo $users;
$no++;
}

	}
 ?>