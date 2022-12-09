<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UsersExport;
use App\Exports\UserMultiSheetExport;
// use App\Imports\UsersImport;

class ExcelController extends Controller
{
    public function fileImportExport()
    {
       return view('file-import');
    }
   
    /**
    * @return \Illuminate\Support\Collection
    */
    public function fileImport(Request $request) 
    {
        Excel::import(new UsersImport, $request->file('file')->store('temp'));
        return back();
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function fileExport() 
    {
        // Excel::store(new UsersExport, 'tayyab.xlsx');
        return Excel::download(new UserMultiSheetExport(2020), 'tayyab.xlsx');
        logger('Excel file created');
        // return Excel::download(new UsersExport, 'users-collection.xlsx');
    }
}
