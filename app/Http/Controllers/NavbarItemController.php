<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NavbarItem;

class NavbarItemController extends Controller
{
    public function index()
    {
        $items = NavbarItem::orderBy('order')->get();
        return view('admin.navbar.index', compact('items'));
    }

    public function create()
    {
        $parents = NavbarItem::whereNull('parent_id')->get();
        return view('admin.navbar.create', compact('parents'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'link' => 'nullable',
            'order' => 'required|integer',
            'parent_id' => 'nullable|exists:navbar_items,id',
        ]);

        NavbarItem::create($request->all());

        return redirect()->route('admin.navbar.index')->with('success', 'Menu berhasil ditambahkan.');
    }

    public function edit(NavbarItem $navbar)
    {
        $parents = NavbarItem::whereNull('parent_id')->where('id', '!=', $navbar->id)->get();
        return view('admin.navbar.edit', compact('navbar', 'parents'));
    }

    public function update(Request $request, NavbarItem $navbar)
    {
        $request->validate([
            'title' => 'required',
            'link' => 'nullable',
            'order' => 'required|integer',
            'parent_id' => 'nullable|exists:navbar_items,id',
        ]);

        $navbar->update($request->all());

        return redirect()->route('admin.navbar.index')->with('success', 'Menu berhasil diupdate.');
    }

    public function destroy(NavbarItem $navbar)
    {
        $navbar->delete();
        return redirect()->back()->with('success', 'Menu berhasil dihapus.');
    }
}
