<?php
class Controller
{
    public function create($conn, $tabel, array $field, $redirect)
    {
        $sql = "INSERT INTO $tabel SET ";
        foreach($field as $key => $value){
            $sql.= " $key = '$value',";
        }
        $sql = rtrim($sql, ',');
        $run = mysqli_query($conn, $sql);
        if($run){
            echo "<script>alert('Selamat, Anda sudah terdaftar di SMK Semangat 45');document.location.href='$redirect'</script>";
        }else{
            echo "<script>alert('Gagal disimpan');document.location.href='$redirect'</script>";
        }
    }
    public function show($conn, $tabel)
    {
        $sql = "SELECT * FROM $tabel";
        $run = mysqli_query($conn, $sql);
        while(@$data = mysqli_fetch_assoc($run))
            $isi[] = $data;
            return @$isi;
    }
    public function edit($conn, $tabel, $where)
    {
        $sql = "SELECT * FROM $tabel WHERE $where";
        $run = mysqli_query($conn, $sql);
        @$tampung = mysqli_fetch_assoc($run);
        return $tampung;
    }

    //fungsi ubah
    public function ubah($conn, $tabel, array $field, $where, $redirect)
    {
        $sql = "UPDATE $tabel SET ";
        foreach($field as $key => $value){
            $sql.= " $key = '$value',";
        }
        $sql = rtrim($sql, ',');
        $sql.= " WHERE $where";
        $run = mysqli_query($conn, $sql);

        if($run){
            echo "<script>alert('Berhasil diubah');document.location.href='$redirect'</script>";
        }else{
            echo "<script>alert('Gagal diubah');document.location.href='$redirect'</script>";
        }
    }
    public function delete($conn, $tabel, $where, $redirect)
    {
        $sql = "DELETE FROM $tabel WHERE $where";
        $run = mysqli_query($conn, $sql);
        if($run){
            echo "<script>alert('Berhasil dihapus');document.location.href='$redirect'</script>";
        }else{
            echo "<script>alert('Gagal dihapus');document.location.href='$redirect'</script>";
        }
    }
}


?>