<?php
 session_start();
 include_once 'dbConfig.php';
 $id=$_GET['id'];

 // File upload path
$targetDir = "uploads/";

if (isset($_POST['submit'])) {
    if (!empty($_FILES["file"]["name"])) {
        $fileName = basename($_FILES["file"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

        // Allow certain file formats
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'pdf');
        if (in_array($fileType, $allowTypes)) {
            if (move_uploaded_file($_FILES['file']['tmp_name'], $targetFilePath)) {

                $sql="SELECT * FROM `images` WHERE id_member=$id";
                $query = mysqli_query($db, $sql);
                $data = mysqli_fetch_array($query);
                if($data==NULL){
                $insert = $db->query("INSERT INTO images(id_member,file_name,uploaded_on ) VALUES ('".$id."','".$fileName."',NOW()) ");
                }
                else
                {
                $insert = $db->query("UPDATE `images` SET `file_name`='$fileName',`uploaded_on`='NOW()' WHERE id_member=$id");
                }
                
                if ($insert) {
                    
                    $_SESSION['statusMsg'] = "The file <b>" . $fileName . "</b> has been uploaded successfully.";
                    header("location:../welcome.php");
                } else {
                    $_SESSION['statusMsg'] = "File upload failed, please try again.";
                    header("location:http://127.0.0.1/WebProject/welcome.php");
                }
            } else {
                $_SESSION['statusMsg'] = "Sorry, there was an error uploading your file.";
            }   header("location:http://127.0.0.1/WebProject/welcome.php");
        } else {
            $_SESSION['statusMsg'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed to upload.";
            header("location:http://127.0.0.1/WebProject/welcome.php");
        }
    } else {
        $_SESSION['statusMsg'] = "Please select a file to upload.";
        header("location:http://127.0.0.1/WebProject/welcome.php");
    }
}
?>