<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use App\Models\CategoryProduct;
use App\Models\Products;
use App\Models\Brand;

class ProductsController extends Controller
{
    /**
	 * 
	 */
	public function getProducts() 
	{
		// ini_set('max_execution_time', 0);
		// for ($i=1; $i <= 10000 ; $i++) { 
		// 	# code...
		// 	$model = new Products();
		// 	$model->name = Str::random(10);
		// 	$model->category_id = 10;
		// 	$model->desc = 'test';
		// 	$model->brand_id = 4;
		// 	$model->save();
		// }

		// dd('done');

		$products = DB::table('products')->orderBy('id', 'desc')->paginate(20);
		// $manager_category_products = view('master-header::admin.allcategory')->('all_category_products',$all_category_products);
		// return view('admincp')->with('master-header::admin.allcategory',$manager_category_products);
		return view('master-header::admin.products.products',compact('products'));
	}

    public function getAddproducts() 
	{
		$all_category_product = DB::table('brand')->orderBy('id', 'asc')->get(); 
		$all_category_id = DB::table('tbl_category_product')->orderBy('id', 'asc')->get();
		$slug = Str::slug('Laravel 5 Framework', '-');
		return view('master-header::admin.products.addproducts',compact('all_category_product','all_category_id'));
	}

	// public function postAddproducts() 
	// {
	// 	$slug = Str::slug('Laravel 5 Framework', '-');
	// 	return view('master-header::admin.products.addproducts');
	// 	// if(strcmp($brandsearchType, "products") == 0){
	// 	// 	$brands = Brand::where('title', 'like', "%{$brandsearch}%")->with('products')->get();
	// 	// 	return view('frontend.brandsearch', compact('brands'));
	// 	//   }
	// }

    /**
	 * 
	 */
	public function getEditproducts($id) 
	{
		
		$data = Products::findOrFail($id);
		// dd($data);
        // điều hướng đến view edit user và truyền sang dữ liệu về user muốn sửa đổi
		$all_category_product = DB::table('brand')->orderBy('id', 'asc')->get(); 
		$all_category_id = DB::table('tbl_category_product')->orderBy('id', 'asc')->get();
        
		return view('master-header::admin.products.editproducts', compact('data','all_category_product','all_category_id'));
	}

    public function postEditproducts(Request $request, $id){
        // Tìm đến đối tượng muốn update
        $item = Products::findOrFail($id); 
        $item->name = $request->name; 
		$item->slug = Str::slug($request ->name, '-');  
		$item->status = $request->status;
        
		$slug = Str::slug('Laravel 5 Framework', '-');
        $item->save();

		return redirect()->route('products.get');
        
    }

	

    /**
	 * 
	 */
	public function postSaveproducts(Request $request) 
	{
		$validatedData = $request->validate([
			// 'products_sku' => 'required',
			 'products_name' => 'required',
			// 'products_price' => 'required|numeric|gt:0',
			// 'products_pricesale' => 'required|numeric|gt:0',
			// 'products_image' => 'required',
			// 'products_category_id' => 'required',
			// 'products_brand_id' => 'required',
			// 'products_images' => 'required',
				
		]);

		$data= array();
		$data['sku'] = $request ->products_sku;
		$data['name'] = $request ->products_name;
		// dd($request ->category_products_name);
		$data['price'] = $request ->products_price;
		$data['pricesale'] = $request ->products_pricesale;
		$data['category_id'] = $request ->products_category_id;
		$data['image'] = $request ->products_image;
		$data['brand_id'] = $request ->products_brand_id;

		$data['images'] = $request ->products_images;	
		$data['slug'] = Str::slug($request ->products_name, '-');
		$data['desc'] = $request ->products_desc;
		$data['status'] = $request ->products_status;
		//  dd($data);
		// $image = $request->file('image');
    	// $storedPath = $image->move('products_image', $image)->getClientOriginalName();
		// $data['image'] = $image->getClientOriginalName();

		DB::table('products')->insert($data);

		$slug = Str::slug('Laravel 5 Framework', '-');
		$result = DB::table('products')->insert($data);
		// dd($result);
		
		Session::put('message','Thêm danh mục sản phẩm thành công');

		return redirect()->route('products.get');
		
	}

    public function getDeleteproducts($id){
		DB::table('products')
		->where('id',$id)
		->delete();
		
		return redirect()->route('products.get');
    }

	public function getUnactiveproducts($id){

		DB::table('products')
		->where('id',$id)
		->update(['status'=>1]);
		
		return redirect()->route('products.get');
	}

	public function getActiveproducts($id){

		DB::table('products')
		->where('id',$id)
		->update(['status'=>0]);
		
		return redirect()->route('products.get');
	}
}
