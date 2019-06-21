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
        <h2 style="margin-top:0px">Tbl_buku Read</h2>
        <table class="table">
	    <tr><td>Judul</td><td><?php echo $judul; ?></td></tr>
	    <tr><td>Penulis</td><td><?php echo $penulis; ?></td></tr>
	    <tr><td>Penerbit</td><td><?php echo $penerbit; ?></td></tr>
	    <tr><td>Tahun</td><td><?php echo $tahun; ?></td></tr>
	    <tr><td>Id Rak</td><td><?php echo $id_rak; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('buku') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>