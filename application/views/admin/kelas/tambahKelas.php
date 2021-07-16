<div id="layoutSidenav_content">
	<main>
		<div class="container mb-4 mt-4">
			<center><h1> Form Tambah Kelas </h1></center>
				<form method="post" action="<?= base_url('C_Admin/aksiTambahKelas') ?>">
					<div class="form-group">
					    <label for="exampleInputEmail1">Nama Kelas</label>
					    <input type="text" name="nama" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan Nama Kelas">
					 </div>
					<div class="form-group">
					    <label for="exampleInputEmail1">Deskripsi Kelas</label>
					    <input type="text" name="deskripsi" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan Deskripsi Kelas">
					 </div>	<br>
					 <div class="form-group">
					 <button type="submit" class="btn btn-success"> Submit </button>
					  <a href="<?= base_url('C_Admin/kelas')?>" class="btn btn-primary"> Kembali </a>				 
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