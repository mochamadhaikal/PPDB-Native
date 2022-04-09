<?php
include 'config/connect.php';
include 'library/controller.php';

    $go = new controller();
    $tabel = "tbl_registrasi";
    $redirect = "?menu=form_ppdb";
    @$where = "NoDaftar= $_GET[id]";

    if (isset($_POST['create'])) {
        @$field = array('NoDaftar'=>$_POST['NoDaftar'],
                'NamaLengkap'=>$_POST['NamaLengkap'],
                'JK'=>$_POST['JK'], 
                'AlamatLengkap'=>$_POST['AlamatLengkap'],
                'Agama'=>$_POST['Agama'],
                'AsalSMP'=>$_POST['AsalSMP'],
                'Jurusan'=>$_POST['Jurusan']);
        $go->create($conn, $tabel, $field, $redirect);
    }
    if (isset($_GET['edit'])) {
        $edit = $go->edit($conn, $tabel, $where);
    }
    if (isset($_GET['delete'])) {
        $go->delete($conn, $tabel, $where, $redirect);
    }
    if (isset($_POST['ubah'])) {
        @$field = array('NoDaftar'=>$_POST['NoDaftar'],
                'NamaLengkap'=>$_POST['NamaLengkap'],
                'JK'=>$_POST['JK'], 
                'AlamatLengkap'=>$_POST['AlamatLengkap'],
                'Agama'=>$_POST['Agama'],
                'AsalSMP'=>$_POST['AsalSMP'],
                'Jurusan'=>$_POST['Jurusan']);
        $go->ubah($conn, $tabel, $field, $where, $redirect);
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form PPDB</title>
</head>
<body>
    <div class="container-fluid" id= "content" >
        <div class="card">
            <div class="card-header">
                Form PPDB
            </div>
            <div class="card-body">
                <form method="post">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label fw-bold">No Daftar</label>
                        <input type="text" name="NoDaftar" class="form-control" value="<?php echo @$edit['NoDaftar'] ?>" id="exampleFormControlInput1" placeholder="Masukan No Daftar" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label fw-bold">Nama Lengkap</label>
                        <input type="text" name="NamaLengkap" class="form-control" value="<?php echo @$edit['NamaLengkap'] ?>" id="exampleFormControlInput1" placeholder="Masukan Nama Lengkap" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label fw-bold">JK</label>
                        <input type="text" name="JK" class="form-control" value="<?php echo @$edit['JK'] ?>" id="exampleFormControlInput1" placeholder="Masukan JK" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label fw-bold">AlamatLengkap</label>
                        <input type="text" name="AlamatLengkap" class="form-control" value="<?php echo @$edit['AlamatLengkap'] ?>" id="exampleFormControlInput1" placeholder="Masukan Alamat Lengkap" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label fw-bold">Agama</label>
                        <input type="text" name="Agama" class="form-control" value="<?php echo @$edit['Agama'] ?>" id="exampleFormControlInput1" placeholder="Masukan Agama" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label fw-bold">Asal SMP</label>
                        <input type="text" name="AsalSMP" class="form-control" value="<?php echo @$edit['AsalSMP'] ?>" id="exampleFormControlInput1" placeholder="Masukan Asal SMP" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label fw-bold">Jurusan</label>
                        <input type="text" name="Jurusan" class="form-control" value="<?php echo @$edit['Jurusan'] ?>" id="exampleFormControlInput1" placeholder="Masukan Jurusan" required>
                    </div>
                    <?php if(@$_GET['id'] == ""){ ?>
                        <input type="submit" class="btn btn-primary" name="create" value="create">
                    <?php }else{ ?>
                        <input type="submit" class="btn btn-primary" name="ubah" value="Ubah Data">
                    <?php } ?>
            </form>
            </div>
        </div>
        <div style="padding:10px;">
            <form class="d-flex justify-content-start">
                <a href="?menu=form_ppdb" class="btn btn-outline-success" type="submit">Refresh</a>
            </form>
            <div class="table-responsive mt-3">
                <table align="center" border="1" class="mt-4 table table-striped table-hover bg-white" id="tableAll">
                    <thead>
                        <tr>
                            <th>No Daftar</th>
                            <th>Nama Lengkap</th>
                            <th>JK</th>
                            <th>Alamat Lengkap</th>
                            <th>Agama</th>
                            <th>Asal SMP</th>
                            <th>Jurusan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $data = $go->show($conn, $tabel);
                            $no = 0;
                            if($data==""){
                                echo "<tr><td colspan='4'>No Data</td></tr>";
                            }else{
                            foreach($data as $r){
                            $no++
                        ?>
                        <tr>
                        <td><?php echo $r['NoDaftar']?></td>
                            <td><?php echo $r['NamaLengkap']?></td>
                            <td><?php echo $r['JK']?></td>
                            <td><?php echo $r['AlamatLengkap']?></td>
                            <td><?php echo $r['Agama']?></td>
                            <td><?php echo $r['AsalSMP'] ?></td>
                            <td><?php echo $r['Jurusan']?></td>
                            <td><a href="?menu=form_ppdb&edit&id=<?php echo $r['NoDaftar']?>">Edit</a></td>
                            <td><a href="?menu=form_ppdb&delete&id=<?php echo $r['NoDaftar']?>" onclick="return confirm('Hapus Data?')">Hapus</a></td>
                            <!-- <td><a href="?menu=form_ppdb&cetak&id=<?php echo $r['NoDaftar']?>" target="_blank">Cetak PDF</a></td> -->
                            <td><a href="cetak.php?menu=form_ppdb&edit&id=<?php echo $r['NoDaftar']?>" target="_blank">Cetak PDF</a></td>
                        </tr>
                        <?php } } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>