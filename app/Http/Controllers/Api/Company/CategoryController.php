<?php

namespace App\Http\Controllers\Api\Company;

use App\Http\Controllers\Controller;
use App\Http\Requests\Company\StoreUpdateCategory;
use App\Http\Resources\Company\CategoryResource;
use App\Services\Company\CategoryService;
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
        return Response::json(CategoryResource::collection($this->categoryService->getAll()),HttpResponse::HTTP_OK);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUpdateCategory $request):JsonResponse
    {
        return Response::json(new CategoryResource($this->categoryService->store($request->validated())),HttpResponse::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id):JsonResponse
    {
        return Response::json(new CategoryResource($this->categoryService->getById($id)),HttpResponse::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreUpdateCategory $request, string $id):JsonResponse
    {
        return Response::json($this->categoryService->update($request->validated(),$id),HttpResponse::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id):JsonResponse
    {
        return Response::json($this->categoryService->destroy($id),HttpResponse::HTTP_NO_CONTENT);
    }
}
