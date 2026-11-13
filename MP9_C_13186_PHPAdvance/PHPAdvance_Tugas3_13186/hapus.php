<?php
    require 'koneksi.php';
    $id = $_GET['id'];

    if(!ctype_digit($id) || $id === '' ){
        echo '<p style = "color:red;">!! ID TIDAK VALID. !!</p>';
    }else{
        $stmt = mysqli_prepare($conn, 'DELETE FROM menu WHERE id = ?');
        mysqli_stmt_bind_param($stmt,'i',$id);
        mysqli_stmt_execute($stmt);
        
        if(mysqli_stmt_affected_rows($stmt) === 1){
             echo '<pstyle = "color:blue;> Data berhasil Disimpan.</p>';
        }else{
            echo '<p style = "color:red;">!! ID TIDAK DIHAPUS. !!</p>';
        }
    }
     echo '<a href = "index.php">kembali</a>';
?>