<?php
include 'config/connect.php';
include 'library/controller.php';

    $go = new controller();
    $tabel = "tbl_registrasi";
    @$field = array('NoDaftar'=>$_POST['NoDaftar'],
                'NamaLengkap'=>$_POST['NamaLengkap'],
                'JK'=>$_POST['JK'], 
                'AlamatLengkap'=>$_POST['AlamatLengkap'],
                'Agama'=>$_POST['Agama'],
                'AsalSMP'=>$_POST['AsalSMP'],
                'Jurusan'=>$_POST['Jurusan']);
    $redirect = "?menu=status";
    @$where = "NoDaftar= $_GET[id]";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PPDB</title>
</head>
<body>
<div class="container-fluid" id= "content" >
    <div class="card">
	    <div class="card-header">
		    PPDB SMK Semangat 45
	    </div>
	    <div class="card-body">
            <div style="padding:10px;">
                <div class="table-responsive mt-3">
                    <table align="center" border="1" class="mt-4 table table-striped table-hover bg-white" id="tableAll">
                        <thead>
                            <tr>
                                <th>Kode Buku</th>
                                <th>Judul Buku</th>
                                <th>NO ISBN</th>
                                <th>Penulis</th>
                                <th>Penerbit</th>
                                <th>Stok</th>
                                <th>Harga Pokok</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $sql = "SELECT * FROM tbl_registrasi";
                                $run = mysqli_query($conn, $sql);
                                while($r = mysqli_fetch_array($run)){
                            ?>
                            <tr>
                                <td><?php echo $r['NoDaftar']?></td>
                                <td><?php echo $r['NamaLengkap']?></td>
                                <td><?php echo $r['JK']?></td>
                                <td><?php echo $r['AlamatLengkap']?></td>
                                <td><?php echo $r['Agama']?></td>
                                <td><?php echo $r['AsalSMP'] ?></td>
                                <td><?php echo $r['Jurusan']?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
	    </div>
    </div>
</body>
</html>