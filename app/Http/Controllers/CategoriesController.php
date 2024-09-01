<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Http\Requests\StoreCategoriesRequest;
use App\Http\Requests\UpdateCategoriesRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //get categories
        $categories = Categories::latest()->paginate(5);

        //render view with posts
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'kode'     => 'required',
            'nama'   => 'required'
        ]);

        //create post
        Categories::create([
            'kode'     => $request->kode,
            'nama'   => $request->nama
        ]);

        //redirect to index
        return redirect()->route('categories.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        //get post by ID
        $categories = Categories::findOrFail($id);

        //render view with post
        return view('admin.categories.show', compact('categories'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        //get post by ID
        $categories = Categories::findOrFail($id);

        //render view with post
        return view('admin.categories.edit', compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //validate form
        $this->validate($request, [
            'kode'     => 'required',
            'nama'   => 'required'
        ]);

        //get post by ID
        $categories = Categories::findOrFail($id);

        //update post without image
        $categories->update([
            'kode'     => $request->kode,
            'nama'   => $request->nama
        ]);

        //redirect to index
        return redirect()->route('categories.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): RedirectResponse
    {
        //get post by ID
        $categories = Categories::findOrFail($id);

        //delete post
        $categories->delete();

        //redirect to index
        return redirect()->route('categories.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
