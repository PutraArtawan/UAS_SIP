<!-- Begin Page Content -->
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Daftar Berita</h1>
    <!-- Page Heading -->
</div>
<div class="card-body">
    <?php echo anchor('berita/tambah_berita', '<button class="btn btn-primary btn-flat btn-sm pull-right">Tambah Berita</button>'); ?>
    <div class="table-responsive">
        <?php
        if (count($hasil) > 0) {
            $i = 1;
        ?>
            <table id="example1" class="table table-bordered table-striped" width="100%">
                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th width="50%">Judul</th>
                        <th width="10%">Kategori</th>
                        <th width="15%">Tanggal</th>
                        <th width="5%">Oleh</th>
                        <th width="10%">Status</th>
                        <th width="5%">Edit</th>
                        <th width="5%">Hapus</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($hasil as $key => $list) {
                    ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $list['post_title']; ?></td>
                            <td><?php echo $list['category_name']; ?></td>
                            <td><?php echo $list['post_posting_date']; ?></td>
                            <td><?php echo $list['nama']; ?></td>
                            <td><?php echo $list['post_status']; ?></td>
                            <td>
                                <a href='<?php echo "./berita/edit_berita/$list[post_id]"; ?>'>
                                    <div class="btn btn-warning btn-sm">Edit</div>
                                </a>
                            </td>
                            <td>
                                <a href='<?php echo "./berita/delete/$list[post_id]"; ?>'>
                                    <div class="btn btn-danger btn-sm">Hapus</div>
                                </a>
                            </td>
                        </tr>
                    <?php
                        $i++;
                    }
                    ?>
                </tbody>
            </table>
        <?php
        } else {
        ?>
            <p class="text-muted">Data Not Available..</p>
        <?php
        }
        ?>
    </div>
</div>
</div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
<!-- Modal Tambah Data -->