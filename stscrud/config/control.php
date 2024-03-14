<?php

function select ($query)
{
    global $db;
     
    $result = mysqli_query($db, $query);
    $rows= [];

    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

function create_peminjaman($post)
{
    global $db;

    $nama =$post['nama'];
    $jumlah =$post['jumlah'];
    $peminjam =$post['peminjam'];

    $query = "INSERT INTO peminjaman VALUES(null, '$nama', '$jumlah', CURRENT_TIMESTAMP(), '$peminjam')";
    mysqli_query($db, $query);
    return mysqli_affected_rows($db);
}

function update_peminjaman($post)
{
    global $db;
    $id_barang = $post['id_barang'];
    $nama =$post['nama'];
    $jumlah =$post['jumlah'];
    $peminjam =$post['peminjam'];

    $query = "UPDATE peminjaman SET nama = '$nama', jumlah = '$jumlah', peminjam = '$peminjam' WHERE id_barang = $id_barang";
    mysqli_query($db, $query);
    return mysqli_affected_rows($db);
}

function delete_peminjaman($id_barang)
{
    global $db;

    $query ="DELETE FROM peminjaman WHERE id_barang = $id_barang";

    mysqli_query($db, $query);
    return mysqli_affected_rows($db);
}

?>