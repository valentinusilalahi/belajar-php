<?php

class Library {

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=phpdatabase', 'root', 'root');
    }

    public function addBook($kb, $jb, $pengbu, $penerbu) {
        $sql = "INSERT INTO buku (kodebuku, judulubuku, pengarang, penerbit) VALUES('$kb', '$jb', '$pengbu', '$penerbu')";
        $query = $this->db->query($sql);
        if (!$query) {
            return "Gagal";
        } else {
            return "Berhasil";
        }
    }

    public function editBook($kb) {
        $sql = "SELECT * FROM buku WHERE kodebuku='$kb'";
        $query = $this->db->query($sql);
        return $query;
    }

    public function updateBook($kb, $jb, $pengbu, $penerbu) {
        $sql = "UPDATE buku SET judulubuku='$jb', pengarang='$pengbu', penerbit='$penerbu' WHERE kodebuku='$kb'";
        $query = $this->db->query($sql);
        if (!$query) {
            return "Gagal";
        } else {
            return "Berhasil";
        }
    }

    public function showBooks() {
        $sql = "SELECT * FROM buku";
        $query = $this->db->query($sql);
        return $query;
    }

    public function deleteBook($kb) {
        $sql = "DELETE FROM buku WHERE kodebuku='$kb'";
        $query = $this->db->query($sql);
    }

}

?>