<div class="content">
    <div class="row">
    <div class="content">
      <div class="row">
        <div style="color: red;"><?php echo validation_errors(); ?></div>
      </div>
    </div>
    <div class="col-md-8">
      <div class="card card-user">
        <div class="card-header">
          <h5 class="card-title">Edit Data Karyawan</h5>
        </div>
        <div class="card-body">
            <font color="green"><?php echo $this->session->flashdata('pesan'); ?></font>
            <?php echo form_open('karyawan/update/'.$tmp->k_id,''); ?>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Nama Terang</label>
                  <input type="text" class="form-control" name="nama" id="nama" value="<?php echo $tmp->k_name; ?>">
                  <?php echo form_error('nama', '<div class="text-danger"><small>', '</small></div>');?>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Nomor Induk</label>
                  <input type="numeric" name="induk" id="induk" class="form-control" value="<?php echo $tmp->k_induk; ?>">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Alamat</label>
                    <input type="text" name="alamat" id="alamat" class="form-control" value="<?php echo $tmp->k_alamat; ?>">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Tanggal Masuk</label>
                    <input type="datetime" class="form-control" name="dateadd" id="dateadd" value="<?php echo $tmp->k_dateadd; ?>">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Status</label>
                    <input type="numeric" name="status" id="status" class="form-control" value="<?php echo $tmp->k_status; ?>">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="update ml-auto mr-auto">
                <a href="<?php echo base_url('karyawan')?>" class="btn btn-secunder btn-round">Batal</a>
                  <button type="submit" name="submit" class="btn btn-primary btn-round">Simpan</button>
              </div>
            </div>
            <?php echo form_close(); ?>
        </div>
      </div>
    </div>
  </div>
</div>