<?php


namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\product;
use App\Models\categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;




class ProductController extends Controller
{
  public function index(){
    $product = product::where('status', '!=', 1)->get();
    return view("product.index",compact('product'));
  }



  public function form(){

    $categories = categories::all();
    return view("product.create",['categories' => $categories]);
  }

  



  public function store(Request $request)
{
    // Validate the request data
    $request->validate([
        'name' => 'required|alpha_num',
        'price' => 'required|numeric',
        'categoryname' => 'required|alpha_num',
        'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust the file size limit and accepted file types as needed
        
      ]);

    // Initialize $imageName with a default value
    $imageName = null;

    // Begin a database transaction
    DB::beginTransaction();

    try {
        // Create a new product instance
        $product = new Product;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->categoryname = $request->categoryname;
        $product->description = $request->description;

        // Handle file upload
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $imageName = time().'.'.$image->getClientOriginalExtension(); // Generate a unique name for the file
            $image->move(public_path('uploads'), $imageName); // Move the uploaded file to a public directory
        }

        // Save product details to the database
        $product->image = $imageName; // Save the filename in the database
        $product->save();

        // Commit the transaction
        DB::commit();

        
        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    } catch (\Exception $e) {
       
        DB::rollback();
       
        return redirect()->route('products.index')->with('error', 'An error occurred while creating the product.');
    }
}




  public function edit($id){
    // $product = product::find($id);
    // if($product){
    //   return view('product.edit',compact('product'));
    //  }

    // abort(404);
    try{
      $product = product::findorfail($id);
      $categories = categories::all();
      return view('product.edit',compact('product','categories'));
    }
    catch(\Exception $e){
      // dd($e->getMessage());
      abort(403, $e->getMessage());
    }
    
  }






  public function update(Request $request, $id){
    $request->validate([
        'name' => 'required|alpha_num',
        'price' => 'required|numeric',
        'photo' => ' |image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust the file size limit and accepted file types as needed
    ]);

  
    $imageName = null;

    DB::beginTransaction();

    try{
    if ($request->hasFile('photo')) {
        $image = $request->file('photo');
        $imageName = time().'.'.$image->getClientOriginalExtension(); // Generate a unique name for the file
        $image->move(public_path('uploads'), $imageName); // Move the uploaded file to a public directory
    }

    $product = Product::findorfail($id);
    $product->name = $request->name;
    $product->price = $request->price;
    $product->categoryname = $request->categoryname;
    $product->description = $request->description; 
    // $product->image = $imageName==null?$product->image : $imageName;
    if($imageName){
      $product->image = $imageName;
    } 
    $product->save();
  
    DB::commit();
    return redirect()->route('products.index')->with('success', 'Product Edited successfully.');

  }
  catch (\Exception $e){
    DB::rollback();
    return redirect()->route('products.index')->with('error', 'An error occurred while creating the product.');
  }
   

}





  public function delete($id){

    $product = product::findorfail($id);
    $product->status =1;
    $product->save();
    return redirect()->back()->with('success', 'Customer deleted successfully!');
  }
}

