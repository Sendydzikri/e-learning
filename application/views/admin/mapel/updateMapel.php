<div id="layoutSidenav_content">
	<main>
		<div class="container mb-4 mt-4">
			<center><h1> Form Update Mapel </h1></center>
			<?php foreach($mapel as $data){ ?>
				<form method="post" action="<?= base_url('C_Admin/aksiUpdateMapel/'.$data['quiz_subject_id']) ?>">

					<div class="form-group">
					    <label for="exampleInputEmail1">Nama Mapel</label>
					    <input type="text" name="nama" value="<?= $data['quiz_subject_name'] ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
					 </div>
					<div class="form-group">
					    <label for="exampleInputEmail1">Deskripsi Mapel</label>
					    <input type="text" name="deskripsi" value="<?= $data['quiz_subject_description'] ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
					 </div>	<br>					 
					 <div class="form-group">
					 <button type="submit" class="btn btn-success"> Submit </button>
					  <a href="<?= base_url('C_Admin/mapel')?>" class="btn btn-primary"> Kembali </a>				 
					</div>
				</form>
			<?php }?>
		</div>
	</main>
    <footer class="py-4 bg-light mt-auto">
    	<div class="container-fluid px-4">
        	<div class="d-flex align-items-center justify-content-between small">
            	<div class="text-muted">Copyright &copy; SmartT 2021</div>

            </div>
        </div>
    </footer>	
</div>