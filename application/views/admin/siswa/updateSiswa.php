<div id="layoutSidenav_content">
	<main>
		<div class="container mb-4 mt-4">
			<center><h1> Form Update Siswa </h1></center>
			<?php foreach($siswa as $data){ ?>
				<form method="post" action="<?= base_url('C_Admin/aksiUpdateSiswa/'.$data['user_id']) ?>">
					<div class="form-group">
					    <label for="exampleInputEmail1">Email address</label>
					    <input type="email" value="<?= $data['email'] ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" disabled>
					 </div>
					<div class="form-group">
					    <label for="exampleInputEmail1">Nama Siswa</label>
					    <input type="text" name="nama" value="<?= $data['student_name'] ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Siswa">
					 </div>
					 <div class="form-group">
					 	 <label for="exampleInputEmail1">Kelas</label>
					 	 <select name="kelas" class="form-control">
					 	 	<?php foreach($kelas as $data1){ ?>
					 	 		<option value="<?= $data1['student_class_id'] ?> "> <?= $data1['student_class_name']; ?> </option>
					 	 	<?php }?>
					 	 </select>
					 </div>
					 <div class="form-group">
					 	 <label for="exampleInputEmail1">Gender</label>
					 	 <select name="gender" class="form-control">
					 	 	<?php if($data['student_gender'] == "laki-laki"){ ?>
					 	 	<option value="laki-laki" selected>Laki-Laki</option>
					 	 	<option value="perempuan" >Perempuan</option>
					 	 	<?php }else{ ?>
					 	 	<option value="laki-laki">Laki-Laki</option>
					 	 	<option value="perempuan" selected>Perempuan</option>
						 	<?php } ?>

					 	 </select>
					 </div> 

					<div class="form-group">
					    <label for="exampleInputEmail1">Password Baru</label>
					    <input type="password" name="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan Password">
					 </div>					 
					 	<br>
					 <div class="form-group">
					 <button type="submit" class="btn btn-success"> Submit </button>
					  <a href="<?= base_url('C_Admin/siswa')?>" class="btn btn-primary"> Kembali </a>				 
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