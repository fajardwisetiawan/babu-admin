function form_submit(param,data) {

    $.ajax({
        url: "<?= $actual_link ?>" + param,
        type: "POST",
        data: JSON.stringify(data),
        dataType: "JSON",
        contentType: "application/json; charset=utf-8",
        cache: false,
        processData: false,
        success: function (data) {
            if (data.success == '1') {
                swal({
                    title: "Success!",
                    text: "Input Berhasil!",
                    type: "success",
                    timer: 500
                });

            } else {
                console.log(data);
                swal("Gagal!", "Terjadi kesalahan!", "warning");
            }
        },
        error: function (e) {
            console.log(e);
        }
    });

}