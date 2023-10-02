<?php
// Include the database connection
include('../includes/connect.php');

if(isset($_POST['insert_product'])){
    $product_title = $_POST['product_title'];
    $product_description = $_POST['product_description'];
    $product_keywords = $_POST['product_keywords'];
    $category = $_POST['category'];
    $brand = $_POST['brand'];
    $product_status = "true";

    $product_image1 = $_FILES['product_image1']['name'];
    $product_image2 = $_FILES['product_image2']['name'];
    $product_image3 = $_FILES['product_image3']['name'];
    $product_price = $_POST['product_price'];

    
    //accessing temporary images 

    $temp_image1 = $_FILES['product_image1']['tmp_name'];
    $temp_image2 = $_FILES['product_image2']['tmp_name'];
    $temp_image3 = $_FILES['product_image3']['tmp_name'];


    if($product_title == '' or $product_description == '' or $product_keywords == '' or $category == '' or $brand == '' or $product_image1 == '' or $product_image2 == '' or  $product_image3 == '' or  $product_price == '' ){
        echo "<script>alert('please fill all the availabe fields');</script>";
    } else{
        move_uploaded_file($temp_image1,"./product_images/$product_image1");
        move_uploaded_file($temp_image2,"./product_images/$product_image2");
        move_uploaded_file($temp_image3,"./product_images/$product_image3");


        $insert_product = "insert into `products`(product_title,product_description,product_keyword,category_id,brand_id,product_image1,product_image2,product_image3,product_price,date,status)
        values('$product_title','$product_description','$product_keywords','$category','$brand','$product_image1','$product_image2','$product_image3','$product_price',NOW(),'$product_status')";

        $result_query = mysqli_query($con, $insert_product);
        if($result_query){
        echo "<script>alert('Product has been successfully inserted ');</script>";

        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Custom CSS -->
</head>

<body class="bg-light">
    <div class="container mt-3">
        <h1 class="text-center">Insert Products</h1>
        <!-- form -->
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_title" class="form-label">Product Title</label>
                <input type="text" name="product_title" id="product_title" class="form-control" placeholder="Enter product title" autocomplete="off" required="required">
            </div>

            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_description" class="form-label">Product Description</label>
                <input type="text" name="product_description" id="product_description" class="form-control" placeholder="Enter Product Description" autocomplete="off" required="required">
            </div>

            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_keywords" class="form-label">Product Keywords</label>
                <input type="text" name="product_keywords" id="product_keywords" class="form-control" placeholder="Enter Product Keywords" autocomplete="off" required="required">
            </div>

            <div class="form-outline mb-4 w-50 m-auto">
                <select class="form-select form-select-lg mb-3" name="category" aria-label="Select a Category">
                    <option selected>Select a Category</option>


                    <?php
$select_query = "SELECT * FROM `categories`";
$result_query = mysqli_query($con, $select_query);

while ($row = mysqli_fetch_assoc($result_query)) {
    $category_title = $row['category_title'];
    $category_id = $row['category_id'];
    echo "<option value='$category_id'>$category_title</option>";
}
?>


                   
                </select>
            </div>

            <div class="form-outline mb-4 w-50 m-auto">
                <select class="form-select form-select-lg mb-3" name="brand" aria-label="Select a Brand">
                    <option selected>Select a Brand</option>
                    <?php
$select_query = "SELECT * FROM `brands`";
$result_query = mysqli_query($con, $select_query);

while ($row = mysqli_fetch_assoc($result_query)) {
    $brand_title = $row['brand_title'];
    $brand_id = $row['brand_id'];
    echo "<option value='$brand_id'>$brand_title</option>";
}
?>
                </select>
            </div>

            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image1" class="form-label">Product Image 1</label>
                <input type="file" name="product_image1" id="product_image1" class="form-control" accept="image/*" required="required">
            </div>

            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image2" class="form-label">Product Image 2</label>
                <input type="file" name="product_image2" id="product_image2" class="form-control" accept="image/*" required="required">
            </div>

            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image3" class="form-label">Product Image 3</label>
                <input type="file" name="product_image3" id="product_image3" class="form-control" accept="image/*" required="required">
            </div>

            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_price" class="form-label">Product Price</label>
                <input type="text" name="product_price" id="product_price" class="form-control" placeholder="Enter product price" autocomplete="off" required="required">
            </div>

            <div class="form-outline mb-4 w-50 m-auto">
                <input type="submit" name="insert_product" id="insert_product" class="btn btn-info" value="Insert Product">
            </div>
        </form>
    </div>
    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>



<!-- .text-bg-dark {
    background-color: #333;
    color: white;
    text-align: center;
    padding: 8px;
    font-size: 14px;
    position: relative; /* Remove the "fixed" positioning */
}


 <div class="text-bg-dark p-3 text-center">
        <p>All Rights Reserved</p>
    </div> -->
