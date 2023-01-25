<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\InertiaTest;

class InertiaTestController extends Controller
{
    public function index()
    {
        return Inertia::render('Inertia/Index', [
            'items' => InertiaTest::all()
        ]);
    }

    public function create()
    {
        return Inertia::render('Inertia/Create'); 
    }

    public function show($id)
    {
        // dd($id)
        return Inertia::render('Inertia/Show',
        [
                'id' => $id,
                'item' => InertiaTest::findOrFail($id)
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => ['required', 'max:20'],
            'content' => ['required'],
        ]);
        $inertiaTest = new InertiaTest;
        $inertiaTest->title = $request->title;
        $inertiaTest->content = $request->content;
        $inertiaTest->save();

        return to_route('inertia.index')
        ->with([
            'message' => '登録しました。'
        ]);
    }

    public function delete($id)
    {
        $deleteItem = InertiaTest::findOrFail($id);
        $deleteItem->delete();
        
        return to_route('inertia.index')
        ->with([
            'message' => '削除しました。'
        ]);
    }

    
}