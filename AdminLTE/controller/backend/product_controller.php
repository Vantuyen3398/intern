<?php  
	include 'model/product_model.php';
	class ProductController
	{
		public function handleRequest(){
			$pd = new ModelProduct();
			$action = isset($_GET['action'])?$_GET['action']:'home';
			switch ($action) {
				case 'add_cate':
					if(isset($_POST['add_cate'])){
						$name = trim($_POST['name']);
						if(!empty($name)){
							$pd = new ModelProduct();
							$add_cate = $pd -> add_cate($name);
							if($add_cate == true){
								$alert = "Add Category Success Fully!";
							}
						}
						else {
							$alert = "Field must not be empty!";
						}
					}
					include 'view/backend/add_cate.php';
					break;
				case 'add_product':
					$pd = new ModelProduct();
					$cate = $pd -> getCate();
					//uploads files
					$permited = array('jpg', 'jpeg', 'png', 'gif');
					$file_name = $_FILES['image']['name'];
					$file_size = $_FILES['image']['size'];
					$file_temp = $_FILES['image']['tmp_name'];

					$div = explode('.', $file_name);
					$file_ext = strtolower(end($div));
					$unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
					$uploaded_image = "uploads/product/".$unique_image;
					move_uploaded_file($file_temp, $uploaded_image);

					if(isset($_POST['add_product'])){
						$name = trim($_POST['name']);
						$cate_name = $_POST['category_name'];
						$price = trim($_POST['price']);
						$image = $_FILES['image']['name'];
						if(!empty($name && $cate_name && $price && $image))
						{
							$add_product = $pd -> add_product($name, $cate_name, $price, $image,);
							if($add_product == true){
								$alert = "Add Product Success Fully!";
							}
						}
						else
						{	
							$alert = "Field must not be empty";
						}
					}
					include 'view/backend/add_product.php';
					break;
					case 'list_product':
						$cate = $pd -> getCate();
						$list_product = $pd -> showProduct();
						if(isset($_GET['page'])){
							$page = $_GET['page'];
						}
						else{
							$page = 1;
						}
						$pd = new ModelProduct();
						$start_from = $pd -> pagination($page);
						include 'view/backend/list_product.php';
						break;
					case 'edit_product':
						if(isset($_GET['name'])){
							$name = $_GET['name'];
							$pd = new ModelProduct();
							$edit = $pd -> getName($name);
							$cate = $pd -> getCate();
						}

						$pd = new ModelProduct();
						//uploads files
						$permited = array('jpg', 'jpeg', 'png', 'gif');
						// $file_name = $_FILES['image']['name'];
						// $file_size = $_FILES['image']['size'];
						// $file_temp = $_FILES['image']['tmp_name'];

						// $div = explode('.', $file_name);
						// $file_ext = strtolower(end($div));
						// $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
						// $uploaded_image = "uploads/product/".$unique_image;
						// move_uploaded_file($file_temp, $uploaded_image);

						if(isset($_POST['update_product'])){
							$name = trim($_POST['name']);
							$cate_name = $_POST['category_name'];
							$price = trim($_POST['price']);
							// $image = $_FILES['image']['name'];
							if(!empty($name && $cate_name && $price && $image))
							{
								$update_product = $pd -> update_product($name, $cate_name, $price, $image,);
								if($update_product == true){
									$alert = "Update Product Success Fully!";
								}
							}
							else
							{	
								$alert = "Update Product Not Success Fully!";
							}
						}
						include 'view/backend/edit_product.php';

						break;
				default:
					# code...
					break;
			}
		}
	}
?>
