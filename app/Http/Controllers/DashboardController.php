<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\User;
use App\Models\inventaris;
use App\Models\tambahInventaris;
use PhpParser\Node\Expr\Cast\Void_;
use PhpParser\Node\Expr\List_;
class DashboardController extends Controller
{
    //
    public function showDashboard()
    {
        return view('pages.dashboard');
    }
    public function showKategori()
    {
        try {
            $data = Category::all();
            return view('pages.monitoringKategori')->with('categories', $data);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    public function showAddKategori()
    {
        return view('pages.addKategori');
    }
    public function addCategory(Request $req)
    {
        try {
            $data = $req->validate([
                'name' => 'required|string|max:255',
            ]);
            $userId = $req->session()->get('user');           // ambil id
            $user = $userId ? User::find($userId) : null;
            Category::create([
                'name' => $data['name'],
                'created_by' => $user ? $user->name : 'unknown',
            ]);
            return redirect()->route('dashboard.kategori')->with('success', 'kategori berhasil ditambahkan.');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    public function addInventaris(Request $req)
    {
        try {
            $data = $req->validate([
                'test' => 'required|array|min:1',
                'test.*.nama_barang' => 'required|string|max:255',
                'test.*.jumlah_barang' => 'required|integer|min:1',
                'test.*.kategori_id' => 'required|integer',
            ]);
            $userId = $req->session()->get('user');           // ambil id
            $user = $userId ? User::find($userId) : null;
            foreach ($data['test'] as $key => $value) {
                $items = [
                    'nama_barang' => $value['nama_barang'],
                    'jumlah_barang' => $value['jumlah_barang'],
                    'kategori_id' => $value['kategori_id']
                ];
                $getDataInventaris = inventaris::where('nama_barang', $items['nama_barang'])->first();
                if ($getDataInventaris) {
                    $this->GenerateJumlahInventaris($getDataInventaris->id, $data['jumlah_barang'], 'tambah');
                    tambahInventaris::create([
                        'inverntaris_id' => $getDataInventaris->id,
                        'jumlah_barang' => $items['jumlah_barang'],
                        'created_by' => $getDataInventaris->created_by,
                    ]);
                    return redirect()->route('dashboard.inventaris.list')->with('success', 'inventaris berhasil ditambahkan.');
                } else {

                    inventaris::create([
                        'nama_barang' => $data['nama_barang'],
                        'jumlah_barang' => $data['jumlah_barang'],
                        'created_by' => $user ? $user->name : 'unknown',
                        'kategori_id' => $data['kategori_id'],
                    ]);

                    $getDataInventaris = inventaris::where('nama_barang', $data['nama_barang'])->first();
                    tambahInventaris::create([
                        'inverntaris_id' => $getDataInventaris->id,
                        'jumlah_barang' => $data['jumlah_barang'],
                        'created_by' => $user ? $user->name : 'unknown',
                    ]);
                    return redirect()->route('dashboard.inventaris.list')->with('success', 'inventaris berhasil ditambahkan.');
                }
            }


        } catch (\Exception $e) {
            // return redirect()->back()->with('error', $e->getMessage());
        }
    }
    public function GenerateJumlahInventaris($inventaris_id, $jumlah_barang, $operator)
    {
        try {
            $getDataInventaris = inventaris::find($inventaris_id);
            if ($getDataInventaris) {
                if ($operator == 'tambah') {
                    $getDataInventaris->jumlah_barang += $jumlah_barang;
                } else if ($operator == 'kurang') {
                    $getDataInventaris->jumlah_barang -= $jumlah_barang;
                }
                $getDataInventaris->save();
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    public function listInventaris()
    {
        try {
            $data = inventaris::join('categories', 'inventaris.kategori_id', '=', 'categories.id')
                ->select(
                    'categories.name as category_name',
                    'inventaris.nama_barang',
                    'inventaris.jumlah_barang',
                    'inventaris.created_by',
                    'inventaris.created_at',
                    'inventaris.id'
                )->get();
            return view('pages.inventarisMonitoring')->with('inventarises', $data);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    public function showInventarisMasuk()
    {
        try {
            $data = Category::all();
            return view('pages.inventarsiMasuk')->with('categories', $data);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }

    }
    public function showListInventarisMasuk()
    {
        try {
            $data = tambahInventaris::join('inventaris', 'tambah_inventaris.inverntaris_id', '=', 'inventaris.id')
                ->select(
                    'inventaris.nama_barang',
                    'tambah_inventaris.jumlah_barang',
                    'tambah_inventaris.created_by',
                    'tambah_inventaris.created_at',
                    'tambah_inventaris.id'
                )->get();
            return view('pages.listInventarisMasuk')->with('tambahInventarises', $data);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    public  static function  GenerateNomorBatch (): string
    {
        $prefix = "NB";
        $datePart = date('Ymd');
        $randomPart = strtoupper(substr(bin2hex(random_bytes(3)), 0, 6));
        return $prefix . $datePart . $randomPart;
    }

}
