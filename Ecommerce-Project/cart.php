<?php include 'Component/user_header.php';
include 'component/connection.php';


if(isset($_POST['update_cart'])){
   $update_quantity = $_POST['quantity'];
   $update_id = $_POST['pid'];
   mysqli_query($conn, "UPDATE `cart` SET quantity = '$update_quantity' WHERE id = '$update_id'") or die('query failed');
   $message[] = 'cart quantity updated successfully!';
}

if(isset($_GET['delete_all'])){
  mysqli_query($conn, "DELETE FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
  // header('location:cart.php');
}

if(isset($_GET['remove'])){
  $remove_id = $_GET['remove'];
  mysqli_query($conn, "DELETE FROM `cart` WHERE id = '$remove_id'") or die('query failed');
  header('location:index.php');
}
 
?>


<body>

<div class="container">

<a class="btn btn-success" href="index.php">Back To Home</a>

<h2 class="text-center m-5">My Cart</h2>



<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Product Image</th>
      <th scope="col">Product Name</th>
      <th scope="col">Product Price</th>
      <th scope="col">Quantity</th>
      <th scope="col">Total Price</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php
     $conn=mysqli_connect("localhost", "root", "", "foodwebsite");

            $sql = "SELECT * FROM cart";
            $grand_total = 0;
             $result = $conn->query($sql);
                   $i=1;

            if ($result->num_rows > 0) {

                while ($row = $result->fetch_assoc()) {
                    

        ?>

                 <tr id=<?php echo $row['id'];?>>
                 
   	               <td> <?php echo $i++; ?></td>
                   <td width="80"><img src="uploads/<?php echo $row['image']; ?>" width="50" height="50"></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['amount']; ?></td>
                    <td>
                    <form action="" method="post">
                  <input type="hidden" name="pid" value="<?php echo $row['id']; ?>">
                  <input type="number" min="1" name="quantity" value="<?php echo $row['quantity']; ?>">
                  <input type="submit" name="update_cart" value="update" class="option-btn">
               </form></td>
               <td>$<?php echo $sub_total = ($row['amount'] * $row['quantity']); ?>/-</td>

          
            
             <td><a href="cart.php?remove=<?php echo $row['id']; ?>" class="btn btn-danger delete-btn"
              onclick="return confirm('remove item from cart?');">remove</a></td>
                <!-- <a class="btn btn-danger" href="deletecart.php?id=<?php echo $row['id']; ?>">Delete</a></td> -->

                    </tr>                       

        <?php  
      $grand_total += $sub_total;  
      }

            }

        ?>  
          <tr class="table-bottom">
            <td></td>
         <td colspan="4">grand total :</td>
         <td>$<?php echo $grand_total; ?>/-</td>
         <td><a href="cart.php?delete_all" onclick="return confirm('delete all from cart?');" 
         class="btn btn-info delete-btn <?php echo ($grand_total > 1)?'':'disabled'; ?>">delete all</a></td>
      </tr>
    


  </tbody>
</table>


<div class="checkout-btn">
<a href="javascript:void(0)" data-productid="<?php echo $data['id'];?>" data-productname="<?php echo $data['name'];?>" data-amount="<?php echo $data['amount'];?>"class="ms-auto btn-primary buynow" >Proceed To Checkout</a>

 <a href="checkout.php" style="background:green; color:white;" class="btn <?= ($grand_total > 1)?'':'disabled'; ?>">Cash On Delivery</a>
</div>

</div>









