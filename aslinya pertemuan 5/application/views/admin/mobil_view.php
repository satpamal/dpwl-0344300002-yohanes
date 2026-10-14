<?php
require APPPATH . '/views/templates/header.php';
require APPPATH . '/views/templates/sidebar.php';

$mode = $mode ?? null;
$mobil_dipilih = $mobil_dipilih ?? null;
$mobil = $mobil ?? [];
$flash = $flash ?? null;
$error = $error ?? null;

$isForm = in_array($mode, ['tambah', 'ubah'], true);
$isEdit = $mode === 'ubah';
$no_platDipilih = $mobil_dipilih['no_plat'] ?? '';

$formAction = $isEdit
  ? site_url('admin/mobil/ubah/' . rawurlencode((string) $no_platDipilih))
  : site_url('admin/mobil/tambah');

$flashClass = (($flash['type'] ?? '') === 'success') ? 'alert-success' : 'alert-danger';
$h = static fn($value): string => htmlspecialchars((string) ($value ?? ''), ENT_QUOTES, 'UTF-8');
?>

<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Manajemen Kendaraan
      <small>Kelola Data Kendaraan</small>
    </h1>
    <ol class="breadcrumb">
      <li>
        <a href="<?= $h(site_url('admin/mobil')) ?>">
          <i class="fa fa-dashboard"></i> Manajemen Kendaraan
        </a>
      </li>
      <li class="active"><?= $isForm ? ($isEdit ? 'Ubah Kendaraan' : 'Tambah Kendaraan') : 'Daftar Kendaraan' ?></li>
    </ol>
  </section>

  <section class="content">
    <?php if (!empty($flash)): ?>
      <div class="alert <?= $flashClass ?> alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <i class="fa <?= (($flash['type'] ?? '') === 'success') ? 'fa-check' : 'fa-warning' ?>"></i>
        <?= $h($flash['message'] ?? '') ?>
      </div>
    <?php endif; ?>

    <?php if ($error !== null && $error !== ''): ?>
      <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <i class="fa fa-warning"></i>
        <?= $h($error) ?>
      </div>
    <?php endif; ?>

    <?php if (!$isForm): ?>
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Data Kendaraan</h3>
          <div class="box-tools">
            <a href="<?= $h(site_url('admin/mobil/tambah')) ?>" class="btn btn-primary btn-sm">
              <i class="fa fa-plus"></i> Tambah Kendaraan
            </a>
          </div>
        </div>

        <div class="box-body">
          <div class="table-responsive">
            <table id="mobilTable" class="table table-bordered table-striped js-data-table">
              <thead>
                <tr>
                  <th>No</th>
                  <th>No. Plat</th>
                  <th>Nama Mobil</th>
                  <th>Kursi</th>
                  <th>Bagasi</th>
                  <th>Jenis Mobil</th>
                  <th>Transmisi</th>
                  <th>Tahun</th>
                  <th>Harga/Hari</th>
                  <th>Status</th>
                  <th>Foto Depan</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($mobil as $no => $item): ?>
                  <tr>
                    <td><?= (int) $no + 1 ?></td>
                    <td><?= $h($item['no_plat'] ?? '') ?></td>
                    <td><?= $h($item['nm_mobil'] ?? '') ?></td>
                    <td><?= (int) ($item['nkursi'] ?? 0) ?></td>
                    <td><?= (int) ($item['nbagasi'] ?? 0) ?></td>
                    <td><?= $h($item['jns_mobil'] ?? '-') ?></td>
                    <td><?= $h($item['transmisi'] ?? '-') ?></td>
                    <td><?= $h($item['thn_buat'] ?? '') ?></td>
                    <td>Rp <?= number_format((int) ($item['hrg_hari'] ?? 0), 0, ',', '.') ?></td>
                    <td>
                      <?php
                      $status = $item['status_unit'] ?? '';
                      $statusClass = match ($status) {
                        'tersedia' => 'label-success',
                        'disewa' => 'label-warning',
                        'tidaktersedia' => 'label-danger',
                        default => 'label-default',
                      };
                      ?>
                      <span class="label <?= $statusClass ?>"><?= $h($status) ?></span>
                    </td>
                    <td>
                      <?php if (!empty($item['ft_depan'])): ?>
                        <img
                          src="<?= htmlspecialchars(
                                  base_url('uploads/mobil/' . rawurlencode($item['ft_depan'])),
                                  ENT_QUOTES,
                                  'UTF-8'
                                ) ?>"
                          alt="Foto depan <?= htmlspecialchars(
                                            $item['nm_mobil'],
                                            ENT_QUOTES,
                                            'UTF-8'
                                          ) ?>"
                          style="width: 80px; height: 55px; object-fit: cover;">
                      <?php else: ?>
                        <span class="text-muted">Belum ada foto</span>
                      <?php endif; ?>
                    </td>
                    <td>
                      <a class="btn btn-warning btn-xs"
                        href="<?= $h(site_url('admin/mobil/ubah/' . rawurlencode((string) $item['no_plat']))) ?>">
                        <i class="fa fa-edit"></i> Ubah
                      </a>
                      <form method="post" style="display:inline"
                        action="<?= $h(site_url('admin/mobil/hapus/' . rawurlencode((string) $item['no_plat']))) ?>"
                        onsubmit="return confirm('Hapus kendaraan <?= $h($item['no_plat']) ?>? Data dan foto terkait akan dihapus.');">
                        <button type="submit" class="btn btn-danger btn-xs">
                          <i class="fa fa-trash"></i> Hapus
                        </button>
                      </form>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
              <tfoot>
                <tr>
                  <th>No</th>
                  <th>No. Plat</th>
                  <th>Nama Mobil</th>
                  <th>Kursi</th>
                  <th>Bagasi</th>
                  <th>Jenis Mobil</th>
                  <th>Transmisi</th>
                  <th>Tahun</th>
                  <th>Harga/Hari</th>
                  <th>Status</th>
                  <th>Foto Depan</th>
                  <th>Aksi</th>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
      </div>
    <?php else: ?>
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"><?= $isEdit ? 'Ubah Data Kendaraan' : 'Tambah Kendaraan' ?></h3>
        </div>

        <form role="form" method="post" enctype="multipart/form-data"
          action="<?= $h($formAction) ?>">
          <div class="box-body">
            <div class="form-group">
              <label for="no_plat">Nomor Plat</label>
              <input type="text" class="form-control" id="no_plat" name="no_plat"
                maxlength="15" value="<?= $h($mobil_dipilih['no_plat'] ?? '') ?>"
                <?= $isEdit ? 'readonly' : '' ?> required>
            </div>

            <div class="form-group">
              <label for="nm_mobil">Nama Mobil</label>
              <input type="text" class="form-control" id="nm_mobil" name="nm_mobil"
                maxlength="40" value="<?= $h($mobil_dipilih['nm_mobil'] ?? '') ?>" required>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="nkursi">Jumlah Kursi</label>
                  <input type="number" class="form-control" id="nkursi" name="nkursi"
                    min="1" max="255" value="<?= $h($mobil_dipilih['nkursi'] ?? '') ?>" required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="nbagasi">Jumlah Bagasi</label>
                  <input type="number" class="form-control" id="nbagasi" name="nbagasi"
                    min="0" max="255" value="<?= $h($mobil_dipilih['nbagasi'] ?? '') ?>" required>
                </div>
              </div>
            </div>

            <div class="form-group">
              <label for="jns_mobil">Jenis Mobil</label>
              <select class="form-control" id="jns_mobil" name="jns_mobil" required>
                <option value="">Pilih jenis mobil</option>
                <?php foreach (['SUV', 'MPV', 'City Car'] as $jenis): ?>
                  <option value="<?= $h($jenis) ?>" <?= (($mobil_dipilih['jns_mobil'] ?? '') === $jenis) ? 'selected' : '' ?>><?= $h($jenis) ?></option>
                <?php endforeach; ?>
              </select>
            </div>

            <div class="form-group">
              <label for="transmisi">Transmisi</label>
              <select class="form-control" id="transmisi" name="transmisi" required>
                <option value="">Pilih transmisi</option>
                <?php foreach (['AT' => 'Automatic (AT)', 'MT' => 'Manual (MT)'] as $kode => $label): ?>
                  <option value="<?= $h($kode) ?>" <?= (($mobil_dipilih['transmisi'] ?? '') === $kode) ? 'selected' : '' ?>><?= $h($label) ?></option>
                <?php endforeach; ?>
              </select>
            </div>

            <div class="form-group">
              <label for="thn_buat">Tahun Pembuatan</label>
              <input type="number" class="form-control" id="thn_buat" name="thn_buat"
                min="1901" max="2155" value="<?= $h($mobil_dipilih['thn_buat'] ?? '') ?>" required>
            </div>

            <div class="form-group">
              <label for="hrg_hari">Harga Sewa per Hari (Rp)</label>
              <input type="number" class="form-control" id="hrg_hari" name="hrg_hari"
                min="1" max="16777215" value="<?= $h($mobil_dipilih['hrg_hari'] ?? '') ?>" required>
            </div>

            <div class="form-group">
              <label for="cttn_unit">Catatan Unit</label>
              <textarea class="form-control" id="cttn_unit" name="cttn_unit"
                maxlength="500" rows="3" required><?= $h($mobil_dipilih['cttn_unit'] ?? '') ?></textarea>
            </div>

            <div class="form-group">
              <label for="status_unit">Status Kendaraan</label>
              <select class="form-control" id="status_unit" name="status_unit" required>
                <?php foreach (['tersedia' => 'Tersedia', 'disewa' => 'Disewa', 'tidaktersedia' => 'Tidak Tersedia'] as $kode => $label): ?>
                  <option value="<?= $h($kode) ?>" <?= (($mobil_dipilih['status_unit'] ?? 'tersedia') === $kode) ? 'selected' : '' ?>><?= $h($label) ?></option>
                <?php endforeach; ?>
              </select>
            </div>

            <hr>
            <h4>Foto Kendaraan</h4>
            <?php foreach (['ft_depan' => 'Foto Depan', 'ft_blkg' => 'Foto Belakang', 'ft_interior' => 'Foto Interior'] as $field => $label): ?>
              <div class="form-group">
                <label for="<?= $h($field) ?>"><?= $h($label) ?></label>
                <input type="file" class="form-control" id="<?= $h($field) ?>" name="<?= $h($field) ?>"
                  accept=".jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp">
                <p class="help-block">JPG, JPEG, PNG, atau WEBP; maksimal 5 MB per foto.</p>
                <div class="photo-preview" style="margin-top: 10px;">
                  <?php if (!empty($mobil_dipilih[$field]) && is_string($mobil_dipilih[$field]) && $mobil_dipilih[$field] !== '0'): ?>
                    <p class="help-block current-photo-label">Foto saat ini:</p>
                    <img
                      class="img-thumbnail current-photo"
                      src="<?= $h(base_url('uploads/mobil/' . rawurlencode($mobil_dipilih[$field]))) ?>"
                      alt="<?= $h($label) ?> saat ini"
                      style="width: 180px; height: 120px; object-fit: cover;">
                    <p class="help-block current-photo-name"><?= $h($mobil_dipilih[$field]) ?>. Kosongkan jika tidak ingin menggantinya.</p>
                  <?php else: ?>
                    <p class="help-block current-photo-label">Belum ada foto tersimpan.</p>
                  <?php endif; ?>
                  <div class="new-photo-preview" style="display: none; margin-top: 8px;">
                    <p class="help-block">Pratinjau foto yang dipilih:</p>
                    <img
                      class="img-thumbnail new-photo-image"
                      alt="Pratinjau <?= $h($label) ?> yang dipilih"
                      style="width: 180px; height: 120px; object-fit: cover;">
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          </div>

          <div class="box-footer">
            <button type="submit" class="btn btn-primary">
              <i class="fa fa-save"></i> Simpan Kendaraan
            </button>
            <a href="<?= $h(site_url('admin/mobil')) ?>" class="btn btn-default">
              <i class="fa fa-times"></i> Batal
            </a>
          </div>
        </form>
      </div>
    <?php endif; ?>
  </section>
</div>

<?php require APPPATH . '/views/templates/footer.php'; ?>

<?php if ($isForm): ?>
  <script>
    (function() {
      'use strict';

      document.querySelectorAll('.form-group input[type="file"][name^="ft_"]').forEach(function(input) {
        var container = input.closest('.form-group');
        var preview = container ? container.querySelector('.new-photo-preview') : null;
        var image = preview ? preview.querySelector('.new-photo-image') : null;
        var previousUrl = null;

        if (!preview || !image) {
          return;
        }

        input.addEventListener('change', function() {
          if (previousUrl) {
            URL.revokeObjectURL(previousUrl);
            previousUrl = null;
          }

          var file = input.files && input.files.length ? input.files[0] : null;
          if (!file) {
            preview.style.display = 'none';
            image.removeAttribute('src');
            return;
          }

          if (!['image/jpeg', 'image/png', 'image/webp'].includes(file.type) || file.size < 1 || file.size > 5 * 1024 * 1024) {
            preview.style.display = 'none';
            image.removeAttribute('src');
            return;
          }

          previousUrl = URL.createObjectURL(file);
          image.src = previousUrl;
          preview.style.display = 'block';
        });
      });
    })();
  </script>
<?php endif; ?>