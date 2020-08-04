	<!-- menghubungkan dengan file jquery -->
	<script type="text/javascript" src="jquery.js"></script>
 <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
			  <div class="card demo-icons">
                <h4 class="card-title"> Data Karyawan</h4>
			  </div>
			  <div class="card-body all-icons">
                <div id="icons-wrapper">
			  	<div>
			  	<font color="green"><?php echo $this->session->flashdata('pesan'); ?></font>
				<a href="<?php echo base_url('karyawan/form_insert');?>" type="button" class="btn btn-primary fa fa-plus btn-xs">&nbsp;&nbsp;Tambah data
				</a>
				<a href="<?php echo base_url('karyawan/export');?>" type="button" class="btn btn-info fa fa-print btn-xs">&nbsp;&nbsp;Eksport Excell
				</a>
				<a href="<?php echo base_url('karyawan/cetak');?>" type="button" class="btn btn-warning fa fa-print btn-xs">&nbsp;&nbsp;Eksport PDF
				</a>
				</div>
				<div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
						<th>No</th>
                    	<th>Nomor Induk</th>
                    	<th>Nama</th>
                    	<th>Alamat</th>
                    	<th>Tanggal Masuk</th>
						<th>Status</th>
						<th >Action</th>
                    </thead>
                    <tbody>
					<?php
						foreach ($ci_karyawan as $data){
					?>
                      <tr>
							<td><?php echo $data->k_id ?></td>
							<td><?php echo $data->k_induk ?></td>
							<td><?php echo $data->k_name ?></td>
							<td><?php echo $data->k_alamat ?></td>
							<td><?php echo $data->k_dateadd ?></td>
							<td><?php echo $data->k_status ?></td>
							<td>
								<a class="text-right" href="<?php echo base_url('karyawan/edit/'.$data->k_id,'' );?>">
									<button type="button" class="btn btn-success btn-xs">Edit</button>
								</a>
								<a href="<?php echo base_url('karyawan/delete/'.$data->k_id);?>">
									<button type="button" class="btn btn-danger btn-xs">Delete</button>
								</a>
							</td>
						</tr>
						<?php } ?>
                    </tbody>
				  </table>
				  <div>
					<?php echo $this->session->flashdata('pesan'); ?>
				</div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>