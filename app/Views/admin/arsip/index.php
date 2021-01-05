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
                <h3 class="card-title">Arsip</h3>
                <a href="/arsip/tambah" class="btn btn-primary float-right btn-sm">
                  <i class="fas fa-plus"></i>
                </a>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>No.Arsip</th>
                      <th>Nama File</th>
                      <th>Deskripsi</th>
                      <th>Kategori</th>
                      <th>Departement</th>
                      <th>User</th>
                      <th width="110"><i class="fas fa-cogs"></i></th>
                    </tr>
                  </thead>
                  <tbody>
                     <?php $no = 1; foreach($arsip as $a) : ?>
                        <tr>
                           <td><?= $no++; ?></td>
                           <td><?= $a['no_arsip']; ?></td>
                           <td><?= $a['nama_file']; ?></td>
                           <td><?= $a['deskripsi']; ?></td>
                           <td><?= $a['nama_kategori']; ?></td>
                           <td><?= $a['nama_dep']; ?></td>
                           <td><?= $a['nama_user']; ?></td>
                           <td>
                              <a href="/arsip/viewPdf/<?= $a['id_arsip']; ?>">PDF</a>
                              <a href="/arsip/edit/<?= $a['id_arsip']; ?>" class="btn btn-primary float-right btn-sm">
                                <i class="fas fa-edit"></i>
                              </a>
                              <form action="/arsip/hapus/<?= $a['id_arsip'] ?>">
                                 <input type="hidden" name="_method" value="DELETE">
                                 <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                              </form>
                           </td>
                        </tr>
                     <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
         </div>
      </div>
   </div>
</div>

<?= $this->endSection(); ?>