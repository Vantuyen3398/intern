<?php 
	include 'model/user_model.php'; 
	/**
	 * 
	 */
	include 'send_mail/PHPMailer/SMTP.php';
	include 'send_mail/PHPMailer/PHPMailer.php';
	class UserController
	{
		public function handleRequest(){
			$user = new ModelUser();
			$action = isset($_GET['action'])?$_GET['action']:'home';
			switch ($action) {
				case 'add_user':
					if (isset($_POST['add_user'])){
							$name = trim($_POST['name']);
							$email = trim($_POST['email']);
							$username = trim($_POST['username']);
							$password = trim(md5($_POST['password']));
							$created = date('Y-m-d', strtotime($_POST['date']));
							
							$avatar = 'default.png';
							$pathUpload = 'uploads/';
							if ($_FILES['avatar']['error'] == 0) {
								move_uploaded_file($_FILES['avatar']['tmp_name'], $pathUpload.$_FILES['avatar']['name']);
								$avatar = $_FILES['avatar']['name'];
							}
							$role = $_POST['role'];
							if (empty( $name || $email || $username || $password)) {
								$msg = "Field must not be empty.";
							} else {
								$user = new ModelUser();
								$errorExistUser = '';
								$checkExistUser = $user->checkExistUser($email, $username);
								if ($checkExistUser != false) {
									$msg = 'Exist email or username';
								}else
									{
										if ($user->add_user($name, $email, $username, $password, $created,$avatar,$role) === True) {
											$msg = "Add User SuccessFully!";
										}
									}
							}
						}
					include'view/backend/add_user.php';
					break;
				case 'login':
						if (isset($_POST['login'])) {
							$username = trim($_POST['username']);
							$password = trim(md5($_POST['password']));
								$user = new ModelUser();
								$checklogin = $user->login($username, $password);
								if ($checklogin) {
									$login['username'] = $username;
									$login['role'] = $checklogin;
									$_SESSION['login'] = $login;
									header("Location:admin.php");
								}
								else {
									header("Location: login.php");
								}
						}
						break;
				case 'logout':
						unset($_SESSION['login']);
						header("Location: login.php");
					break;
				case 'list_user':
					$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';
					if(!empty($keyword)){
						$user = new ModelUser();
						$list_user = $user -> searchUser($keyword);
					}
					else
					{
						if (isset($_GET["page"])) {
								$page  = $_GET["page"];
							}
							else{ 
									$page=1;
								}
						$user = new ModelUser();
						$start_from = $user -> pagination($page);
						if($start_from){
							if(isset($_GET["username"])){
								$username = $_GET["username"];
								$delete = $user -> deleteUser($username);
							}
						}
					}

					$user = new ModelUser();
					$list_all_user = $user -> getAllUser();
					include 'view/backend/list_user.php';
					break;
				case 'chagne':
					if(isset($_POST['chagne_pass']) && $_POST['email'])	{
						$emailId = trim($_POST['email']);
						$user = new ModelUser();

						$chagnePass = $user->chagnePass($emailId);
						if($chagnePass){
							$token = md5($emailId).rand(10,999);
							$expFormat = mktime(
    									 date("H"), date("i"), date("s"), date("m") ,date("d")+1, date("Y")
     									);
							$link = "<a href='http://localhost:8080/AdminLTE/admin.php?controller=user&action=chagne?key=".$emailId."&token=".$token."'>Click To Reset password</a>";
							
							$mail = new PHPMailer();
							$mail->CharSet =  "utf-8";
						    $mail->IsSMTP();
						    // enable SMTP authentication
						    $mail->SMTPAuth = true;                  
						    // GMAIL username
						    $mail->Username = "vantuyen3398@gmail.com";
						    // GMAIL password
						    $mail->Password = "Vantuyen130398";
						    $mail->SMTPSecure = "ssl";  
						    // sets GMAIL as the SMTP server
						    $mail->Host = "smtp.gmail.com";
						    // set the SMTP port for the GMAIL server
						    $mail->Port = "465";
						    $mail->From='vantuyen3398@gmail.com';
						    $mail->FromName='Tuyen';
						    $mail->AddAddress('reciever_email_id', 'reciever_name');
						    $mail->Subject  =  'Reset Password';
						    $mail->IsHTML(true);
						    $mail->Body    = 'Click On This Link to Reset Password '.$link.'';
						    $err = '';
						     if($maill->Send())
						    {
						      $err = "Check Your Email and Click on the link sent to your email";
						    }
						    else
						    {
						      $err = "Mail Error - >".$maill->ErrorInfo;
						    }
						}
						else{
    					$err =  "Invalid Email Address. Go back";
						}
					}
					 
					include 'view/backend/chagnepassword.php';
					break;
				default:
					if(!isset($_SESSION['login'])){
						header("Location: login.php");
					}
					break;
			}
		}
	}
?>