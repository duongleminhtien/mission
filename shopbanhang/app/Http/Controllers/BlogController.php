<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Barryvdh\Debugbar\Controllers\BaseController;
use Category\Repositories\CategoryRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Post\Http\Requests\PostCreateRequest;
use Post\Http\Requests\PostEditRequest;
use Post\Repositories\PostRepository;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use App\Models\Blog;
use App\Models\BlogCategory;



class BlogController extends Controller
{
    //

    /**
	 * 
	 */
	public function getBlog() 
	{
		$blog = DB::table('blog')->orderBy('id', 'desc')->get();
		return view('master-header::admin.blog.blog',compact('blog'));
	}

	/**
	 * 
	 */
	public function getCreateblog() 
	{
		$all_category_blog = DB::table('blog')->orderBy('id', 'asc')->get();
		$blogcategory = DB::table('blogcategory')->orderBy('id', 'asc')->get();
		$slug = Str::slug('Laravel 5 Framework', '-');
		return view('master-header::admin.blog.createblog',compact('all_category_blog','blogcategory'));
	}

	 /**
	 * 
	 */
	public function postSaveblog(Request $request) 
	{
		
		$validatedData = $request->validate([
			'blog_title' => 'required',
			'blog_content'=> 'required',			
		]);
		// dd($validatedData);
		$data= array();
		$data['title'] = $request ->blog_title;
		$data['thumbnail'] = $request ->blog_thumbnail;
		// dd($request ->name);
		$data['category_id'] = $request ->blog_category_id;
		$data['slug'] = Str::slug($request ->blog_title, '-');
		$data['desc'] = $request ->blog_desc;
		$data['tags'] = $request ->blog_tags;
		$data['status'] = $request ->blog_status;
		$data['content'] = $request ->blog_content;
		$data['post_type'] = $request ->post_type;
		$data['lang_code'] = $request ->lang_code;
		//  dd($data);
		$slug = Str::slug('Laravel 5 Framework', '-');
		DB::table('blog')->insert($data);
		Session::put('message','Thêm danh mục sản phẩm thành công');



		return redirect()->route('blog.get');
	}
	
    /**
	 * 
	 */
	public function getDirectory() 
	{
		return view('master-header::blog.directory');
	}

    /**
	 * 
	 */
	public function getEditblog($id) 
	{
		
		$data = Blog::findOrFail($id);
		// dd($data);
        // điều hướng đến view edit user và truyền sang dữ liệu về user muốn sửa đổi
		$blogcategory = DB::table('blogcategory')->orderBy('id', 'asc')->get();
		$all_category_blog = DB::table('blog')->orderBy('id', 'asc')->get();
        
		return view('master-header::admin.blog.editblog', compact('data','all_category_blog','blogcategory'));
	}

    public function postEditblog(Request $request, $id){
        // Tìm đến đối tượng muốn update
        $item = Blog::findOrFail($id); 
        $item->title = $request->title; 
		$item->thumbnail = $request->thumbnail; 
		$item->category_id = $request->category_id; 
		$item->slug = Str::slug($request ->title, '-');  
		$item->desc = $request->desc; 
		$item->tags = $request->tags; 
		$item->status = $request->status;
        
		$slug = Str::slug('Laravel 5 Framework', '-');
        $item->save();

		return redirect()->route('blog.get');
        
    }

    public function getDeleteblog($id){
		DB::table('blog')
		->where('id',$id)
		->delete();
		
		return redirect()->route('blog.get');
    }

	public function getUnactiveblog($id){

		DB::table('blog')
		->where('id',$id)
		->update(['status'=>1]);
		
		return redirect()->route('blog.get');
	}

	public function getActiveblog($id){

		DB::table('blog')
		->where('id',$id)
		->update(['status'=>0]);
		
		return redirect()->route('blog.get');
	}

	//Danh Mục

