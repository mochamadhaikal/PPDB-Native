<!DOCTYPE html>
<html>
    <head>
        <title>Cetak PDF</title>
    </head>
<body>
<style type="text/css">
    body{
        font-family: sans-serif;
    }
    table{
        margin: 20px auto;
        border-collapse: collapse;
    }
    table th,
    table td{
        border: 1px solid #3c3c3c;
        padding: 3px 8px;

    }
    a{
        background: blue;
        color: #fff;
        padding: 8px 10px;
        text-decoration: none;
        border-radius: 2px;
    }
    .tengah{
        text-align: center;
    }
</style>
<table>
    <tr>
        <th>No Daftar</th>
        <th>Nama Lengkap</th>
        <th>JK</th>
        <th>Alamat Lengkap</th>
        <th>Agama</th>
        <th>Asal SMP</th>
        <th>Jurusan</th>
    </tr>
    <?php 

include 'config/connect.php';
include 'library/controller.php';

    $go = new controller();
    $tabel = "tbl_registrasi";
    $redirect = "?menu=form_ppdb";
    @$where = "NoDaftar= $_GET[id]";

if (isset($_GET['edit'])) {
    $edit = $go->edit($conn, $tabel, $where);
}
    ?>
    <tr>
        <td><?php echo @$edit['NoDaftar'] ?></td>
        <td><?php echo @$edit['NamaLengkap']; ?></td>
        <td><?php echo @$edit['JK']; ?></td>
        <td><?php echo @$edit['AlamatLengkap']; ?></td>
        <td><?php echo @$edit['Agama'] ?></td>
        <td><?php echo @$edit['AsalSMP']; ?> </td>
        <td><?php echo @$edit['Jurusan']; ?></td>
    </tr>
</table>
    <script>
 window.print();
 </script>
</body>
</html>

