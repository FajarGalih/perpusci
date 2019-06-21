<div class="content-wrapper">
    
    <section class="content">
        <div class="box box-warning box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">INPUT DATA TBL_BUKU</h3>
            </div>
            <form action="<?php echo $action; ?>" method="post">
            
<table class='table table-bordered>'        

	    <tr><td width='200'>Judul <?php echo form_error('judul') ?></td><td><input type="text" class="form-control" name="judul" id="judul" placeholder="Judul" value="<?php echo $judul; ?>" /></td></tr>
	    <tr><td width='200'>Penulis <?php echo form_error('penulis') ?></td><td><input type="text" class="form-control" name="penulis" id="penulis" placeholder="Penulis" value="<?php echo $penulis; ?>" /></td></tr>
	    <tr><td width='200'>Penerbit <?php echo form_error('penerbit') ?></td><td><input type="text" class="form-control" name="penerbit" id="penerbit" placeholder="Penerbit" value="<?php echo $penerbit; ?>" /></td></tr>
	    <tr><td width='200'>Tahun <?php echo form_error('tahun') ?></td><td><input type="text" class="form-control" name="tahun" id="tahun" placeholder="Tahun" value="<?php echo $tahun; ?>" /></td></tr>
	    <tr><td width='200'>Id Rak <?php echo form_error('id_rak') ?></td><td><?php echo cmb_dinamis('id_rak', 'tbl_rak', 'nama_rak', 'id_rak') ?></td></tr>
	    <tr><td></td><td><input type="hidden" name="id_buku" value="<?php echo $id_buku; ?>" /> 
	    <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
	    <a href="<?php echo site_url('buku') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a></td></tr>
	</table></form>        </div>
</div>
</div>