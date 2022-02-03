<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Error;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;

class AdminCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // if (auth()->guest()) {
        //      abort('403', 'Not authorized');
        // }
        // if(!auth()->user()->is_admin || auth()->guest()){
        //     abort('403', 'not authorized');
        // ------------------->dibikin middleware & kernel
        // }


        // $this->authorize('admin');--------------> authorization dari Gate App provider

        return view('dashboard.categories.index', [
            'input' => "false",
            'categories' => Category::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.categories.index', [
            'input' => "post",
            'button' => 'create',
            'placeholder' => 'New Category'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        if (!Gate::allows('admin')) {
            $request->session()
                ->flash('danger', 'You are not authorized to make changes');
            return redirect('/dashboard/categories');
        } else {
            $validated = $request->validate([
                'name' => 'required|unique:categories'
            ]);
            $validated['slug'] = Str::slug($request->name);
            Category::create($validated);
            $request->session()->flash('success', 'New category is added');
            return redirect('/dashboard/categories');
        }
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('dashboard.categories.index', [
            'input' => "edit",
            'button' => 'update',
            'placeholder' => $category->name,
            'editCategory' => $category

        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {

        if (!Gate::allows('admin')) {
            $request->session()
                ->flash('danger', 'You are not authorized to make changes');
            return redirect('/dashboard/categories');
        } else {
            $validated = $request->validate([
                'name' => 'required|unique:categories'
            ]);
            $validated['slug'] = Str::slug($request->name);
        
            $category->update($validated);
            $request->session()->flash('success', 'New category is updated');
            return redirect('/dashboard/categories');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        if (!Gate::allows('admin')) {
            return redirect('/dashboard/categories')
                ->with('danger', 'You are not authorized to make changes');
        } else {
            Category::destroy($category->id);

            return redirect('/dashboard/categories')
                ->with('danger', 'Category is deleted');
        }
    }
}
