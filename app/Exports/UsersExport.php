<?php

namespace App\Exports;
use Excel;
use App\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithStyles;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Style;
use PhpOffice\PhpSpreadsheet\Style\Color;
class UsersExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */


    public function view(): View
    {
        return view('exports');
    }
    
    // private $year;
    // private $month;

    // public function __construct(int $year, int $month)
    // {
    //     $this->year = $year;
    //     $this->month = $month;
    // }

    // public function collection()
    // {
    //     return User::all();
    // }

    // public function title(): string
    // {
    //     return rand(10,100);
    // }

    // public function headings(): array
    // {
    //     return ["id", "name", "email", "Created_at", "Updated_at"];
    // }

    // public function styles(Worksheet $sheet)
    // {
    //     return [
    //         // Style the first row as bold text.
    //         1    => [ 
    //         'fill' => array(
    //             'fillType'   => Fill::FILL_SOLID,
    //             'startColor' => ['argb' => Color::COLOR_RED],
    //             'color' => array('rgb' => '34AEEB')
    //         ),
              
    //         'font' => [
    //             'name'      =>  'Calibri',
    //             // 'size'      =>  15,
    //             // 'bold'      =>  true,
    //             'color' => array('rgb' => 'FFFFFF'),
    //         ], ],
                
            

    //         // Styling a specific cell by coordinate.
    //         'B2' => ['font' => ['italic' => true], 'color' => array('rgb' => 'FF0000')],

    //         // Styling an entire column.
    //         'C'  => ['font' => ['size' => 16], 'color' => array('rgb' => 'FF0000')],
    //     ];
                                                                                                    
        
    // }
}
