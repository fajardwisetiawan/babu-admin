<?php include '../components/header.php'; ?>
<script>
  $(document).ready(function () {


      $("#search").keyup(function () {
          var that = this,
          value = $(this).val();

          // alert(value.length)

          if (value.length >= 2 ) {
            var data = {
              "search":value
            }
            $.ajax({
              url: "<?= $link_api ?>search_provinsi",
              type: "POST",
              data: JSON.stringify(data),
              dataType: "JSON",
              // crossDomain: true,
              contentType: "application/json; charset=utf-8",
              cache: false,
              processData: false,
              success: function(response) {
                $('#content').html('');
                $('#pagination').html('');
                for (let i = 0; i < response.data.length; i++) {
                  $('#content').append('<tr> <td>'+response.data[i].nama_negara+'</td> <td>'+response.data[i].provinsi+'</td> <td>'+response.data[i].code[1]+'</td> <td>'+response.data[i].code[2]+'</td> <td><button type="button" class="btn waves-effect waves-light btn-success edit" data-toggle="modal" data-target="#exampleModal" param="'+response.data[i].provinsi+'" id="'+response.data[i]._id+'"><i class="ti-pencil"></i></button> <button type="button" class="btn waves-effect waves-light btn-danger hapus" id="'+response.data[i]._id+'"><i class="ti-trash"></i></button></td> </tr>')
                }
              },
              error: function(e) {
                console.log(e);
              }
            });

            // $.ajax({
            //   url: "<?= $link_api ?>negara_new",
            //   type: "POST",
            //   data: JSON.stringify(data),
            //   dataType: "JSON",
            //   // crossDomain: true,
            //   contentType: "application/json; charset=utf-8",
            //   cache: false,
            //   processData: false,
            //   success: function(response) {
            //     $('#content').html('');
            //     $('#pagination').html('');
            //     for (let i = 0; i < response.data.length; i++) {

            //       $('#content').append('<tr> <td>'+response.data[i].negara+'</td> <td>'+response.data[i].provinsi.provinsi+'</td> <td><button type="button" class="btn waves-effect waves-light btn-success edit" data-toggle="modal" data-target="#exampleModal" param="'+response.data[i].provinsi.provinsi+'" id="'+response.data[i]._id+'"><i class="ti-pencil"></i></button> <button type="button" class="btn waves-effect waves-light btn-danger hapus" id="'+response.data[i]._id+'"><i class="ti-trash"></i></button></td> </tr>')
                
            //     }
            //   },
            //   error: function(e) {
            //     console.log(e);
            //   }
            // });

          } else if (value.length == 0 ) {
            getContent()
          }
      });


      $('.negara').html('<option value="">=== Pilih Negara ===</option>')
      $.ajax({
        url: '<?= $link_api ?>server/negara',
        type: "GET",
        dataType: "JSON",
        success: function(response) {
          
          for (let i = 0; i < response.data.length; i++) {
            $('.negara').append('<option value="'+response.data[i]._id+'">'+response.data[i].negara+'</option>')
            $('.parent').append('<option value="'+response.data[i]._id+'">'+response.data[i].negara+'</option>')
          }
        },
        error: function(e) {
          console.log(e);
        }
      });


      $("#form_edit").on('submit',(function(e) {
        e.preventDefault();

        var data = {
          "id_user":localStorage.getItem('id'),
          "id_negara":$('#parent').val(),
          "provinsi":$('#param').val(),
        }

        $.ajax({
          url: "<?= $link_api ?>provinsi/"+$('#id').val(),
          type: "PUT",
          data: JSON.stringify(data),
          dataType: "JSON",
          // crossDomain: true,
          contentType: "application/json; charset=utf-8",
          cache: false,
          processData: false,
          success: function(data) {
            if (data._id != '') {
              swal("Sukses!", "Edit Berhasil!", "success");
              getContent()
              // $('#tabeldata').DataTable().ajax.reload();
            }
          },
          error: function(e) {
            console.log(e);
          }
        });
      }))



      $("#form_submit").on('submit',(function(e) {
        e.preventDefault();

        var data = {
          "id_user":localStorage.getItem('id'),
          "provinsi":$('#provinsi').val(),
        }

        $.ajax({
          url: "<?= $link_api ?>provinsi/"+$('#id_negara').val(),
          type: "POST",
          data: JSON.stringify(data),
          dataType: "JSON",
          // crossDomain: true,
          contentType: "application/json; charset=utf-8",
          cache: false,
          processData: false,
          success: function(data) {
            if (data.success == '1') {
              swal("Sukses!", "Input Berhasil!", "success");
              getContent()
              // $('#tabeldata').DataTable().ajax.reload();
              $("#form_submit")[0].reset();
            } else {
              swal("Gagal!", "Terjadi kesalahan!", "warning");
            }
          },
          error: function(e) {
            console.log(e);
          }
        });

        
      }))




      $(document).on('click','.hapus',function(){
        var id_hapus = $(this).attr("id");
        swal({
          title: "Yakin?",
          text: "Data yang sudah terhapus tidak bisa dikembalikan",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            $.ajax({
              url: '<?= $link_api ?>provinsi/'+id_hapus+'/'+localStorage.getItem('id'),
              type: "DELETE",
              dataType: "JSON",
              success: function(response) {
                if (response.success == 1) {
                  swal("Sukses!", "Hapus Berhasil!", "success");
                  getContent()
                } else {
                  swal("Gagal!", "Terjadi kesalahan", "error");
                }
              },
              error: function(e) {
                console.log(e);
              }
            });


          } else {
            swal("Hapus dibatalkan!");
          }
        });
        

      })

      $(document).on('click','.edit',function(){
        var id = $(this).attr("id");
        var param = $(this).attr("param");
        var parent = $(this).attr("parent");
        $("#id").val(id)
        $("#param").val(param)
        $("#parent").val(parent)

      })

      function getContent(){
        const queryString = window.location.search;
        console.log(queryString);
        const urlParams = new URLSearchParams(queryString);
        var page = urlParams.get('page')
        $('#content').html('')
        $('#pagination').html('')
        var url;
        if (page != null) {
          url = '<?= $link_api ?>provinsi?page='+page
        } else {
          url = '<?= $link_api ?>provinsi?page=1'
          page = 1
        }

        $.ajax({
          url: url,
          type: "GET",
          dataType: "JSON",
          success: function(response) {

            var totalPages = response.totalPages
            $('#jml_katadasar').html(response.count.toLocaleString().replace(',','.'))
            $('#totalPages').html(totalPages.toLocaleString().replace(',','.'))
            $('#page').html(parseFloat(page).toLocaleString().replace(',','.'))

            if (totalPages < 3) {
              // loop biasa
              if (page == 2) {
                $('#pagination').append('<li class="page-item"> <a class="page-link" href="<?= $actual_link ?>pages/provinsi?page=1">Previous</a> </li>')
              } else {
                $('#pagination').append('<li class="page-item disabled"> <a class="page-link" href="#" tabindex="-1">Previous</a> </li>')
              }

              for (let i_pages = 1; i_pages < totalPages+1; i_pages++) {
                if (i_pages == page) {
                  $('#pagination').append('<li class="page-item active"> <a class="page-link" href="<?= $actual_link ?>pages/provinsi?page='+i_pages+'">'+i_pages.toLocaleString().replace(',','.')+'</a> </li>');
                } else {
                  $('#pagination').append('<li class="page-item"> <a class="page-link" href="<?= $actual_link ?>pages/provinsi?page='+i_pages+'">'+i_pages.toLocaleString().replace(',','.')+'</a> </li>');
                }
              }

              if (page == 2) {
                $('#pagination').append('<li class="page-item disabled"> <a class="page-link" href="#" tabindex="-1">Next</a> </li>')
              } else {
                $('#pagination').append('<li class="page-item"> <a class="page-link" href="<?= $actual_link ?>pages/provinsi?page='+Number(parseInt(page)+1)+'">Next</a> </li>')
              }
                
            } else if(totalPages >= 3) {
              // loop 3 aja
              var page1 = Number(parseInt(page)-1)
              var page2 = page
              var page3 = Number(parseInt(page)+2)

              console.log('total page : '+totalPages);
              
              
                // alert(page3 )
              if (page2 >= totalPages) {
                $('#pagination').append('<li class="page-item"> <a class="page-link" href="<?= $actual_link ?>pages/provinsi?page='+page1+'">Previous</a> </li>')
                page3 = Number(parseInt(page)+1)
                page1 = Number(parseInt(page)-2)
              } else if(page1 < 1){
                $('#pagination').append('<li class="page-item disabled"> <a class="page-link" href="#" tabindex="-1">Previous</a> </li>')
                page1 = 1
                page3 = Number(parseInt(page)+3)
              } else {
                $('#pagination').append('<li class="page-item"> <a class="page-link" href="<?= $actual_link ?>pages/provinsi?page='+page1+'">Previous</a> </li>')
              }

              console.log('page1 : '+page1);
              console.log('page2 : '+page2);
              console.log('page3 : '+page3);

              for (let i_pages = page1; i_pages < page3; i_pages++) {
                if (i_pages == page) {
                  $('#pagination').append('<li class="page-item active"> <a class="page-link" href="<?= $actual_link ?>pages/provinsi?page='+i_pages+'">'+i_pages.toLocaleString().replace(',','.')+'</a> </li>');
                } else {
                  $('#pagination').append('<li class="page-item"> <a class="page-link" href="<?= $actual_link ?>pages/provinsi?page='+i_pages+'">'+i_pages.toLocaleString().replace(',','.')+'</a> </li>');
                }
              }

              if (page2 >= totalPages) {
                $('#pagination').append('<li class="page-item disabled"> <a class="page-link" href="#" tabindex="-1">Next</a> </li>')
                page3 = Number(parseInt(page)+1)
                page1 = Number(parseInt(page)-2)
              } else if(page1 < 1){
                $('#pagination').append('<li class="page-item disabled"> <a class="page-link" href="<?= $actual_link ?>pages/provinsi?page='+Number(parseInt(page)+1)+'">Next</a> </li>')
                page1 = 1
                page3 = Number(parseInt(page)+3)
              } else {
                $('#pagination').append('<li class="page-item"> <a class="page-link" href="<?= $actual_link ?>pages/provinsi?page='+Number(parseInt(page)+1)+'">Next</a> </li>')
              }

            }

            for (let i = 0; i < response.data.length; i++) {
              console.log(response.data[i]);
              $('#content').append('<tr> <td>'+response.data[i].nama_negara+'</td> <td>'+response.data[i].provinsi+'</td> <td>'+response.data[i].code[1]+'</td> <td>'+response.data[i].code[2]+'</td> <td><button type="button" class="btn waves-effect waves-light btn-success edit" data-toggle="modal" data-target="#exampleModal" param="'+response.data[i].provinsi+'" id="'+response.data[i]._id+'"><i class="ti-pencil"></i></button> <button type="button" class="btn waves-effect waves-light btn-danger hapus" id="'+response.data[i]._id+'"><i class="ti-trash"></i></button></td> </tr>')
            }

          },
          error: function(e) {
            console.log(e);
          }
        });
        
      }

      getContent()






  })
