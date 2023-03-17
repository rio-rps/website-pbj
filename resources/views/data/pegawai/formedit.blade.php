<div class="modal fade" id="modalView" tabindex="-1" role="dialog" aria-labelledby="myModalLabel5" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel5"><b>{{$title_form}}</b></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('pegawai.update',$id) }}" class="formUpdate" method="POST">
                @csrf

                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-md-3 label-control" for="projectinput1">NIP</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="nip_pegawai" maxlength="18" value="{{$nip_pegawai}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 label-control" for="projectinput1">Nama</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="nm_pegawai" maxlength="50" value="{{$nm_pegawai}}">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">TUTUP</button>
                    <button type="reset" class="btn btn-secondary">
                        <i class='feather icon-x mr-25'></i>
                        <span class="d-sm-inline">RESET</span>
                    </button>
                    <button type="submit" class="btn-send btn btn-primary btn-glow" id="tombolUpdate">
                        <i class='feather icon-play mr-25'></i> <span class="d-sm-inline">SIMPAN</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('.formUpdate').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "PUT",
                url: $(this).attr('action'),
                data: $(this).serialize(),
                dataType: "json",
                beforeSend: function() {
                    $('#tombolUpdate').prop('disabled', true);
                    $('#tombolUpdate').html("<i class='fa fa-spin fa-spinner'></i>");
                },
                complete: function() {
                    $('#tombolUpdate').prop('disabled', false);
                    $('#tombolUpdate').html("Simpan");

                },
                success: function(response) {

                    if (response.success) {
                        $('#modalView').modal('hide');
                        Swal.fire('Berhasil', response.success, 'success').then((result) => {
                            //window.location.reload();
                            myTable.ajax.reload();
                        })
                    }

                },
                error: function(xhr, ajaxOptons, throwError) {
                    if (xhr.status >= 500) {
                        // alert(xhr.status + '\n' + throwError);
                        Swal.fire('Error', xhr.status + '\n' + throwError, 'error');
                    }

                    if (xhr.status == 422) {
                        var errors = xhr.responseJSON.errors;
                        var errorList = '';
                        for (var key in errors) {
                            if (errors.hasOwnProperty(key)) {
                                errorList += '\n - ' + errors[key] + '</br>';
                            }
                        }
                        Swal.fire('Gagal', errorList, 'warning');
                    }
                }
            });
            return false;
        });
    });
</script>