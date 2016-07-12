<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Tambah Buku</title>
        <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <script src="js/bootstrap.min.js"></script>

    </head>
    <body>
        <div class="container">
            <h2>Tambah Buku Baru</h2>
            <form action="index.php" method="POST" class="form-group row">
                Kode Buku: <input type="text" name="kb" class="form-control"><br>
                Judul Buku: <input type="text" name="jb" class="form-control"><br>
                Pengarang Buku: <input type="text" name="pengbu" class="form-control"><br>
                Penerbit Buku: <input type="text" name="penerbu" class="form-control"><br>
                <input type="submit" name="addBook" value="Add Book" class="btn btn-success"><input type="reset" value="Reset" class="btn btn-warning">
            </form>
        </div>
    </body>
</html>
<?php
require('./library.php');
if (isset($_POST['addBook'])) {
    $kb = $_POST['kb'];
    $jb = $_POST['jb'];
    $pengbu = $_POST['pengbu'];
    $penerbu = $_POST['penerbu'];

    $Lib = new Library();
    $add = $Lib->addBook($kb, $jb, $pengbu, $penerbu);
    if ($add == "Berhasil") {
        header('Location: list.php');
    }
}