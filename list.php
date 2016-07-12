<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>List Book</title>
        <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <script src="js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container">
            <h2>Daftar Buku yang Tersedia</h2>
            <table class="table">
                <tr>
                    <td>Kode Buku</td>
                    <td>Judul Buku</td>
                    <td>Pengarang Buku</td>
                    <td>Penerbit Buku</td>
                    <td>Edit</td>
                    <td>Delete</td>
                </tr>
                <?php
                require("./library.php");
                $Lib = new Library();
                $show = $Lib->showBooks();
                while ($data = $show->fetch(PDO::FETCH_OBJ)) {
                    echo "
<tr>
<td>$data->kodebuku</td>
<td>$data->judulubuku</td>
<td>$data->pengarang</td>
<td>$data->penerbit</td>
<td><a class='btn btn-danger' href='list.php?delete=$data->kodebuku'>Delete</a></td>
<td><a class='btn btn-info' href='edit.php?kb=$data->kodebuku'>Edit</td>
</tr>";
                };
                ?>
            </table>
            <a href="index.php" class="btn btn-success">Tambah Buku Baru</a>
        </div>
    </body>
</html>
 
<?php
if (isset($_GET['delete'])) {
    $del = $Lib ->deleteBook($_GET['delete']);
}
?>