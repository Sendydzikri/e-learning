            <div id="layoutSidenav_content">
                <main>
                    <div class="card mb-4 mt-4">
                    <div class="container">
                        <br>
                        <a class="btn btn-primary" href="<?= base_url('C_Admin/tambahGuru') ?>"> Tambah Guru </a>                        
                            <div class="card-header mt-4 mb-4">
                                <i class="fas fa-table me-1"></i>
                                Data Guru
                            </div>
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>User ID</th>
                                            <th>Email</th>
                                            <th>Nama Guru</th>
                                            <th>Role</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i = 1; foreach($guru as $data){ ?>
                                    <tr>
                                            <td><?=$i++ ?></td>
                                            <td><?=$data['user_id'] ?></td>
                                            <td><?=$data['email'] ?></td>
                                            <td><?=$data['teacher_name'] ?></td>
                                            <td><?=$data['name'] ?></td>
                                            <td>
                                                
                                                <a href="<?= base_url('C_Admin/updateGuru/'. $data['user_id'] ) ?>" class="btn btn-warning">
                                                    Update
                                                </a>
                                                <a href="<?= base_url('C_Admin/hapusGuru/'. $data['user_id'] ) ?>" class="btn btn-danger">
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