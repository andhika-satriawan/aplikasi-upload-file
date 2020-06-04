<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload File dengan PHP dan MySQL</title>
</head>
<body>
    <form action="aksi.php" method="POST" enctype="multipart/form-data"> 
        <input type="file" name="file" />
        <input type="submit" name="upload" value="Upload" />
    </form>
</body>
</html>