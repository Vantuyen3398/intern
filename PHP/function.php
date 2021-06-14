<?php  
/**
 *
 * BT1
 * Tuyen
 * Created 20-04-2021 09h:10m
 * Find the number of workers in group 2
 *
 */ 
	function CountWoker($group_a){
		if ($group_b = $group_a * 2) {
			$group_b = $group_b - 4;
		}
		return $group_b;
	}
?>

<?php  
/**
 *
 * BT2
 * Tuyen
 * Created 20-04-2021 09h:30m
 * Find the number of candies you can buy
 *
 */ 
	function Candy($money, $price){
		$candy = $money / $price;
		$candy_shell = $candy;
		while ($candy_shell >= 2) {
			$candy_shell-- ;
			$candy++ ;
		}
		return $candy;
	}
?>

<?php  
/**
 *
 * BT3
 * Tuyen
 * Created 20-04-2021 09h:45m
 * Find the number of marbles to balance the 2 bags
 *
 */ 
	function Mables_3($bag_1){
		$bag_2 = 2 * $bag_1;
		$count = 0;
		while ($bag_2 != $bag_1) {
			$bag_2-- ;
			$bag_1++ ; 
			$count ++;
		}
		return $count;
	}
?>

<?php  
/**
 *
 * BT4
 * Tuyen
 * Created 20-04-2021 10h:00m
 * find the number of books so that 2 people are equal
 *
 */ 
	function Book($b_book){
		$m_book = $b_book / 3;
		$count = 0;
		while ($b_book != $m_book * 2) {
			$b_book-- ;
			$m_book++;
			$count++;
		}
		return $count;
	}
?>

<?php  
/**
 *
 * BT5
 * Tuyen
 * Created 20-04-2021 11h:00m
 * Find the number of marbles per type
 *
 */ 
	function Mables_5($mables, $mables_1,$a,$b){
		$blue_marbles = ($mables * $b - $mables_1 * 1) / (1 * $b - $a* 1);
		$red_mables = $mables - $blue_marbles;
		return array('x'=>$blue_marbles, 'd'=>$red_mables);
	}
?>

<?php 
/**
 *
 * BT6
 * Tuyen
 * Created 20-04-2021 11h:30m
 * Find the number of marbles per type
 *
 */ 
	function Mables_6($mables){
		$red_mables = $mables * 1/5;
		$blue_marbles = $mables * 30/100;
		$mables_rest = $mables - $red_mables - $blue_marbles;
		$white_mables = $mables_rest / 10 * 3;
		$yellow_mables = $mables_rest - $white_mables;
		return array('d'=>$red_mables, 'x'=>$blue_marbles, 
					 't'=>$white_mables, 'v'=>$yellow_mables);
	}
?>

<?php 
/**
 *
 * BT7
 * Tuyen
 * Created 20-04-2021 13h:10m
 * Find the money to have 50 pieces of glue
 *
 */ 
	function CandyMoney() {
		$euro = 0;
		$dollar = 0;
		$candy = 0;
		// Trong khi kẹo còn ít hơn 50 cái thì đổi tiếp
		do {
			// Đổi kẹo bằng dollar
			$candy++;
			$dollar -= 5;
			$euro += 3;
			// Đổi kẹo bằng euro, đổi cho tới khi hết euro
			while ($euro > 0) {
				$candy++;
				$euro -= 2;
				$dollar += 3;
			}
		} while ($candy < 50);
		return $dollar;
	}
?>
