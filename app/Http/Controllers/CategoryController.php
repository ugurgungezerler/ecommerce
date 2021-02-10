<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\JsonResponse;

class CategoryController extends Controller
{

    /**
     * @return JsonResponse
     */
    public function index()
    {
        return response()->json(Category::paginate(5));
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function show($id)
    {
        return response()->json(Category::findOrFail($id));
    }

    /**
     * @param StoreCategoryRequest $request
     * @return mixed
     */
    public function store(StoreCategoryRequest $request)
    {
        $category = Category::create($request->only('name'));

        return response()->json($category);
    }

    /**
     * @param UpdateCategoryRequest $request
     * @param $id
     * @return JsonResponse
     */
    public function update(UpdateCategoryRequest $request, $id)
    {
        $category = Category::findOrFail($id);

        $category->update($request->only('name'));

        return response()->json($category);
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);

        $category->delete();

        return response()->json(['message' => 'Category successfully deleted']);
    }
}
