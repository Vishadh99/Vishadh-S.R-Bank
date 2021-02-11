<?php
include 'config.php';

if(isset($_POST['submit']))
{
	// details transaction
    $sender_id = $_GET['id'];
    $receiver_id = $_POST['receiver_id'];
    $amount = $_POST['amount'];

	//  sender account detail
    $query = "SELECT * from customers where id=$sender_id";
    $data = mysqli_query($conn,$query);
    $sender = mysqli_fetch_array($data);
	
	// receiver account detail
    $query = "SELECT * from customers where id=$receiver_id";
    $data = mysqli_query($conn,$query);
    $receiver = mysqli_fetch_array($data);



    // check for invalid amount
    if (($amount)<= 0)
	{
        echo '<script>alert("You have entered invalid amount")</script>';
    }


  
    // check sufficent fund to transfer
    else if($amount > $sender['balance']) 
    {
        echo '<script>alert("Insufficient Fund! Transaction failed")</script>';
    }
    


    

    else 
	{    
        // debit amount from sender
        $currentBalance = $sender['balance'] - $amount;
        $query = "UPDATE customers set balance=$currentBalance where id=$sender_id";
        mysqli_query($conn,$query);
          
        // credit amount to receiver
        $currentBalance = $receiver['balance'] + $amount;
        $query = "UPDATE customers set balance=$currentBalance where id=$receiver_id";
        mysqli_query($conn,$query);
                
		//  update in transaction history
        $debit = $sender['name'];
        $credit = $receiver['name'];
        $query = "INSERT INTO transaction(`sender`, `receiver`, `balance`) VALUES ('$debit','$credit','$amount')";
        $query=mysqli_query($conn,$query);

        if($query)
		{
            echo "<script> alert('Transaction Successful');window.location='history.php';</script>";   
        }
    }
}
?>

<!DOCTYPE html>

<html lang=en>
    <head>
        <title>Banking System:Homepage</title>
        <!-- linking javascript file, bootstrap and css-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <link rel="stylesheet" href ="styles.css">
    </head>
	
	
	<body id="customer">
		<a href="history.php" style ="float:right; padding: 50px 50px;"><button type="button" class="btn btn-dark btn-lg" >history </button></a>
		<a href="index.php" style ="float:right; padding: 50px 20px;"><button type="button" class="btn btn-dark btn-lg" >Home </button></a>	
		<h2 class="head" style="font: small-caps bold 30px/1 sans-serif; text-align:center;"> Transaction</h2>
		
		<form method="post" name="tcredit" class="tabletext" ><br>
		
			<!-- display selected sender-->
			<?php
                include 'config.php';
                $customer_id=$_GET['id'];
                $sql = "SELECT * FROM  customers where id=$customer_id";
                $result=mysqli_query($conn,$sql);
                if(!$result)
                {
                    echo "Error : ".$sql."<br>".mysqli_error($conn);
                }
                $rows=mysqli_fetch_assoc($result);
			?>
			
			<label>Your Account Detail</label>
			<table class="table table-striped table-secondary table-bordered" id ="table">
				<tr>
					<th>Id</th>
					<th>Name</th>
					<th>email</th>
					<th>balance</th>
				</tr>
				<tr>
					<td><?php echo $rows['id'] ?></td>
					<td><?php echo $rows['name']?></td>
					<td><?php echo $rows['email']?></td>
					<td><?php echo $rows['balance']?></td>
				</tr>
			</table>
				<br><br><br>
				
				<!-- select receiver -->
				
				<div style="width : 60%; float:left; padding:30px 30px;">
					<label>Transfer To:</label>
					<select name="receiver_id" class="form-select input-group mb-3" required>
						<option value="" disabled selected>--Please choose the receiver--</option>
						<?php
							include 'config.php';
							$sid=$_GET['id'];
							$sql = "SELECT * FROM customers where id!=$sid";
							$result=mysqli_query($conn,$sql);
							if(!$result)
							{
								echo "Error ".$sql."<br>".mysqli_error($conn);
							}
							while($rows = mysqli_fetch_assoc($result)) {
						?>
							<option class="table" value="<?php echo $rows['id'];?>" >
								<?php echo $rows['name'] ;?> (Balance: 
								<?php echo $rows['balance'] ;?> ) 
							</option>
						<?php 
							} 
						?>
					</select>
				
					<!--  amount to transfer -->
					<br><br>
					<label>Amount:</label>
					<input  class="input-group mb-3" style="padding-right:20px;" type="number" name="amount" required>   
					<br><br>
					
					<!-- submit button -->
					<button class="btn btn-dark btn-lg" name="submit" type="submit" id="myBtn">Transfer</button>
				</div>
		</form>
		
		<footer class="small text-center text-muted">
            Banking System by Eunice Patrina
        </footer>
	</body>
<html>
