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

use App\Models\Brand;

class BrandController extends Controller
{
    /**
	 * 
	 */
	public function getBrand() 
	{
		$brand = DB::table('brand')->orderBy('id', 'asc')->get();
		// $manager_category_product = view('master-header::admin.allcategory')->('all_category_product',$all_category_product);
		// return view('admincp')->with('master-header::admin.allcategory',$manager_category_product);
		return view('master-header::admin.brand.brand',compact('brand'));
	}

    public function getAddbrand() 
	{
		$slug = Str::slug('Laravel 5 Framework', '-');
		return view('master-header::admin.brand.addbrand');
	}

    /**
	 * 
	 */
	public function getEditbrand($id) 
	{
		
		$data = Brand::findOrFail($id);
		// dd($data);
        // điều hướng đến view edit user và truyền sang dữ liệu về user muốn sửa đổi
        
		return view('master-header::admin.brand.editbrand', compact('data'));
	}

    public function postEditbrand(Request $request, $id){
        // Tìm đến đối tượng muốn update
        $item = Brand::findOrFail($id); 
        $item->name = $request->name; 
		$item->slug = Str::slug($request ->name, '-');  
		$item->status = $request->status;
        
		$slug = Str::slug('Laravel 5 Framework', '-');
        $item->save();

		return redirect()->route('brand.get');
        
    }

    /**
	 * 
	 */
	public function postSavebrand(Request $request) 
	{
		$validatedData = $request->validate([
			'brand_name' => 'required'			
		]);

		$data= array();
		$data['name'] = $request ->brand_name;
		// dd($request ->category_brand_name);
		$data['slug'] = Str::slug($request ->brand_name, '-');
		$data['status'] = $request ->brand_status;
		// dd($data);
		$slug = Str::slug('Laravel 5 Framework', '-');
		DB::table('brand')->insert($data);
		Session::put('message','Thêm danh mục sản phẩm thành công');

		return redirect()->route('brand.get');
		
	}

    public function getDeletebrand($id){
		DB::table('brand')
		->where('id',$id)
		->delete();
		
		return redirect()->route('brand.get');
    }

	public function getUnactivebrand($id){

		DB::table('brand')
		->where('id',$id)
		->update(['status'=>1]);
		
		return redirect()->route('brand.get');
	}

	public function getActivebrand($id){

		DB::table('brand')
		->where('id',$id)
		->update(['status'=>0]);
		
		return redirect()->route('brand.get');
	}
}
