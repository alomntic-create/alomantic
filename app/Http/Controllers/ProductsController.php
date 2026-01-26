<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Info;
use App\Models\Media;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
  public  function getSectionProducts(Category $category)
  {
      $products=Product::where('category_id',$category->id)->get();

      return view('products',['category'=>$category ,'products'=>$products]);
  }


    public  function showProduct(int $id)
    {
        $settings_order_number=Info::where('type',9)->first();

      $product = Product::with('media','productUnits.unit')->findOrFail($id);
        return view('product_show',['product'=>$product ,'settings_order_number'=>$settings_order_number]);
    }

    public  function showAll()
    {
      $products = Product::with('media')->get();
      $categories=Category::all();
        return view('all_products',['products'=>$products,
            'categories'=>$categories
        ]);
    }


public  function vr($id)
{
    $image = Media::find($id);

    return view('vr',['image'=>$image]);
}

}
