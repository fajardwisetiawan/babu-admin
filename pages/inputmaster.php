<?php include '../components/header2.php'; ?>

<script>
  $(document).ready(function () {


    // draw()

    // alert(localStorage.getItem('id'))

    if (localStorage.getItem('id') != "5f0bf6c7a15a3e12b8a07e4a" && localStorage.getItem('id') != "5f27c7b5936db3542c826c55" && localStorage.getItem('id') != "5f27c7bb936db3542c826c56") {
      $('.yaqie').css('display','none')
    }

    $(document).on('keyup', '.select2-search__field', function (e) {
      
      var text1 = $(this).val();
      var text2 = $(this).attr('aria-controls');
      // console.log(text2);

    });


    


    $(document).on('click','.judul',function(){
      var text = $(this).attr("id");
      $(".judul_text").val(text)
      select()
    })

    $(document).on('click','.readmore',function(){
      var text = $(this).attr("id");
      $(".judul_text").val(text)
      select()
    })

    $(document).on('click','.deskripsi',function(){
      var text = $(this).attr("id");
      $(".judul_text").val(text)
      select()
    })


    $(document).on('change','.negara',function(){
      var text = $(this).val();

      $.ajax({
        url: '<?= $link_api ?>provinsi/'+text,
        type: "GET",
        dataType: "JSON",
        success: function(response) {
          $('.provinsi').html('<option value="">=== Pilih Provinsi ===</option>')
          $('.kabupaten').html('<option value="">=== Pilih Kabupaten ===</option>')
          $('.kecamatan').html('<option value="">=== Pilih Kecamatan ===</option>')
          $('.desa').html('<option value="">=== Pilih Desa ===</option>')
          
          for (let i = 0; i < response.data.length; i++) {
            $('.provinsi').append('<option value="'+response.data[i]._id+'">'+response.data[i].provinsi+'</option>')
          }
        },
        error: function(e) {
          console.log(e);
        }
      });

    })
    
    
    $(document).on('change','.provinsi',function(){
      var text = $(this).val();
      $.ajax({
        url: '<?= $link_api ?>kabupaten/'+text,
        type: "GET",
        dataType: "JSON",
        success: function(response) {
          
          $('.kabupaten').html('<option value="">=== Pilih Kabupaten ===</option>')
          $('.kecamatan').html('<option value="">=== Pilih Kecamatan ===</option>')
          $('.desa').html('<option value="">=== Pilih Desa ===</option>')
          
          for (let i = 0; i < response.data.length; i++) {
            $('.kabupaten').append('<option value="'+response.data[i]._id+'">'+response.data[i].kabupaten+'</option>')
          }
        },
        error: function(e) {
          console.log(e);
        }
      });

    })


    $(document).on('change','.kabupaten',function(){
      var text = $(this).val();
      $.ajax({
        url: '<?= $link_api ?>kecamatan/'+text,
        type: "GET",
        dataType: "JSON",
        success: function(response) {
          console.log(response);
          $('.kecamatan').html('<option value="">=== Pilih Kecamatan ===</option>')
          $('.desa').html('<option value="">=== Pilih Desa ===</option>')
          
          for (let i = 0; i < response.data.length; i++) {
            $('.kecamatan').append('<option value="'+response.data[i]._id+'">'+response.data[i].kecamatan+'</option>')
          }
        },
        error: function(e) {
          console.log(e);
        }
      });

    })

    $(document).on('change','.kecamatan',function(){
      var text = $(this).val();
      $.ajax({
        url: '<?= $link_api ?>desa/'+text,
        type: "GET",
        dataType: "JSON",
        success: function(response) {
          $('.desa').html('<option value="">=== Pilih Desa ===</option>')
          
          for (let i = 0; i < response.data.length; i++) {
            $('.desa').append('<option value="'+response.data[i]._id+'">'+response.data[i].desa+'</option>')
          }
        },
        error: function(e) {
          console.log(e);
        }
      });

    })




    function select() {
      $('.kategori').html('<option value="">=== Pilih Kategori ===</option>')
      $('.bahasa').html('<option value="">=== Pilih Bahasa ===</option>')
      // $('.sinonim').html('<option value="">=== Pilih Sinonim ===</option>')
      $('.katadasarr').html('<option value="">=== Pilih Kata Dasar ===</option>')
      $('.negara').html('<option value="">=== Pilih Negara ===</option>')
      $('.provinsi').html('<option value="">=== Pilih Provinsi ===</option>')
      $('.kabupaten').html('<option value="">=== Pilih Kabupaten ===</option>')
      $('.kecamatan').html('<option value="">=== Pilih Kecamatan ===</option>')
      $('.desa').html('<option value="">=== Pilih Desa ===</option>')
      $('.subfik').html('<option value="">=== Pilih Subfik ===</option>')
      $('.prefik').html('<option value="">=== Pilih Prefik ===</option>')
      $('.kataganti').html('<option value="">=== Pilih Kata Ganti ===</option>')

      $.ajax({
        url: '<?= $link_api ?>server/negara',
        type: "GET",
        dataType: "JSON",
        success: function(response) {
          
          for (let i = 0; i < response.data.length; i++) {
            $('.negara').append('<option value="'+response.data[i]._id+'">'+response.data[i].negara+'</option>')
          }
        },
        error: function(e) {
          console.log(e);
        }
      });

    }


    // $("#readmore").keyup(function () {
    //   console.log($(".readmore_berita").html());
    //   // $(".readmore_berita").html()
    // })

    $(document).on('click','.statusselesai',function(){
        var id = $(this).attr("id");
        swal({
          title: "Apa Anda yakin?",
          text: "Data akan dipindahkan ke Input Master Selesai",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            $.ajax({
              url: '<?= $link_api3001 ?>clean2/'+id+'/'+localStorage.getItem('id'),
              type: "PUT",
              dataType: "JSON",
              success: function(response) {
                swal("Sukses!", "Proses Berhasil!", "success");
                getData()
                // $('#tabeldata').DataTable().ajax.reload();
              },
              error: function(e) {
                console.log(e);
              }
            });


          } else {
            swal("Proses dibatalkan!");
          }
        });
        

      })

    
    $("#form_edit").on('submit',(function(e) {
        e.preventDefault();
        // alert($('.id_berita').val())
        // alert($(".judul_berita").val())
        // alert($(".deskripsi_berita").val())
        // alert($(".readmore_berita").val())
        var data_readmore = CKEDITOR.instances.readmore.getData();

        var id_berita = $('.id_berita').val()
        var data_edit_berita = {
          "judul":$(".judul_berita").val(),
          "deskripsi":$(".deskripsi_berita").val(),
          "readmore":data_readmore,
        }
        $.ajax({
          url: "<?= $link_api ?>berita/apasih/"+id_berita,
          type: "POST",
          data: JSON.stringify(data_edit_berita),
          dataType: "JSON",
          contentType: "application/json; charset=utf-8",
          cache: false,
          processData: false,
          success: function(data) {

            // console.log(data);
            if (data.success == '1') {
              swal("Sukses!", "Edit Berhasil!", "success");
              getData()
            }
          },
          error: function(e) {
            console.log(e);
          }
        });


    }))

    $("#form_gabung").on('submit',(function(e) {
      e.preventDefault();

      var data = {
        "id_user":localStorage.getItem('id'),
        "kata_asli":$('#gabung_kata').val(),
      }

      $.ajax({
        url: "<?= $link_api3000 ?>gabung",
        type: "POST",
        data: JSON.stringify(data),
        dataType: "JSON",
        contentType: "application/json; charset=utf-8",
        cache: false,
        processData: false,
        success: function(data) {
          if (data.success == '1') {
            swal({
              title: "Success!",
              text: "Input Berhasil!",
              type: "success",
              timer: 500
            });
            getData()
            $("#form_gabung")[0].reset();
          } else {
            swal("Gagal!", "Terjadi kesalahan!", "warning");
          }
        },
        error: function(e) {
          console.log(e);
        }
      });
      
    }))




    $(document).on('click','.edit_berita',function(){
      var id = $(this).attr("id");
      $(".id_berita").val('')
      $(".judul_berita").val('')
      $(".deskripsi_berita").val('')
      $(".readmore_berita").val('')
      CKEDITOR.instances['readmore'].setData('');



      $(".id_berita").val(id)

      $.ajax({
        url: '<?= $link_api ?>berita/'+id,
        type: "GET",
        dataType: "JSON",
        success: function(response) {
          console.log(response);
          $(".judul_berita").val(response.judul)
          $(".deskripsi_berita").val(response.deskripsi)
          // $(".readmore_berita").val(response.readmore)
          CKEDITOR.instances['readmore'].setData(response.readmore);
        },
        error: function(e) {
          console.log(e);
        }
      });

    })


    $("#form_submit").on('submit',(function(e) {
        e.preventDefault();

        $("#btnSubmit").attr("disabled", true);

        // alert($('#kata_asli').val())
        var data = {
          "kata_asli":$('#kata_asli').val(),
          "id_kategori":$('#id_kategori').val(),
          "id_katadasar":$('#id_katadasar').val(),
          "sinonim":$('#id_sinonim').val(),
          "id_bahasa":$('#id_bahasa').val(),
          "id_negara":$('#id_negara').val(),
          "id_provinsi":$('#id_provinsi').val(),
          "id_kabupaten":$('#id_kabupaten').val(),
          "id_kecamatan":$('#id_kecamatan').val(),
          "id_desa":$('#id_desa').val(),
          "id_subfik":$('#id_subfik').val(),
          "id_prefik":$('#id_prefik').val(),
          "id_kataganti":$('#id_kataganti').val(),
          "id_user":localStorage.getItem('id'),
        }

        $.ajax({
          url: "<?= $link_api ?>master",
          type: "POST",
          data: JSON.stringify(data),
          dataType: "JSON",
          // crossDomain: true,
          contentType: "application/json; charset=utf-8",
          cache: false,
          processData: false,
          success: function(data) {
            if (data.success == '1') {
              swal({
                title: "Success!",
                text: "Data berhasil.",
                type: "success",
                timer: 1000
              });
              // swal("Sukses!", "Input Berhasil!", "success");
              $('#exampleModal').modal('hide')
              $("#btnSubmit").attr("disabled", false);
              getData()
            } else {
              swal("Gagal!", data.message, "warning");
            }

            console.log(data);
          },
          error: function(e) {
            console.log(e);
          }
        });

        
      }))



    $('.content').html('<div class="row mb-3"> <div class="col-lg-3 mb-3 mb-lg-3"> <box class="shine"></box> </div> <div class="col-lg-9 mb-9 mb-lg-9"> <lines class="shine"></lines> <lines class="shine"></lines> <lines class="shine"></lines> </div> </div>')

    function getData(){
      const queryString = window.location.search;
      console.log(queryString);
      const urlParams = new URLSearchParams(queryString);
      var page = urlParams.get('page')



      $('#pagination').html('')

      var url;
      if (page != null) {
        url = '<?= $link_api3001 ?>clean2?page='+page
      } else {
        url = '<?= $link_api3001 ?>clean2?page=1'
        page = 1
      }

      // if (page != null) {
      //   url = '<?= $link_api3001 ?>clean2/clean/clean/clean/get/clean?page='+page
      // } else {
      //   url = '<?= $link_api3001 ?>clean2/clean/clean/clean/get/clean?page=1'
      //   page = 1
      // }


      $.ajax({
        url: url,
        type: "GET",
        dataType: "JSON",
        success: function(response) {


          $('.content').html('');

          var totalPages = response.totalPages
          $('#totalPages').html(totalPages.toLocaleString().replace(',','.'))
          $('#page').html(parseFloat(page).toLocaleString().replace(',','.'))

          if (totalPages < 3) {
            // loop biasa
            if (page == 2) {
              $('#pagination').append('<li class="page-item"> <a class="page-link" href="<?= $actual_link ?>pages/inputmaster?page=1">Previous</a> </li>')
            } else {
              $('#pagination').append('<li class="page-item disabled"> <a class="page-link" href="#" tabindex="-1">Previous</a> </li>')
            }

            for (let i_pages = 1; i_pages < totalPages+1; i_pages++) {
              if (i_pages == page) {
                $('#pagination').append('<li class="page-item active"> <a class="page-link" href="<?= $actual_link ?>pages/inputmaster?page='+i_pages+'">'+i_pages.toLocaleString().replace(',','.')+'</a> </li>');
              } else {
                $('#pagination').append('<li class="page-item"> <a class="page-link" href="<?= $actual_link ?>pages/inputmaster?page='+i_pages+'">'+i_pages.toLocaleString().replace(',','.')+'</a> </li>');
              }
            }

            if (page == 2) {
              $('#pagination').append('<li class="page-item disabled"> <a class="page-link" href="#" tabindex="-1">Next</a> </li>')
            } else {
              $('#pagination').append('<li class="page-item"> <a class="page-link" href="<?= $actual_link ?>pages/inputmaster?page='+Number(parseInt(page)+1)+'">Next</a> </li>')
            }
              
          } else if(totalPages >= 3) {
            // loop 3 aja
            var page1 = Number(parseInt(page)-1)
            var page2 = page
            var page3 = Number(parseInt(page)+2)

            console.log('total page : '+totalPages);
            
            
              // alert(page3 )
            if (page2 >= totalPages) {
              $('#pagination').append('<li class="page-item"> <a class="page-link" href="<?= $actual_link ?>pages/inputmaster?page='+page1+'">Previous</a> </li>')
              page3 = Number(parseInt(page)+1)
              page1 = Number(parseInt(page)-2)
            } else if(page1 < 1){
              $('#pagination').append('<li class="page-item disabled"> <a class="page-link" href="#" tabindex="-1">Previous</a> </li>')
              page1 = 1
              page3 = Number(parseInt(page)+3)
            } else {
              $('#pagination').append('<li class="page-item"> <a class="page-link" href="<?= $actual_link ?>pages/inputmaster?page='+page1+'">Previous</a> </li>')
            }

            console.log('page1 : '+page1);
            console.log('page2 : '+page2);
            console.log('page3 : '+page3);

            for (let i_pages = page1; i_pages < page3; i_pages++) {
              if (i_pages == page) {
                $('#pagination').append('<li class="page-item active"> <a class="page-link" href="<?= $actual_link ?>pages/inputmaster?page='+i_pages+'">'+i_pages.toLocaleString().replace(',','.')+'</a> </li>');
              } else {
                $('#pagination').append('<li class="page-item"> <a class="page-link" href="<?= $actual_link ?>pages/inputmaster?page='+i_pages+'">'+i_pages.toLocaleString().replace(',','.')+'</a> </li>');
              }
            }

            if (page2 >= totalPages) {
              $('#pagination').append('<li class="page-item disabled"> <a class="page-link" href="#" tabindex="-1">Next</a> </li>')
              page3 = Number(parseInt(page)+1)
              page1 = Number(parseInt(page)-2)
            } else if(page1 < 1){
              $('#pagination').append('<li class="page-item disabled"> <a class="page-link" href="<?= $actual_link ?>pages/inputmaster?page='+Number(parseInt(page)+1)+'">Next</a> </li>')
              page1 = 1
              page3 = Number(parseInt(page)+3)
            } else {
              $('#pagination').append('<li class="page-item"> <a class="page-link" href="<?= $actual_link ?>pages/inputmaster?page='+Number(parseInt(page)+1)+'">Next</a> </li>')
            }

          }

          response.data.map(function (item, index) {

            var juduls = "";
            var deskripsis = "";
            var readmores = "";
            // var statuss = "";
            var ambigu = "";
            var id_link = "";
            item.judul.map(function (judul, index) {

              juduls +=
                "<div class='badge badge-secondary judul' data-toggle='modal' data-target='#exampleModal' style='cursor:pointer;' id='"+judul+"'>" + judul + "</div>&nbsp;";
              
            })
            item.deskripsi.map(function (deskripsi) {
              deskripsis +=
                "<div class='badge badge-dark deskripsi' data-toggle='modal' data-target='#exampleModal' style='cursor:pointer;' id='"+deskripsi+"'>" +
                deskripsi + "</div>&nbsp;";
            })
            item.readmore.map(function (readmore) {
              readmores +=
                "<div class='badge badge-primary readmore' data-toggle='modal' data-target='#exampleModal' style='cursor:pointer;' id='"+readmore+"'>" +
                readmore + "</div>&nbsp;";
            })
            // item.status.map(function (status) {
            //   statuss +=
            //     "<div class='badge badge-warning status' style='color=white;' data-toggle='modal' data-target='#exampleModal' style='cursor:pointer;' id='"+status+"'>" +
            //     status + "</div>&nbsp;";
            // })


            console.log("ID BERITA : "+item.berita);

            $.ajax({
              url: '<?= $link_api3000 ?>berita/' + item.berita,
              type: "GET",
              dataType: 'json',
              success: function (result) {

                var sinonim = "";
                var master
                var statuse

                master = '<span class="badge badge-success yaqie edit_berita" data-toggle="modal" data-target="#exampleModal_edit" style="cursor:pointer;" id="'+item._id+'">Edit Berita</span>'
                // sinonim += '<div class="d-flex align-items-start border-left-line pb-3"> <div> <img class="media-object rounded-circle" src="' + img + '"' +'alt="" style="width: 50px;height: 50px;margin-left:-27px"> </div> <div class="ml-3 mt-2"> <h5 class="text-dark font-weight-medium mb-2">'+result[0].judul+'</h5> '+juduls + deskripsis + readmores+' </div> </div>'
                statuse = '<span class="badge badge-danger statusselesai" data-toggle="modal" style="cursor:pointer;" id="'+item._id+'">Selesai</span>'
                sinonim += '<div class="d-flex align-items-start border-left-line pb-3"> <div class="ml-3 mt-2"> '+juduls + deskripsis + readmores + master +' <a href="'+item.url+'" target="_blank" class="badge badge-warning" style="color: white;"> Link Berita </a> '+statuse+'  </div> </div>'
                $(".content").append(sinonim);

              }, // success
              error: function (e) {
                console.log(e);
              }
            });



          })
        },
        error: function(e) {
          console.log(e);
        }
      });
    }

    getData()




    

  })
