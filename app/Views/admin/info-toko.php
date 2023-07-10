<?= $this->extend('admin/main/bodyContent') ?>
<?= $this->section('content') ?>
<div class="container-fluid">
  <div class="row">
    <div class="col-5 fw-semibold invisible">
      <form class="d-flex p-3" role="search">
        <input class="form-control" type="search" placeholder="Search" aria-label="Search" />
        <button class="btn btn-outline-success ms-5" type="submit"></button>
      </form>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12 mb-2">
      <div class="px-3 py-3 rounded-3 fw-semibold text-white" style="background-color: #98fb98;">Profil Toko</div>
    </div>
  </div>
  <div class="row bg-white px-3 rounded-3" style="padding-top: 15px;">
    <div class="col-md-6 col-xs-12">
      <div class="col-md-12">
        <div style="text-align:center">
          <img src="<?= base_url(); ?>public/gambar/<?= $detail['gambar_utama'];?>" id="previewImage" class="m-3" width="200" height="200">
        </div>
      </div>
      <?= form_open_multipart('admin/proses/info-situs/update-gambar') ?>
        <?= csrf_field(); ?>
        <div class="col-md-12 mb-2">
          <div class="text-center">
            <input type="file" id="gambarUtama" name="gambarUtama" accept="image/png, image/jpeg" onchange="preview(event)" required><br>
          </div>
        </div>
        <div class="col-md-12 mb-2">
          <div class="text-center">
            <button type="submit" class="btn btn-primary btn-sm text-white" id="btnUpdateGambar" style="display:none;"><i class="fa-sharp fa-solid fa-pen"></i> Update Gambar</button>
          </div>
        </div>
      </form>
      <div class="col-md-12">
        <table class="table h-3">
          <tbody>
            <tr>
              <td>Selamat datang di "SayurKuy"!, Kami adalah toko yang berdedikasi untuk menyediakan sayuran segar dan sehat untuk memenuhi kebutuhan gizi harian Anda. Dengan komitmen kami terhadap kualitas dan kebersihan, kami menjadi destinasi terpercaya bagi para pecinta sayuran di seluruh kota.</td>
            </tr>
            <tr>
              <td>Jl. Ring Road Utara, Ngringin, Condongcatur, Kec. Depok, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55281</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <div class="col-md-6 col-xs-12">
      <?= form_open('admin/proses/info-situs/update') ?>
        <?= csrf_field(); ?>
        <div class="mb-3">
          <label for="namaToko" class="form-label">Nama Toko</label>
          <input type="text" class="form-control" id="namaToko" name="namaToko" placeholder="Nama Toko" style="border-color:<?= (validation_show_error('namaToko'))?'red':'';?>" value="<?= (old('namaToko')) ? old('namaToko'):$detail['nama_toko'];?>" required>
          <span style="font-size:small; color:red;"><?= validation_show_error('namaToko');?></span>
        </div>
        <div class="mb-3">
          <label for="alamat" class="form-label">Alamat</label>
          <textarea class="form-control" id="alamat" name="alamat" rows="3" placeholder="Alamat Toko Anda" style="border-color:<?= (validation_show_error('alamat'))?'red':'';?>" required><?= (old('alamat')) ? old('alamat'):$detail['alamat'];?></textarea>
          <span style="font-size:small; color:red;"><?= validation_show_error('alamat');?></span>
        </div>
        <div class="mb-3">
          <label for="noWA" class="form-label">Nomor WhatsApp</label>
          <input type="text" class="form-control" id="noWA" name="noWA" placeholder="Nomor Whatsapp" style="border-color:<?= (validation_show_error('noWA'))?'red':'';?>" value="<?= (old('noWA')) ? old('noWA'):$detail['no_wa'];?>" required>
          <span style="font-size:small; color:red;"><?= validation_show_error('noWA');?></span>
        </div>
        <div class="mb-3">
          <label for="deskripsi" class="form-label">Deskripsi Toko</label>
          <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" placeholder="Deskripsi Toko" style="border-color:<?= (validation_show_error('deskripsi'))?'red':'';?>" required><?= (old('deskripsi')) ? old('deskripsi'):$detail['deskripsi_toko'];?></textarea>
          <span style="font-size:small; color:red;"><?= validation_show_error('deskripsi');?></span>
        </div>
        <button type="submit" class="btn btn-success text-white"><i class="fa-sharp fa-solid fa-pen"></i> Update</button>
      </form>
    </div>
    <div class="row py-5"></div>
  </div>
</div>

<script>
  $(document).ready(function() {
    $('#linkToko').addClass("active");
  });

  var preview = function(event) {
    var output = document.getElementById('previewImage');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src)
    }
    $('#btnUpdateGambar').css("display", "block");
  }
</script>
<?= $this->endSection() ?>