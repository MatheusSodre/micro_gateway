<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use App\Services\CategoryService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Response as HttpResponse;
use Illuminate\Http\JsonResponse;

class CategoryController extends Controller
{
    /**
     * @param CategoryService $categoryService
     *
     */
    public function __construct(private CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index():JsonResponse
    {
        return Response::json(CategoryResource::collection($this->categoryService->getAll()));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request):JsonResponse
    {
        return Response::json(new CategoryResource($this->categoryService->store($request->all())),HttpResponse::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Response::json(new CategoryResource($this->categoryService->getById($id)),HttpResponse::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return Response::json($this->categoryService->update($request->all(),$id),HttpResponse::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return Response::json($this->categoryService->destroy($id),HttpResponse::HTTP_OK);
    }
}
