<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(Request $request, $slug = null){

        $sorting = $request->sortingBy;
        switch ($sorting) {
            case 'popularity':
                $sortField = 'id';
                $sortBy = 'desc';
                break;
            case 'low-high':
                $sortField = 'price';
                $sortBy= 'asc';
                break;
            case 'high-low':
                $sortField = 'price';
                $sortBy = 'desc';
                break;
            default:
                $sortField = 'id';
                $sortBy = 'asc';
        }

        $products = Product::with('category');
        if(!is_null($slug)){
            $category = Category::whereSlug($slug)->firstOrFail();
            
            if (is_null($category->category_id)) {
                $categoriesIds = Category::whereCategoryId($category->id)->pluck('id')->toArray();
                $categoriesIds[] = $category->id;

                $products = product::whereHas('category', function ($query) use ($categoriesIds) {
                    $query->whereIn('id', $categoriesIds);
                });               

            } else {
                $products = product::whereHas('category', function ($query) use ($slug) {
                    $query->where('slug');
                });

            }
        }

        $products = $products->orderBy($sortField, $sortBy)->paginate(5);

        return view('frontend.shop.index', compact('products', 'sorting'));
    }
    public function tag(Request $request, $slug)
    {
        $sorting = $request->sortingBy;
        switch ($sorting) {
            case 'popularity':
                $sortField = 'id';
                $sortType = 'desc';
                break;
            case 'low-high':
                $sortField = 'price';
                $sortType = 'asc';
                break;
            case 'high-low':
                $sortField = 'price';
                $sortType = 'desc';
                break;
            default:
                $sortField = 'id';
                $sortType = 'asc';
        }

        $products = Product::with('tags');

        $products = $products->whereHas('tags', function ($query) use($slug) {
            $query->where([
                'slug' => $slug,
            ]);
        })
        ->orderBy($sortField, $sortType)
        ->paginate(6);

        return view('frontend.shop.index', compact('products','sorting'));
    }
}