</script>




<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Masukan kata ke database</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <script>
        $(document).ready(function () {


          $(document).on('change','#id_katadasar',function(){
            var text = $(this).val();
            var kataasli = $('#kata_asli').val();

            $.ajax({
              url: '<?= $link_api ?>katadasarr/'+text,
              type: "GET",
              dataType: "JSON",
              success: function(response) {

                var param = {
                'search':response.jenis
                }

                if (response.kata == kataasli) {

                  $.ajax({
                    url: "<?= $link_api ?>search_kategori",
                    type: "POST",
                    data: JSON.stringify(param),
                    dataType: "JSON",
                    contentType: "application/json; charset=utf-8",
                    cache: false,
                    processData: false,
                    success: function(response_kategori) {
                      var option = new Option(response_kategori.arr[0].nama_kategori, response_kategori.arr[0]._id, true, true);
                      $('#id_kategori').append(option).trigger('change');

                    },
                    error: function(e) {
                      console.log(e);

                      
                    }
                  });
                }

                $.ajax({
                  url: '<?= $link_api ?>master/sinonim/sinonim/'+text,
                  type: "GET",
                  dataType: "JSON",
                  success: function(response_sinonim) {
                    // console.log(response_sinonim.data.toString());

                    function replaceSpace(text)
                    {
                        return text.toString().toLowerCase()
                                .replace(/\,/g, ', ')           // Replace spaces with -
                    }

                    $('#kata_sinonim').html(replaceSpace(response_sinonim.data.toString()))



                  },
                  error: function(e) {
                    console.log(e);
                  }
                });

                $.ajax({
                  url: '<?= $link_api ?>language/5f04525cee5eb72b007576ef',
                  type: "GET",
                  dataType: "JSON",
                  success: function(response2) {
                    var option = new Option(response2.bahasa, response2._id, true, true);
                    $('.bahasa').append(option).trigger('change');
                  },
                  error: function(e) {
                    console.log(e);
                  }
                });

                
              },
              error: function(e) {
                console.log(e);
              }
            });

          })


          $('#id_katadasar').select2({
            placeholder: 'Pilih opsi',
            minimumInputLength:1,
            width:'100%',
            ajax: {
              url: '<?= $link_api ?>search_katadasar',
              dataType:"JSON",
              type:"POST",
              delay:250,
              data: function (params) {
                return {
                  search: params.term,
                }
              },
              processResults: function (data) {
                return {
                  results: $.map(data.data, function (item) {
                      return {
                          text: item.kata,
                          id: item._id
                      }
                  })
                };
              }
            }
          });


          $('#id_kategori').select2({
            placeholder: 'Pilih opsi',
            minimumInputLength:1,
            width:'100%',
            ajax: {
              url: '<?= $link_api ?>search_kategori',
              dataType:"JSON",
              type:"POST",
              delay:250,
              data: function (params) {
                return {
                  search: params.term,
                }
              },
              processResults: function (data) {
                return {
                  results: $.map(data.arr, function (item) {
                      return {
                          text: item.nama_kategori,
                          id: item._id
                      }
                  })
                };
              }
            }
          });


          $('#id_bahasa').select2({
            placeholder: 'Pilih opsi',
            minimumInputLength:1,
            width:'100%',
            ajax: {
              url: '<?= $link_api ?>search_bahasa',
              dataType:"JSON",
              type:"POST",
              delay:250,
              data: function (params) {
                return {
                  search: params.term,
                }
              },
              processResults: function (data) {
                return {
                  results: $.map(data.arr, function (item) {
                      return {
                          text: item.bahasa,
                          id: item._id
                      }
                  })
                };
              }
            }
          });

          $('#id_subfik').select2({
            placeholder: 'Pilih opsi',
            minimumInputLength:1,
            width:'100%',
            ajax: {
              url: '<?= $link_api ?>search_suffik',
              dataType:"JSON",
              type:"POST",
              delay:250,
              data: function (params) {
                return {
                  search: params.term,
                }
              },
              processResults: function (data) {
                return {
                  results: $.map(data.arr, function (item) {
                      return {
                          text: item.subfik,
                          id: item._id
                      }
                  })
                };
              }
            }
          });

          $('#id_prefik').select2({
            placeholder: 'Pilih opsi',
            minimumInputLength:1,
            width:'100%',
            ajax: {
              url: '<?= $link_api ?>search_prefik',
              dataType:"JSON",
              type:"POST",
              delay:250,
              data: function (params) {
                return {
                  search: params.term,
                }
              },
              processResults: function (data) {
                return {
                  results: $.map(data.arr, function (item) {
                      return {
                          text: item.prefik,
                          id: item._id
                      }
                  })
                };
              }
            }
          });

          $('#id_kataganti').select2({
            placeholder: 'Pilih opsi',
            minimumInputLength:1,
            width:'100%',
            ajax: {
              url: '<?= $link_api ?>search_kataganti',
              dataType:"JSON",
              type:"POST",
              delay:250,
              data: function (params) {
                return {
                  search: params.term,
                }
              },
              processResults: function (data) {
                return {
                  results: $.map(data.arr, function (item) {
                      return {
                          text: item.kata_ganti,
                          id: item._id
                      }
                  })
                };
              }
            }
          });


        });
      </script>


      
      <form id="form_submit">
        <div class="modal-body">
          <div class="form-group">
            <label for="kata_asli">Kata yang akan di input</label>
            <input type="text" class="form-control judul_text" id="kata_asli" name="kata_asli" readonly style="background:#eeeeee;">
          </div>
          <div class="form-group">
            <label for="katadasar">Kata Dasar</label>
            <select class="form-control katadasarr asw" name="id_katadasar" id="id_katadasar" required></select>
            <a href="<?= $actual_link ?>pages/katadasar" target="_blank">Input Kata Dasar Baru</a>
          </div>
          <div class="form-group">
            <label for="kata">Kategori</label>
            <select class="form-control select3 kategori" name="id_kategori" id="id_kategori" multiple="multiple"></select>
            <a href="<?= $actual_link ?>pages/categories" target="_blank">Input Kategori Baru</a>
          </div>
          <div class="form-group">
            <label for="id_sinonim">Sinonim</label>
            <select class="form-control select4 sinonim" name="id_sinonim" id="id_sinonim" multiple="multiple"></select>
            <span id="kata_sinonim"></span>
            <!-- yakin, diyakini, yakin banget -->
            <!-- <a href="<?= $actual_link ?>pages/categories" target="_blank">Input sinionim baru</a> -->
          </div>
          <div class="form-group">
            <label for="bahasa">Bahasa</label>
            <select class="form-control select2 bahasa" name="id_bahasa" id="id_bahasa" multiple="multiple"></select>
            <a href="<?= $actual_link ?>pages/languages" target="_blank">Input Bahasa Baru</a>
          </div>
          <div class="form-group">
            <label for="negara">Negara</label>
            <select class="form-control select2 negara" name="id_negara" id="id_negara" multiple="multiple"></select>
            <a href="<?= $actual_link ?>pages/negara" target="_blank">Input Negara Baru</a>
          </div>
          <div class="form-group">
            <label for="provinsi">Provinsi</label>
            <select class="form-control select2 provinsi" name="id_provinsi" id="id_provinsi" multiple="multiple"></select>
            <a href="<?= $actual_link ?>pages/provinsi" target="_blank">Input Provinsi Baru</a>
          </div>
          <div class="form-group">
            <label for="kabupaten">Kabupaten</label>
            <select class="form-control select2 kabupaten" name="id_kabupaten" id="id_kabupaten" multiple="multiple"></select>
            <a href="<?= $actual_link ?>pages/kabupaten" target="_blank">Input Kabupaten Baru</a>
          </div>
          <div class="form-group">
            <label for="kecamatan">Kecamatan</label>
            <select class="form-control select2 kecamatan" name="id_kecamatan" id="id_kecamatan" multiple="multiple"></select>
            <a href="<?= $actual_link ?>pages/kecamatan" target="_blank">Input Kecamatan Baru</a>
          </div>
          <div class="form-group">
            <label for="desa">Desa</label>
            <select class="form-control select2 desa" name="id_desa" id="id_desa" multiple="multiple"></select>
            <a href="<?= $actual_link ?>pages/desa" target="_blank">Input Desa Baru</a>
          </div>
          <div class="form-group">
            <label for="prefik">Imbuhan</label>
            <select class="form-control select2 prefik" name="id_prefik" id="id_prefik" multiple="multiple"></select>
            <a href="<?= $actual_link ?>pages/prefik" target="_blank">Input Prefik Baru</a>
          </div>
          <div class="form-group">
            <label for="subfik">Akhiran</label>
            <select class="form-control select2 subfik" name="id_subfik" id="id_subfik" multiple="multiple"></select>
            <a href="<?= $actual_link ?>pages/subfik" target="_blank">Input Sufik Baru</a>
          </div>
          <div class="form-group">
            <label for="subfik">Kata Ganti</label>
            <select class="form-control select2 kataganti" name="id_kataganti" id="id_kataganti" multiple="multiple"></select>
            <a href="<?= $actual_link ?>pages/kataganti" target="_blank">Input Kata Ganti Baru</a>
          </div>

          

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary" id="btnSubmit">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>







