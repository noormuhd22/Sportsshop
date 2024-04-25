<?php

namespace App\Http\Controllers\User\category;
use App\Http\Controllers\Controller;
use App\Models\categories;
use App\Models\Product;
use Illuminate\Http\Request;

class UsercategoryController extends Controller
{
    public function view(Request $request, $id)
    {
        $user = $request->session()->get('user')['id'];
        $category = categories::findOrFail($id);
        $categoryName = $category->name;
        $products = Product::where('categoryname', $categoryName)->get();
        return view('Usercategory.view', ['products' => $products, 'user' => $user]);
    }
}

?>