</script>




    <!-- MODAL TAMBAH DATA -->
    <div class="modal fade" id="modaltambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah kategori</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form id="form_submit">
              
            <div class="modal-body">
              
              <div class="form-group">
                <label for="id_negara">Nama Negara</label>
                <select class="form-control negara select2" name="id_negara" id="id_negara" required></select>
              </div>
              <div class="form-group">
                <label for="kata">Nama Provinsi</label>
                <input type="text" class="form-control" name="provinsi" id="provinsi" required>
              </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="form_edit"> 
        <div class="modal-body">
          <div class="form-group">
            <label for="id">ID</label>
            <input type="text" class="form-control" id="id" name="id" readonly style="background:#eeeeee;">
          </div>
          <div class="form-group">
            <label for="param">Nama Negara</label>
            <!-- <input type="text" class="form-control" id="parent" name="parent"> -->
            <select class="form-control parent select2" name="parent" id="parent" required></select>
          </div>
          <div class="form-group">
            <label for="param">Nama Provinsi</label>
            <input type="text" class="form-control" id="param" name="param">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Edit</button>
        </div>
      </form>
    </div>
  </div>
</div>







    <!-- ============================================================== -->
    <!-- Page wrapper  -->
    <!-- ============================================================== -->
    <div class="page-wrapper">
      <!-- ============================================================== -->
      <!-- Bread crumb and right sidebar toggle -->
      <!-- ============================================================== -->
      <div class="page-breadcrumb">
        <div class="row">
          <div class="col-7 align-self-center">
            <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Provinsi</h3>
            <div class="d-flex align-items-center">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb m-0 p-0">
                  <li class="breadcrumb-item"><a href="#">Manajemen Provinsi</a>
                  </li>
                </ol>
              </nav>
            </div>
          </div>
          <div class="col-5 align-self-center">
            <div class="customize-input float-right">
              <button type="button" class="btn waves-effect waves-light btn-rounded btn-primary" data-toggle="modal" data-target="#modaltambah"><i data-feather="plus" class="feather-icon"></i> Tambah Provinsi</button>
            </div>
          </div>
        </div>
      </div>
      <!-- ============================================================== -->
      <!-- End Bread crumb and right sidebar toggle -->
      <!-- ============================================================== -->
      <!-- ============================================================== -->
      <!-- Container fluid  -->
      <!-- ============================================================== -->
      <div class="container-fluid">
        
        <!-- *************************************************************** -->
        <!-- Start Data Table -->
        <!-- *************************************************************** -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-body">

                <div class="d-flex d-lg-flex d-md-block align-items-center mb-4">
                  <div class="col-lg-9">
                    <h2 class="page-title text-truncate text-dark font-weight-medium mb-1"><span id="jml_katadasar">Loading...</span></h2>
                    Menampilkan halaman <span id="page"></span> dari <span id="totalPages"></span>
                  </div>
                  <div class="col-lg-3">
                    <ul class="pagination float-right" id="pagination">
                    </ul>
                  </div>
                </div>
                
                <style>
                  .tableFixHead          { overflow-y: auto; height: 500px !important; }
                  .tableFixHead thead th { position: sticky; top: 0; margin: 0;}

                  /* Just common table stuff. Really. */
                  table  { border-collapse: collapse; width: 100%; }
                  /* th, td { padding: 8px 16px; } */
                  th     { background:#ffffff; }
                </style>
                
                <div class="table-responsive tableFixHead">
                  <table id="tabeldata" class="table table-striped table-bordered no-wrap">
                    <thead>
                      <tr>
                        <th>Nama Negara</th>
                        <th>Nama Provinsi</th>
                        <th>User</th>
                        <th>Date</th>
                        <th>#</th>
                      </tr>
                    </thead>
                    <tbody id="content">
                    </tbody>
                  </table>
                </div>

                


              </div>
            </div>
          </div>
        </div>
        <!-- *************************************************************** -->
        <!-- End Data Table -->
        <!-- *************************************************************** -->
      </div>
      <!-- ============================================================== -->
      <!-- End Container fluid  -->
      <!-- ============================================================== -->
      <!-- ============================================================== -->
      <!-- footer -->
      <!-- ============================================================== -->
      <?php include '../components/text_footer.php'; ?>
      <!-- ============================================================== -->
      <!-- End footer -->
      <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Page wrapper  -->
    <!-- ============================================================== -->
<?php include '../components/footer.php'; ?>