<?php  
	/**
	 * 
	 */
	class ModelUser
	{
		
		function add_user($name, $email, $username, $password, $created,$avatar,$role){
			$created = date('Y-m-d h:i:s');
			if (file_exists("uploads/user.txt")) {
				$a = fopen("uploads/user.txt", "a");
				fwrite($a, $name.",".$email.",".$username.",".$password.",".$created.",".$avatar.",".$role."\r\n");
				
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
		function login($username, $password){
			if (file_exists("uploads/user.txt")) {
				$r = fopen("uploads/user.txt", "r");
				while(!feof($r)){
					$row = fgets($r);
					if (!empty($row)) {
						$members = explode(",", $row);
						if($members[2] == $username && $members[3] == $password){
							return $members[6];
						}
					}
				}
			}
		}
		function getAllUser(){
			$file = "uploads/user.txt";
			if (file_exists($file)) {
				$r = fopen($file, "r");
				while (!feof($r)) {
					$row = fgets($r);
					if (!empty($row)) {
						$members[] = explode(",", $row);
					}
				}
				return $members;
			}
		}

		function searchUser($keyword){
			$matches = array();
			$handle = @fopen("uploads/user.txt", "r");
			if ($handle)
			{
			    while (!feof($handle))
			    {
			        $buffer = fgets($handle);
			        if(strpos($buffer, $keyword) !== FALSE)
			            $matches[] = explode(",", $buffer);
			    }
			    // fclose($handle);
			    return $matches;
			}
		}

		function pagination($page)
	    {
	        $index = ($page - 1) * 3;
	        $listUser = ModelUser::getAllUser();
	        return array_slice($listUser, $index, 3);
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

		function deleteUser($username)
		{
			$user = array();
			$r = @fopen("uploads/user.txt", "r");
			if ($r)
			{
			    while (!feof($r))
			    {
			        $buffer = fgets($r);
			        if(strpos($buffer, $username) !== FALSE)
			            $user = explode(",", $buffer);
			        	unset($user[$username]);
			    }
	    		
			    $newFileContent = implode(",", $user);
	    		$r = fopen("uploads/update.txt", 'w');
	    		if($r){
	    			fwrite($r, $newFileContent);
	    			fclose($r);
	    		}
			}
		}
		
	}
?>