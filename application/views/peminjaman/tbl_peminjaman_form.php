<div class="content-wrapper">
    
    <section class="content">
        <div class="box box-warning box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">INPUT DATA TBL_PEMINJAMAN</h3>
            </div>
            <form action="<?php echo $action; ?>" method="post">
            
<table class='table table-bordered>'        

	    <tr><td width='200'>Tgl Pinjam <?php echo form_error('tgl_pinjam') ?></td><td><input type="text" class="form-control" name="tgl_pinjam" id="tgl_pinjam" placeholder="Tgl Pinjam" value="<?php echo $tgl_pinjam; ?>" /></td></tr>
	    <tr><td width='200'>Tgl Kembali <?php echo form_error('tgl_kembali') ?></td><td><input type="text" class="form-control" name="tgl_kembali" id="tgl_kembali" placeholder="Tgl Kembali" value="<?php echo $tgl_kembali; ?>" /></td></tr>
	    <tr><td width='200'>Petugas <?php echo form_error('id_petugas') ?></td><td><?php echo datalist_dinamis('id_petugas','tbl_user','full_name');?></td></tr>
	    <tr><td width='200'>Anggota <?php echo form_error('id_anggota') ?></td><td><?php echo datalist_dinamis('id_anggota','tbl_anggota','nama');?></td></tr>
	    <tr><td width='200'>Buku <?php echo form_error('id_buku') ?></td><td><?php echo datalist_dinamis('id_buku','tbl_buku','judul');?></td></tr>
	    <tr><td></td><td><input type="hidden" name="id_peminjaman" value="<?php echo $id_peminjaman; ?>" /> 
	    <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
	    <a href="<?php echo site_url('peminjaman') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a></td></tr>
	</table></form>        </div>
</div>
</div>