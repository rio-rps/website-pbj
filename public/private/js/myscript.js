document.addEventListener('DOMContentLoaded', function() {
 
    // FORM GET MODAL INPUT DATA TYPE GET
    $(document).on('click', '#tombol-form-modal', function(e) {
        e.preventDefault();
        var url = $(this).data('url');
        $.ajax({
            type: 'GET',
            url: url,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            beforeSend: function() {
                $('#loading-spinner').removeClass('d-none');
            },
            complete: function() {
                $('#loading-spinner').addClass('d-none');
            },
            success: function(response) {
                $('.viewModal').html(response).show();
                $('#modalFormData').modal('show');
            },
            error: function(xhr, ajaxOptons, throwError) {
                alert(xhr.status + '\n' + throwError);
            }
        });
    });


     // HAPUS DATA 
    $(document).on('click', '#tombol-hapus', function(e) {
        e.preventDefault();
        var url = $(this).data('url'); 
        Swal.fire({
            title: 'Apakah Anda Yakin ',
            text: "Data Akan dihapus ! ",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus!'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: "DELETE",
                    url: url, 
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    dataType: "json",
                    beforeSend: function() {
                        $('#loading-spinner').removeClass('d-none');
                    },
                    complete: function() {
                        $('#loading-spinner').addClass('d-none');
                    },
                    success: function(response) {
                        if (response.success) {
                            Swal.fire('Berhasil', response.success, 'success').then((result) => {
                                if(response.myReload =='slideShowData'){
                                    slideShowData();
                                } else {
                                    myTable.ajax.reload();
                                }
                            })
                        } else if (response.error) {
                            Swal.fire('Gagal', response.error, 'warning');
                        }
                    },
                    error: function(xhr, ajaxOptons, throwError) {
                        alert(xhr.status + '\n' + throwError);
                    }
                });

            }
        })


    });

    
    
});
  
