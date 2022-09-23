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
use App\Models\Sanpham;
use App\Models\Brand;

 

session_start();

class CategoryProductController extends Controller
{
    /**
	 * 
	 */
	public function getAllcategory() 
	{
		$all_category_product = DB::table('tbl_category_product')->orderBy('id', 'desc')->get();
		// $manager_category_product = view('master-header::admin.allcategory')->('all_category_product',$all_category_product);
		// return view('admincp')->with('master-header::admin.allcategory',$manager_category_product);
		return view('master-header::admin.allcategory',compact('all_category_product'));
	}

	/**
	 * 
	 */
	public function getAddcategory() 
	{
		
		// // return view('master-header::admin.brand.addbrand'
		//  User::findOrFail($id) 
		$slug = Str::slug('Laravel 5 Framework', '-');
		return view('master-header::admin.addcategory');
	}

	// public function postAddcategory() 
	// {
	// 	$sanpham = DB::table('brand')->get(); 
	// 	// // return view('master-header::admin.brand.addbrand'
	// 	//  User::findOrFail($id) 
	// 	$slug = Str::slug('Laravel 5 Framework', '-');
	// 	return view('master-header::admin.addcategory',compact('sanpham'));
	// }

	/**
	 * 
	 */
	public function getEditcategory($id) 
	{
		
		$data = CategoryProduct::findOrFail($id);
		// dd($data);
        // điều hướng đến view edit user và truyền sang dữ liệu về user muốn sửa đổi
        
		return view('master-header::admin.editcategory', compact('data'));
	}


	// public function postStore(Request $request)
	// {
	// 	$validatedData = $request->validate([
	// 		'name' => 'required',
	// 		'price' => 'required',
			
	// 	]);
	// }

	/**
	 * 
	 */
	public function postSavecategoryproduct(Request $request) 
	{
		
		$validatedData = $request->validate([
			'category_product_name' => 'required'			
		]);
		// dd($validatedData);
		$data= array();
		$data['category_name'] = $request ->category_product_name;
		// dd($request ->category_product_name);
		$data['category_slug'] = Str::slug($request ->category_product_name, '-');
		$data['category_desc'] = $request ->category_product_desc;
		$data['category_status'] = $request ->category_product_status;
		// dd($data);
		$slug = Str::slug('Laravel 5 Framework', '-');
		DB::table('tbl_category_product')->insert($data);
		Session::put('message','Thêm danh mục sản phẩm thành công');



		return redirect()->route('allcategory.get');
		
	}

    public function postEditcategory(Request $request, $id){
        // Tìm đến đối tượng muốn update
        $item = CategoryProduct::findOrFail($id); 
        $item->category_name = $request->category_product_name; 
		$item->category_slug = Str::slug($request ->category_product_name, '-');  
		$item->category_desc = $request->category_product_desc;
		$item->category_status = $request->category_product_status;
        
		$slug = Str::slug('Laravel 5 Framework', '-');
        $item->save();

		return redirect()->route('allcategory.get');
        
    }

	public function getDeletecategory($id){
		DB::table('tbl_category_product')
		->where('id',$id)
		->delete();
		
		return redirect()->route('allcategory.get');
    }

	public function getUnactivecategoryproduct($id){

		DB::table('tbl_category_product')
		->where('id',$id)
		->update(['category_status'=>1]);
		
		return redirect()->route('allcategory.get');
	}

	public function getActivecategoryproduct($id){

		DB::table('tbl_category_product')
		->where('id',$id)
		->update(['category_status'=>0]);
		
		return redirect()->route('allcategory.get');
	}
 
	
	//BRAND
	/**
	 * 
	 */
	public function getSanpham() 
	{
		$sanpham = DB::table('sanpham')->get();
		// $manager_category_product = view('master-header::admin.allcategory')->('all_category_product',$all_category_product);
		// return view('admincp')->with('master-header::admin.allcategory',$manager_category_product);
		return view('master-header::admin.sanpham',compact('sanpham'));
	}
	
	/**
	 * 
	 */
	public function getThemsanpham() 
	{

		return view('master-header::admin.themsanpham');
	}
	public function postSuasanpham(Request $request, $id){
        // Tìm đến đối tượng muốn update
		
        $data = Sanpham::findOrFail($id);
        $data->name = $request->name;   
		$data->price = $request->price;
		$data->desc = $request->desc;
		$data->status = $request->status;
        $data->save();
        // echo"success update item";


		return redirect()->route('sanpham.get');
    }

	/**
	 * 
	 */
	public function getSuasanpham($id) 
	{
		$data = Sanpham::find($id);
		return view('master-header::admin.suasanpham');
	}
	/**
	 * 
	 */
	public function postLuusanpham(Request $request) 
	{
		$data= array();
		$data['name'] = $request ->name;
		// dd($request ->category_product_name);
		$data['price'] = $request ->price;

		$data['desc'] = $request ->desc;
		$data['status'] = $request ->status;
		
		$image = $request->file('image');

    	$storedPath = $image->move('images', $image->getClientOriginalName());
		$data['images'] = $image->getClientOriginalName();
		DB::table('sanpham')->insert($data);
		Session::put('message','Thêm danh mục sản phẩm thành công');

		return redirect()->route('themsanpham.get');
		
	}

	public function getAn($id){

		DB::table('sanpham')
		->where('id',$id)
		->update(['status'=>1]);
		
		return redirect()->route('sanpham.get');
	}

	public function getHienthi($id){

		DB::table('sanpham')
		->where('id',$id)
		->update(['status'=>0]);
		
		return redirect()->route('sanpham.get');
	}
	

}
