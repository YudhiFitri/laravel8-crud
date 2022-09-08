<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
// use Barryvdh\DomPDF\Facade as PDF;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
// use PDF;
use Maatwebsite\Excel\Facades\Excel;

use App\Exports\EmployeeExportExcel;
use App\Imports\EmployeeImportExcel;

class EmployeeController extends Controller
{
    public function index(Request $req){
        // $data = Employee::all();
        // $data = Employee::paginate(5);
        if($req->has('search')){
            $data = Employee::where('nama', 'LIKE', '%' . $req->search .'%')->paginate(5);
        }else{
            $data = Employee::paginate(10);
        }
        // dd($data);
        return view('datapegawai', compact('data'));
    }

    public function tambahpegawai(){
        return view('tambahdata');
    }

    public function insertdata(Request $request){
        // dd($request->all());
        $data = Employee::create($request->all());
        if($request->hasFile('foto')){
            $request->file('foto')->move('fotopegawai/', $request->file('foto')->getClientOriginalName());
            $data->foto = $request->file('foto')->getClientOriginalName();
            $data->save();
        }
        return redirect()->route('pegawai')->with('success', 'Data berhasil ditambahkan.');
    }

    public function tampilkandata($id){
        $data = Employee::find($id);

        // dd($data);
        return view('tampildata', compact('data'));
    }

    public function updatedata(Request $request,$id){
        $data = Employee::find($id);
        $data->update($request->all());

        return redirect()->route('pegawai')->with('success', 'Data berhasil di update.');
    }

    public function delete($id){
        $data = Employee::find($id);
        $data->delete();

        return redirect()->route('pegawai')->with('success', 'Data berhasil di hapus.');
    }

    public function exportpdf(){
        $data = Employee::all();

        view()->share('data', $data);

        $pdf = PDF::loadview('datapegawai-pdf');
        return $pdf->download('datapegawai.pdf');

        // return 'berhasil';
    }

    public function exportexcel(){
        return Excel::download(new EmployeeExportExcel, 'datapegawai.xlsx');
    }

    public function importexcel(Request $req){
        $data = $req->file('file');
        $fileName = $data->getClientOriginalName();
        $data->move('EmployeeData',$fileName);

        Excel::import(new EmployeeImportExcel, \public_path('/EmployeeData/' . $fileName));

        return redirect()->back();
    }
}
