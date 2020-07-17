<!doctype html>
<html>

<head>
    <title>Chain Dropdown - harviacode</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/bootstrap.css') ?>" />
</head>

<body>
    <div class="container">
        <div class="col-md-6">
            <h2>Chain Dropdown Example</h2>
            <form action="<?php echo site_url('chain/aksi_form') ?>" method="post">
                <div class="form-group">
                    <label>Provinsi</label>
                    <select class="form-control" name="provinsi" id="provinsi">
                        <option value="">Please Select</option>
                        <?php
                        foreach ($provinsi as $prov) {
                        ?>
                            <option <?php echo $provinsi_selected == $prov->id ? 'selected="selected"' : '' ?> value="<?php echo $prov->id ?>"><?php echo $prov->nama_provinsi ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Kabupaten</label>
                    <select class="form-control" name="kabupaten" id="kabupaten">
                        <option value="">Please Select</option>
                        <?php
                        foreach ($kabupaten as $kab) {
                        ?>
                            <!--di sini kita tambahkan class berisi id provinsi-->
                            <option <?php echo $kabupaten_selected == $kab->provinsi_id ? 'selected="selected"' : '' ?> class="<?php echo $kab->provinsi_id ?>" value="<?php echo $kab->id ?>"><?php echo $kab->nama_kabupaten ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Kecamatan</label>
                    <select class="form-control" name="kecamatan" id="kecamatan">
                        <option value="">Please Select</option>
                        <?php
                        foreach ($kecamatan as $kec) {
                        ?>
                            <!--di sini kita tambahkan class berisi id kota-->
                            <option <?php echo $kecamatan_selected == $kec->id ? 'selected="selected"' : '' ?> class="<?php echo $kec->kabupaten_id ?>" value="<?php echo $kec->id ?>"><?php echo $kec->nama_kecamatan ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Simpan">
                </div>
            </form>
        </div>
    </div>
    <script src="<?php echo base_url('assets/js/jquery-1.10.2.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/jquery.chained.min.js') ?>"></script>
    <script>
        $("#kabupaten").chained("#provinsi"); // disini kita hubungkan kota dengan provinsi
        $("#kecamatan").chained("#kabupaten"); // disini kita hubungkan kecamatan dengan kota
    </script>
</body>

</html>