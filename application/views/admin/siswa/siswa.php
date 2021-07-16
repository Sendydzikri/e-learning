            <div id="layoutSidenav_content">
                <main>
                    <div class="card mb-4 mt-4">
                    <div class="container">
                        <br>
                        <a class="btn btn-primary" href="<?= base_url('C_Admin/tambahSiswa') ?>"> Tambah Siswa </a>                        
                            <div class="card-header mt-4 mb-4">
                                <i class="fas fa-table me-1"></i>
                                Data Siswa
                            </div>
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>User ID</th>
                                            <th>Nama Murid</th>
                                            <th>Kelas</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i = 1; foreach($siswa as $data){ ?>
                                    <tr>
                                            <td><?=$i++ ?></td>
                                            <td><?=$data['user_id'] ?></td>
                                            <td><?=$data['student_name'] ?></td>
                                            <td><?=$data['student_class_name'] ?></td>
                                            <td>
                                                
                                                <a href="<?= base_url('C_Admin/updateSiswa/'. $data['user_id'] ) ?>" class="btn btn-warning">
                                                    Update
                                                </a>
                                                <a href="<?= base_url('C_Admin/hapusSiswa/'. $data['user_id'] ) ?>" class="btn btn-danger">
                                                    Hapus
                                                </a>

                                            </td>
                                        <?php } ?>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                </main>
                <div>