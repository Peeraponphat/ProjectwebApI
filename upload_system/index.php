<?php

    session_start();
    include_once 'dbConfig.php';
    $id2=$_GET['id_MM'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Upload System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous">
    </script>
</head>

<body>

    <div class="container">
        <div class="row" mt-5>
            <div class="col-12">


                <form action="upload.php?id=<?php echo $_GET['id_MM'];?>" method="POST" enctype="multipart/form-data">


                    <div
                        class="text-center justify-content-center align-items-center p-4 border-2 border-dashed rounded-3">
                        <h6 class="my-2">Select image file to upload</h6>
                        <input type="file" name="file" class="form-control streched-linked"
                            accept="image/gif, image/jpeg, image/png">
                        <p class="small mb-0 mt-2"><b>Note :</b> Only JPG, JPEG, PNG & GIF files are allowed to upload
                        </p>
                    </div>
                    <div class="d-sm-flex justify-content-end mt-2">
                        <input type="submit" name="submit" value="Upload" class="btn btn-sm btn-primary mb-3">
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <?php if (!empty($_SESSION['statusMsg']))  { ?>
            <div class="alert alert-secondary" role="alert">
                <?php echo $_SESSION['statusMsg']; ?>
            </div>

            <?php } ?>
        </div>

        <div class="row g-2">
            <?php
                $query = $db->query("SELECT * FROM `images` WHERE id_member = $id2");
                if ($query->num_rows > 0) {
                    while($row = $query->fetch_assoc()) {
                        $imageURL = 'uploads/'.$row['file_name'];
                        ?>
            <div class="col-sm-6 col-lg-4 col-xl-3">
                <div class="card shadow h-100">
                    <img src="<?php echo $imageURL ?>" alt="" width="100%" class="card-img">
                </div>
            </div>
            <?php
                    }
                } else { ?>
            <p>No image found...</p>
            <?php } ?>

        </div>
    </div>

</body>

</html>