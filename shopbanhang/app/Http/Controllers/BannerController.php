<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use App\Models\Banner;

class BannerController extends Controller
{
    /**
	 * 
	 */
	public function getBanner() 
	{
        $banner = DB::table('banner')->orderBy('id', 'asc')->get();
		return view('master-header::partial.banner.banner',compact('banner'));
	}

    /**
	 * 
	 */
	public function getAddbanner() 
	{
		return view('master-header::partial.banner.addbanner');
	}

     /**
	 * 
	 */
	public function getEditbanner($id) 
	{
		$banner = DB::table('banner')->orderBy('id', 'asc')->get();
		$data = Banner::findOrFail($id);
		// dd($data);
        // điều hướng đến view edit user và truyền sang dữ liệu về user muốn sửa đổi
        
		return view('master-header::partial.banner.editbanner', compact('data','banner'));
	}

    public function postEditbanner(Request $request, $id){
        // Tìm đến đối tượng muốn update
        $item = Banner::findOrFail($id); 
        $item->name = $request->name; 
        $item->imgmain = $request->imgmain; 
		$item->imgextra = $request->imgextra; 
		$item->text1 = $request->text1; 
		$item->text2 = $request->text2; 
		$item->button = $request->button; 
		$item->slug = Str::slug($request ->name, '-');  
		$item->status = $request->status;
        
		$slug = Str::slug('Laravel 5 Framework', '-');
        $item->save();

		return redirect()->route('banner.get');
        
    }

    /**
	 * 
	 */
	public function postSavebanner(Request $request) 
	{
		$validatedData = $request->validate([
			'banner_name' => 'required'			
		]);

		$data= array();
		$data['name'] = $request ->banner_name;
		// dd($request ->category_banner_name);
        $data['imgmain'] = $request ->banner_image_main;
		$data['imgextra'] = $request ->banner_image_extra;
		$data['text1'] = $request ->banner_text1;
		$data['text2'] = $request ->banner_text2;
		$data['button'] = $request ->banner_button;
		$data['slug'] = Str::slug($request ->banner_name, '-');
		$data['status'] = $request ->banner_status;
		// dd($data);
		$slug = Str::slug('Laravel 5 Framework', '-');
		DB::table('banner')->insert($data);
		Session::put('message','Thêm danh mục sản phẩm thành công');

		return redirect()->route('banner.get');
		
	}

    public function getDeletebanner($id){
		DB::table('banner')
		->where('id',$id)
		->delete();
		
		return redirect()->route('banner.get');
    }

	public function getUnactivebanner($id){

		DB::table('banner')
		->where('id',$id)
		->update(['status'=>1]);
		
		return redirect()->route('banner.get');
	}

	public function getActivebanner($id){

		DB::table('banner')
		->where('id',$id)
		->update(['status'=>0]);
		
		return redirect()->route('banner.get');
	}
}


