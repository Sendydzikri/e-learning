            <div id="layoutSidenav_content">
                <main>
                    <div class="card mb-4 mt-4">
                    <div class="container">
                        <br>
                        <a class="btn btn-primary" href="<?= base_url('C_Admin/tambahMapel') ?>"> Tambah Mapel </a>                        
                            <div class="card-header mt-4 mb-4">
                                <i class="fas fa-table me-1"></i>
                                Data Mapel
                            </div>
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>ID Mapel </th>
                                            <th>Nama Mapel</th>
                                            <th>Deskripsi Mapel</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i = 1; foreach($mapel as $data){ ?>
                                    <tr>
                                            <td><?=$i++ ?></td>
                                            <td><?=$data['quiz_subject_id'] ?></td>
                                            <td><?=$data['quiz_subject_name'] ?></td>
                                            <td><?=$data['quiz_subject_description'] ?></td>
                                            <td>
                                                
                                                <a href="<?= base_url('C_Admin/updateMapel/'. $data['quiz_subject_id'] ) ?>" class="btn btn-warning">
                                                    Update
                                                </a>
                                                <a href="<?= base_url('C_Admin/hapusMapel/'. $data['quiz_subject_id'] ) ?>" class="btn btn-danger">
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