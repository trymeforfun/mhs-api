<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mahasiswa;
use Illuminate\Support\Facades\Validator;   

class MahasiswaController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }
    
    public function index()
    {
        $dataMhs = Mahasiswa::get();
        return response()->json($dataMhs);
        
    }

    public function show($id)
    {
        $dataMhs = Mahasiswa::where('id', $id)->first();
        return response()->json($dataMhs);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|min:3',
            'nim' => 'required',
            'email' => 'required', 'unique'
        ]);

        $dataMhs = new Mahasiswa();
        $dataMhs->nama = $request->input('nama');
        $dataMhs->nim = $request->input('nim');
        $dataMhs->email = $request->input('email');
        $dataMhs->save();

        return response()->json($dataMhs);
    }

    public function update(Request $request, $id)
    {
        
        $request->validate([
            'nama' => 'required|min:3',
            'nim' => 'required',
            'email' => 'required', 'unique'
        ]);
        $data = Mahasiswa::where('id',$id)->first();
        $data->nama = $request->input('nama');
        $data->nim = $request->input('nim');
        $data->email = $request->input('email');
        $data->save();
        
        return response()->json($data);
    
    }
        
    public function destroy(Mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();
    
        return 'data has been deleted';
        
    }
    //
}
