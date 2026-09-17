<?php

namespace App\Http\Controllers\Inventory;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MaterialDisposalController extends Controller
{
    // GET
    public function index()
    {
        // Menampilkan daftar data
        return view('Inventory.MaterialDisposal.Transactions.index');
    }

    // GET
    public function create()
    {
        // Menampilkan form tambah data
        return view('Inventory.MaterialDisposal.Transactions.create');
    }

    // POST
    public function store(Request $request)
    {
        // Menyimpan data baru
    }

    // GET
    public function show(string $id)
    {
        // Menampilkan detail satu data
    }

    // GET
    public function edit(string $id)
    {
        // Menampilkan form edit
        return view('Inventory.MaterialDisposal.Transactions.revision');
    }

    // PUT/PATCH
    public function update(Request $request, string $id)
    {
        // Mengubah data
    }

    // DELETE
    public function destroy(string $id)
    {
        // Menghapus data
    }
}