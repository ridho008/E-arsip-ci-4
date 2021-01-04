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
                <h3 class="card-title">Kategori Arsip</h3>
                <button type="button" id="buttonTambahKategori" class="btn btn-primary float-right btn-sm" data-toggle="modal" data-target="#formModalKategori">
                  <i class="fas fa-plus"></i>
                </button>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Kategori</th>
                      <th width="110"><i class="fas fa-cogs"></i></th>
                    </tr>
                  </thead>
                  <tbody>
                     <?php $no = 1; foreach($kategori as $k) : ?>
                        <tr>
                           <td><?= $no++; ?></td>
                           <td><?= $k['nama_kategori']; ?></td>
                           <td>
                              <button type="button" class="btn btn-primary float-right btn-sm buttonEditKategori" data-id="<?= $k['id_kategori']; ?>" data-toggle="modal" data-target="#formModalKategori">
                                <i class="fas fa-edit"></i>
                              </button>
                              <form action="/kategori/hapus/<?= $k['id_kategori'] ?>">
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

<!-- Model Tambah Kategori -->
<div class="modal fade" id="formModalKategori" tabindex="-1" aria-labelledby="exampleModalLabelKategori" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabelKategori">Tambah Kategori</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/kategori/tambah" method="post">
         <?= csrf_field(); ?>
         <input type="hidden" name="id_kategori" value="" id="id_kategori">
           <div class="form-group">
              <label for="kategori">Kategori</label>
              <input type="text" name="kategori" id="kategori" class="form-control">
              <small class="muted text-danger"><?= $validation->getError('kategori'); ?></small>
           </div>
         <div class="modal-footer">
           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
           <button type="submit" class="btn btn-primary">Tambah</button>
         </div>
        </form>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection(); ?>