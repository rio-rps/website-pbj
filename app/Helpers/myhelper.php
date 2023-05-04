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

function cek_month_v1($month)
{
    $bulan = array(
        '0' => '00',
        '1' => 'Januari',
        '2' => 'Februari',
        '3' => 'Maret',
        '4' => 'April',
        '5' => 'Mei',
        '6' => 'Juni',
        '7' => 'Juli',
        '8' => 'Agustus',
        '9' => 'September',
        '10' => 'Oktober',
        '11' => 'November',
        '12' => 'Desember'
    );
    return $bulan[$month];
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

function cek_ddmmyy_v3($tanggal)
{
    return date('M d, Y', strtotime($tanggal));
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

function cekStatusPost($angka)
{
    if ($angka == 1) {
        $isi = "Publish";
    } elseif ($angka == 2) {
        $isi = "Draft";
    }
    return $isi;
}

function cekJenisLaman($angka)
{
    if ($angka == 1) {
        $isi = "";
    } elseif ($angka == 2) {
        $isi = "( UPLOAD FILE PDF, WORD, EXCEL )";
    } elseif ($angka == 3) {
        $isi = "( UPLOAD JPG, JPEG, PNG )";
    }
    return $isi;
}

function getYoutubeVideoID($url)
{
    $videoID = '';
    $urlParts = explode('/', $url);
    foreach ($urlParts as $part) {
        if (strpos($part, 'watch?v=') !== false) {
            $videoID = explode('watch?v=', $part)[1];
            break;
        }
        if (strpos($part, 'youtu.be') !== false) {
            $videoID = explode('youtu.be/', $part)[1];
            break;
        }
    }
    return $videoID;
}
