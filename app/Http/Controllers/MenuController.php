<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MenuController extends Controller
{
    // Menampilkan daftar menu merchant
    public function index()
    {
        $menus = Menu::where('merchant_id', Auth::id())->get();
        return view('menu.index', compact('menus'));
    }

    // Menampilkan form untuk membuat menu baru
    public function create()
    {
        return view('menu.create');
    }

    // Menangani penyimpanan menu baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_menu' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'url_foto' => 'nullable|string',
            'harga' => 'required|numeric',
        ]);

        $validated['merchant_id'] = Auth::id();
        Menu::create($validated);

        return redirect()->route('menu.index');
    }

    // Menampilkan form untuk mengedit menu
    public function edit($id)
    {
        $menu = Menu::findOrFail($id);
        return view('menu.edit', compact('menu'));
    }

    // Menangani pembaruan menu
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_menu' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'url_foto' => 'nullable|string',
            'harga' => 'required|numeric',
        ]);

        $menu = Menu::findOrFail($id);
        $menu->update($validated);

        return redirect()->route('menu.index');
    }

    // Menangani penghapusan menu
    public function destroy($id)
    {
        $menu = Menu::findOrFail($id);
        $menu->delete();

        return redirect()->route('menu.index');
    }
}
