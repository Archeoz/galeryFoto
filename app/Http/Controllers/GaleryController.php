<?php

namespace App\Http\Controllers;

use App\Models\galery;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class GaleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function mainpage()
    {
        $user = Auth::user();
        $galeri = galery::where('id_user', '=', $user->id)->orderBy('created_at', 'desc')->get();
        $terbaru = galery::where('id_user', '=', $user->id)->latest()->first();
        // dd($galeri);
        return view('mainpage', compact('galeri', 'terbaru'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function uploadfoto(Request $request)
    {
        $user = Auth::user();

        // Dapatkan nama file asli
        $namafoto = $request->gambar->getClientOriginalName();

        // Pindahkan file ke direktori 'foto'
        $request->gambar->move(public_path('foto'), $namafoto);

        // Buat entri baru di tabel 'galeries'
        galery::create([
            'id_user' => $user->id,
            'judul' => $request->input('judul'),
            'deskripsi' => $request->input('deskripsi'),
            'tanggal' => now(),
            'foto' => $namafoto,
        ]);

        return redirect('mainpage');
    }


    public function editfoto(Request $request, $id_galery)
    {
        $user = Auth::user();

        if ($request->hasFile('gambar')) {
            // Dapatkan nama file asli
            $namafoto = $request->gambar->getClientOriginalName();

            // Pindahkan file ke direktori 'foto'
            $request->gambar->move(public_path('foto'), $namafoto);
            galery::where('id_galery', '=', $id_galery)->update([
                'id_user' => $user->id,
                'judul' => $request->input('judul'),
                'deskripsi' => $request->input('deskripsi'),
                'tanggal' => now(),
                'foto' => $namafoto,
            ]);
        } else {
            galery::where('id_galery', '=', $id_galery)->update([
                'id_user' => $user->id,
                'judul' => $request->input('judul'),
                'deskripsi' => $request->input('deskripsi'),
                'tanggal' => now(),
            ]);
        }

        return redirect('mainpage');
    }

    public function hapusfoto($id_galery)
    {
        galery::where('id_galery', '=', $id_galery)->delete();
        return redirect('mainpage');
    }
}
