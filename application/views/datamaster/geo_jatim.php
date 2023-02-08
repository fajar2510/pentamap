
 
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->

    <div class="row">
        <div class="col-4">
             <div id="mapgeojson"></div>
        </div>
        <div class="col-8">
            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?>

            <!-- menampilkan jika terjadi tindakan berhasil atau error -->
            <?= $this->session->flashdata('message'); ?>

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data <?= $title; ?></h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Kabupaten/kota</th>
                                    <th>Kode Warna</th>
                                    <th>Luas Area<sup>2</sup> </th>
                                    <th>GeoJson</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($geojatim as $row) : ?>
                                    <tr>
                                        <th scope="row"><?= $i; ?></th>
                                        <td> <?= $row['nama_kabupaten']; ?></td>
                                        <td> <?= $row['warna']; ?></td>
                                        <td> <?= $row['luas_area']; ?>&nbsp;km<sup>2</sup></td>
                                        <td> <?= $row['geojson']; ?></td>
                                        <td class="text-center">
                                            <button type="button" data-toggle="modal" data-target="#modalEdit<?= $row['id_kabupaten']; ?>" class="btn btn-sm btn-warning" class="btn btn-sm btn-warning"> <i class="fa fa-edit"></i></button>
                                            <!-- <button type="button" data-toggle="modal" data-target="#modalHapus<?= $row['id_kabupaten']; ?>" class="btn btn-sm btn-danger"> <i class="fa fa-trash-alt"></i></button> -->
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->


<?php foreach ($geojatim as $row) : ?>
    <!-- edituserModal -->
    <div class=" modal fade" id="modalEdit<?= $row['id_kabupaten']; ?>" tabindex="-1" role="dialog" aria-labelledby="modalEditLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditLabel">Ubah <?= $title; ?> <b><?= $row['nama_kabupaten']; ?></b> </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('datamaster/edit_geoJatim/' . $row['id_kabupaten']); ?>" method="post" enctype="multipart/form-data" >
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="warna" class="col-sm-3 col-form-label">Pilih Warna</label>
                            <div class="col-sm-6">
                                <input required type="color" class="form-control form-control-color" title="Choose your color" id="warna" placeholder="" name="warna" value="<?= $row['warna']; ?>">
                                <?= form_error('warna', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="luas_area" class="col-sm-3 col-form-label">Luas Area <sup>2</sup></label>
                            <div class="col-sm-6">
                                <input required type="text" class="form-control" id="luas_area" placeholder="" name="luas_area" value="<?= $row['luas_area']; ?>">
                                <?= form_error('luas_area', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="geojson" class="col-sm-3 col-form-label">GeoJson <sup>nama</sup></label>
                            <div class="col-sm-6">
                                <input required type="text" class="form-control" id="geojson" placeholder="" name="geojson" value="<?= $row['geojson']; ?>">
                                <?= form_error('geojson', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <!-- <div class="form-group row">
                            <label for="image" class="col-sm-3 col-form-label">Logo Kab/kota</label>
                            <div class="col-sm-9">
                                <div  id="foto1"><img src="<?= base_url('assets/img/logo_kab/') . $row['logo_kab'] ?>" class="img-fluid " 
                                style="width: 100px; height: 120px; object-fit: cover; padding-bottom:20px;" alt="Logo Kabupaten"></div>
                                                                
                                <div  id="foto1"><img id="newimage"   src="http://placehold.it/180" class="img-fluid" alt="new image" style="width: 100px; height: 120px; object-fit: cover; padding-bottom:20px;"/></div>
                                                                
                                <div class="custom-file" >
                                    <input type="file"  class="custom-file-input" onchange="readURL(this);" id="newimage" name="image">
                                    <label class="custom-file-label" for="image">Pilih Gambar</label>
                                </div>
                            </div>
                        </div> -->
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light btn-icon-split" data-dismiss="modal">
                            <span class="icon text-gray-600">
                                <i class="fas fa-window-close"></i>
                            </span>
                            <span class="text">Batal</span>
                        </button>
                        <button type="submit" class="btn btn-primary btn-icon-split">
                            <span class="icon text-white-50">
                                <i class="fas fa-plus"></i>
                            </span>
                            <span class="text">Simpan</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>

