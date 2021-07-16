            <div id="layoutSidenav_content">
                <main>
                    <div class="card mb-4 mt-4">
                    <div class="container">
                        <br>    
                            <a class="btn btn-primary" href="<?= base_url('C_Admin/tambahKelas') ?>"> Tambah Data Kelas</a>
                            <div class="card-header mt-4 mb-4">
                                <i class="fas fa-table me-1"></i>
                                Data Kelas
                            </div>
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kelas ID</th>
                                            <th>Nama Kelas</th>
                                            <th>Deskripsi </th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i = 1; foreach($kelas as $data){ ?>
                                    <tr>
                                            <td><?=$i++ ?></td>
                                            <td><?=$data['student_class_id'] ?></td>
                                            <td><?=$data['student_class_name'] ?></td>
                                            <td><?=$data['student_class_description'] ?></td>
                                            <td>
                                                
                                                <a href="<?= base_url('C_Admin/updateKelas/'. $data['student_class_id'] ) ?>" class="btn btn-warning">
                                                    Update
                                                </a>
                                                <a href="<?= base_url('C_Admin/hapusKelas/'. $data['student_class_id'] ) ?>" class="btn btn-danger">
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