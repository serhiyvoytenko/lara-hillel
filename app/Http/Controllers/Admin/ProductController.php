<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use App\Services\Models\ImageStorage;
use Throwable;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(): Response
    {
        $products = Product::paginate(20);

        return response()->view('admin.view-products', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(): Response
    {
        $categories = Category::all();

        return response()->view('admin.create-product', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreProductRequest $request
     * @return RedirectResponse
     * @throws Throwable
     */
    public function store(StoreProductRequest $request): RedirectResponse
    {
        $fields = $request->validated();
        $images = $fields['images'] ?? [];

        try {

            DB::beginTransaction();

            $category = Category::where('title', $fields['category'])->first();
            $product = $category?->products()->create($fields);
            ImageStorage::attach($product, 'images', $images);

            DB::commit();

            return redirect()->route('admin.product.index')
                ->with('status', "Product {$fields['title']} created successfully");

        } catch (Throwable $e) {

            DB::rollBack();

            logs()->warning($e->getMessage());
            return redirect()->back()->with('warn', 'Error, see log');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit(int $id): Response
    {
        $product = Product::find($id);
        $categories = Category::get()->all();
        $images = $product->images;

        return response()->view('admin.edit-product', compact('product', 'categories', 'images'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateProductRequest $request
     * @param int $id
     * @return RedirectResponse
     * @throws Throwable
     */
    public function update(UpdateProductRequest $request, int $id): RedirectResponse
    {
        $product = Product::find($id);
        $fields = $request->validated();
        $fields['category_id'] = Category::where('title', $fields['category'])->first()->id;
        $images = $fields['images'] ?? [];

        try {

            DB::beginTransaction();

            $product->update($fields);
            ImageStorage::attach($product, 'images', $images);

            DB::commit();

            return redirect()->route('admin.product.index')
                ->with('status', "Product {$fields['title']} updated successfully");

        } catch (Throwable $e) {

            DB::rollBack();

            logs()->warning($e->getMessage());
            return redirect()->back()->with('warn', 'Error, see log');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        $product = Product::find($id);

        $product->delete();

        return redirect()->back()->with('status', 'Product "' . $product->getAttribute('title') . '" was successfully deleted');
    }

}
