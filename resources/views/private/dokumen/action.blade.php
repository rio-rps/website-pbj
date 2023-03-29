<center>
    <div class="btn-icon-list btn-list">
        <a href="#" class="btn btn-primary btn-sm copy-link" data-link="{{ asset('upload-data/dokumen/' . $model->file_dokumen) }}" title="Copy Link"><i class="fa fa-copy"></i></a>
        <a target="blank" class="btn btn-sm btn-primary" href="{{(asset('upload-data/dokumen/' . $model->file_dokumen))}}" title="Download File"><i class="fa fa-download"></i></a>
        <button type="button" class="btn btn-sm btn-success" id="tombol-form-modal" data-url="{{route('dokumen.edit',$model->id_dokumen)}}" title="Edit Data"><i class="fa fa-edit"></i></button>
        <button type="button" class="btn btn-sm btn-danger" id="tombol-hapus" data-url="{{ route('dokumen.destroy',$model->id_dokumen)}}" title="Hapus Data"><i class="fa fa-trash"></i></button>
    </div>
</center>

<script>
    $(document).ready(function() {
        // Ketika tombol copy link diklik
        $('.copy-link').click(function(event) {
            // Mencegah default behavior dari tombol
            event.preventDefault();

            // Menangkap link dari atribut data-link pada tombol
            var link = $(this).data('link');

            // Membuat elemen input untuk menyimpan link yang akan di-copy
            var tempInput = $('<input>');
            $('body').append(tempInput);
            tempInput.val(link).select();

            // Menjalankan fungsi copy pada elemen input
            document.execCommand('copy');
            tempInput.remove();

            // Menampilkan notifikasi SweetAlert
            Swal.fire({
                icon: 'success',
                title: 'Berhasil !',
                text: 'Data berhasil disalin ke clipboard',
                timer: 2000 // Durasi notifikasi (ms)
            });
        });
    });
</script>