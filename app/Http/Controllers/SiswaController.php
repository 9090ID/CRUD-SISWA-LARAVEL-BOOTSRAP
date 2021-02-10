<?php

namespace App\Http\Controllers;
//use App\Siswa;
use Illuminate\Http\Request;
use Str;
use App\Exports\SiswaExport;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
use App\Siswa;

class SiswaController extends Controller
{
    public function index(Request $request)
    {	
    	if($request->has('cari'))
    	{
    		$data_siswa = \App\Siswa::where('nama_depan','LIKE','%'.$request->cari.'%')->get();
    	}
    	else
    	{
    		$data_siswa = \App\Siswa::all();
    	}
    
    	return view('siswa.index',['data_siswa'=> $data_siswa]);
    }
    public function create(Request $request)
    {
        $this->validate($request,[
            'nama_depan' => 'min:5',
            'nama_belakang' => 'required',
            'email'=>'required|email|unique:users',
            'jenis_kelamin' =>'required',
            'agama' => 'required',
            'alamat' => 'required',
            'avatar' => 'mimes:jpg,png',
        ]);
        //insert user
    	$user = new \App\User;
        $user->role = 'siswa';
        $user->name = $request->nama_depan;
        $user->email = $request->email;
        $user->password = bcrypt('rahasia');
        $user->remember_token = Str::random(60);
        $user->save();

        //insert siswa
        $request->request->add(['user_id' => $user->id]);
        $siswa = \App\Siswa::create($request->all());
         if($request->hasFile('avatar')){
            $request->file('avatar')->move('images/',$request->file('avatar')->getClientOriginalName());
            $siswa->avatar = $request->file('avatar')->getClientOriginalName();
            $siswa->save();
        }
    	return redirect('/siswa')->with('sukses','Data Berhasil Diinput');

    }

     public function edit(Siswa $siswa)
    {

    	//$siswa = \App\Siswa::find($id);
    	return view('siswa/edit',['siswa' => $siswa]);

    }

      public function update(Request $request,Siswa $siswa)
    {

    	//$siswa = \App\Siswa::find($id);
    	$siswa->update($request->all());
        if($request->hasFile('avatar')){
            $request->file('avatar')->move('images/',$request->file('avatar')->getClientOriginalName());
            $siswa->avatar = $request->file('avatar')->getClientOriginalName();
            $siswa->save();
        }
    	return redirect('/siswa')->with('sukses','Data Berhasil Terupdate');
    }

    public function delete(Siswa $siswa)
    {

    	//$siswa = \App\Siswa::find($id);
    	$siswa->delete();
   		return redirect('/siswa')->with('sukses','Data Berhasil dihapus');
    }

      public function profile(Siswa $siswa)
    {

        //$siswa = \App\Siswa::find($id);
        $mapelajaran = \App\Mapel::all();
        //data untuk chart
        $catagories =[];
        $data =[];
        foreach($mapelajaran as $mp){
            if ($siswa->mapel()->wherePivot('mapel_id',$mp->id)->first()){
            $catagories[] = $mp->nama;
            $data[] = $siswa->mapel()->wherePivot('mapel_id',$mp->id)->first()->pivot->nilai;
        }
    }

        //dd($data);

        return view('siswa.profile',['siswa' => $siswa, 'mapelajaran' => $mapelajaran, 'catagories' => $catagories, 'data'=>$data]);
    }

       public function addnilai(Request $request,$idsiswa)
    {

       $siswa = Siswa::find($idsiswa);
       if($siswa->mapel()->where('mapel_id',$request->mapel)->exists()) {
          return redirect('siswa/'.$idsiswa.'/profile')->with('error','Pelajaran Sudah Ada');
       }
       $siswa->mapel()->attach($request->mapel,['nilai' =>$request->nilai]);
       //masih error jika setelah tambah nilai
       return redirect('siswa/'.$idsiswa.'/profile')->with('sukses','Nilai Suksess');
    }

     public function deletenilai(Siswa $siswa,$idmapel)
    {
         //$siswa = \App\Siswa::find($idsiswa);
         $siswa->mapel()->detach($idmapel);
         return redirect()->back()->with('sukses', 'Data Nilai Berhasil Dihapus');
    }

    ///untuk export excel
     public function exportExcel() 
    {
        return Excel::download(new SiswaExport, 'siswa.xlsx');
    }

    ///untuk export pdf
     public function exportPdf() 
    {
        //$pdf = PDF::loadHTML('<h1>DATA SISWA</h1>');
        $siswa = \App\Siswa::all();
        $pdf = PDF::loadView('export.exportpdf',['siswa' => $siswa]);
        return $pdf->download('siswa.pdf');
    }

    public function getdatasiswa()
    {
        $siswa = Siswa::select('siswa.*');
        return \DataTables::eloquent($siswa)
        ->addColumn('nama_lengkap', function($s){
            return $s->nama_depan. ' '.$s->nama_belakang;
        })
        ->addColumn('rata2_nilai', function($s){
            return $s->rataRataNilai();
        })
    //    ->addColumn('aksi',function($s){
    //        return '<a href="'.url('siswa'.'/'.$s->id.'/edit').'" class="btn btn-warning">edit</a>';
     //   })
       // ->addColumn('delete', function($s){
        //    return '<a href="#" class="btn btn-danger delete" siswa-id="'.$s->id.'">delete</a>';
            //btn btn-danger delete=>fungsi delete untuk mengambil dari json
       // })

        ->addColumn('action', function($s){
                    $actionBtn = '<a href="'.url('siswa'.'/'.$s->id.'/profile').'" class="btn btn-info btn-sm">View</a> <a href="'.url('siswa'.'/'.$s->id.'/edit').'" class="btn btn-warning btn-sm">edit</a> <a href="#" class="btn btn-danger btn-sm delete" siswa-id="'.$s->id.'">delete</a>';
                    return $actionBtn;
                })

        ->addIndexColumn()
        ->rawColumns(['nama_belakang','rata2_nilai','action','DT_Row_Index'])
        ->toJson();

    }


    //profil akses siswa
    public function profilsaya() 
    {
        $siswa=auth()->user()->siswa;
        return view('siswa.profilsaya', compact(['siswa']));    
    }

      public function importexcel(Request $request) 
    {
        Excel::import(new \App\Imports\SiswaImport, $request->file('data_siswa'));
        return redirect('/siswa')->with('sukses','Data Berhasil diimport');
    }
       
}
