<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Routing\Controller;
use App\Http\Requests\StoreMenuRequest;
use App\Http\Requests\StoretopingRequest;
use App\Http\Requests\UpdateMenuRequest;
use App\Http\Requests\UpdatetopingRequest;
use App\Models\Toping;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function landingpage()
    {
        return View('index', ['title' => 'Home Page']);
    }

    public function index()
    {
        $menu = Menu::all();
        return View('admin.menu', compact('menu'), [
            'title' => 'Semua Menu | Admin',
            'judul' => 'Menu'
        ]);
    }

    public function viewtoping()
    {
        $toping = Toping::all();
        return View('admin.toping', compact('toping'), [
            'title' => 'Semua Toping | Admin',
            'judul' => 'Toping'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return View('admin.createMenu', ['title' => 'Tambah Menu | Admin', 'judul' => 'Tambah Menu']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMenuRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMenuRequest $request)
    {
        $dataValidate = $request->validate([
            'nama_menu' => 'required',
            'deskripsi_menu' => 'required',
            'harga_menu' => 'required',
            'stock' => 'required',
            'foto_menu' => 'required'
        ]);

        $dataValidate['foto_menu'] = $request->file('foto_menu')->store('foto_menu');
        Menu::create($dataValidate);
        return redirect()->route('admin.ViewMenu')->withPesan('Menu Berhasil Di Tambah');
    }

    public static function tambahToping()
    {
        return View('admin.tambahToping', [
            'title' => 'Tambah Toping | Admin',
            'judul' => 'Tambah Toping'
        ]);
    }

    public static function tambahTopingAction(StoreTopingRequest $request)
    {
        $data = $request->validate([
            'nama_toping' => 'required',
            'status' => 'required',
            'harga' => 'required'
        ]);

        Toping::create($data);
        return redirect()->route('admin.ViewToping')->withPesan('Toping Berhasil Di Tambah');
    }

    public static function hapusToping(Toping $toping)
    {
        Toping::destroy($toping->id);
        return redirect()->route('admin.ViewToping')->withPesan('Toping Berhasil Di Hapus');
    }

    public function editToping(Toping $toping)
    {
        return View('admin.editToping', compact('toping'), ['title' => 'Edit Toping | Admin', 'judul' => 'Edit Toping']);
    }

    public function editTopingAction(UpdatetopingRequest $request, Toping $toping)
    {
        $data = $request->validate([
            'nama_toping' => 'required',
            'status' => 'required',
            'harga' => 'required'
        ]);

        $toping->update($data);
        return redirect()->route('admin.ViewToping')->withPesan('Toping Berhasil Di Edit');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        return View('admin.UpdateMenu', compact('menu'), ['title' => 'Update Menu | Admin', 'judul' => 'Update Menu']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMenuRequest  $request
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMenuRequest $request, Menu $menu)
    {
        $dataValidate = $request->validate([
            'nama_menu' => 'required',
            'deskripsi_menu' => 'required',
            'harga_menu' => 'required',
            'stock' => 'required',
        ]);
        if ($request->foto_menu) {
            Storage::delete($request->oldFotoMenu);
            $dataValidate['foto_menu'] = $request->file('foto_menu')->store('foto_menu');
        }
        $menu->update($dataValidate);
        return redirect()->route('admin.ViewMenu')->withPesan('Menu Berhasil Di Edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        Storage::delete($menu->foto_menu);
        Menu::destroy($menu->id);
        return redirect()->route('admin.ViewMenu')->withPesan('Menu Berhasil Di Hapus');
    }
}
