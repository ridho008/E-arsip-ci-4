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
           <li class="breadcrumb-item"><a href="#">Home</a></li>
           <li class="breadcrumb-item"><a href="#">Layout</a></li>
           <li class="breadcrumb-item active">Top Navigation</li>
         </ol>
       </div><!-- /.col -->
     </div><!-- /.row -->
   </div><!-- /.container-fluid -->
</div>

<div class="content">

</div>
<?= $this->endSection(); ?>