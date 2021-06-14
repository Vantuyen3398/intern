<?php  
	/**
	 * 
	 */
	class Model
	{
		function addUser($name, $email, $username, $password, $created,$avatar){
			$created = date('Y-m-d h:i:s');
			if (file_exists("uploads/user.txt")) {
				$a = fopen("uploads/user.txt", "a");
				fwrite($a, $name.",".$email.",".$username.",".$password.",".$created.",".$avatar."\r\n");
				
			}
		}

		function login($username, $password){
			if (file_exists("uploads/user.txt")) {
				$r = fopen("uploads/user.txt", "r");
				while(!feof($r)){
					$row = fgets($r);
					if (!empty($row)) {
						$members = explode(",", $row);
						if($members[2] == $username && $members[3] == $password){
							return true;
						}
					}
				}
			}
		}

		function chagnePass($email){
			if (file_exists("uploads/user.txt")) {
				$r = fopen("uploads/user.txt", "r");
				while (!feof($r)) {
					$row = fgets($r);
					if(!empty($row)){
						$arr = explode(",", $row);
						if ($arr[1] == $email) {
							return true;
						}
					}
				}
			}
		}

		function checkExistUser($email, $username){
			if(file_exists("uploads/user.txt")){
				$r = fopen("uploads/user.txt", "r");
				while (!feof($r)) {
					$row = fgets($r);
					if (!empty($row)) {
						$arr = explode(",", $row);
						if ($arr[1] == $email || $arr[2] == $username){
							return true;
						}
					}
				}
			}
		}
	}
?>