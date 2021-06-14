<?php  
	include 'model/model.php';
	// include 'libs/function.php';
	class Controller{
		public function handleRequest(){
			$model = new Model();
			// $functionCommon = new FunctionCommon();
			$action = isset($_GET['action'])?$_GET['action']:'home';
			switch ($action) {
				case 'home':
					break;
				case 'register':
					if (isset($_POST['submit'])){
						$name = trim($_POST['name']);
						$email = trim($_POST['email']);
						$username = trim($_POST['username']);
						$password = trim(md5($_POST['password']));
						$created = date('Y-m-d', strtotime($_POST['date']));
						
						$avatar = 'default.png';
						$pathUpload = 'uploads/users/';
						if ($_FILES['avatar']['error'] == 0) {
							move_uploaded_file($_FILES['avatar']['tmp_name'], $pathUpload.$_FILES['avatar']['name']);
							$avatar = $_FILES['avatar']['name'];
						}
						if (empty($name || $email || $username || $password)) {
							$msg = "Field must not be empty";
						} else {
							$model = new Model();
							$checkExistUser = $model->checkExistUser($email, $username);
							if ($checkExistUser) {
								$msg = 'Exist email or username';
							} else {
								if ($model->addUser($name, $email, $username, $password, $created,$avatar) === True) {
									$msg = "Reister SuccessFully !";
										// $functionCommon->redirectPage('index.php?action=register');
										// header("Location:index.php");
								}
							}
						}
					}
					include 'view/register.php';
					break;
				case 'login':
						if (isset($_POST['submit'])) {
							$username = trim($_POST['username']);
							$password = trim(md5($_POST['password']));
							if (empty($username || $password)) {
								$msg = "Username or Password must not be empty";
							} else {
								$model = new Model();
								$checklogin = $model->login($username, $password);
								if ($checklogin) {
									$login['username'] = $username;
									$_SESSION['login'] = $login;
									header("Location:index.php");
								} else {
									$msg = "Username or Password not true";
								}
							} 
							
						}
						include 'view/login.php';
						break;
				case 'chagne':
					if(isset($_POST['submit']) && $_POST['email'])	{
						$emailId = trim($_POST['email']);
						$model = new Model();

						$chagnePass = $model->chagnePass($emailId);
						if($chagnePass){
							$token = md5($emailId).rand(10,999);
							$expFormat = mktime(
    									 date("H"), date("i"), date("s"), date("m") ,date("d")+1, date("Y")
     									);
							$link = "<a href='http://localhost:8080/Form_MVC/index.php?action=chagne?key=".$emailId."&token=".$token."'>Click To Reset password</a>";
							include 'send_mail/PHPMailer/SMTP.php';
							include 'send_mail/PHPMailer/PHPMailer.php'; 
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
					include 'view/chagne.php';
					break;
				case 'logout':
						unset($_SESSION['login']);
						header("Location: index.php");
					break;
				case 'reset':
					include 'send_mail/resetpass.php';
				default:
					# code...
					break;
			}
		}
	}
?>