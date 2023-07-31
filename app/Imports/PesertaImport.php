<?php

namespace App\Imports;

use App\Models\Training_plan_peserta;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Crypt;
use Maatwebsite\Excel\Concerns\WithValidation;
use Illuminate\Validation\Rule;

class PesertaImport implements ToModel, WithValidation
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    protected $id;
    public function __construct($id)
    {
        $this->id = $id;
    }
    public function model(array $row)
    {
        $training_id = Crypt::decrypt($this->id);
        return new Training_plan_peserta([
            'training_plan_id' => $training_id, 
            'nik' => $row[1], 
            'status_peserta' => $row[3], 
            'keterangan' => 'load'
        ]);
    }

    public function rules(): array
    {
        return [
             // Can also use callback validation rules
             '1' => function($attribute, $value, $onFailure) {
                $cek = Training_plan_peserta::where('training_plan_id','=',Crypt::decrypt($this->id))
                ->where('nik','=',$value)->get();
                  if ($cek) {
                       $onFailure('Data sudah ada');
                    //    dd("disi..........".$value.'  ===='.$attribute);
                  }
              }
        ];
    }
}
