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
                                    echo form_open_multipart("berita/tambah_berita", $attributes);
                                    ?>
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="post_title" class="control-lable">Judul</label>
                                            <input name="post_title" type="text" class="form-control" id="post-title" value="<?php echo set_value("post_title"); ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="post_title" class="control-lable">Kategory</label></br>
                                            <select name="post_category">
                                                <?php
                                                foreach ($hasil as $key => $list) {
                                                ?>
                                                    <option value="<?php echo $list['post_category_id']; ?>"><?php echo $list['category_name']; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="post_title" class="control-lable">Status</label></br>
                                            <select name="post_status">
                                                <option value="Publish">Publikasikan</option>
                                                <option value="Hidden">Sembunyikan</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="post_description" class="control-lable">Konten</label>
                                            <textarea name="post_description" id="editor1" placeholder="Tambahkan disini" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                        </div>
                                    </div>
                                    <div class="box-footer clearfix">
                                        <button type="submit" class="btn btn-primary btn-sm btn-flat pull-right" style="margin-right: 5px;">Simpan</button>
                                        <?php
                                        echo form_close();
                                        ?>
                                        <button class="btn btn-default btn-sm btn-flat pull-right" style="margin-right: 5px;" value="cancel" onClick="self.history.back()">Batal</button>
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