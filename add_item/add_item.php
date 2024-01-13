<?php
require_once '../config.php';

$productName = $_POST['product_name'];
$author = $_POST['author'];
$description = $_POST['description'];
$price = (int)$_POST['true_price'];
$quantity = $_POST['quantity'];
// $pictureFile = $_POST['picture_file'];

if ($con->connect_error) {
    die("Connection failed" . $con->connect_error);
} else {
        if(!empty($_FILES["picture_file"]["name"])) { 
            // Get file info 
            $fileName = basename($_FILES["picture_file"]["name"]); 
            $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
            $allowTypes = array('jpg','jpeg'); 

            if(in_array($fileType, $allowTypes)){ 
                $image = $_FILES['picture_file']['tmp_name']; 
                $imgContent = file_get_contents($image);
                // echo var_dump($imgContent);
                $stmt = $con->prepare("INSERT INTO product (product_name, author, description, price, quantity, pic) VALUES (?, ?, ?, ?, ?, ?)");
                $stmt->bind_param("sssiis", $productName, $author, $description, $price, $quantity, $imgContent);
                $stmt->execute();
                $stmt->close();
                $con->close();
                echo "Valid";
            } else {
                $e = empty($_FILES["picture_file"]["tmp_name"]);
                echo "Image not Valid" . $e;
            }

        } else {
            echo "Not found";
        }

    
}


// $stmt = $con->prepare("INSERT INTO product (product_name, author, description, price, quantity, pic) VALUES (?, ?, ?, ?, ?, ?)");
// $stmt->bind_param("sssiib", $productName, $author, $description, $price, $quantity, $pictureFile);
// $stmt->execute();
// $stmt->close();
// $con->close();

// Include the database configuration file  
// require_once 'dbConfig.php'; 
 
// // If file upload form is submitted 
// $status = $statusMsg = ''; 
// if(isset($_POST["submit"])){ 
//     $status = 'error'; 
//     if(!empty($_FILES["image"]["name"])) { 
//         // Get file info 
//         $fileName = basename($_FILES["image"]["name"]); 
//         $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
         
//         // Allow certain file formats 
//         $allowTypes = array('jpg','png','jpeg','gif'); 
//         if(in_array($fileType, $allowTypes)){ 
//             $image = $_FILES['image']['tmp_name']; 
//             $imgContent = addslashes(file_get_contents($image)); 
         
//             // Insert image content into database 
//             $insert = $db->query("INSERT into images (image, created) VALUES ('$imgContent', NOW())"); 
             
//             if($insert){ 
//                 $status = 'success'; 
//                 $statusMsg = "File uploaded successfully."; 
//             }else{ 
//                 $statusMsg = "File upload failed, please try again."; 
//             }  
//         }else{ 
//             $statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.'; 
//         } 
//     }else{ 
//         $statusMsg = 'Please select an image file to upload.'; 
//     } 
// } 
 
// // Display status message 
// echo $statusMsg;