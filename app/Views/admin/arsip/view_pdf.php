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
        <div class="col-md-12">
          <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">
                      <table class="table">
                        <tr>
                          <th>No Arsip</th>
                          <th>:</th>
                          <th><?= $arsip['no_arsip']; ?></th>
                        </tr>
                        <tr>
                          <th>Nama Arsip</th>
                          <th>:</th>
                          <th><?= $arsip['nama_file']; ?></th>
                        </tr>
                        <tr>
                          <th>Deskripsi</th>
                          <th>:</th>
                          <th><?= $arsip['deskripsi']; ?></th>
                        </tr>
                      </table>
                    </div>
                    <div class="col-md-6">
                      <table class="table">
                        <tr>
                          <th>Upload/Update</th>
                          <th>:</th>
                          <th><?= date('d-m-Y', strtotime($arsip['tgl_upload'])). ' / ' . date('d-m-Y', strtotime($arsip['tgl_update'])); ?></th>
                        </tr>
                        <tr>
                          <th>Departement</th>
                          <th>:</th>
                          <th><?= $arsip['nama_dep']; ?></th>
                        </tr>
                        <tr>
                          <th>User</th>
                          <th>:</th>
                          <th><?= $arsip['nama_user']; ?></th>
                        </tr>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <embed type="application/pdf" src="/arsip/<?= $arsip['file_arsip']; ?>" width="100%" height="500px"></embed>
        </div>
      </div>
   </div>
</div>

<?= $this->endSection(); ?>