<?php include 'function.php' ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>B1</title>
	<link rel="stylesheet" href="">
</head>
<body>
	<?php
		$groupB = CountWoker(12);
		echo "Bai 1: Tong so cong nhan cua B = ". $groupB .".";
		echo "<br>";
		echo "<br>";
	?>
	<?php
		$candy = Candy(2000,200);
		echo "Bai 2: Tong so keo = ". $candy .".";
		echo "<br>";
		echo "<br>";
	?>

	<?php
		$mables = Mables_3(18);
		echo "Bai 3: Tong so bi phai chuyen qua la = ". $mables. ".";
		echo "<br>";
		echo "<br>";
	?>

	<?php
		$book = Book(27);
		echo "Bai 4: Tong so sach phai chuyen qua la = ". $book. ".";
		echo "<br>";
		echo "<br>";
	?>

	<?php
		$mables = Mables_5(50,27,2/5,3/4);
		echo "Bai 5: Tong so bi xanh  = ". $mables['x']. ".";
		echo "<br>";
		echo " Tong so bi do = ". $mables['d']. ".";
		echo "<br>";
		echo "<br>";
	?>

	<?php
		$mables = Mables_6(120);
		echo "Bai 6: Tong so bi do = ". $mables['d']. ".";
		echo "<br>";
		echo "Tong so bi xanh = ". $mables['x']. ".";
		echo "<br>";
		echo "Tong so bi trang = ". $mables['t']. ".";
		echo "<br>";
		echo "Tong so bi vang = ". $mables['v']. ".";
		echo "<br>";
		echo "<br>";
	?>

	<?php
		$count_money = CandyMoney();
		echo "Bai 7: Tong so tiền = ". $count_money. ".";
	?>
</body>
</html>