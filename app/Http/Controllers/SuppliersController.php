<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SuppliersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $suppliers=Supplier::all();
        return view('admin.suppliers.index',compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.suppliers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nama'=>'required',
            'email'=>'required|unique:suppliers|email',
            'telp' => ['required', 'max:15'],
            'alamat'=>'required',
            'no_rek'=>'required',
            'nama_bank'=>'required'
         
        ],
        [
            'nama.required'=>'Nama harus diisi',
            'email.required'=>'Email Harus diisi',
            'email.email'=>'Email tidak valid',
            'email.unique'=>'Email sudah terdaftar'

        ]);

        Supplier::create($request->all());
        return redirect('/suppliers')->with('status','Data berhasil di tambahkan');
        // return dd($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $supplier)
    {
        //
        
        // return redirect('/suppliers');
        return redirect('/suppliers');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit(Supplier $supplier)
    {
        //
        return view('admin.suppliers.edit',compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Supplier $supplier)
    {
        //
        
        $request->validate([
            'nama'=>'required',
            'email'=>'required|email'          
        ],
        [
            'nama.required'=>'Nama harus diisi',
            'email.required'=>'Email Harus diisi',
            'email.email'=>'Email tidak valid'

        ]);
         //aksi update
      
        Supplier::where('id',$supplier->id)
            ->update([
                'nama'=>$request->nama,
                'telp'=>$request->telp,
                'email'=>$request->email,
                'alamat'=>$request->alamat,
                'nama_bank'=>$request->nama_bank,
                'no_rek'=>$request->no_rek
            ]);
            return redirect('/suppliers')->with('status','Data berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supplier $supplier)
    {
        //
          //aksi hapus
          Supplier::destroy($supplier->id);
          return redirect('/suppliers')->with('status','Data berhasil dihapus!');
    }
}
