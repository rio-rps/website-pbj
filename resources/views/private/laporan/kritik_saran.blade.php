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
                <td colspan="2" align="center" style="font-size:22px; font-weight: bold; padding-left:120px;padding-top:15px;"><u>INFORMASI KRITIK DAN SARAN</u></td>
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
                            <td>Nama</td>
                            <td class="paddingBiodata">:</td>
                            <td> {{ $row->nm_pengirim }}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td class="paddingBiodata">:</td>
                            <td>{{ $row->email_pengirim }}</td>
                        </tr>
                        <tr>
                            <td>No Hp</td>
                            <td class="paddingBiodata">:</td>
                            <td> {{ $row->no_tlp_pengirim }}</td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td class="paddingBiodata">:</td>
                            <td> {!! $row->alamat_pengirim !!}</td>
                        </tr>
                        <tr>
                            <td>Jenis Pelayanan</td>
                            <td class="paddingBiodata">:</td>
                            <td> {{ ceknNlaiPelayanan($row->nilai_pelayanan) }}</td>
                        </tr>

                        <tr>
                            <td>Uraian Kritik dan Saran</td>
                            <td class="paddingBiodata">:</td>
                            <td> {!! $row->uraian_kritik_saran !!}</td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </div>
</body>