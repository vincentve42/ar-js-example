<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload</title>
    <style>
        .i{
            padding-top: 10px;
        }
    </style>
</head>
<body>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <div class="i"><input type="file" name="image" placeholder="Select Image" id="image"></div>
        <div class="i"><input type="file" name="video" placeholder="Select Video" id="video"></div>
        <div class="i"><input type="submit" value="Upload" placeholder="Masukan Ke Dalam database"></div>
    </form>

    <?php 
        $servertype = 1;
        $conn = new mysqli("127.0.0.1","root","","focusz");
        $targetdir = "server1/image/";
        $query = "SELECT * from server WHERE namaserver='$servertype'";
        $result = $conn->query($query);
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()) {
                $jumlahserver = $row['jumlah'];
                echo $jumlahserver;
            }
        }
        
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $_FILES["image"]["name"] = $jumlahserver . ".jpg";
            $_FILES["video"]["name"] = $jumlahserver . ".mp4";
            $imgfile = $targetdir . basename($_FILES["image"]["name"]);
            $vidfile = "server1/video/" . basename($_FILES["video"]["name"]);
            move_uploaded_file($_FILES["image"]["tmp_name"],$imgfile);
            move_uploaded_file($_FILES["video"]["tmp_name"],$vidfile);
            $totalserver = $jumlahserver += 1;
            $addcount = "UPDATE server SET jumlah='$totalserver' WHERE namaserver='$servertype'";
            $conn -> query($addcount);
            $imgurl = $_FILES['image']['name'];
            $vidurl = $_FILES['video']['name'];
            $addaccount = "INSERT INTO server1 (id,img,video) VALUES ('$totalserver','$imgurl','$vidurl')";
            $conn -> query($addaccount);

        }
    ?>
</body>
</html>
