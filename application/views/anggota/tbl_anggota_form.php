<div class="content-wrapper">
    
    <section class="content">
        <div class="box box-warning box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">INPUT DATA TBL_ANGGOTA</h3>
            </div>
            <form action="<?php echo $action; ?>" method="post">
            
<table class='table table-bordered>'        

	    <tr><td width='200'>Nama <?php echo form_error('nama') ?></td><td><input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?php echo $nama; ?>" /></td></tr>
	    <tr><td width='200'>Kelas <?php echo form_error('kelas') ?></td><td><input type="text" class="form-control" name="kelas" id="kelas" placeholder="Kelas" value="<?php echo $kelas; ?>" /></td></tr>
	    <tr><td width='200'>Jurusan <?php echo form_error('jurusan') ?></td><td><input type="text" class="form-control" name="jurusan" id="jurusan" placeholder="Jurusan" value="<?php echo $jurusan; ?>" /></td></tr>
	    <tr><td width='200'>Angkatan <?php echo form_error('angkatan') ?></td><td><input type="text" class="form-control" name="angkatan" id="angkatan" placeholder="Angkatan" value="<?php echo $angkatan; ?>" /></td></tr>
	    <tr><td width='200'>Alamat <?php echo form_error('alamat') ?></td><td><input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat" value="<?php echo $alamat; ?>" /></td></tr>
	    <tr><td></td><td><input type="hidden" name="id_anggota" value="<?php echo $id_anggota; ?>" /> 
	    <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
	    <a href="<?php echo site_url('anggota') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a></td></tr>
	</table></form>        </div>
</div>
</div>