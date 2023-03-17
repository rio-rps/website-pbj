<div class="modal fade text-left" id="getModal_ttdDokumen" data-backdrop="false" tabindex="-2" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info white">
                <h4 class="modal-title" id="myModalLabel1">{{ $title }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered zero-configuration" style="width:100%">
                        <thead>
                            <tr>
                                <th width=" 1%">No</th>
                                <th>NIP / Nama</th>
                                <th>Pangkat Gol </th>
                                <th>Jabatan</th>
                                <th width="10%" align="center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ttd as $rTtd)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{$rTtd->pegawai->nip_pegawai}}<br>{{$rTtd->pegawai->nm_pegawai}}</td>
                                <td>{{$rTtd->pangkat_gol}}</td>
                                <td>{{$rTtd->jabatan}}</td>
                                <td><a href="#" class="btn btn-sm btn-primary fa fa-check" onclick="pilih('{{$jenis_ttd}}','{{$rTtd->pegawai->nip_pegawai}}', '{{$rTtd->pegawai->nm_pegawai}}','{{$rTtd->pangkat_gol}}','{{$rTtd->jabatan}}')">Pilih</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<script>
    function pilih(jenis_ttd, nip, nama, pangkat_gol, jabatan) {
        $.ajax({
            beforeSend: function() {
                $('#loading-spinner').removeClass('d-none');
            },
            complete: function() {
                $('#loading-spinner').addClass('d-none');
            },
            success: function(response) {
                if (jenis_ttd == 'PPTK') {
                    document.querySelector('input[name="nip_pptk"]').value = nip;
                    document.querySelector('input[name="nm_pptk"]').value = nama;
                    document.querySelector('input[name="pangkat_gol_pptk"]').value = pangkat_gol;
                    document.querySelector('input[name="jabatan_pptk"]').value = jabatan;
                }

                if (jenis_ttd == 'PTK') {
                    document.querySelector('input[name="nip_ptk"]').value = nip;
                    document.querySelector('input[name="nm_ptk"]').value = nama;
                    document.querySelector('input[name="pangkat_gol_ptk"]').value = pangkat_gol;
                    document.querySelector('input[name="jabatan_ptk"]').value = jabatan;
                }

                if (jenis_ttd == 'PA_KPA') {
                    document.querySelector('input[name="nip_pa_kpa"]').value = nip;
                    document.querySelector('input[name="nm_pa_kpa"]').value = nama;
                    document.querySelector('input[name="pangkat_gol_pa_kpa"]').value = pangkat_gol;
                    document.querySelector('input[name="jabatan_pa_kpa"]').value = jabatan;
                }

                $('#getModal_ttdDokumen').modal('hide');
            }
        });
    }
</script>