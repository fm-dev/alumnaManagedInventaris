<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\User;
class DashboardController extends Controller
{
    //
    public function showDashboard(){
        return view('pages.dashboard');
    }
    public function showKategori(){
        try
        {
            $data = Category::all();
            return view('pages.monitoringKategori')->with('categories', $data);
        }
        catch(\Exception $e)
        {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    public function showAddKategori(){
        return view('pages.addKategori');
    }
    public function addCategory(Request $req)
    {
        try
        {
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

        }
        catch(\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    
}
