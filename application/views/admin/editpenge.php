<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Edit Data Aset</h1>

    <!-- DataTales Example -->
    <div class="row">
        <div class="col-lg">

            <div class="content-wrapper">
                <section class="content">
                    <form action="<?php echo base_url() . 'admin/saveupdate_pengelola'; ?>" method="post">
            </div>
            <div class="form-group">
                <label><b>Nama Pengelola</b></label>
                <input type="text" name="nama_pengelola" class="form-control" value="<?php echo $kode_aset['nama_pengelola'] ?>">
            </div>
            <div class="form-group">
                <label><b>Alamat</b></label>
                <input type="textbox" name="alamat" class="form-control" value="<?php echo $kode_aset['alamat'] ?>">
            </div>
            <div class="form-group">
                <label><b>Kontak</b></label>
                <input type="text" name="Kontak" class="form-control" value="<?php echo $kode_aset['kontak'] ?>">
            </div>
            <div class="form-group">
                <label><b>Foto Profil</b></label>
                <input type="file" name="gambar_profil" class="form-control">
            </div>

            <button type="button" class="btn btn-danger" action="<?php echo site_url('admin/list_pengelola'); ?>">Batal</button>
            <button type="submit" class="btn btn-primary">Simpan</button>

            </form>
            </section>
        </div>

    </div>
</div>
</div>