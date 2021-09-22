<?php

namespace App\Imports;

use App\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class ExcelImport implements ToCollection
{
    public function collection(Collection $rows)
    {
        $result = array();
        unset($rows[0]);
        foreach ($rows as $row) {
            $result[] = array(
                'id'   => $row[0],
                'name' => $row[1],
                'date' => $row[2],
            );
        }
        DB::table('rows')->insert($result);
    }
}