	/**
	 * 
	 */
	public function getBlogcategory() 
	{
		$blogcategory = DB::table('blogcategory')->orderBy('id', 'asc')->get();
		// $manager_category_product = view('master-header::admin.allcategory')->('all_category_product',$all_category_product);
		// return view('admincp')->with('master-header::admin.allcategory',$manager_category_product);
		return view('master-header::admin.blog.blogcategory',compact('blogcategory'));
	}

    public function getCreateblogcategory() 
	{
		$slug = Str::slug('Laravel 5 Framework', '-');
		return view('master-header::admin.blog.createblogcategory');
	}

    /**
	 * 
	 */
	public function getEditblogcategory($id) 
	{
		
		$data = Blog::findOrFail($id);
		// dd($data);
        // điều hướng đến view edit user và truyền sang dữ liệu về user muốn sửa đổi
        
		return view('master-header::admin.blogcategory.editblogcategory', compact('data'));
	}

    public function postEditblogcategory(Request $request, $id){
        // Tìm đến đối tượng muốn update
        $item = Blog::findOrFail($id); 
        $item->name = $request->name; 
		$item->slug = Str::slug($request ->name, '-');  
		$item->status = $request->status;
        
		$slug = Str::slug('Laravel 5 Framework', '-');
        $item->save();

		return redirect()->route('blogcategory.get');
        
    }

    /**
	 * 
	 */
	public function postSaveblogcategory(Request $request) 
	{
		$validatedData = $request->validate([
			'blogcategory_category' => 'required'			
		]);

		$data= array();
		$data['category'] = $request ->blogcategory_category;
		// dd($request ->category_blogcategory_name);
		$data['slug'] = Str::slug($request ->blogcategory_category, '-');
		$data['status'] = $request ->blogcategory_status;
		// dd($data);
		$slug = Str::slug('Laravel 5 Framework', '-');
		DB::table('blogcategory')->insert($data);
		Session::put('message','Thêm danh mục sản phẩm thành công');

		return redirect()->route('blogcategory.get');
		
	}

    public function getDeleteblogcategory($id){
		DB::table('blogcategory')
		->where('id',$id)
		->delete();
		
		return redirect()->route('blogcategory.get');
    }

	public function getUnactiveblogcategory($id){

		DB::table('blogcategory')
		->where('id',$id)
		->update(['status'=>1]);
		
		return redirect()->route('blogcategory.get');
	}

	public function getActiveblogcategory($id){

		DB::table('blogcategory')
		->where('id',$id)
		->update(['status'=>0]);
		
		return redirect()->route('blogcategory.get');
	}

	//Thẻ

	/**
	 * 
	 */
	public function getBlogtags() 
	{
		$blogtags = DB::table('blogtags')->orderBy('id', 'desc')->get();
		return view('master-header::admin.blogtags.blogtags',compact('blogtags'));
	}

	/**
	 * 
	 */
	public function getCreateblogtags() 
	{
		$all_category_blogtags = DB::table('blogtags')->orderBy('id', 'asc')->get();
		$blogtagscategory = DB::table('blogtagscategory')->orderBy('id', 'asc')->get();
		$slug = Str::slug('Laravel 5 Framework', '-');
		return view('master-header::admin.blogtags.createblogtags',compact('all_category_blogtags','blogtagscategory'));
	}

	 /**
	 * 
	 */
	public function postSaveblogtags(Request $request) 
	{
		
		$validatedData = $request->validate([
			'blogtags_title' => 'required',
			'blogtags_content'=> 'required',			
		]);
		// dd($validatedData);
		$data= array();
		$data['title'] = $request ->blogtags_title;
		$data['thumbnail'] = $request ->blogtags_thumbnail;
		// dd($request ->name);
		$data['category_id'] = $request ->blogtags_category_id;
		$data['slug'] = Str::slug($request ->blogtags_title, '-');
		$data['desc'] = $request ->blogtags_desc;
		$data['tags'] = $request ->blogtags_tags;
		$data['status'] = $request ->blogtags_status;
		$data['content'] = $request ->blogtags_content;
		$data['post_type'] = $request ->post_type;
		$data['lang_code'] = $request ->lang_code;
		//  dd($data);
		$slug = Str::slug('Laravel 5 Framework', '-');
		DB::table('blogtags')->insert($data);
		Session::put('message','Thêm danh mục sản phẩm thành công');



		return redirect()->route('blogtags.get');
	}
	
