<?php

namespace App\Http\Controllers;

use App\Imports\ExcelImport;
use Illuminate\Http\Request;
use \Maatwebsite\Excel\Facades\Excel as Excel;

class ExcelController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('excel');
    }

    public function excelUpload(Request $request)
    {
        $updateFile = $request->file('ex_file');
        $filePath = $updateFile->getRealPath();
        $res = Excel::import(new ExcelImport, $filePath);
        dd($res);
    }
}
