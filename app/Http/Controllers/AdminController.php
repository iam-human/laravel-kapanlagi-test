<?php

namespace App\Http\Controllers;

use App\Admin;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admin = Admin::orderBy('nia')->get();
        return view('admin.index', compact('admin'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nia' => 'required',
            'nama' => 'required'
        ]);
        if (Hash::needsRehash($request->password)) {
            $password = Hash::make($request->password);
        }
        Admin::create([
            'id'=>rand(1000,9000).rand(10,99).date("y"),
            'nia'=>$request->nia,
            'nama'=>$request->nama,
            'password'=>$password
        ]);
        return redirect('admin')->with('status','Data '.$request->nama.' Berhasil Ditambahkan');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        $request->validate([
            'nia' => 'required',
            'nama' => 'required'
        ]);
        Admin::where('id',$admin->id)->update([
            'nia' => $request->nia,
            'nama' => $request->nama
        ]);
        return redirect('admin')->with('status','Data '.$request->nama.' berhasil di Ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        $nama = $admin->nama;
        $id = $admin->id;
        Admin::destroy($id);
        return redirect('admin')->with('status','Data '.$nama.' berhasil dihapus');
    }
    public function del(Request $request){

        if ($request->isMethod('post')) {
            $ids = $request->get('ids');
            if ($ids == '') {
                return redirect('admin')->with('error', 'Pilih beberapa data yang akan di Hapus !');
            }
            $id = implode(',',$ids);
            //masukkan id ke session
            $session = $request->session()->put('id',$id);
            $data = DB::select('SELECT * from admins where id in ('.$id.')');
            return redirect('admin?del')->with( ['data' => $data] );
        }else{
            $ids = $request->session()->get('id');
            DB::delete('DELETE from admins where id in ('.$ids.')');
            //hapus session data
            $request->session()->forget('data');
            return redirect('admin')->with('status','Data berhasil di hapus');
        }

    }
}
