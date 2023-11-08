<?php

namespace App\Http\Controllers;

use App\Models\employee;
use App\Http\Requests\StoreemployeeRequest;
use App\Http\Requests\UpdateemployeeRequest;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use Symfony\Component\VarDumper\Dumper\DataDumperInterface;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->query('search');

        if(!empty($search)){
            $dataEmployee = Employee::where('employees.nip', 'like', '%'.$search.'%')
            ->orWhere('employees.nama', 'like','%'.$search.'%')
            ->paginate(10)->fragment('emp')->onEachSide(2);
        }else{
            $dataEmployee = Employee::paginate(30)->onEachSide(2)->fragment('emp');
        }
        return view('employees.data')->with ([
        'employees'=>$dataEmployee,
        'search' => $search
     ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreemployeeRequest $request)
    {
        $validate = $request->validated();

        $employees = new Employee;
        $employees->nip = $request->txtnip;
        $employees->nama = $request->txtname;
        $employees->alamat = $request->txtalamat;
        $employees->jenisKelamin = $request->txtgender;
        $employees->email = $request->txtemail;
        $employees->notelp = $request->txtnotelp;
        $employees->save();

        return redirect('employees')->with('msg','Data karyawan telah tersimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(employee $employees, $nip)
    {
        $data = $employees->find($nip);
        return view('employees.formedit')->with([
            'txtnip' => $nip,
            'txtname' => $data->nama,
            'txtalamat' => $data->alamat,
            'txtnotelp' => $data->notelp,
            'txtgender' => $data->jenisKelamin,
            'txtemail' => $data->email,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateemployeeRequest $request, Employee $employees, $nip)
{
    $data = $employees->find($nip);
    $data->nama = $request->txtname;
    $data->alamat = $request->txtalamat;
    $data->jenisKelamin = $request->txtgender;
    $data->email = $request->txtemail;
    $data->notelp = $request->txtnotelp;
    $data->save();

    return redirect('employees')->with('msg', 'Data karyawan ' . $data->nama . ' telah diperbarui');
}



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(employee $employees, $nip)
    {
    $data = $employees->find($nip);
    $data->delete();
    return redirect('employees')->with('msg', 'Data karyawan ' . $data->nama . ' telah dihapus');
    }
}
