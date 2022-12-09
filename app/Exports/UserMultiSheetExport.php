<?php
namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class UserMultiSheetExport implements WithMultipleSheets
{
    private $year;

    public function __construct(int $year)
    {
        $this->year = $year;
    }

    public function sheets(): array
    {
        $sheets = [];

        for ($month = 1; $month <= 2; $month++) {
            $sheets[] = new UsersExport($this->year, $month);
        }

        return $sheets;
    }
}