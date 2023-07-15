<div class="card shadow mb-3" id="tampilformtambah">
  <div class="card-header shadow-sm">
    <div class="col-lg-6 text-left">
      <h5>Form Tambah Jasa</h5>
    </div>
  </div>
  <div class="card-body mt-3">
    <form class="form form-vertical" id="formtambahjasa">
      <?= csrf_field() ?>
      <div class="form-body">
        <input type="hidden" id="id" name="id">
        <div class="form-floating mb-3">
          <label for="name">Nama Jasa</label>
          <input type="text" class="form-control" id="name" placeholder="Masukkan nama jasa" name="name">
          <div class="invalid-feedback errname"></div>
        </div>
        <div class="form-floating mb-3">
          <label for="category">Kategori Jasa</label>
          <select name="category" id="category" class="form-control">
            <option value="">Pilih Kategori</option>
            <option value="Cetak">Cetak</option>
            <option value="Desain">Desain</option>
          </select>
          <div class="invalid-feedback errcategory"></div>
        </div>
        <div class="form-floating mb-3">
          <label for="size">Ukuran Jasa</label>
          <input type="text" class="form-control" id="size" placeholder="Masukkan ukuran" name="size">
          <div class="invalid-feedback errsize"></div>
        </div>
        <div class="form-floating mb-3">
          <label for="price">Harga Jasa</label>
          <input type="number" class="form-control" id="price" placeholder="Masukkan harga" name="price">
          <div class="invalid-feedback errprice"></div>
        </div>

        <div class="col-12 d-flex justify-content-end">
          <button type="button" class="btn btn-white my-4 batal-form">Batal</button>
          <button type="submit" class="btn btn-success my-4 btnsimpan">Simpan</button>
        </div>
      </div>
    </form>
  </div>
</div>


<script>
  $(document).ready(function() {
    $(".batal-form").on("click", function(e) {
      e.preventDefault();
      $("#tampilformtambah").hide(500);
      $(".viewform").hide(500);
    });

    $('#name').on('input', function(e) {
      e.preventDefault();
      $(this).removeClass('is-invalid');
      $('.errname').html('');
    })
    $('#size').on('input', function(e) {
      e.preventDefault();
      $(this).removeClass('is-invalid');
      $('.errsize').html('');
    })
    $('#price').on('input', function(e) {
      e.preventDefault();
      $(this).removeClass('is-invalid');
      $('.errprice').html('');
    })
    $('#category').on('change', function(e) {
      e.preventDefault();
      $(this).removeClass('is-invalid');
      $('.errcategory').html('');
    })

    $('#formtambahjasa').submit(function(e) {
      e.preventDefault();

      // Kirim data form menggunakan jQuery Ajax
      $.ajax({
        type: "POST",
        url: "services/simpandata",
        dataType: "json",
        data: $(this).serialize(),
        beforeSend: function() {
          $('.btnsimpan').attr('disable', 'disabled');
          $('.btnsimpan').html('<i class="fa fa-spin fa-spinner"></i>');
        },
        complete: function() {
          $('.btnsimpan').removeAttr('disable');
          $('.btnsimpan').html('Simpan');
        },
        success: function(response) {
          if (response.sukses) {
            $('#tampilformtambah').hide(500)
            $('.viewform').hide(500)
            // Jika berhasil mengubah password, tampilkan sweetalert berhasil
            Swal.fire({
              icon: 'success',
              title: 'Berhasil!',
              text: response.sukses,
            }).then((result) => {
              datajasa.ajax.reload();
            })
          } else {
            // Jika gagal, tampilkan sweetalert error sesuai dengan jenis error yang terjadi
            var errname = response.error.name;
            var errcategory = response.error.category;
            var errsize = response.error.size;
            var errprice = response.error.price;

            if (errname) {
              $('#name').addClass('is-invalid');
              $('.errname').html(errname);
            } else {
              $('#name').removeClass('is-invalid');
              $('.errname').html('');
            }
            if (errcategory) {
              $('#category').addClass('is-invalid');
              $('.errcategory').html(errcategory);
            } else {
              $('#category').removeClass('is-invalid');
              $('.errcategory').html('');
            }
            if (errsize) {
              $('#size').addClass('is-invalid');
              $('.errsize').html(errsize);
            } else {
              $('#size').removeClass('is-invalid');
              $('.errsize').html('');
            }
            if (errprice) {
              $('#price').addClass('is-invalid');
              $('.errprice').html(errprice);
            } else {
              $('#price').removeClass('is-invalid');
              $('.errprice').html('');
            }


          }
        },
      });
    });
  });
</script>