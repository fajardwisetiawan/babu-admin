<?php include '../components/headermaster.php'; ?>
<script>
  $(document).ready(function () {

    function replaceSpace(text)
    {
        return text.toString().toLowerCase().replace(/\,/g, ', ')
    }

      $(document).on('change','.pilihan',function(){
        var text = $(this).val();
        console.log(text);

        if (text == "katadasar") {
          
           $('#id_search').select2({
              placeholder: 'Cari',
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

        }else if (text == "kategori") {
          
           $('#id_search').select2({
              placeholder: 'Cari',
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

        }else if (text == "prefik") {
          
           $('#id_search').select2({
              placeholder: 'Cari',
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
        
        }else if (text == "sufik") {
          
           $('#id_search').select2({
              placeholder: 'Cari',
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

        }else if (text == "kataganti") {
          
           $('#id_search').select2({
              placeholder: 'Cari',
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

        }else if (text == "bahasa") {
          
           $('#id_search').select2({
              placeholder: 'Cari',
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

        }else if (text == "negara") {
          
           $('#id_search').select2({
              placeholder: 'Cari',
              minimumInputLength:1,
              width:'100%',
              ajax: {
                url: '<?= $link_api ?>search_negara',
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
                            text: item.negara,
                            id: item._id
                        }
                    })
                  };
                }
              }
            });

        }else if (text == "provinsi") {
          
           $('#id_search').select2({
              placeholder: 'Cari',
              minimumInputLength:1,
              width:'100%',
              ajax: {
                url: '<?= $link_api ?>search_provinsi',
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
                            text: item.provinsi,
                            id: item._id
                        }
                    })
                  };
                }
              }
            });

        }else if (text == "kabupaten") {
          
           $('#id_search').select2({
              placeholder: 'Cari',
              minimumInputLength:1,
              width:'100%',
              ajax: {
                url: '<?= $link_api ?>search_kabupaten',
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
                            text: item.kabupaten,
                            id: item._id
                        }
                    })
                  };
                }
              }
            });

        }else if (text == "kecamatan") {
          
           $('#id_search').select2({
              placeholder: 'Cari',
              minimumInputLength:1,
              width:'100%',
              ajax: {
                url: '<?= $link_api ?>search_kecamatan',
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
                            text: item.kecamatan,
                            id: item._id
                        }
                    })
                  };
                }
              }
            });

        }else {
          
           $('#id_search').select2({
              placeholder: 'Cari',
              minimumInputLength:1,
              width:'100%',
              ajax: {
                url: '<?= $link_api ?>search_desa',
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
                            text: item.desa,
                            id: item._id
                        }
                    })
                  };
                }
              }
            });
            
        }

        $(document).on('change','#id_search',function(){
          var a = $(this).val();
          console.log(text);
          console.log(a);

          $('#content').html('');
          $('#pagination').html('');
          
          $.ajax({
            url: '<?= $link_api ?>filtermaster/'+text+'/'+a,
            type: "GET",
            dataType: "JSON",
            success: function(response) {
                console.log(response);
              
                var arrKategori = []
                var arrNegara = []
                var arrProvinsi = []
                var arrBahasa = []
                var arrKabupaten = []
                var arrKecamatan = []
                var arrDesa = []
                var arrImbuhan = []
                var arrAkhiran = []
                var arrKataganti = []

                for (let i = 0; i < response.data.length; i++) {
                  for (let i2 = 0; i2 < response.data[i].kategori.length; i2++) {
                    arrKategori.push(' ' + response.data[i].kategori[i2].kategori)
                  }
                  
                  for (let i3 = 0; i3 < response.data[i].negara.length; i3++) {
                    arrNegara.push(' ' + response.data[i].negara[i3].negara)
                  }

                  for (let i4 = 0; i4 < response.data[i].provinsi.length; i4++) {
                    arrProvinsi.push(' ' + response.data[i].provinsi[i4].provinsi)
                  }

                  for (let i6 = 0; i6 < response.data[i].bahasa.length; i6++) {
                    arrBahasa.push(' ' + response.data[i].bahasa[i6].bahasa)
                  }

                  for (let i7 = 0; i7 < response.data[i].kabupaten.length; i7++) {
                    arrKabupaten.push(' ' + response.data[i].kabupaten[i7].kabupaten)
                  }

                  for (let i8 = 0; i8 < response.data[i].kecamatan.length; i8++) {
                    arrKecamatan.push(' ' + response.data[i].kecamatan[i8].kecamatan)
                  }

                  for (let i9 = 0; i9 < response.data[i].desa.length; i9++) {
                    arrDesa.push(' ' + response.data[i].desa[i9].desa)
                  }

                  for (let i10 = 0; i10 < response.data[i].prefik.length; i10++) {
                    arrImbuhan.push(' ' + response.data[i].prefik[i10].prefik)
                  }

                  for (let i11 = 0; i11 < response.data[i].subfik.length; i11++) {
                    arrAkhiran.push(' ' + response.data[i].subfik[i11].subfik)
                  }

                  for (let i12 = 0; i12 < response.data[i].kata_ganti.length; i12++) {
                    arrKataganti.push(' ' + response.data[i].kata_ganti[i12].kata_ganti)
                  }

                  $('#content').append('<tr> <td>'+response.data[i].kata_asli+'</td> <td>'+response.data[i].kata_dasar[1]+'</td> <td>'+arrKategori+'</td> <td>'+response.data[i].sinonim+'</td> <td>'+arrImbuhan+'</td> <td>'+arrAkhiran+'</td> <td>'+arrKataganti+'</td> <td>'+arrBahasa+'</td> <td>'+arrNegara+'</td> <td>'+arrProvinsi+'</td> <td>'+arrKabupaten+'</td> <td>'+arrKecamatan+'</td> <td>'+arrDesa+'</td><td>'+response.data[i].code[1]+'</td><td>'+response.data[i].code[2]+'</td> <td> <button type="button" class="btn waves-effect waves-light btn-success edit" data-toggle="modal" data-target="#exampleModal" id="'+response.data[i]._id+'"><i class="ti-pencil"></i></button> <button type="button" class="btn waves-effect waves-light btn-danger hapus" id="'+response.data[i]._id+'"><i class="ti-trash"></i></button></td> </tr>')
                  
                  arrKategori = []
                  arrNegara = []
                  arrProvinsi = []
                  arrBahasa = []
                  arrKabupaten = []
                  arrKecamatan = []
                  arrDesa = []
                  arrImbuhan = []
                  arrAkhiran = []
                  arrKataganti = []

                }
            },
            error: function(e) {
              console.log(e);
            }
          });

        })

      })

      $("#form_edit").on('submit',(function(e) {
        e.preventDefault();

        var data = {
          "kata_asli":$('#kata_asli').val(),
          "id_katadasar":$('#id_katadasar').val(),
          "id_kategori":$('#id_kategori').val(),
          "id_prefik":$('#id_prefik').val(),
          "id_subfik":$('#id_subfik').val(),
          "id_kataganti":$('#id_kataganti').val(),
          "id_bahasa":$('#id_bahasa').val(),
          "id_negara":$('#id_negara').val(),
          "id_provinsi":$('#id_provinsi').val(),
          "id_kabupaten":$('#id_kabupaten').val(),
          "id_kecamatan":$('#id_kecamatan').val(),
          "id_desa":$('#id_desa').val(),
          "id_user":localStorage.getItem('id'),
        }

        $.ajax({
          url: "<?= $link_api ?>master/"+$('#id').val(),
          type: "PUT",
          data: JSON.stringify(data),
          dataType: "JSON",
          // crossDomain: true,
          contentType: "application/json; charset=utf-8",
          cache: false,
          processData: false,
          success: function(data) {
            if (data.success == '1') {
              swal("Sukses!", "Edit Berhasil!", "success");
              // $('#tabeldata').DataTable().ajax.reload();
              getContent()
            } else {
              swal("Gagal!", "Terjadi kesalahan!", "error");
              // $('#tabeldata').DataTable().ajax.reload();
            }
          },
          error: function(e) {
            console.log(e);
          }
        });


      }))

      $(document).on('click','.hapus',function(){
        var id = $(this).attr("id");
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
              url: '<?= $link_api ?>master/'+id+'/'+localStorage.getItem('id'),
              type: "DELETE",
              dataType: "JSON",
              success: function(response) {
                swal("Sukses!", "Hapus Berhasil!", "success");
                getContent()
                // $('#tabeldata').DataTable().ajax.reload();
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

      
      
      function select() {
        $('.kategori').html('<option value="">=== Pilih Kategori ===</option>')
        $('.bahasa').html('<option value="">=== Pilih Bahasa ===</option>')
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

        $.ajax({
          url: '<?= $link_api ?>server/kata_ganti',
          type: "GET",
          dataType: "JSON",
          success: function(response) {
            
            for (let i = 0; i < response.data.length; i++) {
              $('.kataganti').append('<option value="'+response.data[i]._id+'">'+response.data[i].kata_ganti+'</option>')
            }
          },
          error: function(e) {
            console.log(e);
          }
        });

      }

      $(document).on('click','.edit',function(){
        select()
        var id = $(this).attr("id");
        var param = $(this).attr("param");
        $("#id").val(id)

        $.ajax({
          url: '<?= $link_api ?>master/'+id,
          type: "GET",
          dataType: "JSON",
          success: function(response) {
            console.log(response);
            $("#kata_asli").val(response.kata_asli)
            $("#kata_sinonim").val(response.sinonim)

            for (let i_kategori = 0; i_kategori < response.id_kategori.length; i_kategori++) {

              $.ajax({
                url: '<?= $link_api ?>categories/'+response.id_kategori[i_kategori],
                type: "GET",
                dataType: "JSON",
                success: function(response2) {
                  var option = new Option(response2.nama_kategori, response.id_kategori[i_kategori], true, true);
                  $('#id_kategori').append(option).trigger('change');
                },
                error: function(e) {
                  console.log(e);
                }
              });

            }
            

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


            for (let i_bahasa = 0; i_bahasa < response.id_bahasa.length; i_bahasa++) {

              $.ajax({
                url: '<?= $link_api ?>language/'+response.id_bahasa[i_bahasa],
                type: "GET",
                dataType: "JSON",
                success: function(response2) {
                  var option = new Option(response2.bahasa, response.id_bahasa[i_bahasa], true, true);
                  $('#id_bahasa').append(option).trigger('change');
                },
                error: function(e) {
                  console.log(e);
                }
              });

            }

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





            $.ajax({
              url: '<?= $link_api ?>katadasarr/'+response.id_katadasar,
              type: "GET",
              dataType: "JSON",
              success: function(response2) {
                var option = new Option(response2.kata, response.id_katadasar, true, true);
                $('#id_katadasar').append(option).trigger('change');
              },
              error: function(e) {
                console.log(e);
              }
            });

            // alert(response.id_katadasar)


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





            for (let i_negara = 0; i_negara < response.id_negara.length; i_negara++) {

              $.ajax({
                url: '<?= $link_api ?>negara/'+response.id_negara[i_negara],
                type: "GET",
                dataType: "JSON",
                success: function(response2) {
                  var option = new Option(response2.negara, response.id_negara[i_negara], true, true);
                  $('#id_negara').append(option).trigger('change');

                },
                error: function(e) {
                  console.log(e);
                }
              });

            }
            
            
            for (let i_provinsi = 0; i_provinsi < response.id_provinsi.length; i_provinsi++) {

              $.ajax({
                url: '<?= $link_api ?>provinsii/'+response.id_provinsi[i_provinsi],
                type: "GET",
                dataType: "JSON",
                success: function(response2) {
                  var option = new Option(response2.data.provinsi, response.id_provinsi[i_provinsi], true, true);
                  $('#id_provinsi').append(option).trigger('change');
                },
                error: function(e) {
                  console.log(e);
                }
              });

            }
            
            for (let i_kabupaten = 0; i_kabupaten < response.id_kabupaten.length; i_kabupaten++) {

              $.ajax({
                url: '<?= $link_api ?>kabupatenn/'+response.id_kabupaten[i_kabupaten],
                type: "GET",
                dataType: "JSON",
                success: function(response2) {
                  var option = new Option(response2.data.kabupaten, response.id_kabupaten[i_kabupaten], true, true);
                  $('#id_kabupaten').append(option).trigger('change');
                },
                error: function(e) {
                  console.log(e);
                }
              });

            }

            for (let i_kecamatan = 0; i_kecamatan < response.id_kecamatan.length; i_kecamatan++) {

              $.ajax({
                url: '<?= $link_api ?>kecamatann/'+response.id_kecamatan[i_kecamatan],
                type: "GET",
                dataType: "JSON",
                success: function(response2) {
                  var option = new Option(response2.data.kecamatan, response.id_kecamatan[i_kecamatan], true, true);
                  $('#id_kecamatan').append(option).trigger('change');
                },
                error: function(e) {
                  console.log(e);
                }
              });

            }

            for (let i_desa = 0; i_desa < response.id_desa.length; i_desa++) {

              $.ajax({
                url: '<?= $link_api ?>desaa/'+response.id_desa[i_desa],
                type: "GET",
                dataType: "JSON",
                success: function(response2) {
                  var option = new Option(response2.data.desa, response.id_desa[i_desa], true, true);
                  $('#id_desa').append(option).trigger('change');
                },
                error: function(e) {
                  console.log(e);
                }
              });

            }

            for (let i_prefik = 0; i_prefik < response.id_prefik.length; i_prefik++) {
              console.log(response.id_prefik[i_prefik]);
              $.ajax({
                url: '<?= $link_api ?>prefik/'+response.id_prefik[i_prefik],
                type: "GET",
                dataType: "JSON",
                success: function(response2) {
                  var option = new Option(response2.prefik, response.id_prefik[i_prefik], true, true);
                  $('#id_prefik').append(option).trigger('change');
                },
                error: function(e) {
                  console.log(e);
                }
              });

            }

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

            for (let i_subfik = 0; i_subfik < response.id_subfik.length; i_subfik++) {
              console.log(response.id_subfik[i_subfik]);
              $.ajax({
                url: '<?= $link_api ?>subfik/'+response.id_subfik[i_subfik],
                type: "GET",
                dataType: "JSON",
                success: function(response2) {
                  var option = new Option(response2.subfik, response.id_subfik[i_subfik], true, true);
                  $('#id_subfik').append(option).trigger('change');
                },
                error: function(e) {
                  console.log(e);
                }
              });

            }

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

            for (let i_kataganti = 0; i_kataganti < response.id_kataganti.length; i_kataganti++) {
              console.log(response.id_kataganti[i_kataganti]);
              $.ajax({
                url: '<?= $link_api ?>kata_ganti/'+response.id_kataganti[i_kataganti],
                type: "GET",
                dataType: "JSON",
                success: function(response2) {
                  var option = new Option(response2.kata_ganti, response.id_kataganti[i_kataganti], true, true);
                  $('#id_kataganti').append(option).trigger('change');
                },
                error: function(e) {
                  console.log(e);
                }
              });

            }

            // $('#id_kataganti').select2({
            //   placeholder: 'Pilih opsi',
            //   minimumInputLength:1,
            //   width:'100%',
            //   ajax: {
            //     url: '<?= $link_api ?>search_kataganti',
            //     dataType:"JSON",
            //     type:"POST",
            //     delay:250,
            //     data: function (a) {
            //       return {
            //         search: a.term,
            //       }
            //     },
            //     processResults: function (b) {
            //       return {
            //         results: $.map(b.arr, function (c) {
            //             return {
            //                 text: c.kata_ganti,
            //                 id: c._id
            //             }
            //         })
            //       };
            //     }
            //   }
            // });


          },
          error: function(e) {
            console.log(e);
          }
        });
        


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

      

      function getContent(){
        $('#content').html('')


        const queryString = window.location.search;
        console.log(queryString);
        const urlParams = new URLSearchParams(queryString);
        var page = urlParams.get('page')
        $('#content').html('')
        $('#pagination').html('')
        var url;
        if (page != null) {
          url = '<?= $link_api ?>master?page='+page
        } else {
          url = '<?= $link_api ?>master?page=1'
          page = 1
        }


        $.ajax({
          url: url,
          type: "GET",
          dataType: "JSON",
          success: async function(response) {
            var totalPages = response.totalPages
            $('#jml_katadasar').html(response.count.toLocaleString().replace(',','.'))
            $('#totalPages').html(totalPages.toLocaleString().replace(',','.'))
            $('#page').html(parseFloat(page).toLocaleString().replace(',','.'))

            if (totalPages < 3) {
              // loop biasa
              if (page == 2) {
                $('#pagination').append('<li class="page-item"> <a class="page-link" href="<?= $actual_link ?>pages/master2?page=1">Previous</a> </li>')
              } else {
                $('#pagination').append('<li class="page-item disabled"> <a class="page-link" href="#" tabindex="-1">Previous</a> </li>')
              }

              for (let i_pages = 1; i_pages < totalPages+1; i_pages++) {
                if (i_pages == page) {
                  $('#pagination').append('<li class="page-item active"> <a class="page-link" href="<?= $actual_link ?>pages/master2?page='+i_pages+'">'+i_pages.toLocaleString().replace(',','.')+'</a> </li>');
                } else {
                  $('#pagination').append('<li class="page-item"> <a class="page-link" href="<?= $actual_link ?>pages/master2?page='+i_pages+'">'+i_pages.toLocaleString().replace(',','.')+'</a> </li>');
                }
              }

              if (page == 2) {
                $('#pagination').append('<li class="page-item disabled"> <a class="page-link" href="#" tabindex="-1">Next</a> </li>')
              } else {
                $('#pagination').append('<li class="page-item"> <a class="page-link" href="<?= $actual_link ?>pages/master2?page='+Number(parseInt(page)+1)+'">Next</a> </li>')
              }
                
            } else if(totalPages >= 3) {
              // loop 3 aja
              var page1 = Number(parseInt(page)-1)
              var page2 = page
              var page3 = Number(parseInt(page)+2)

              console.log('total page : '+totalPages);
              
              
                // alert(page3 )
              if (page2 >= totalPages) {
                $('#pagination').append('<li class="page-item"> <a class="page-link" href="<?= $actual_link ?>pages/master2?page='+page1+'">Previous</a> </li>')
                page3 = Number(parseInt(page)+1)
                page1 = Number(parseInt(page)-2)
              } else if(page1 < 1){
                $('#pagination').append('<li class="page-item disabled"> <a class="page-link" href="#" tabindex="-1">Previous</a> </li>')
                page1 = 1
                page3 = Number(parseInt(page)+3)
              } else {
                $('#pagination').append('<li class="page-item"> <a class="page-link" href="<?= $actual_link ?>pages/master2?page='+page1+'">Previous</a> </li>')
              }

              console.log('page1 : '+page1);
              console.log('page2 : '+page2);
              console.log('page3 : '+page3);

              for (let i_pages = page1; i_pages < page3; i_pages++) {
                if (i_pages == page) {
                  $('#pagination').append('<li class="page-item active"> <a class="page-link" href="<?= $actual_link ?>pages/master2?page='+i_pages+'">'+i_pages.toLocaleString().replace(',','.')+'</a> </li>');
                } else {
                  $('#pagination').append('<li class="page-item"> <a class="page-link" href="<?= $actual_link ?>pages/master2?page='+i_pages+'">'+i_pages.toLocaleString().replace(',','.')+'</a> </li>');
                }
              }

              if (page2 >= totalPages) {
                $('#pagination').append('<li class="page-item disabled"> <a class="page-link" href="#" tabindex="-1">Next</a> </li>')
                page3 = Number(parseInt(page)+1)
                page1 = Number(parseInt(page)-2)
              } else if(page1 < 1){
                $('#pagination').append('<li class="page-item disabled"> <a class="page-link" href="<?= $actual_link ?>pages/master2?page='+Number(parseInt(page)+1)+'">Next</a> </li>')
                page1 = 1
                page3 = Number(parseInt(page)+3)
              } else {
                $('#pagination').append('<li class="page-item"> <a class="page-link" href="<?= $actual_link ?>pages/master2?page='+Number(parseInt(page)+1)+'">Next</a> </li>')
              }

            }

            var arrKategori = []
            var arrNegara = []
            var arrProvinsi = []
            var arrBahasa = []
            var arrKabupaten = []
            var arrKecamatan = []
            var arrDesa = []
            var arrImbuhan = []
            var arrAkhiran = []
            var arrKataganti = []
            var arrSinonim = []
            
            for (let i = 0; i < response.data.length; i++) {
              for (let i2 = 0; i2 < response.data[i].kategori.length; i2++) {
                arrKategori.push(' ' + response.data[i].kategori[i2].kategori)
              }

              for (let i3 = 0; i3 < response.data[i].negara.length; i3++) {
                arrNegara.push(' ' + response.data[i].negara[i3].negara)
              }

              for (let i4 = 0; i4 < response.data[i].provinsi.length; i4++) {
                arrProvinsi.push(' ' + response.data[i].provinsi[i4].provinsi)
              }

              for (let i6 = 0; i6 < response.data[i].bahasa.length; i6++) {
                arrBahasa.push(' ' + response.data[i].bahasa[i6].bahasa)
              }

              for (let i7 = 0; i7 < response.data[i].kabupaten.length; i7++) {
                arrKabupaten.push(' ' + response.data[i].kabupaten[i7].kabupaten)
              }

              for (let i8 = 0; i8 < response.data[i].kecamatan.length; i8++) {
                arrKecamatan.push(' ' + response.data[i].kecamatan[i8].kecamatan)
              }

              for (let i9 = 0; i9 < response.data[i].desa.length; i9++) {
                arrDesa.push(' ' + response.data[i].desa[i9].desa)
              }

              for (let i10 = 0; i10 < response.data[i].prefik.length; i10++) {
                arrImbuhan.push(' ' + response.data[i].prefik[i10].prefik)
              }

              for (let i11 = 0; i11 < response.data[i].subfik.length; i11++) {
                arrAkhiran.push(' ' + response.data[i].subfik[i11].subfik)
              }

              for (let i12 = 0; i12 < response.data[i].kata_ganti.length; i12++) {
                arrKataganti.push(' ' + response.data[i].kata_ganti[i12].kata_ganti)
              }

              $('#content').append('<tr> <td>'+response.data[i].kata_asli+'</td> <td>'+response.data[i].kata_dasar[1]+'</td> <td>'+arrKategori+'</td> <td>'+response.data[i].sinonim+'</td> <td>'+arrImbuhan+'</td> <td>'+arrAkhiran+'</td> <td>'+arrKataganti+'</td> <td>'+arrBahasa+'</td> <td>'+arrNegara+'</td> <td>'+arrProvinsi+'</td> <td>'+arrKabupaten+'</td> <td>'+arrKecamatan+'</td> <td>'+arrDesa+'</td><td>'+response.data[i].code[1]+'</td><td>'+response.data[i].code[2]+'</td> <td> <button type="button" class="btn waves-effect waves-light btn-success edit" data-toggle="modal" data-target="#exampleModal" id="'+response.data[i]._id+'"><i class="ti-pencil"></i></button> <button type="button" class="btn waves-effect waves-light btn-danger hapus" id="'+response.data[i]._id+'"><i class="ti-trash"></i></button></td> </tr>')


              arrKategori = []
              arrNegara = []
              arrProvinsi = []
              arrBahasa = []
              arrKabupaten = []
              arrKecamatan = []
              arrDesa = []
              arrImbuhan = []
              arrAkhiran = []
              arrKataganti = []
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
<style>
  tfoot {
        /* width: 100%;
        padding: 3px;
        box-sizing: border-box; */
        display: table-header-group;
    }
 </style>
<script type="text/javascript">
    $(document).ready(function() {

      // Setup - add a text input to each footer cell
      $('#example tfoot th').each( function () {
          var title = $(this).text();
          $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
      } );

      var table = $('#example').DataTable( {
        columns: [
            { data: 'kata_asli' },
            { data: 'kata_dasar.1' },
            { data: 'kategori[, ].kategori' },
            { data: 'sinonim' },
            { data: 'prefik[, ].prefik' },
            { data: 'subfik[, ].subfik' },
            { data: 'kata_ganti[, ].kata_ganti' },
            { data: 'bahasa[, ].bahasa' },
            { data: 'negara[, ].negara' },
            { data: 'provinsi[, ].provinsi' },
            { data: 'kabupaten[, ].kabupaten' },
            { data: 'kecamatan[, ].kecamatan' },
            { data: 'desa[, ].desa' },
            { data: 'username' },
            { data: 'datetime' },
            {data: "_id" , render : function ( data, type, row, meta ) {
              return type === 'display'  ?
                '<button type="button" class="btn waves-effect waves-light btn-success edit" data-toggle="modal" data-target="#exampleModal" id="'+data+'"><i class="ti-pencil"></i></button> <button type="button" class="btn waves-effect waves-light btn-danger hapus" id="'+data+'"><i class="ti-trash"></i></button>' :
                data;
            }}
        ],
        initComplete: function () {
            // Apply the search
            this.api().columns().every( function () {
                var that = this;

                $( 'input', this.footer() ).on( 'keyup change clear', function () {
                    if ( that.search() !== this.value ) {
                        that
                            .search( this.value )
                            .draw();
                    }
                } );
            } );
        }
      });

      $.ajax({
          url: 'http://192.168.0.144:4000/master',
          dataType: 'json',
          success: function (json) {
            table.rows.add(json.data).draw();
          }
      });









      
  
      // // DataTable
      // var table = $('#example').DataTable({
      //   columns: [
      //       { data: '_id' },
      //       { data: 'username' },
      //       { data: 'datetime' },
      //       { data: 'username' },
      //       { data: 'datetime' }
      //   ]
      //   // initComplete: function () {
      //   //     // Apply the search
      //   //     this.api().columns().every( function () {
      //   //         var that = this;

      //   //         $( 'input', this.footer() ).on( 'keyup change clear', function () {
      //   //             if ( that.search() !== this.value ) {
      //   //                 that
      //   //                     .search( this.value )
      //   //                     .draw();
      //   //             }
      //   //         } );
      //   //     } );
      //   // }
      // });

 
    });
</script>







<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
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
            <label for="kata_asli">Kata Asli</label>
            <input type="text" class="form-control" id="kata_asli" name="kata_asli">
          </div>
          <div class="form-group">
            <label for="katadasar">Kata Dasar</label>
            <select class="form-control katadasarr" name="id_katadasar" id="id_katadasar"></select>
          </div>
          <div class="form-group">
            <label for="kata">Kategori</label>
            <select class="form-control kategori" name="id_kategori" id="id_kategori" multiple="multiple"></select>
          </div>
          <div class="form-group">
            <label for="bahasa">Bahasa</label>
            <select class="form-control bahasa" name="id_bahasa" id="id_bahasa" multiple="multiple"></select>
          </div>
          <div class="form-group">
            <label for="negara">Negara</label>
            <select class="form-control select2 negara" name="id_negara" id="id_negara" multiple="multiple"></select>
          </div>
          <div class="form-group">
            <label for="provinsi">Provinsi</label>
            <select class="form-control select2 provinsi" name="id_provinsi" id="id_provinsi" multiple="multiple"></select>
          </div>
          <div class="form-group">
          <label for="kabupaten">Kabupaten</label>
            <select class="form-control select2 kabupaten" name="id_kabupaten" id="id_kabupaten" multiple="multiple"></select>
          </div>
          <div class="form-group">
          <label for="kecamatan">Kecamatan</label>
            <select class="form-control select2 kecamatan" name="id_kecamatan" id="id_kecamatan" multiple="multiple"></select>
          </div>
          <div class="form-group">
            <label for="desa">Desa</label>
            <select class="form-control select2 desa" name="id_desa" id="id_desa" multiple="multiple"></select>
          </div>
          <div class="form-group">
            <label for="prefik">Imbuhan</label>
            <select class="form-control select2 prefik" name="id_prefik" id="id_prefik" multiple="multiple"></select>
          </div>
          <div class="form-group">
            <label for="subfik">Akhiran</label>
            <select class="form-control select2 subfik" name="id_subfik" id="id_subfik" multiple="multiple"></select>
          </div>
          <div class="form-group">
            <label for="kataganti">Kata Ganti</label>
            <select class="form-control select2 kataganti" name="id_kataganti" id="id_kataganti" multiple="multiple"></select>
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
        <div class="response.data[i]._id">
          <div class="col-7 align-self-center">
            <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Master</h3>
            <div class="d-flex align-items-center">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb m-0 p-0">
                  <li class="breadcrumb-item"><a href="#">Manajemen Master</a>
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
        <!-- Start Data Table -->
        <!-- *************************************************************** -->
        <div class="response.data[i]._id">
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
                  <!-- <table id="tabeldata" class="table table-striped table-bordered no-wrap">
                    <thead>
                      <tr>
                        <th>Kata Asli</th>
                        <th>Kata Dasar</th>
                        <th>Kategori</th>
                        <th style="width:10px;">Sinonim</th>
                        <th>Prefik</th>
                        <th>Subfik</th>
                        <th>Kata Ganti</th>
                        <th>Bahasa</th>
                        <th>Negara</th>
                        <th>Provinsi</th>
                        <th>Kabupaten</th>
                        <th>Kecamatan</th>
                        <th>Desa</th>
                        <th>User</th>
                        <th>Date</th>
                        <th>#</th>
                      </tr>
                    </thead>
                    <tbody id="content">
                    </tbody>
                  </table> -->
                  <table id="example" class="table table-striped table-bordered display" style="width:100%">
                    <thead>
                        <tr>
                            <th>Kata Asli</th>
                            <th>Kata Dasar</th>
                            <th>Kategori</th>
                            <th>Sinonim</th>
                            <th>Prefik</th>
                            <th>Sufik</th>
                            <th>Kata Ganti</th>
                            <th>Bahasa</th>
                            <th>Negara</th>
                            <th>Provinsi</th>
                            <th>Kabupaten</th>
                            <th>Kecamatan</th>
                            <th>Desa</th>
                            <th>User</th>
                            <th>Date</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Kata Asli</th>
                            <th>Kata Dasar</th>
                            <th>Kategori</th>
                            <th>Sinonim</th>
                            <th>Prefik</th>
                            <th>Sufik</th>
                            <th>Kata Ganti</th>
                            <th>Bahasa</th>
                            <th>Negara</th>
                            <th>Provinsi</th>
                            <th>Kabupaten</th>
                            <th>Kecamatan</th>
                            <th>Desa</th>
                            <th>User</th>
                            <th>Date</th>
                            <th>#</th>
                        </tr>
                    </tfoot>
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