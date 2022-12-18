<?php

namespace App\Imports;
use App\Record;
use Illuminate\Support\Collection;

// use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class ImportUser implements ToModel, WithHeadingRow
{
    /**
    * @param Collection $collection
    */

    public function model(array $row, $x=0)
    {
        $num ='+1'.$row['numbers'];
        
        return new Record([
            'number' => $num
        ]);
    }
}
