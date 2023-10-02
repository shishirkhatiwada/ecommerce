<?php
include('includes/connect.php');

//getting products

function getProducts(){
  
    global $con;

    if (!isset($_GET['category'])) {
        if (!isset($_GET['brand'])) {

                $select_query = "Select * from `products` order by rand() LIMIT 0,6";
                $result_query = mysqli_query($con,$select_query);
                // $row = mysqli_fetch_assoc($result_query);
                // echo $row['product_title']
               
                
                while($row = mysqli_fetch_assoc($result_query)){
                    $product_id = $row['product_id'];
                    $product_title = $row['product_title'];
                    $product_description = $row['product_description'];
                    $product_keyword = $row['product_keyword'];
                    $category_id = $row['category_id'];
                    $product_image1 = $row['product_image1'];
                    $brand_id = $row['brand_id'];
                    echo" <div class='col-md-4 mb-2'>
                    <div class='card'>
                        <!-- First product card content -->
                        <img src='./admin/product_images/$product_image1' class='card-img-top' alt='...'>
                        <div class='card-body'>
                            <h5 class='card-title'>$product_title</h5>
                            <p class='card-text'>$product_description</p>
                            <a href='#' class='btn btn-outline-info'>Add to Cart</a>
                            <a href='productsdetails.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
                        </div>
                    </div>
                </div>

               ";
                }

}
}
} 


//get all products
function getAllProducts(){
    global $con;

    if (!isset($_GET['category'])) {
        if (!isset($_GET['brand'])) {

                $select_query = "Select * from `products` order by rand()";
                $result_query = mysqli_query($con,$select_query);
                // $row = mysqli_fetch_assoc($result_query);
                // echo $row['product_title']
               
                
                while($row = mysqli_fetch_assoc($result_query)){
                    $product_id = $row['product_id'];
                    $product_title = $row['product_title'];
                    $product_description = $row['product_description'];
                    $product_keyword = $row['product_keyword'];
                    $category_id = $row['category_id'];
                    $product_image1 = $row['product_image1'];
                    $brand_id = $row['brand_id'];
                    echo" <div class='col-md-4 mb-2'>
                    <div class='card'>
                        <!-- First product card content -->
                        <img src='./admin/product_images/$product_image1' class='card-img-top' alt='...'>
                        <div class='card-body'>
                            <h5 class='card-title'>$product_title</h5>
                            <p class='card-text'>$product_description</p>
                            <a href='#' class='btn btn-outline-info'>Add to Cart</a>
                            
                            <a href='productsdetails.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
                        </div>
                    </div>
                </div>

               ";
                }

}
}
}


//getting unique categories

function getUniqueCategory(){
  
    global $con;

    if (isset($_GET['category'])) {
        
$category_id =$_GET['category'];
                $select_query = "Select * from `products` where category_id = $category_id";
                $result_query = mysqli_query($con,$select_query);
                // $row = mysqli_fetch_assoc($result_query);
                // echo $row['product_title']
                $num_of_rows = mysqli_num_rows($result_query);
                if($num_of_rows == 0){
                    echo "<h2 class='text-center text-danger'>This category is not available</h2>";
                }
                
                while($row = mysqli_fetch_assoc($result_query)){
                    $product_id = $row['product_id'];
                    $product_title = $row['product_title'];
                    $product_description = $row['product_description'];
                    $product_keyword = $row['product_keyword'];
                    $category_id = $row['category_id'];
                    $product_image1 = $row['product_image1'];
                    $brand_id = $row['brand_id'];
                    echo" <div class='col-md-4 mb-2'>
                    <div class='card'>
                        <!-- First product card content -->
                        <img src='./admin/product_images/$product_image1' class='card-img-top' alt='...'>
                        <div class='card-body'>
                            <h5 class='card-title'>$product_title</h5>
                            <p class='card-text'>$product_description</p>
                            <a href='#' class='btn btn-outline-info'>Add to Cart</a>
                            <a href='productsdetails.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
                        </div>
                    </div>
                </div>

               ";
                }

}
}




//getting unique brands
function getUniqueBrands(){
  
    global $con;

    if (isset($_GET['brand'])) {
        
$brand_id =$_GET['brand'];
                $select_query = "Select * from `products` where brand_id = $brand_id";
                $result_query = mysqli_query($con,$select_query);
                $num_of_rows = mysqli_num_rows($result_query);
                if($num_of_rows == 0){
                    echo "<h2 class='text-center text-danger'>This brand is not available</h2>";
                }
                
                while($row = mysqli_fetch_assoc($result_query)){
                    $product_id = $row['product_id'];
                    $product_title = $row['product_title'];
                    $product_description = $row['product_description'];
                    $product_keyword = $row['product_keyword'];
                    $category_id = $row['category_id'];
                    $product_image1 = $row['product_image1'];
                    $brand_id = $row['brand_id'];
                    echo" <div class='col-md-4 mb-2'>
                    <div class='card'>
                        <!-- First product card content -->
                        <img src='./admin/product_images/$product_image1' class='card-img-top' alt='...'>
                        <div class='card-body'>
                            <h5 class='card-title'>$product_title</h5>
                            <p class='card-text'>$product_description</p>
                            <a href='#' class='btn btn-outline-info'>Add to Cart</a>
                            <a href='productsdetails.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
                        </div>
                    </div>
                </div>

               ";
                }

}
}