    // /**
	//  * 
	//  */
	// public function getDirectory() 
	// {
	// 	return view('master-header::blogtags.directory');
	// }

    /**
	 * 
	 */
	public function getEditblogtags($id) 
	{
		
		$data = Blogtags::findOrFail($id);
		// dd($data);
        // điều hướng đến view edit user và truyền sang dữ liệu về user muốn sửa đổi
		$blogtagscategory = DB::table('blogtagscategory')->orderBy('id', 'asc')->get();
		$all_category_blogtags = DB::table('blogtags')->orderBy('id', 'asc')->get();
        
		return view('master-header::admin.blogtags.editblogtags', compact('data','all_category_blogtags','blogtagscategory'));
	}

    public function postEditblogtags(Request $request, $id){
        // Tìm đến đối tượng muốn update
        $item = Blogtags::findOrFail($id); 
        $item->title = $request->title; 
		$item->thumbnail = $request->thumbnail; 
		$item->category_id = $request->category_id; 
		$item->slug = Str::slug($request ->title, '-');  
		$item->desc = $request->desc; 
		$item->tags = $request->tags; 
		$item->status = $request->status;
        
		$slug = Str::slug('Laravel 5 Framework', '-');
        $item->save();

		return redirect()->route('blogtags.get');
        
    }

    public function getDeleteblogtags($id){
		DB::table('blogtags')
		->where('id',$id)
		->delete();
		
		return redirect()->route('blogtags.get');
    }

	public function getUnactiveblogtags($id){

		DB::table('blogtags')
		->where('id',$id)
		->update(['status'=>1]);
		
		return redirect()->route('blogtags.get');
	}

	public function getActiveblogtags($id){

		DB::table('blogtags')
		->where('id',$id)
		->update(['status'=>0]);
		
		return redirect()->route('blogtags.get');
	}

}

// /**
	//  * 
	//  */
	// public function postCreateblog(Request $request) 
	// {
		
	// 	$validatedData = $request->validate([
	// 		'title' => 'required',
	// 		'content'=> 'required',			
	// 	]);
	// 	// dd($validatedData);
	// 	$data= array();
	// 	$data['title'] = $request ->title;
	// 	$data['thumbnail'] = $request ->thumbnail;
	// 	// dd($request ->name);
	// 	$data['category_id'] = $request ->category_id;
	// 	$data['slug'] = Str::slug($request ->title, '-');
	// 	$data['desc'] = $request ->desc;
	// 	$data['tags'] = $request ->tags;
	// 	$data['count_view'] = $request ->count_view;
	// 	$data['user_post'] = $request ->user_post;
	// 	$data['status'] = $request ->status;
	// 	$data['address'] = $request ->address;
	// 	$data['price_value'] = $request ->price_value;
	// 	$data['end_date'] = $request ->end_date;
	// 	$data['content'] = $request ->content;
	// 	$data['meta_desc'] = $request ->meta_desc;
	// 	$data['meta_title'] = $request ->meta_title;
	// 	$data['meta_keyword'] = $request ->meta_keyword;
	// 	$data['display'] = $request ->display;
	// 	$data['user_edit'] = $request ->user_edit;
	// 	$data['post_type'] = $request ->post_type;
	// 	$data['lang_code'] = $request ->lang_code;
	// 	//  dd($data);
	// 	$slug = Str::slug('Laravel 5 Framework', '-');
	// 	DB::table('blog')->insert($data);
	// 	Session::put('message','Thêm danh mục sản phẩm thành công');



	// 	return redirect()->route('blog.get');
		// }