        <!-- Begin Page Content -->
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="card shadow mb-4">
                <div class="card-body">
                    </section>
                    <?php echo $this->session->flashdata("message"); ?>
                    <!-- Main content -->
                    <section class="content">

                        <!-- Default box -->
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="box box-primary">
                                    <?php
                                    $attributes = array('autocomplete' => 'off', 'role' => 'form');
                                    echo form_open_multipart("admin/edit_pengelola/", $attributes);
                                    ?>
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="post_title" class="control-lable">Nama</label>
                                            <input name="post_title" type="text" class="form-control" id="post-title" placeholder="Nama" value="<?php echo $old_value["nama_pengelola"]; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="post_title" class="control-lable">Alamat</label>
                                            <input name="post_title" type="text" class="form-control" id="post-title" placeholder="Alamat" value="<?php echo $old_value["alamat_pengelola"]; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="post_title" class="control-lable">Kontak</label>
                                            <input name="post_title" type="text" class="form-control" id="post-title" placeholder="Kontak" value="<?php echo $old_value["kontak_pengelola"]; ?>">
                                        </div>
                                        <div class="box-footer clearfix">
                                            <button type="submit" class="btn btn-primary btn-sm btn-flat pull-right" style="margin-right: 5px;">Update</button>
                                            <?php
                                            echo form_close();
                                            ?>
                                            <button type="submit" class="btn btn-primary btn-sm btn-flat pull-right" style="margin-right: 5px;" onClick="self.history.back()">Batal</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </section>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->
        </div>
        <!-- End of Main Content -->