//displaying brands in side nav

function getBrands(){
    global $con;
    $select_brands = "SELECT * FROM brands";
    $result_brands = mysqli_query($con, $select_brands);

    if (!$result_brands) {
        die("Error in select query: " . mysqli_error($con));
    }

    while ($row_data = mysqli_fetch_assoc($result_brands)) {
        $brand_title = $row_data['brand_title'];
        $brand_id = $row_data['brand_id'];
        echo "<li class='nav-items'><a href='index.php?brand=$brand_id' class='nav-link'>   $brand_title  </a></li>";    
    }
}

//get categories
function getCategory(){
    global $con;
    $select_categories= "SELECT * FROM categories";
    $result_categories = mysqli_query($con, $select_categories);

    if (!$result_categories) {
        die("Error in select query: " . mysqli_error($con));
    }

    while ($row_data = mysqli_fetch_assoc($result_categories)) {
        $Category_title = $row_data['category_title'];
        $category_id = $row_data['category_id'];
        echo "<li class='nav-items'><a href='index.php?category=$category_id' class='nav-link'>   $Category_title  </a></li>";    }
}


//search products
function searchProduct(){
    global $con;

            if(isset($_GET['search_data_product'])){
                $search_data_value = $_GET['search_data'];
                $search_query = "select * from `products` where product_keyword like '%$search_data_value%'";
                $result_query = mysqli_query($con,$search_query);
                $num_of_rows = mysqli_num_rows($result_query);
                if($num_of_rows == 0){
                    echo "<h2 class='text-center text-danger'>Sorry, the product you searched is not available</h2>";
                }
                
                
                while($row = mysqli_fetch_assoc($result_query)){
                    $product_id = $row['product_id'];
                    $product_title = $row['product_title'];
                    $product_description = $row['product_description'];
                    $product_keyword = $row['product_keyword'];
                    $category_id = $row['category_id'];
                    $product_image1 = $row['product_image1'];
                    $brand_id = $row['brand_id'];
                    echo" <div class='col-md-4 mb-2'>
                    <div class='card'>
                        <!-- First product card content -->
                        <img src='./admin/product_images/$product_image1' class='card-img-top' alt='...'>
                        <div class='card-body'>
                            <h5 class='card-title'>$product_title</h5>
                            <p class='card-text'>$product_description</p>
                            <a href='#' class='btn btn-outline-info'>Add to Cart</a>
                            <a href='productsdetails.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
                        </div>
                    </div>
                </div>

               ";
                }
            }

}


//view details 

function view_details(){
    global $con;
  
    if(isset($_GET['product_id'])){

    if (!isset($_GET['category'])) {
        if (!isset($_GET['brand'])) {
            $product_id =$_GET['product_id'];
                $select_query = "Select * from `products` where product_id = $product_id";
                $result_query = mysqli_query($con,$select_query);
                
                
                while($row = mysqli_fetch_assoc($result_query)){
                    $product_id = $row['product_id'];
                    $product_title = $row['product_title'];
                    $product_description = $row['product_description'];
                    $product_keyword = $row['product_keyword'];
                    $category_id = $row['category_id'];
                    $product_image1 = $row['product_image1'];
                    $product_image2 = $row['product_image2'];
                    $product_image3 = $row['product_image3'];
                    $brand_id = $row['brand_id'];
                    echo" <div class='col-md-4 mb-2'>
                    <div class='card'>
                        <!-- First product card content -->
                        <img src='./admin/product_images/$product_image1' class='card-img-top' alt='...'>
                        <div class='card-body'>
                            <h5 class='card-title'>$product_title</h5>
                            <p class='card-text'>$product_description</p>
                            <a href='#' class='btn btn-outline-info'>Add to Cart</a>
                            <a href='productsdetails.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
                        </div>
                    </div>
                </div>
                
                <div class='col-md-8'>
                    <!-- related images -->
                    <div class='row'>
                        <div class='col-md-12'>
                            <h4 class='text-center text-dark mb-5'>Related Products Image</h4>
                        </div>
                        <div class='col-md-6 '>
                        <img src='./admin/product_images/$product_image2' class='card-img-top' alt='...'>
                            
                        </div>
                        
                        <div class='col-md-6'>
                        <img src='./admin/product_images/$product_image3' class='card-img-top' alt='...'>
                            
                        </div>
                    </div>
                </div>

                ";
                }

}
}
}
}
?>
