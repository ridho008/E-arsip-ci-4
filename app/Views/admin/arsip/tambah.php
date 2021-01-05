<?= $this->extend('layout/app'); ?>
<?= $this->section('content'); ?>
<div class="content-header">
   <div class="container">
     <div class="row mb-2">
       <div class="col-sm-6">
         <h1 class="m-0 text-dark"><?= $title; ?></h1>
       </div><!-- /.col -->
       <div class="col-sm-6">
         <ol class="breadcrumb float-sm-right">
           <li class="breadcrumb-item"><a href="/home">Home</a></li>
           <li class="breadcrumb-item"><a href="/kategori"><?= $title; ?></a></li>
         </ol>
       </div><!-- /.col -->
     </div><!-- /.row -->
   </div><!-- /.container-fluid -->
</div>
<div class="content">
   <div class="container">
      <div class="row">
         <div class="col-md-8 offset-md-2">
            <?php if(session()->getFlashdata('success')) : ?>
            <div class="alert alert-success" role="alert"><?= session()->getFlashdata('success'); ?></div>
            <?php endif; ?>
            <?php if($validation->listErrors()) : ?>
               <div class="alert alert-danger" role="alert"><?= $validation->listErrors(); ?></div>
            <?php endif; ?>
            <div class="card">
              <div class="card-header">
                <!-- <h3 class="card-title">Tambah Data Arsip</h3> -->
                <a href="/arsip/tambah" class="btn btn-primary float-right btn-sm">
                  <i class="fas fa-plus"></i>
                </a>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="container">
                  <div class="row">
                    <div class="col-md-12">
                      <form action="/arsip/simpan" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                          <label for="no">No.Arsip</label>
                          <input type="text" name="no" id="no" value="ARS<?php echo sprintf("%04s", $kodeArsip) ?>" class="form-control" readonly>
                          <small class="muted text-danger"><?= $validation->getError('no'); ?></small>
                        </div>
                        <div class="form-group">
                           <label for="kategori">Kategori</label>
                           <select name="kategori" id="kategori" class="form-control">
                             <option value="">-- Pilih Kategori</option>
                             <?php foreach($kategori as $d) : ?>
                               <option value="<?= $d['id_kategori']; ?>"><?= $d['nama_kategori']; ?></option>
                             <?php endforeach; ?>
                           </select>
                           <small class="muted text-danger"><?= $validation->getError('kategori'); ?></small>
                        </div>
                        <div class="form-group">
                          <label for="nama">Nama Arsip</label>
                          <input type="text" name="nama" id="nama" class="form-control">
                          <small class="muted text-danger"><?= $validation->getError('nama'); ?></small>
                        </div>
                        <div class="form-group">
                          <label for="deskripsi">Deskripsi</label>
                          <textarea name="deskripsi" id="deskripsi" class="form-control"></textarea>
                          <small class="muted text-danger"><?= $validation->getError('deskripsi'); ?></small>
                        </div>
                        <div class="form-group">
                          <label for="file">File Arsip</label>
                          <input type="file" name="file" class="form-control-file">
                          <small class="muted text-danger">Wajib PDF</small>
                          <small class="muted text-danger"><?= $validation->getError('file'); ?></small>
                        </div>
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Tambah</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
         </div>
      </div>
   </div>
</div>

<?= $this->endSection(); ?>