<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Models\Category;
use App\Models\Product;
use App\Services\FileStorageService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(): Response
    {
        $categories = Category::paginate(5);

        return response()->view('admin.view-categories', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(): Response
    {
        return \response()->view('admin.create-category');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreCategoryRequest $request
     * @return RedirectResponse
     */
    public function store(StoreCategoryRequest $request): RedirectResponse
    {
        $fields = $request->validated();
        Category::create($fields);

        return redirect()->route('admin.category.index')->with('status', "Category {$fields['title']} was created successfully!");
    }

//    /**
//     * Display the specified resource.
//     *
//     * @param  int  $id
//     * @return Response
//     */
//    public function show($id)
//    {
//        //
//    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit(int $id): Response
    {
        $category = Category::whereId($id)->first();

        return \response()->view('admin.edit-category', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param StoreCategoryRequest $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(StoreCategoryRequest $request, int $id): RedirectResponse
    {
        $fields = $request->validated();
        $category = Category::whereId($id)->first();

        $category?->update($fields);

        return redirect()->route('admin.category.index')
            ->with('status', 'Category "' . $category->title . '" was updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        $title = Category::whereId($id)->first()?->getAttributeValue('title');

        if (Product::where('category_id', $id)->first()) {
            return redirect()->route('admin.category.index')
                ->with('warn', 'Category "' . $title . '" contains some products. Please remove them first.');
        }

        FileStorageService::remove(Category::whereId($id)->first()?->getAttributeValue('thumbnail') ?? '');
        Category::whereId($id)->delete();

        return redirect()->route('admin.category.index')
            ->with('status', 'Category "' . $title . '" was deleted successfully!');
    }
}