<div class="modal fade" id="exampleModal_edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Berita</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      
      <form id="form_edit">
        <div class="modal-body">
          <div class="form-group">
            <label for="">ID Berita</label>
            <input type="text" class="form-control id_berita" id="id_berita" name="id_berita" readonly style="background:#eeeeee;">
          </div>
          <div class="form-group">
            <label for="">Judul</label>
            <input type="text" class="form-control judul_berita" id="judul" name="judul">
          </div>
          <div class="form-group">
            <label for="">Deskripsi</label>
            <input type="text" class="form-control deskripsi_berita" id="deskripsi" name="id">
          </div>
          <div class="form-group">
            <label for="">Readmore</label>
            <script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
            <!-- <textarea class="form-control readmore_berita" id="readmore" name="readmore" cols="30" rows="10"></textarea> -->
            <textarea class="readmore_berita" id="readmore" name="readmore"></textarea>
            <script>
                    CKEDITOR.replace( 'readmore' );
            </script>
            <!-- <input type="text" class="form-control readmore_berita" id="readmore" name="readmore"> -->
          </div>
          <!-- <div class="form-group">
            <label for="">Berubah menjadi</label>
            <input type="text" class="form-control judul_text" id="" name="">
          </div> -->

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
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
            <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Selamat Datang <span class="username"></span></h3>
            <div class="d-flex align-items-center">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb m-0 p-0">
                  <li class="breadcrumb-item"><a href="./">Input Master</a>
                  </li>
                </ol>
              </nav>
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
        <!-- Start Location and Earnings Charts Section -->
        <!-- *************************************************************** -->
        <!-- <div class="row yaqie">
          <div class="col-md-12 col-lg-12">
            <div class="card" style="width:100% !important;">
              <div class="card-body">
                <h4 class="card-title">Jumlah Input Data Operator</h4>
                <div class="mt-4 activity">

                <div id="piechart" display="block" margin="0 auto"></div>

                <ul class="list-style-none mb-0 looping_input"></ul>

                  <script type="text/javascript">

                    async function asdqwe() {

                      var json = []

                      await $.ajax({
                        url: '<?= $link_api ?>count',
                        type: "GET",
                        dataType: "JSON",
                        success: function(response) {

                          var color = [
                            'text-primary',
                            'text-danger',
                            'text-cyan',
                            'text-warning',
                          ]
                          // console.log(response);
                          // console.log(response.length);
                          var colori = 0
                          for (let i = 0; i < response.length; i++) {
                            $('.looping_input').append('<li> <i class="fas fa-circle '+ color[colori] +' font-10 mr-2"></i> <span class="text-muted">'+response[i].id_user+'</span> <span class="text-dark float-right font-weight-medium">'+parseInt(response[i].count_op).toLocaleString()+'</span> </li>')
                            if (i == 0) {
                              json.push(['Input Master', 'Keseluruhan'])
                            } else {
                            }
                            var data = [response[i].id_user,parseInt(response[i].count_op)]
                            json.push(data)

                            if (colori == 3) {
                              colori = 0
                            } else {
                              colori++
                            }

                          }
                        },
                        error: function(e) {
                          console.log(e);
                        }
                      });               

                      console.log(json);


                      // Load google charts
                      google.charts.load('current', {'packages':['corechart']});
                      google.charts.setOnLoadCallback(drawChart);

                      // Draw the chart and set the chart values
                      function drawChart() {
                        var data = google.visualization.arrayToDataTable(json);

                        // Optional; add a title and set the width and height of the chart
                        var options = {width:'100%', 'height':500};

                        // Display the chart inside the <div> element with id="piechart"
                        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
                        chart.draw(data, options);
                      }

                    }

                    asdqwe()

                  </script>
                                  
                </div>
              </div>
            </div>
          </div>

        </div> -->
        
        
        
        

        <div class="row">
          <div class="col-md-12 col-lg-12">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Input Master</h4>
                <div class="mt-4 activity">

                  <div class="row">
                    <br>
                    <br>
                    <div class="col-lg-9">
                      Menampilkan halaman <span id="page"></span> dari <span id="totalPages"></span>
                    </div>
                    <div class="col-lg-3">
                      <div class="customize-input float-right">
                          <button type="button" class="btn waves-effect waves-light btn-rounded btn-primary" data-toggle="modal" data-target="#modalgabung"><i data-feather="plus" class="feather-icon"></i> Gabung Kata</button>
                      </div>
                      <br>
                      <br>
                      <br>
                      <ul class="pagination float-right" id="pagination">
                      </ul>
                    </div>
                  </div>
                  
                  <br>

                  <style>
                    .shine {
                      background: #f6f7f8;
                      background-image: linear-gradient(to right, #f6f7f8 0%, #edeef1 20%, #f6f7f8 40%, #f6f7f8 100%);
                      background-repeat: no-repeat;
                      background-size: 800px 220px; 
                      display: inline-block;
                      position: relative; 
                      
                      -webkit-animation-duration: 1s;
                      -webkit-animation-fill-mode: forwards; 
                      -webkit-animation-iteration-count: infinite;
                      -webkit-animation-name: placeholderShimmer;
                      -webkit-animation-timing-function: linear;
                      }

                    box {
                      height: 220px;
                      width: 100%;
                    }

                    .shimmer {
                      display: inline-flex;
                      flex-direction: column; 
                      margin-left: 25px;
                      margin-top: 15px;
                      vertical-align: top; 
                    }

                    lines {
                      height: 40px;
                      width: 100%;
                      margin-top:20px;
                      /* background:red;
                      height: 10px;
                      margin-top: 10px;
                      width: 100%;  */
                    }

                    photo {
                      display: block!important;
                      width: 325px; 
                      height: 100px; 
                      margin-top: 15px;
                    }

                    @-webkit-keyframes placeholderShimmer {
                      0% {
                        background-position: -468px 0;
                      }
                      
                      100% {
                        background-position: 468px 0; 
                      }
                    }

                  </style>

                  <!-- <div class="row mb-3">
                    <div class="col-lg-3 mb-3 mb-lg-3">
                      <box class="shine"></box>
                    </div>
                    <div class="col-lg-9 mb-9 mb-lg-9">
                      <lines class="shine"></lines>
                      <lines class="shine"></lines>
                      <lines class="shine"></lines>
                    </div>
                  </div> -->

                  <div class="content"></div>
                  
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="modal fade" id="modalgabung" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Gabung Kata</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form id="form_gabung">
                  
                <div class="modal-body">
                  
                  <div class="form-group">
                    <label for="kata">Kata</label>
                    <input type="text" class="form-control" name="gabung_kata" id="gabung_kata" placeholder="Masukkan kata yang akan digabung">
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
        <!-- *************************************************************** -->
        <!-- End Location and Earnings Charts Section -->
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