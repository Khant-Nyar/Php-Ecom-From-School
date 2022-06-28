<?php include_once("../resource/config.php"); ?>
<?php 
	if(isset($_GET['add'])){
		echo $id=$_GET['add'];
		$query=query("SELECT * FROM products WHERE id=".escape_string($id)."");
		confirm($query);
		while($data=fetch_array($query)){
			if($data['product_quantity'] != $_SESSION['product_'.$id]){
				$_SESSION['product_'.$id]+=1;
				redirect('checkout.php');
			}else{
				set_message("Only Have {$data['product_title']} are ".$data['product_quantity']. " Available ");
				redirect('checkout.php');
			}
		}
		// $_SESSION['product_'.$id]+=1;
		// redirect('index.php');
	}
	if(isset($_GET['remove'])){
		$id=$_GET['remove'];
		$_SESSION['product_'.$id]-- ;
		if($_SESSION['product_'.$id]<1){
			unset($_SESSION['item_total']);
			unset($_SESSION['item_quantity']);
			redirect('checkout.php');
		}else{
			redirect('checkout.php');
		}
	}
	if(isset($_GET['delete'])){
		$id=$_GET['delete'];
		$_SESSION['product_'.$id]='0';
		unset($_SESSION['item_total']);
		unset($_SESSION['item_quantity']);
		redirect('checkout.php');
	}
 ?>