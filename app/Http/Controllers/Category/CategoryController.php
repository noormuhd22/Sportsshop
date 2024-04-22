<?php

namespace App\Http\Controllers\Category;
use App\Http\Controllers\Controller;
use App\Models\categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class CategoryController extends Controller
{

  //show category display table  
  public function index(){
    $categories = categories::all();
    return view('categories.index',['categories'=>$categories]);
  }

//show add category form
  public function create(){

    return view('categories.form');
  }


//adding categgory into database
  public function store(Request $request){

   $request->validate([
    'name' => 'required|alpha_num',
    'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', 
]);

   $imageName = null;

   // Begin a database transaction
   DB::beginTransaction();

   try {
       $categories = new categories;
       $categories->name = $request->name;
   

       // Handle file upload
       if ($request->hasFile('photo')) {
           $image = $request->file('photo');
           $imageName = time().'.'.$image->getClientOriginalExtension(); // Generate a unique name for the file
           $image->move(public_path('uploads'), $imageName); // Move the uploaded file to a public directory
       }

       // Save ca$categories details to the database
       $categories->image = $imageName; // Save the filename in the database
       $categories->save();

       // Commit the transaction
       DB::commit();

       
       return redirect()->route('category.index')->with('success', 'ca$categories created successfully.');
   } catch (\Exception $e) {
      
       DB::rollback();
      
       return redirect()->route('category.index')->with('error', 'An error occurred while creating the ca$categories.');
   }
}

//for edit the category
public function edit($id){

try{
    $categories = categories::findorfail($id);
    return view('categories.edit',compact('categories'));

}
catch(\Exception $e){
    abort(403,$e->getmessage());
}

  }

  public function update(Request $request, $id)
  {
      // Validating the incoming request data
      $request->validate([
          'name' => 'required|alpha_num',
          'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validating the photo field
      ]);
  
      // Initializing $imageName to null
      $imageName = null;
  
      // Starting a database transaction
      DB::beginTransaction();
  
      try {
          // Checking if a photo is present in the request
          if ($request->hasFile('photo')) {
              $image = $request->file('photo');
              // Generating a unique name for the image using the current timestamp
              $imageName = time() . '.' . $image->getClientOriginalExtension();
              // Moving the uploaded image to the public/uploads directory
              $image->move(public_path('uploads'), $imageName);
          }
  
          // Finding the category by its ID
          $category = Categories::findOrFail($id);
          
          // Updating the category name with the value from the request
          $category->name = $request->name;
  
          // If a new image was uploaded, updating the category's image field
          if ($imageName) {
              $category->image = $imageName;
          }
  
          // Saving the changes to the category
          $category->save();
  
          // Committing the transaction as changes were successful
          DB::commit();
  
          // Redirecting the user to the index route with a success message
          return redirect()->route('category.index')->with('success', 'Category edited successfully.');
      } catch (\Exception $e) {
          // Rolling back the transaction in case of an exception
          DB::rollback();
          // Redirecting the user to the index route with an error message
          return redirect()->route('category.index')->with('error', 'An error occurred while editing the category.');
      }
  }


  public function delete($id){

  $categories =categories::findorfail($id);
  $categories-> delete();
  return redirect()->back()->with('success', 'category deleted successfully!');
 

  }
}  