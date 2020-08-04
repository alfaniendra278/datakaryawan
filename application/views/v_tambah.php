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
          <h5 class="card-title">Tambah Data Karyawan</h5>
        </div>
        <div class="card-body">
            <?php echo form_open('karyawan/insert',''); ?>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Nama Terang</label>
                  <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Terang">
                  <?php echo form_error('nama', '<div class="text-danger"><small>', '</small></div>');?>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Nomor Induk</label>
                  <input type="numeric" name="induk" id="induk" class="form-control" placeholder="Nomor Induk">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Alamat Lengkap</label>
                    <input type="text" name="alamat" id="alamat" class="form-control" placeholder="Alamat Lengkap">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Tanggal Masuk (dengan format YYYY-MM-DD HH:MM:SS)</label>
                    <input type="datetime" class="form-control" name="dateadd" id="dateadd" placeholder="Tanggal Masuk">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Status</label>
                    <input type="numeric" name="status" id="status" class="form-control" placeholder="Status">
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