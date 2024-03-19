<!-- including php logic- connecting to database -->
<?php
include 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Products- Project</title>
    <!-- css file -->
    <link rel="stylesheet" href="style.css">
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
</head>
<body>
    <!-- header -->
    <?php include 'header.php'; ?>
    <!-- container -->
    <div class="container">
        <section class="display_product">
            <table>
                <thead>
                    <th>S1 No</th>
                    <th>Product Image</th>
                    <th>Product Name</th>
                    <th>Product Price</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    <!-- php code -->
                    <?php
                    $display_product = mysqli_query($conn, "SELECT * FROM `products`");
                    $serial_number = 1;
                    if(mysqli_num_rows($display_product) > 0) {
                        while($row = mysqli_fetch_assoc($display_product)) {
                    ?>
                            <!-- display table-->
                            <tr>
                                <td><?php echo $serial_number++; ?></td>
                                <!--  image source path -->
                                <td><img src="images/<?php echo $row['image']; ?>" alt="<?php echo $row['name']; ?>"></td>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['price']; ?></td>
                                <td>
                                    <a href="delete.php?delete=<?php echo $row['id']; ?>" 
                                    class="delete_product_btn" onclick="return confirm('Are YOU sure u want to delete this product?'); ">
                                    <i class="fas fa-trash"></i></a>
                                    <a href="#" class="update_product_btn"><i class="fas fa-edit"></i></a>
                                </td>
                            </tr>
                    <?php
                        }
                    } else {
                        echo "<tr><td colspan='5' class='empty_text'>No Products Available</td></tr>"; 
                    }
                    ?>
                </tbody>
            </table>
        </section>
    </div>
</body>
</html>
