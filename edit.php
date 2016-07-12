<?php

require('./library.php');

if (isset($_GET['kb'])) {
    $Lib = new Library();
    $book = $Lib->editBook($_GET['kb']);
    $edit = $book->fetch(PDO::FETCH_OBJ);
    echo '
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Add Book</title>
<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<link rel="stylesheet" href="css/bootstrap.min.css">
<script src="js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
<h2>Ubah Data Buku</h2>
<form action="edit.php" method="POST" class="form-group">
    Kode Buku: 
        <input type="text" name="kb" value="' . $edit->kodebuku . '" class="form-control"><br>
    Judul Buku: 
        <input type="text" name="jb" value="' . $edit->judulubuku . '" class="form-control"><br>
    Pengarang Buku: 
        <input type="text" name="pengbu" value="' . $edit->pengarang . '" class="form-control"><br>
    Penerbit Buku: 
        <input type="text" name="penerbu" value="' . $edit->penerbit . '" class="form-control"><br>
    <input type="submit" name="updateBook" value="Update" class="btn btn-info">
</form>
</div>
</body>
</html>
';
}

if (isset($_POST['updateBook'])) {
    $kb = $_POST['kb'];
    $jb = $_POST['jb'];
    $pengbu = $_POST['pengbu'];
    $penerbu = $_POST['penerbu'];

    $Lib = new Library();
    $upd = $Lib->updateBook($kb, $jb, $pengbu, $penerbu);
    if ($upd == "Berhasil") {
        header('Location: list.php');
    }
}
?>