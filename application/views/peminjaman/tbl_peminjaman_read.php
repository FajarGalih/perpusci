<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Tbl_peminjaman Read</h2>
        <table class="table">
	    <tr><td>Tgl Pinjam</td><td><?php echo $tgl_pinjam; ?></td></tr>
	    <tr><td>Tgl Kembali</td><td><?php echo $tgl_kembali; ?></td></tr>
	    <tr><td>Id Petugas</td><td><?php echo $id_petugas; ?></td></tr>
	    <tr><td>Id Anggota</td><td><?php echo $id_anggota; ?></td></tr>
	    <tr><td>Id Buku</td><td><?php echo $id_buku; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('peminjaman') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>