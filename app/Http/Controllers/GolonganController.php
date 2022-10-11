<?php
namespace App\Http\Controllers;
/* Import Model */
use App\Models\Golongan;
use Illume\Http\Request;
class GolonganController extends Controller
{
    /**
    * index
    *
    * @return void
    */
    public function index()
    {
            //get posts
        $golongan = Golongan::get();
        $golongan = Golongan::paginate(5);
        //render view with posts
        return view('golongan.index', compact('golongan'));
    }
    public function create() 
    { 
        return view('golongan.create'); 
    } 

    public function edit($id) 
    { 
        $departemen = Departemen::find($id);
        return view('golongan.edit',compact('golongan')); 
    } 
    public function update(Request $request, $id) 
    { 
        $request->validate([
            'nama_golongan'=>  'required',
            'pegawai_id'=>  'required',
            'gaji_pokok'=>  'required',
            'tunjangan_keluarga'=>  'required',
            'tunjangan_transport'=>  'required',
            'tunjangan_makan'=>  'required',
        ]);
        $golongan = Golongan::find($id);
        $golongan->nama_golongan = $request->nama_golongan;
        $golongan->pegawai_id = $request->pegawai_id;
        $golongan->gaji_pokok = $request->gaji_pokok;
        $golongan->tunjangan_keluarga = $request->tunjangan_keluarga;
        $golongan->tunjangan_transport = $request->tunjangan_transport;
        $golongan->tunjangan_makan = $request->tunjangan_makan;
        $golongan->update();
        return redirect()->route('golongan.index')->with('success','Data Berhasil Diedit');
    } 
    /** 
     * store 
     * 
     * @param Request $request 
     * @return void 
    */ 
    public function store(Request $request) 
    {
        //Validasi Formulir 
        $this->validate($request, [ 
            'nama_golongan'=>  'required',
            'pegawai_id'=>  'required',
            'gaji_pokok'=>  'required',
            'tunjangan_keluarga'=>  'required',
            'tunjangan_transport'=>  'required',
            'tunjangan_makan'=>  'required',
        ]); 
        
        //Fungsi Simpan Data ke dalam Database 
        Golongan::create([ 
        'nama_golongan' = $request->nama_golongan,
       'pegawai_id' = $request->pegawai_id,
        'gaji_pokok' = $request->gaji_pokok,
        'tunjangan_keluarga' = $request->tunjangan_keluarga,
        'tunjangan_transport' = $request->tunjangan_transport,
        'tunjangan_makan' = $request->tunjangan_makan,
        ]); 
        
        try{ 
            //Mengisi variabel yang akan ditampilkan pada view mail 
            $content = [ 
                'body' => $request->nama_golongan, 
            ];
        
            //Mengirim email ke emailtujuan@gmail.com 
            Mail::to('beni.karunia73@gmail.com')->send(new GolonganMail($content)); 
            
            //Redirect jika berhasil mengirim email 
            return redirect()->route('golongan.index')->with(['success' => 'Data Berhasil Disimpan, email telah terkirim!']); 
        }catch(Exception $e){ 
            //Redirect jika gagal mengirim email 
            return redirect()->route('golongan.index')->with(['success' => 'Data Berhasil Disimpan, namun gagal mengirim email!']); 
        } 
    }
    public function delete()
    {

    }
    public function destroy($id) {
        $golongan = Golongan::find($id);
        $golongan->delete();
        if ($golongan) {
            return redirect()
                ->route('golongan.index')
                ->with(['success' => 'Golongan Berhasil Dihapus']);
        } 
    }
}
