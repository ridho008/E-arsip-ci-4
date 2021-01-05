  // Alert Hidden Auto
window.setTimeout(function() {
   $('.alert').fadeTo(500, 0).slideUp(500, function() {
     $(this).remove();
   });
 }, 3000);
$(function() {

   // Button Tambah Kategori
   $('#buttonTambahKategori').click(function() {
      $('#exampleModalLabelKategori').html('Tambah Kategori');
      $('.modal-footer button[type=submit]').html('Tambah');
      $('.modal-body form').attr('action', 'http://localhost:8080/kategori/tambah')
      $('#kategori').val('');
   });

   // Button Ubah Kategori
   $('.buttonEditKategori').click(function() {
      $('#exampleModalLabelKategori').html('Edit Kategori');
      $('.modal-footer button[type=submit]').html('Edit');
      $('.modal-body form').attr('action', 'http://localhost:8080/kategori/edit')

      const id = $(this).data('id');
      // console.log(id);

      $.ajax({
         url: 'http://localhost:8080/kategori/getkategori',
         method: 'post',
         dataType: 'json',
         data : {id: id},
         success: function(kategori) {
            // console.log(kategori);
            $('#id_kategori').val(kategori.id_kategori);
            $('#kategori').val(kategori.nama_kategori);
         }
      });

   });


   // Button Tambah Departement
   $('#buttonTambahDep').click(function() {
      $('#exampleModalLabelDep').html('Tambah Departement');
      $('.modal-footer button[type=submit]').html('Tambah');
      $('.modal-body form').attr('action', 'http://localhost:8080/departement/tambah')
      $('#departement').val('');
   });

   // Button Ubah Departement
   $('.buttonEditDep').click(function() {
      $('#exampleModalLabelDep').html('Edit Departement');
      $('.modal-footer button[type=submit]').html('Edit');
      $('.modal-body form').attr('action', 'http://localhost:8080/departement/edit')

      const id = $(this).data('id');
      // console.log(id);

      $.ajax({
         url: 'http://localhost:8080/departement/getDepartement',
         method: 'post',
         dataType: 'json',
         data : {id: id},
         success: function(departement) {
            // console.log(departement);
            $('#id_dep').val(departement.id_dep);
            $('#departement').val(departement.nama_dep);
         }
      });

   });


   // Button Tambah User
   $('#buttonTambahUser').click(function() {
      $('#exampleModalLabelUser').html('Tambah User');
      $('.modal-footer button[type=submit]').html('Tambah');
      $('#id_user').val('');
      $('#nama').val('');
      $('#email').val('');
      $('#role').val('');
      $('#departement').val('');
   });

   // Button Ubah Departement
   $('.buttonEditUser').click(function() {
      $('#exampleModalLabelUser').html('Edit User');
      $('.modal-footer button[type=submit]').html('Edit');
      $('.modal-body form').attr('action', 'http://localhost:8080/user/edit')

      const id = $(this).data('id');
      // console.log(id);

      $.ajax({
         url: 'http://localhost:8080/user/getUser',
         method: 'post',
         dataType: 'json',
         data : {id: id},
         success: function(data) {
            // console.log(data);
            $('#id_user').val(data.id_user);
            $('#nama').val(data.nama_user);
            $('#email').val(data.email);
            $('#role').val(data.role);
            $('#departement').val(data.id_dep);
         }
      });

   });
});