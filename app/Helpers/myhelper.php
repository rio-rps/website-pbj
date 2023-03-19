<?php

use Illuminate\Support\Facades\Crypt;

function cek_date_ddmmyyyy_his_v1($date)
{
    $timestamp = $date;
    $splitTimeStamp = explode(" ", $timestamp);
    $date = $splitTimeStamp[0];
    $time = $splitTimeStamp[1];

    $str = explode('-', $date);
    $bulan = array(
        '00' => '00',
        '01' => '01',
        '02' => '02',
        '03' => '03',
        '04' => '04',
        '05' => '05',
        '06' => '06',
        '07' => '07',
        '08' => '08',
        '09' => '09',
        '10' => '10',
        '11' => '11',
        '12' => '12'
    );
    return $str['2'] . "-" . $bulan[$str[1]] . "-" . $str[0] . " (" . $time . ")";
}

function cek_ddmmyy_v1($date)
{
    $str = explode('-', $date);
    $bulan = array(
        '00' => '00',
        '01' => '01',
        '02' => '02',
        '03' => '03',
        '04' => '04',
        '05' => '05',
        '06' => '06',
        '07' => '07',
        '08' => '08',
        '09' => '09',
        '10' => '10',
        '11' => '11',
        '12' => '12'
    );
    return $str['2'] . "-" . $bulan[$str[1]] . "-" . $str[0];
}

function cek_ddmmyy_v2($date)
{
    $str = explode('-', $date);
    $bulan = array(
        '00' => '00',
        '01' => 'Januari',
        '02' => 'Februari',
        '03' => 'Maret',
        '04' => 'April',
        '05' => 'Mei',
        '06' => 'Juni',
        '07' => 'Juli',
        '08' => 'Agustus',
        '09' => 'September',
        '10' => 'Oktober',
        '11' => 'November',
        '12' => 'Desember'
    );
    return $str['2'] . " " . $bulan[$str[1]] . " " . $str[0];
}

function format_rupiah($angka)
{
    $hasil =  number_format($angka, 0, ',', '.');
    return $hasil;
}

function status_actived($angka)
{
    if ($angka == 1) {
        $isi = "Aktif";
    } elseif ($angka == 2) {
        $isi = "Tidak Aktif";
    }
    return $isi;
}

function jenis_unit_bidang($angka)
{
    if ($angka == 1) {
        $isi = "Pengguna Anggaran";
    } elseif ($angka == 2) {
        $isi = "Kuasa Pengguna Anggaran";
    }
    return $isi;
}

function jenis_unit_bidang_short($angka)
{
    if ($angka == 1) {
        $isi = "PA";
    } elseif ($angka == 2) {
        $isi = "KPA";
    }
    return $isi;
}
function decryptKode($kode)
{
    $str = Crypt::decrypt($kode);

    $arr = explode("&", $str);
    $data = array();
    foreach ($arr as $item) {
        $temp = explode("=", $item);
        $data[$temp[0]] = $temp[1];
    }
    $kode_urusan_skpd = $data['kode_urusan_skpd'];
    $kode_bidang_urusan_skpd = $data['kode_bidang_urusan_skpd'];
    $kode_urusan = $data['kode_urusan'];
    $kode_bidang_urusan = $data['kode_bidang_urusan'];
    $kode_program = $data['kode_program'];
    $kode_pemda = $data['kode_pemda'];
    $kode_kegiatan = $data['kode_kegiatan'];
    $kode_sub_kegiatan = $data['kode_sub_kegiatan'];

    return ['Kosong [NULL]', $kode_urusan_skpd, $kode_bidang_urusan_skpd, $kode_urusan, $kode_bidang_urusan, $kode_program, $kode_pemda, $kode_kegiatan, $kode_sub_kegiatan];
}

function decryptRekening($kode)
{
    $str = Crypt::decrypt($kode);
    $arr = explode("&", $str); // memecah string menjadi array berdasarkan karakter "&"
    $data = array(); // inisialisasi array kosong untuk menampung data
    foreach ($arr as $item) {
        $temp = explode("=", $item); // memecah setiap item array berdasarkan karakter "="
        $data[$temp[0]] = $temp[1]; // menambahkan data ke array dengan key dan value yang sesuai
    }
    $rek_akun = $data['rek_akun'];
    $rek_kelompok = $data['rek_kelompok'];
    $rek_jenis  = $data['rek_jenis'];
    $rek_objek = $data['rek_objek'];
    $rek_rincian_objek = $data['rek_rincian_objek'];
    $rek_sub_rincian_objek = $data['rek_sub_rincian_objek'];
    $rekening = $rek_akun . "." . $rek_kelompok . "." . str_pad($rek_jenis + 2, 2, "0", STR_PAD_LEFT) . "." . str_pad($rek_objek + 2, 2, "0", STR_PAD_LEFT) . "." . str_pad($rek_rincian_objek + 2, 2, "0", STR_PAD_LEFT) . "." . str_pad($rek_sub_rincian_objek + 4, 4, "0", STR_PAD_LEFT);
    return ['Kosong [NULL]', $rek_akun, $rek_kelompok, $rek_jenis, $rek_objek, $rek_rincian_objek, $rek_sub_rincian_objek, $rekening];
}
// function generateRekening($rek_akun, $rek_kelompok, $rek_jenis, $rek_objek, $rek_rincian_objek, $rek_sub_rincian_objek)
// {
//     $rekening = $rek_akun . "." . $rek_kelompok . "." . str_pad($rek_jenis + 2, 2, "0", STR_PAD_LEFT) . "." . str_pad($rek_objek + 2, 2, "0", STR_PAD_LEFT) . "." . str_pad($rek_rincian_objek + 2, 2, "0", STR_PAD_LEFT) . "." . str_pad($rek_sub_rincian_objek + 4, 4, "0", STR_PAD_LEFT);
//     return $rekening;
// }
