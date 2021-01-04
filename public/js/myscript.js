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

   // Button Ubah Kategori
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
});