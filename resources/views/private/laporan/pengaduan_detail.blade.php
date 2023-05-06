<style type="text/css">
    .fontds {
        font-size: 12px
    }

    .rangka_surat {
        width: 980px;
        margin: 0 auto;
        background-color: #fff;
        /*height: 500px;*/
        padding: 5px;
        color: #000000;
    }

    .ttd_bawah {
        width: 980px;
        margin: 0 auto;
        background-color: #fff;
        /*height: 500px;*/
        /* padding: 5px; */
    }


    .left {
        text-align: left;
        line-height: 15px;
    }

    .centere {
        text-align: center;
        line-height: 13px;
    }

    .borderless tr td {
        border: none !important;
        padding: 0px !important;
    }

    p {
        margin-top: -10px;
    }

    body {
        color: #000000;
    }

    .paddingBiodata {
        padding-left: 30px;
    }

    /*table {
      border-bottom: 8px solid #000; padding:2px; 
      }*/
</style>

<body>
    <div class="rangka_surat ">
        <table style="color:#000000;">
            <tr>
                <td><img src="{{public_path('images/logo/logo_report.png')}}" width="120px;" height="90px;"></td>
                <td class="centere" style="width:600px;">
                    <div style="font-size:22px; font-weight: bold;">PEMERINTAH PROVINSI SUMATERA SELATAN</div>
                    <div style="font-size:22px; font-weight: bold; padding-top:15px;">SEKRETARIAT DAERAH</div>
                    <div style="font-size:12px; font-weight: bold; padding-top:15px;">Jalan Kapten A. Rivai Telepon 352388-354122 Palembang 30129</div>

                </td>
            </tr>
            <tr>
                <td colspan="2" style="padding-top: 1px;">
                    <div style="border-bottom: 5px solid #000; padding:1px;"></div>
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center" style="font-size:22px; font-weight: bold; padding-left:120px;padding-top:15px;"><u>INFORMASI PENGADUAN</u></td>
            </tr>
            <tr>
                <td colspan="2">
                    <table style="padding-top:20px;">
                        <tr>
                            <td>Tanggal Kirim</td>
                            <td class="paddingBiodata">:</td>
                            <td> {{ cek_date_ddmmyyyy_his_v1($row->tgl_kirim) }}</td>
                        </tr>
                        <tr>
                            <td>Nama Pelapor</td>
                            <td class="paddingBiodata">:</td>
                            <td> {{ $row->nm_pelapor }}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td class="paddingBiodata">:</td>
                            <td>{{ $row->email }}</td>
                        </tr>
                        <tr>
                            <td>No Hp</td>
                            <td class="paddingBiodata">:</td>
                            <td> {{ $row->no_hp }}</td>
                        </tr>
                        <tr>
                            <td>Jenis Pengaduan</td>
                            <td class="paddingBiodata">:</td>
                            <td> {{ $row->JKategoriPengaduan->nm_kategori_pengaduan }}</td>
                        </tr>
                        <tr>
                            <td>Tanggal Kejadian</td>
                            <td class="paddingBiodata">:</td>
                            <td> {{ $row->tgl_kejadian }}</td>
                        </tr>
                        <tr>
                            <td>Lokasi Kejadian</td>
                            <td class="paddingBiodata">:</td>
                            <td> {{ $row->lokasi_kejadian }}</td>
                        </tr>
                        <tr>
                            <td>Oknum Terlibat</td>
                            <td class="paddingBiodata">:</td>
                            <td> {{ $row->oknum_yang_terlibat }}</td>
                        </tr>
                        <tr>
                            <td>Uraian Pengaduan</td>
                            <td class="paddingBiodata">:</td>
                            <td> {!! $row->uraian !!}</td>
                        </tr>
                        <tr>
                            <td>Gambar Bukti</td>
                            <td class="paddingBiodata">:</td>
                            <td></td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="2"><img class="img-thumbnail" src="{{public_path('images/pengaduan/'.$row->upload_bukti_dukung)}}" alt="gambar" style="width:100%;height:300px;"></td>
            </tr>
        </table>
    </div>
</body>