<div class="content-wrapper">
    
    <section class="content">
        <div class="box box-warning box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">INPUT DATA TBL_RAK</h3>
            </div>
            <form action="<?php echo $action; ?>" method="post">
            
<table class='table table-bordered>'        

	    <tr><td width='200'>Nama Rak <?php echo form_error('nama_rak') ?></td><td><input type="text" class="form-control" name="nama_rak" id="nama_rak" placeholder="Nama Rak" value="<?php echo $nama_rak; ?>" /></td></tr>
	    <tr><td></td><td><input type="hidden" name="id_rak" value="<?php echo $id_rak; ?>" /> 
	    <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
	    <a href="<?php echo site_url('tbl_rak') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a></td></tr>
	</table></form>        </div>
</div>
</div>