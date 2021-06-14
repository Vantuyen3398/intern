<?php  
	/**
	 * 
	 */
	class ModelProduct
	{
		function add_cate($name){
			if (file_exists("uploads/category.txt")){
				$a = fopen("uploads/category.txt", "a");
				fwrite($a, $name."\r\n");
			}
			return true;
		}
		function getCate(){
			$file = "uploads/category.txt";
			if(file_exists($file)){
				$r = fopen($file, "r");
				while(!feof($r)){
					$row = fgets($r);
					if(!empty($row)){
						$cate[]  = explode(" ", $row);
					}
				}
				return $cate;
			}
		}
		function add_product($name,$category,$price,$image){
			$file = "uploads/product.txt";
			if (file_exists($file)) {
				$a = fopen($file, "a");
				fwrite($a, $name.','.$category.','.$price.','.$image."\r\n");
			}
			return true;
		}

		function format_currency($n=0){
		    $n = (string)$n;
		    $n = strrev($n);
		    $res = '';
		    for($i=0;$i<strlen($n);$i++){
		        if($i%3==0 && $i !=0)
		        {
		            $res.='.';
		        }
		        $res.=$n[$i];
		    }
		    $res = strrev($res);
		    return $res;
		}

		function showProduct(){
			$file = "uploads/product.txt";
			if (file_exists($file)) {
				$r = fopen($file, "r");
				while (!feof($r)){
					$row = fgets($r);
					if(!empty($row)){
						$product[] = explode(",", $row);
					}
				}
				return $product;
			}
		}

		function pagination($page){
			$index = ($page - 1) * 3;
			$list_product = ModelProduct::showProduct();
			return array_slice($list_product, $index, 3);
		}

		function getName($name){
			$arr = array();
			$file = "uploads/product.txt";
			$r = fopen($file, "r");
			if($r){
				while(!feof($r)){
					$row = fgets($r);
						$arr = explode(",", $row);
						if($arr[0] == $name){
							return $arr;
						}
				}
			}
		}
	}
?>