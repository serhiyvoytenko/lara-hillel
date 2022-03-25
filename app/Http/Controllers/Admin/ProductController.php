<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use App\Services\Models\ImageStorage;

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

        return response()->view('admin/view-products', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(): Response
    {
        $categories = Category::all();
        return response()->view('admin/create-product', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreProductRequest $request
     * @return Application|RedirectResponse|Redirector
     */
    public function store(StoreProductRequest $request): Redirector|RedirectResponse|Application
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

        } catch (\Throwable $e) {

            DB::rollBack();

            logs()->warning($e->getMessage());
            return redirect()->back()->with('warn', 'Error, see log');
        }
    }

//    /**
//     * Display the specified resource.
//     *
//     * @param  int  $id
//     * @return \Illuminate\Http\Response
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
    public function edit($id)
    {
        $product = Product::find($id);
        return response()->view('admin/edit-product', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
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
