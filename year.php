<?php
			$yr=$_POST['year'];
			$yr="C:/xampp/htdocs/project/".$yr."_data.csv";
			$file_open = fopen("year.txt", "w");
			fwrite($file_open, $yr);
			header('location:index2.html');
?>