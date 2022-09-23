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

class AdminController extends Controller
{ 
	/**
	 * 
	 */
	public function getLogin() 
	{
		

		return view('master-header::pages.login');
	}
	
	/**
	 * 
	 */
	public function getShowdashboard() 
	{
		
		return view('master-header::pages.admin_layout');
	}

	/**
	 * 
	 */
	public function getCart() 
	{
		$all_category_product = DB::table('tbl_category_product')->orderBy('id', 'desc')->get();
		$brand = DB::table('brand')->orderBy('id', 'asc')->get();
		$banner = Banner::all();
		$products = DB::table('products')->orderBy('id', 'desc')->paginate(9);
		return view('master-header::pages.cart',compact('brand','banner','all_category_product','products'));
	}

	/**
	 * 
	 */
	public function getAccount() 
	{
		$all_category_product = DB::table('tbl_category_product')->orderBy('id', 'desc')->get();
		$brand = DB::table('brand')->orderBy('id', 'asc')->get();
		$banner = Banner::all();
		$products = DB::table('products')->orderBy('id', 'desc')->paginate(9);
		return view('master-header::pages.account',compact('brand','banner','all_category_product','products'));
	}

	/**
	 * 
	 */
	public function getCheckout() 
	{
		
		return view('master-header::pages.checkout');
	}

	/**
	 * 
	 */
	public function getWishlist() 
	{
		
		return view('master-header::pages.wishlist');
	}
	
	/**
	 * 
	 */
	public function getDashboard() 
	{
		return view('master-header::partial.dashboard');
	}

	/**
	 * 
	 */
	public function getProductdetails() 
	{
		$all_category_product = DB::table('tbl_category_product')->orderBy('id', 'desc')->get();
		$brand = DB::table('brand')->orderBy('id', 'asc')->get();
		$banner = Banner::all();
		$products = DB::table('products')->orderBy('id', 'desc')->paginate(1);
		return view('master-header::pages.product-details',compact('brand','banner','all_category_product','products'));
	}

	/**
	 * 
	 */
	public function getProduct() 
	{
		return view('master-header::pages.product');
	}

	/**
	 * 
	 */
	public function getRegister() 
	{

		return view('master-header::pages.register');
	}

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
	public function postRegister(Request $request) 
	{
		
		$email = $request->email;
		$password = $request->password;
		$name = $request->name;
		// if($request->isMethod('post'))
		// {
		// 	$validator = Validator::make($request->all(),
		// 	[
		// 		'username'=>'required',
		// 		'email'=>'required|email',
		// 		'password'=>'required'
		// 	]);
		// if ($validator->fails())
		// {
		// 	return redirect()->route('register.get')
		// 		->withErrors($validator)
		// 		->withInput();
		// }	
		$data = [
			'email'=>$email,
			'password'=>Hash::make($password),
				// dd(Hash::make('123456'));
			'name'=>$name
		];
		User::create($data);
		header("Location: /login.html");
		
	}

	/**
	 * 
	 */
	public function postLogin (Request $request)
	{
		$email = $request->email;
		$password = $request->password;
		$user = DB::table('users')
		->where('email','=',$email)
		->where('password','=',$password)->get();

		if($user && $user != null){
			//  redirect ('dashboard.get');
			return redirect()->route('dashboard.get');
		}
		else 
		{
			dd('loged in fail');
		}

		// $email = $request->email;
		// $password = $request->password;
		// //$user = DB::table('users')->where('email','=',$email)->where('password','=',$password)->get();
		// if(Auth::attempt(['email'=>$email,'password'=>$password])){
		// 	//  redirect ('dashboard.get');
		// 	return redirect()->route('dashboard.get');
		// }
		// else 
		// {
		// 	dd('loged in fail');
		// }
	}

	/**
	 * 
	 */
	public function getLogout() 
	{
		Auth::logout('logout');
		return view('pages.logout');
	}

	/**
	 * 
	 */
	public function getCalendar() 
	{
		return view('calendar');
	}

	/**
	 * 
	 */
	public function getChat() 
	{
		return view('chat');
	}
}
