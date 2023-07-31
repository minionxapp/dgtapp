<?php

namespace App\Exports;

use App\Models\Training_plan_peserta;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\Crypt;
use Maatwebsite\Excel\Concerns\WithHeadings;
class PesertaExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    protected $id;

    function __construct($id) {
            $this->id = $id;
    }

    public function collection()
    {
        return   Training_plan_peserta::join('pegawais', 'training_plan_pesertas.nik', '=', 'pegawais.nip')
            ->where('training_plan_id', '=', Crypt::decrypt($this->id))
            ->get([
                'training_plan_pesertas.training_plan_id','training_plan_pesertas.nik','pegawais.nama_pegawai as nama_pegawai','training_plan_pesertas.status_peserta','training_plan_pesertas.keterangan'
                ,
            ]);
    }

    public function headings(): array
    {
        return [
            'training_id','nik','nama pegawai','Status','keterangan'
        ];
    }
}
