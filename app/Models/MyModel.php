<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MyModel extends Model
{
    use HasFactory;

    public function InsertData($tableName, $data)
    {
        $result = DB::table($tableName)->insert($data);
        return $result;
    }

    public function UpdateData($tableName, $data)
    {
        $result = DB::table($tableName)->update($data);
        return $result;
    }

    public function MyPenomoranDok($id_unit_bidang)
    {
        $data = DB::table('cpar_set_penomoran_dokumen')
            ->where('id_unit_bidang', $id_unit_bidang);
        return $data;
    }

    public function MyJenisPotongan($stts)
    {
        $data = DB::table('dpar_pot_1jenis_potongan')
            ->where('status_actived', $stts);
        return $data;
    }

    public function MyUrusan($kode_urusan)
    {
        $data = DB::table('cpar_ref_1urusan')
            ->where('kode_urusan', $kode_urusan)
            ->first();
        return $data;
    }

    public function MyBidangUrusan($kode_urusan, $kode_bidang_urusan)
    {
        $data = DB::table('cpar_ref_2bidang_urusan')
            ->where('kode_urusan', $kode_urusan)
            ->where('kode_bidang_urusan', $kode_bidang_urusan)
            ->first();
        return $data;
    }

    public function MyProgram($kode_urusan, $kode_bidang_urusan, $kode_program)
    {
        $data = DB::table('cpar_ref_3program')
            ->selectRaw('*, CONCAT(kode_urusan,".", lpad(kode_bidang_urusan,2,0), ".", lpad(kode_program,2,0)) AS program')
            ->where('kode_urusan', $kode_urusan)
            ->where('kode_bidang_urusan', $kode_bidang_urusan)
            ->where('kode_program', $kode_program)
            ->first();
        return $data;
    }

    public function MyKegiatan($kode_urusan, $kode_bidang_urusan, $kode_program, $kode_pemda, $kode_kegiatan)
    {
        $data = DB::table('cpar_ref_4kegiatan')
            ->selectRaw('*, CONCAT(kode_urusan,".", lpad(kode_bidang_urusan,2,0), ".", lpad(kode_program,2,0), ".", kode_pemda, ".", lpad(kode_kegiatan,2,0) ) AS kegiatan')
            ->where('kode_urusan', $kode_urusan)
            ->where('kode_bidang_urusan', $kode_bidang_urusan)
            ->where('kode_program', $kode_program)
            ->where('kode_pemda', $kode_pemda)
            ->where('kode_kegiatan', $kode_kegiatan)
            ->first();
        return $data;
    }

    public function MySubKegiatan($kode_urusan, $kode_bidang_urusan, $kode_program, $kode_pemda, $kode_kegiatan, $kode_sub_kegiatan)
    {
        $data = DB::table('cpar_ref_5sub_kegiatan')
            ->selectRaw('*, CONCAT(kode_urusan,".", lpad(kode_bidang_urusan,2,0), ".", lpad(kode_program,2,0), ".", kode_pemda, ".", lpad(kode_kegiatan,2,0), ".", lpad(kode_sub_kegiatan,2,0) ) AS subkegiatan')
            ->where('kode_urusan', $kode_urusan)
            ->where('kode_bidang_urusan', $kode_bidang_urusan)
            ->where('kode_program', $kode_program)
            ->where('kode_pemda', $kode_pemda)
            ->where('kode_kegiatan', $kode_kegiatan)
            ->where('kode_sub_kegiatan', $kode_sub_kegiatan)
            ->first();
        return $data;
    }

    public function MySubKegAnggaran($kode_urusan_skpd, $kode_bidang_urusan_skpd, $kode_urusan, $kode_bidang_urusan, $kode_program, $kode_pemda, $kode_kegiatan, $kode_sub_kegiatan)
    {
        $data = DB::table('tr_dpa_2rincian_belanja')
            ->where('kode_urusan_skpd', $kode_urusan_skpd)
            ->where('kode_bidang_urusan_skpd', $kode_bidang_urusan_skpd)
            ->where('kode_urusan', $kode_urusan)
            ->where('kode_bidang_urusan', $kode_bidang_urusan)
            ->where('kode_program', $kode_program)
            ->where('kode_pemda', $kode_pemda)
            ->where('kode_kegiatan', $kode_kegiatan)
            ->where('kode_sub_kegiatan', $kode_sub_kegiatan)
            ->sum('total_pagu_belanja');
        return $data;
    }

    public function MyRekeningBelanja($rek_akun, $rek_kelompok, $rek_jenis, $rek_objek, $rek_rincian_objek, $rek_sub_rincian_objek)
    {
        $data = DB::table('cpar_rek_6sub_rincian_objek')
            ->selectRaw('*, CONCAT(rek_akun, ".", rek_kelompok, ".", lpad(rek_jenis,2,0), ".", lpad(rek_objek,2,0), ".", lpad(rek_rincian_objek,2,0), ".", lpad(rek_sub_rincian_objek,4,0)) AS rekening, 
            nm_rek_sub_rincian_objek')
            ->where('rek_akun', $rek_akun)
            ->where('rek_kelompok', $rek_kelompok)
            ->where('rek_jenis', $rek_jenis)
            ->where('rek_objek', $rek_objek)
            ->where('rek_rincian_objek', $rek_rincian_objek)
            ->where('rek_sub_rincian_objek', $rek_sub_rincian_objek)
            ->first();
        return $data;
    }

    public function MyDPARincianBelanja($kode_urusan_skpd, $kode_bidang_urusan_skpd, $kode_urusan, $kode_bidang_urusan, $kode_program, $kode_pemda, $kode_kegiatan, $kode_sub_kegiatan)
    {
        $data = DB::table('tr_dpa_2rincian_belanja')
            //->selectRaw('*, CONCAT(kode_urusan_skpd, "-", kode_bidang_urusan_skpd) AS kode_urusan_bidang')
            ->selectRaw('*, CONCAT(cpar_rek_6sub_rincian_objek.rek_akun, ".", cpar_rek_6sub_rincian_objek.rek_kelompok, ".", lpad(cpar_rek_6sub_rincian_objek.rek_jenis,2,0), ".", lpad(cpar_rek_6sub_rincian_objek.rek_objek,2,0), ".", lpad(cpar_rek_6sub_rincian_objek.rek_rincian_objek,2,0), ".", lpad(cpar_rek_6sub_rincian_objek.rek_sub_rincian_objek,4,0)) AS rekening, 
            cpar_rek_6sub_rincian_objek.nm_rek_sub_rincian_objek')
            ->join(
                'cpar_rek_6sub_rincian_objek',
                function ($join) {
                    $join->on('tr_dpa_2rincian_belanja.rek_akun', '=', 'cpar_rek_6sub_rincian_objek.rek_akun')
                        ->on('tr_dpa_2rincian_belanja.rek_kelompok', '=', 'cpar_rek_6sub_rincian_objek.rek_kelompok')
                        ->on('tr_dpa_2rincian_belanja.rek_jenis', '=', 'cpar_rek_6sub_rincian_objek.rek_jenis')
                        ->on('tr_dpa_2rincian_belanja.rek_objek', '=', 'cpar_rek_6sub_rincian_objek.rek_objek')
                        ->on('tr_dpa_2rincian_belanja.rek_rincian_objek', '=', 'cpar_rek_6sub_rincian_objek.rek_rincian_objek')
                        ->on('tr_dpa_2rincian_belanja.rek_sub_rincian_objek', '=', 'cpar_rek_6sub_rincian_objek.rek_sub_rincian_objek');
                }
            )
            ->where('kode_urusan_skpd', $kode_urusan_skpd)
            ->where('kode_bidang_urusan_skpd', $kode_bidang_urusan_skpd)
            ->where('kode_urusan', $kode_urusan)
            ->where('kode_bidang_urusan', $kode_bidang_urusan)
            ->where('kode_program', $kode_program)
            ->where('kode_pemda', $kode_pemda)
            ->where('kode_kegiatan', $kode_kegiatan)
            ->where('kode_sub_kegiatan', $kode_sub_kegiatan)
            ->get();
        return $data;
    }




    public function MyBidangPelimpahanSubRek($kode_urusan, $kode_bidang_urusan, $kode_program, $kode_pemda, $kode_kegiatan, $kode_sub_kegiatan, $rek_akun, $rek_kelompok, $rek_jenis, $rek_objek, $rek_rincian_objek, $rek_sub_rincian_objek)
    {
        $data = DB::table('tr_dpa_3rincian_belanja_unit_bidang')
            ->join(
                'cpar_skpd_3unit_bidang',
                function ($join) {
                    $join->on('tr_dpa_3rincian_belanja_unit_bidang.id_unit_bidang', '=', 'cpar_skpd_3unit_bidang.id_unit_bidang');
                }
            )
            ->where('kode_urusan', $kode_urusan)
            ->where('kode_bidang_urusan', $kode_bidang_urusan)
            ->where('kode_program', $kode_program)
            ->where('kode_pemda', $kode_pemda)
            ->where('kode_kegiatan', $kode_kegiatan)
            ->where('kode_sub_kegiatan', $kode_sub_kegiatan)
            ->where('kode_urusan', $kode_urusan)
            ->where('kode_bidang_urusan', $kode_bidang_urusan)
            ->where('kode_program', $kode_program)
            ->where('kode_pemda', $kode_pemda)
            ->where('kode_kegiatan', $kode_kegiatan)
            ->where('kode_sub_kegiatan', $kode_sub_kegiatan)
            ->where('rek_akun', $rek_akun)
            ->where('rek_kelompok', $rek_kelompok)
            ->where('rek_jenis', $rek_jenis)
            ->where('rek_objek', $rek_objek)
            ->where('rek_rincian_objek', $rek_rincian_objek)
            ->where('rek_sub_rincian_objek', $rek_sub_rincian_objek)
            ->get();
        return $data;
    }

    public function MyAnggaranPerRekeningBelanja($kode_urusan, $kode_bidang_urusan, $kode_program, $kode_pemda, $kode_kegiatan, $kode_sub_kegiatan, $rek_akun, $rek_kelompok, $rek_jenis, $rek_objek, $rek_rincian_objek, $rek_sub_rincian_objek)
    {
        $data = DB::table('tr_dpa_2rincian_belanja')
            ->where('kode_urusan', $kode_urusan)
            ->where('kode_bidang_urusan', $kode_bidang_urusan)
            ->where('kode_program', $kode_program)
            ->where('kode_pemda', $kode_pemda)
            ->where('kode_kegiatan', $kode_kegiatan)
            ->where('kode_sub_kegiatan', $kode_sub_kegiatan)
            ->where('kode_urusan', $kode_urusan)
            ->where('kode_bidang_urusan', $kode_bidang_urusan)
            ->where('kode_program', $kode_program)
            ->where('kode_pemda', $kode_pemda)
            ->where('kode_kegiatan', $kode_kegiatan)
            ->where('kode_sub_kegiatan', $kode_sub_kegiatan)
            ->where('rek_akun', $rek_akun)
            ->where('rek_kelompok', $rek_kelompok)
            ->where('rek_jenis', $rek_jenis)
            ->where('rek_objek', $rek_objek)
            ->where('rek_rincian_objek', $rek_rincian_objek)
            ->where('rek_sub_rincian_objek', $rek_sub_rincian_objek);
        return $data;
    }

    public function MyRincianBenjaKodeDPA_TR3($id_dpa_progkegsubkeg)
    {
        $data = DB::table('tr_dpa_1progkegsubkeg')
            ->where('id_dpa_progkegsubkeg', $id_dpa_progkegsubkeg);
        return $data;
    }

    public function MyBidangPelimpahanSubRek_byUnitBidang($kode_urusan, $kode_bidang_urusan, $kode_program, $kode_pemda, $kode_kegiatan, $kode_sub_kegiatan, $rek_akun, $rek_kelompok, $rek_jenis, $rek_objek, $rek_rincian_objek, $rek_sub_rincian_objek, $id_unit_bidang)
    {
        $data = DB::table('tr_dpa_3rincian_belanja_unit_bidang')
            ->where('kode_urusan', $kode_urusan)
            ->where('kode_bidang_urusan', $kode_bidang_urusan)
            ->where('kode_program', $kode_program)
            ->where('kode_pemda', $kode_pemda)
            ->where('kode_kegiatan', $kode_kegiatan)
            ->where('kode_sub_kegiatan', $kode_sub_kegiatan)
            ->where('rek_akun', $rek_akun)
            ->where('rek_kelompok', $rek_kelompok)
            ->where('rek_jenis', $rek_jenis)
            ->where('rek_objek', $rek_objek)
            ->where('rek_rincian_objek', $rek_rincian_objek)
            ->where('rek_sub_rincian_objek', $rek_sub_rincian_objek)
            ->where('id_unit_bidang', $id_unit_bidang);
        return $data;
    }

    public function MyRekeningBelanja_TR_3_byUnitBidang($kode_urusan_skpd, $kode_bidang_urusan_skpd, $kode_urusan, $kode_bidang_urusan, $kode_program, $kode_pemda, $kode_kegiatan, $kode_sub_kegiatan, $id_unit_bidang)
    {
        $data = DB::table('tr_dpa_3rincian_belanja_unit_bidang')
            ->selectRaw('*, CONCAT(cpar_rek_6sub_rincian_objek.rek_akun, ".", cpar_rek_6sub_rincian_objek.rek_kelompok, ".", lpad(cpar_rek_6sub_rincian_objek.rek_jenis,2,0), ".", lpad(cpar_rek_6sub_rincian_objek.rek_objek,2,0), ".", lpad(cpar_rek_6sub_rincian_objek.rek_rincian_objek,2,0), ".", lpad(cpar_rek_6sub_rincian_objek.rek_sub_rincian_objek,4,0)) AS rekening,
            CONCAT(cpar_rek_6sub_rincian_objek.rek_akun, ".", cpar_rek_6sub_rincian_objek.rek_kelompok, ".",cpar_rek_6sub_rincian_objek.rek_jenis, ".",cpar_rek_6sub_rincian_objek.rek_objek,".",cpar_rek_6sub_rincian_objek.rek_rincian_objek, ".",cpar_rek_6sub_rincian_objek.rek_sub_rincian_objek) AS rekening_murni, 
        cpar_rek_6sub_rincian_objek.nm_rek_sub_rincian_objek')
            ->join(
                'cpar_rek_6sub_rincian_objek',
                function ($join) {
                    $join->on('tr_dpa_3rincian_belanja_unit_bidang.rek_akun', '=', 'cpar_rek_6sub_rincian_objek.rek_akun')
                        ->on('tr_dpa_3rincian_belanja_unit_bidang.rek_kelompok', '=', 'cpar_rek_6sub_rincian_objek.rek_kelompok')
                        ->on('tr_dpa_3rincian_belanja_unit_bidang.rek_jenis', '=', 'cpar_rek_6sub_rincian_objek.rek_jenis')
                        ->on('tr_dpa_3rincian_belanja_unit_bidang.rek_objek', '=', 'cpar_rek_6sub_rincian_objek.rek_objek')
                        ->on('tr_dpa_3rincian_belanja_unit_bidang.rek_rincian_objek', '=', 'cpar_rek_6sub_rincian_objek.rek_rincian_objek')
                        ->on('tr_dpa_3rincian_belanja_unit_bidang.rek_sub_rincian_objek', '=', 'cpar_rek_6sub_rincian_objek.rek_sub_rincian_objek');
                }
            )
            ->where('kode_urusan_skpd', $kode_urusan_skpd)
            ->where('kode_bidang_urusan_skpd', $kode_bidang_urusan_skpd)
            ->where('kode_urusan', $kode_urusan)
            ->where('kode_bidang_urusan', $kode_bidang_urusan)
            ->where('kode_program', $kode_program)
            ->where('kode_pemda', $kode_pemda)
            ->where('kode_kegiatan', $kode_kegiatan)
            ->where('kode_sub_kegiatan', $kode_sub_kegiatan)
            ->where('id_unit_bidang', $id_unit_bidang);
        return $data;
    }


    public function MyTransaksi_1npd_total_sekarang($kode_urusan, $kode_bidang_urusan, $kode_program, $kode_pemda, $kode_kegiatan, $kode_sub_kegiatan, $rek_akun, $rek_kelompok, $rek_jenis, $rek_objek, $rek_rincian_objek, $rek_sub_rincian_objek, $id_unit_bidang)
    {
        $data = DB::table('tr_ecair_1npd')
            ->where('kode_urusan', $kode_urusan)
            ->where('kode_bidang_urusan', $kode_bidang_urusan)
            ->where('kode_program', $kode_program)
            ->where('kode_pemda', $kode_pemda)
            ->where('kode_kegiatan', $kode_kegiatan)
            ->where('kode_sub_kegiatan', $kode_sub_kegiatan)
            ->where('rek_akun', $rek_akun)
            ->where('rek_kelompok', $rek_kelompok)
            ->where('rek_jenis', $rek_jenis)
            ->where('rek_objek', $rek_objek)
            ->where('rek_rincian_objek', $rek_rincian_objek)
            ->where('rek_sub_rincian_objek', $rek_sub_rincian_objek)
            ->where('id_unit_bidang', $id_unit_bidang)
            ->sum('nilai_saat_ini');
        return $data;
        // $total = 0;
        // foreach ($data as $row) {
        //     $total += $row->nilai_saat_ini;
        // }
        // return $total;
    }
}
