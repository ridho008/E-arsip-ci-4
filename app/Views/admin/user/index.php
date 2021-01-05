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
                <h3 class="card-title">User Arsip</h3>
                <button type="button" id="buttonTambahUser" class="btn btn-primary float-right btn-sm" data-toggle="modal" data-target="#formModalUser">
                  <i class="fas fa-plus"></i>
                </button>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>User</th>
                      <th>Email</th>
                      <th>Role</th>
                      <th>Departement</th>
                      <th width="110"><i class="fas fa-cogs"></i></th>
                    </tr>
                  </thead>
                  <tbody>
                     <?php $no = 1; foreach($user as $k) : ?>
                        <tr>
                           <td><?= $no++; ?></td>
                           <td><?= $k['nama_user']; ?></td>
                           <td><?= $k['email']; ?></td>
                           <td><?= $k['role'] == 1 ? 'Admin' : 'User'; ?></td>
                           <td><?= $k['nama_dep']; ?></td>
                           <td>
                              <button type="button" class="btn btn-primary float-right btn-sm buttonEditUser" data-id="<?= $k['id_user']; ?>" data-toggle="modal" data-target="#formModalUser">
                                <i class="fas fa-edit"></i>
                              </button>
                              <form action="/user/hapus/<?= $k['id_user'] ?>">
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
<div class="modal fade" id="formModalUser" tabindex="-1" aria-labelledby="exampleModalLabelUser" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabelUser">Tambah User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/user/tambah" method="post">
         <?= csrf_field(); ?>
         <input type="hidden" name="id_user" value="" id="id_user">
           <div class="form-group">
              <label for="nama">Nama User</label>
              <input type="text" name="nama" id="nama" class="form-control">
              <small class="muted text-danger"><?= $validation->getError('nama'); ?></small>
           </div>
           <div class="form-group">
              <label for="email">Email</label>
              <input type="email" name="email" id="email" class="form-control">
              <small class="muted text-danger"><?= $validation->getError('email'); ?></small>
           </div>
           <div class="form-group">
              <label for="password">Password</label>
              <input type="password" name="password" id="password" class="form-control">
              <small class="muted text-danger"><?= $validation->getError('password'); ?></small>
           </div>
           <div class="form-group">
              <label for="role">role</label>
              <select name="role" id="role" class="form-control">
                <option value="">-- Pilih Role</option>
                <option value="1">Admin</option>
                <option value="2">User</option>
              </select>
              <small class="muted text-danger"><?= $validation->getError('role'); ?></small>
           </div>
           <div class="form-group">
              <label for="departement">Departement</label>
              <select name="departement" id="departement" class="form-control">
                <option value="">-- Pilih Departement</option>
                <?php foreach($dep as $d) : ?>
                  <option value="<?= $d['id_dep']; ?>"><?= $d['nama_dep']; ?></option>
                <?php endforeach; ?>
              </select>
              <small class="muted text-danger"><?= $validation->getError('departement'); ?></small>
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