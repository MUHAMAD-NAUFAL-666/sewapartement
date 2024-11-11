<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CityController extends Controller
{
    // Fungsi untuk menyimpan data kota
    public function store(Request $request)
{
    // Validasi input
    $request->validate([
        'name' => 'required|string|max:255',
        'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:3000',
    ], [
        'name.required' => 'Nama kota tidak boleh kosong.',
        'photo.required' => 'Foto kota harus diunggah.',
    ]);

    // Menghasilkan slug
    $slug = Str::slug($request->name);
    $count = 1;
    while (City::where('slug', $slug)->exists()) {
        $slug = Str::slug($request->name) . '-' . $count;
        $count++;
    }

    try {
        // Mengupload foto
        $photoPath = $request->file(key: 'photo')->store('photos', 'public');

        // Simpan kota dengan slug yang sudah dipastikan unik
        City::create([
            'name' => $request->name,
            'slug' => $slug,
            'photo' => $photoPath,
        ]);

        return redirect()->route('cities.index')->with('success', 'Kota berhasil dibuat.');
    } catch (\Exception $e) {
        return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan: ' . $e->getMessage()]);
    }
}

    public function create()
    {
        return view('admin.cities.create'); // Pastikan ini sesuai dengan nama file Blade kamu
    }

    // Fungsi lain (jika ada)...
}
