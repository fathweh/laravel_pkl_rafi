<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php $nama = "Faza"; ?>
    @php $umur = 17; @endphp
    Nama Saya &nbsp; 
    <?php echo $nama; ?> <br>
    umur saya <strong>{{$umur}}</strong>
</body>
</html>