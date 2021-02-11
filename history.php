<!DOCTYPE html>

<html lang=en>
    <head>
        <title>Banking System:Homepage</title>
        <!-- linking javascript file, bootstrap and css-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <link rel="stylesheet" href ="styles.css">
    </head>
	<body id="customer">
		<a href="index.php" style ="float:right; padding: 50px 20px;"><button type="button" class="btn btn-dark btn-lg" >Home </button></a>	
		<!-- main -->
		<h2 class="head" style="font: small-caps bold 30px/1 sans-serif; text-align:center;"> Transaction History</h2>

		<table class="table table-striped table-secondary  table-bordered" id ="table">
        <tr>
            <th>From</th>
            <th>To</th>
            <th>Amount</th>
            <th>Date and time</th>
        </tr>
		 <?php

            include 'config.php';

            $sql ="select * from transaction";

            $query =mysqli_query($conn, $sql);

            while($rows = mysqli_fetch_assoc($query))
            {
        ?>
            <tr>
				<td><?php echo $rows['sender']; ?></td>
				<td><?php echo $rows['receiver']; ?></td>
				<td><?php echo $rows['balance']; ?> </td>
				<td><?php echo $rows['datetime']; ?> </td>
            </tr>
        
		<?php
            }

        ?>
		
		
	</body>
<html>
