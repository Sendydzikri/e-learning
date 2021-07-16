<div id="layoutSidenav_content">
	<main>
		<div class="container mb-4 mt-4">
			<center><h1> Form Update Guru </h1></center>
			<?php foreach($guru as $data){ ?>
				<form method="post" action="<?= base_url('C_Admin/aksiUpdateGuru/'.$data['user_id']) ?>">
					<div class="form-group">
					    <label for="exampleInputEmail1">Email address</label>
					    <input type="email" value="<?= $data['email'] ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan email" disabled>
					 </div>
					<div class="form-group">
					    <label for="exampleInputEmail1">Nama</label>
					    <input type="text" name="nama" value="<?= $data['teacher_name'] ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan Nama">
					 </div>

					<div class="form-group">
					    <label for="exampleInputEmail1">Password Baru</label>
					    <input type="password" name="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan Password">
					 </div>


					 	<br>
					 <div class="form-group">
					 <button type="submit" class="btn btn-success"> Submit </button>
					  <a href="<?= base_url('C_Admin/guru')?>" class="btn btn-primary"> Kembali </a>				 
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