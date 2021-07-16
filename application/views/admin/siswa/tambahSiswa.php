<div id="layoutSidenav_content">
	<main>
		<div class="container mb-4 mt-4">
			<center><h1> Form Tambah Siswa </h1></center>
				<form method="post" action="<?= base_url('C_Admin/aksiTambahSiswa') ?>">
					<div class="form-group">
					    <label for="exampleInputEmail1">Nama Siswa</label>
					    <input type="text" name="nama" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan Nama Siswa">
					 </div>
					<div class="form-group">
					    <label for="exampleInputEmail1">Email</label>
					    <input type="text" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="example@gmail.com">
					 </div>
					<div class="form-group">
					    <label for="exampleInputEmail1">Password</label>
					    <input type="password" name="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan Password">
					 </div>					 	
					 <div class="form-group">
					 	 <label for="exampleInputEmail1">Kelas</label>
					 	 <select name="kelas" class="form-control">
					 	 	<?php foreach($kelas as $data){ ?>
					 	 		<option value="<?= $data['student_class_id'] ?> "> <?= $data['student_class_name']; ?> </option>
					 	 	<?php }?>
					 	 </select>
					 </div> 
					 <div class="form-group">
					 	 <label for="exampleInputEmail1">Gender</label>
					 	 <select name="gender" class="form-control">
					 	 	<option value="laki-laki">Laki-Laki</option>
					 	 	<option value="perempuan">Perempuan</option>					 	 	
					 	 </select>
					 </div> 					 				 	<br>	
					 <div class="form-group">
					 <button type="submit" class="btn btn-success"> Submit </button>
					  <a href="<?= base_url('C_Admin/siswa')?>" class="btn btn-primary"> Kembali </a>				 
					</div>
				</form>
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