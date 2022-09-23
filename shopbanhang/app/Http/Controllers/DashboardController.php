<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Schema;
use App\Models\User;
use App\Models\Brand;
use App\Models\Banner;
use App\Models\Products;
use App\Models\CategoryProduct;


class DashboardController extends Controller
{
	/**
	 * 
	 */
	public function getWelcome() 
	{

		return view('welcome');
	}

	/**
	 * 
	 */
	public function getCategory() 
	{

		return view('category');
	}

    /**
	 * 
	 */
	public function getContent() 
	{
		return view('master-header::partial.content');
	}

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

    /**
	 * 
	 */
	public function getIndex() 
	{
		return view('master-header::partial.index');
	}

    /**
	 * 
	 */
	public function getEdit() 
	{
		return view('master-header::partial.edit');
	}

    /**
	 * 
	 */
	public function getCreate() 
	{
		return view('master-header::partial.create');
	}

	/**
	 * 
	 */
	public function getGeneralElements() 
	{
		return view('master-header::partial.generalelements');
	}

 	
	 
 	public function getDashboard() 
 	{
		$all_category_product = DB::table('tbl_category_product')->orderBy('id', 'desc')->get();
		$brand = DB::table('brand')->orderBy('id', 'asc')->get();
		$banner = Banner::all();
		$products = DB::table('products')->orderBy('id', 'desc')->paginate(9);
		 //dd($banner);
		// return view('master-header::partial.dashboard',['banner'=>$banner]);
 		return view('master-header::partial.dashboard',compact('brand','banner','all_category_product','products'));
 	}
//CATEGORY
	
	public function getKids() 
	{
		$products = DB::table('products')->orderBy('id', 'desc')->paginate(9);
		$all_category_product = DB::table('tbl_category_product')->orderBy('id', 'desc')->get();
		$brand = DB::table('brand')->orderBy('id', 'asc')->get();
		$banner = Banner::all();
		// $kids = DB::table('kids')->orderBy('id', 'asc')->get();
		return view('master-header::partial.category.kids',compact('brand','banner','all_category_product','products'));
	}
	public function getFashion() 
	{
		$products = DB::table('products')->orderBy('id', 'desc')->paginate(9);
		$all_category_product = DB::table('tbl_category_product')->orderBy('id', 'desc')->get();
		$brand = DB::table('brand')->orderBy('id', 'asc')->get();
		$banner = Banner::all();
		$fashion = DB::table('fashion')->orderBy('id', 'asc')->get();
		return view('master-header::partial.category.fashion',compact('fashion','brand','banner','all_category_product','products'));
	}
	public function getHouseholds() 
	{
		$products = DB::table('products')->orderBy('id', 'desc')->paginate(9);
		$all_category_product = DB::table('tbl_category_product')->orderBy('id', 'desc')->get();
		$brand = DB::table('brand')->orderBy('id', 'asc')->get();
		$banner = Banner::all();
		$households = DB::table('households')->orderBy('id', 'asc')->get();
		return view('master-header::partial.category.households',compact('households','brand','banner','all_category_product','products'));
	}
	public function getInteriors() 
	{
		$products = DB::table('products')->orderBy('id', 'desc')->paginate(9);
		$all_category_product = DB::table('tbl_category_product')->orderBy('id', 'desc')->get();
		$brand = DB::table('brand')->orderBy('id', 'asc')->get();
		$banner = Banner::all();
		$interiors = DB::table('interiors')->orderBy('id', 'asc')->get();
		return view('master-header::partial.category.interiors',compact('interiors','brand','banner','all_category_product','products'));
	}
	public function getClothing() 
	{
		$products = DB::table('products')->orderBy('id', 'desc')->paginate(9);
		$all_category_product = DB::table('tbl_category_product')->orderBy('id', 'desc')->get();
		$brand = DB::table('brand')->orderBy('id', 'asc')->get();
		$banner = Banner::all();
		$clothing = DB::table('clothing')->orderBy('id', 'asc')->get();
		return view('master-header::partial.category.clothing',compact('clothing','brand','banner','all_category_product','products'));
	}
	public function getBags() 
	{
		$products = DB::table('products')->orderBy('id', 'desc')->paginate(9);
		$all_category_product = DB::table('tbl_category_product')->orderBy('id', 'desc')->get();
		$brand = DB::table('brand')->orderBy('id', 'asc')->get();
		$banner = Banner::all();
		$bags = DB::table('bags')->orderBy('id', 'asc')->get();
		return view('master-header::partial.category.bags',compact('bags','brand','banner','all_category_product','products'));
	}
	public function getShoes() 
	{
		$products = DB::table('products')->orderBy('id', 'desc')->paginate(9);
		$all_category_product = DB::table('tbl_category_product')->orderBy('id', 'desc')->get();
		$brand = DB::table('brand')->orderBy('id', 'asc')->get();
		$banner = Banner::all();
		$shoes = DB::table('shoes')->orderBy('id', 'asc')->get();
		return view('master-header::partial.category.shoes',compact('shoes','brand','banner','all_category_product','products'));
	}
	public function getQuatmay() 
	{
		$products = DB::table('products')->orderBy('id', 'desc')->paginate(9);
		$all_category_product = DB::table('tbl_category_product')->orderBy('id', 'desc')->get();
		$brand = DB::table('brand')->orderBy('id', 'asc')->get();
		$banner = Banner::all();
		$quatmay = DB::table('quat-may')->orderBy('id', 'asc')->get();
		return view('master-header::partial.category.quat-may',compact('quat-may','brand','banner','all_category_product','products'));
	}
	public function getBanhkeo() 
	{
		$products = DB::table('products')->orderBy('id', 'desc')->paginate(9);
		$all_category_product = DB::table('tbl_category_product')->orderBy('id', 'desc')->get();
		$brand = DB::table('brand')->orderBy('id', 'asc')->get();
		$banner = Banner::all();
		$banhkeo = DB::table('banh-keo')->orderBy('id', 'asc')->get();
		return view('master-header::partial.category.banh-keo',compact('banh-keo','brand','banner','all_category_product','products'));
	}
//BANNER
	public function getBrandmt() 
 	{
		$brand = DB::table('brand')->orderBy('id', 'asc')->get();
 		return view('master-header::partial.brandfe.brandmt',compact('brand'));
 	}

	 public function getBanner() 
 	{
		$banner = DB::table('banner')->orderBy('id', 'asc')->get();
 		return view('master-header::partial.banner.banner',compact('banner'));
 	}

	 public function getAddbanner() 
 	{
		$banner = DB::table('banner')->orderBy('id', 'asc')->get();
 		return view('master-header::partial.banner.addbanner',compact('banner'));
 	}
//
 	
 }