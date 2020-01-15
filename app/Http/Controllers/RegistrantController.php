<?php

namespace App\Http\Controllers;

use File;
use App\Registrant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;   
use Illuminate\Support\Facades\Storage;

class RegistrantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Registrant::orderBy('id')->get();
        return view('user.index', compact('user'));
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
        // echo storage_path();exit;
        $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'tgl_lahir' => 'required',
            'gender' => 'required',
            'foto' => 'required|file|image|mimes:jpeg,png,jpg|max:2048'
        ]);
        
        //Change format date
        $tgl = $request->tgl_lahir;
        $etgl = explode("/", $tgl);
        $itgl = $etgl[1]."/".$etgl[0]."/".$etgl[2];
        $tgl_lahir = date("Y-m-d", strtotime($itgl));
        
        //Custom Name and File
        $id = date("dmYHis");
        $nama = strtolower($request->nama);
        $nama = str_replace(' ','-',$nama);
        $file = $request->file('foto');
        $nama_file = "foto-".$nama."-".$id.".".$file->getClientOriginalExtension();
        $txt = $nama.'-'.$id.'.txt';
        $valueTxt = $id.', '.$request->nama.', '.$request->email.', '.$tgl_lahir.', '.$request->phone.', '.$request->gender.', '.$nama_file;        
        echo Registrant::create([
            'id'=>$id,
            'nama'=>$request->nama,
            'email'=>$request->email,
            'tgl_lahir'=>$tgl_lahir,
            'phone'=>$request->phone,
            'gender'=>$request->gender,
            'foto'=> $nama_file,
            'txt'=> $txt
        ]);

        // Build Data Json Txt
        $array = array($txt);
        $array = json_encode($array);
        if (Storage::disk('public')->exists('data.json')) {
            $get = Storage::get('public/data.json');
            // echo $get;
            $get = json_decode($get);
            Storage::disk('public')->delete('data.json');
            $tambah = $txt; 
            array_push($get,$tambah);
            // dd($get);
            foreach($get as $a){
                echo $a."<br>";
            }
            Storage::put('public/data.json', json_encode($get));
        }else{
            Storage::put('public/data.json', $array);
            echo "Baru di isi";
        }

        // Storage foto
        Storage::putFileAs('public/registrant/foto/',$file,$nama_file);
        // Storage txt
        Storage::put('public/registrant/data txt/'.$txt, $valueTxt );

        return redirect('registrant')->with('status','Data '.$request->nama.' Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Registrant  $registrant
     * @return \Illuminate\Http\Response
     */
    public function show(Registrant $registrant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Registrant  $registrant
     * @return \Illuminate\Http\Response
     */
    public function edit(Registrant $registrant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Registrant  $registrant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Registrant $registrant)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'tgl_lahir' => 'required',
            'gender' => 'required'
        ]);

        //Change format date
        $tgl = $request->tgl_lahir;
        $etgl = explode("/", $tgl);
        $itgl = $etgl[1]."/".$etgl[0]."/".$etgl[2];
        $tgl_lahir = date("Y-m-d", strtotime($itgl));
        
        //Custom Name and File
        $id = $registrant->id;
        $nama = strtolower($request->nama);
        $nama = str_replace(' ','-',$nama);       
        
        $files = Registrant::where('id',$registrant->id)->first();  

        if (isset($request->foto)) {
            $request->validate([
                'foto' => 'required|file|image|mimes:jpeg,png,jpg|max:2048'
            ]);     
            //foto
            $file = $request->file('foto');
            $nama_file = "foto-".$nama."-".$id.".".$file->getClientOriginalExtension();
            //txt
            $txt = $nama.'-'.$id.'.txt';
            $valueTxt = $id.', '.$request->nama.', '.$request->email.', '.$tgl_lahir.', '.$request->phone.', '.$request->gender.', '.$nama_file;     

            Registrant::where('id',$registrant->id)->update([
                'nama' => $request->nama,
                'email' => $request->email,
                'tgl_lahir' => $tgl_lahir,
                'phone' => $request->phone,
                'gender' => $request->gender,
                'foto' => $nama_file,
                'txt'=>$txt
            ]);
            Storage::delete('public/registrant/foto/'.$files->foto);
            Storage::delete('public/registrant/data txt/'.$files->txt);
            Storage::putFileAs('public/registrant/foto/',$file,$nama_file);
            Storage::put('public/registrant/data txt/'.$txt, $valueTxt );
        }else{
            //txt
            $txt = $nama.'-'.$id.'.txt';
            $valueTxt = $id.', '.$request->nama.', '.$request->email.', '.$tgl_lahir.', '.$request->phone.', '.$request->gender.', '.$files->foto;  
            Registrant::where('id',$registrant->id)->update([
                'nama' => $request->nama,
                'email' => $request->email,
                'tgl_lahir' => $tgl_lahir,
                'phone' => $request->phone,
                'gender' => $request->gender,
                'txt'=>$txt
            ]);
            Storage::delete('public/registrant/data txt/'.$files->txt);
            Storage::put('public/registrant/data txt/'.$txt, $valueTxt );
        }
        return redirect('registrant')->with('status','Data '.$registrant->nama.' berhasil diubah');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Registrant  $registrant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Registrant $registrant)
    {
        
        $id = $registrant->id;

        // hapus file
        $file = Registrant::where('id',$id)->first();
        Storage::disk('public')->delete('registrant/foto/'.$file->foto);
        Storage::disk('public')->delete('registrant/data txt/'.$file->txt);

        Registrant::destroy($id);        
        return redirect('registrant')->with('status','Data '.$registrant->nama.' berhasil dihapus');
    }
    public function txt(){
        echo storage_path();
        $contents = Storage::get('public/registrant/data txt/ilham-14012020044641.txt');
        echo "<hr><br>"."Value File txt = (".$contents.")";
        $content = explode(', ', $contents);
        echo "<br><hr>";
        dd($content);
        $no = 1;
        foreach($content as $c){
            echo $no.". ".$c."<br>";
            $no++;
        }
    }    
    public function del(Request $request){

        if ($request->isMethod('post')) {
            $ids = $request->get('ids');
            if ($ids == '') {
                return redirect('registrant')->with('error', 'Pilih beberapa data yang akan di Hapus !');
            }
            $id = implode(',',$ids);
            //masukkan id ke session
            $session = $request->session()->put('id',$id);
            $data = DB::select('SELECT * from registrants where id in ('.$id.')');
            return redirect('registrant?del')->with( ['data' => $data] );
        }else{
            $idn = $request->session()->get('id');
            $ids = $request->session()->get('id');
            $ids = explode(',',$ids);
            // dd($ids);
            foreach($ids as $id){
                $data = Registrant::where('id',$id)->first();
                Storage::disk('public')->delete('registrant/foto/'.$data->foto);
                Storage::disk('public')->delete('registrant/data txt/'.$data->txt);
            }
            DB::delete('DELETE from registrants where id in ('.$idn.')');
            //hapus session data
            $request->session()->forget('data');
            return redirect('registrant')->with('status','Data berhasil di hapus');
        }

    }
}
