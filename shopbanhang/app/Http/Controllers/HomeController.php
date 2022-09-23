<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Schema;
use App\Models\AdminUser;


class HomeController extends Controller
{
    /**
	 * 
	 */
	public function getAdmincp() 
	{

		return view('master-header::admin.admincp');
	}

	/**
	 * 
	 */
	public function postAdmincp(Request $request) 
	{
		$admin_mail = $request->admin_mail;
		$admin_password = $request->admin_password;
		$result = DB::table('tbl_admin')->where('admin_mail','=',$admin_mail)->where('admin_password','=',$admin_password)->get();
		//$user = DB::table('users')->where('email','=',$email)->where('password','=',$password)->get();
		//if(Auth::attempt(['email'=>$email,'password'=>$password])){
			//  redirect ('dashboard.get');
		// 	return redirect()->route('admincp.get');
		// }
		// else 
		// {
		// 	dd('loged in fail');
		// }
		
	}

	/**
	 * 
	 */
	public function getLogincp() 
	{

		return view('master-header::admin.logincp');
	}

	/**
	 * 
	 */
	public function postLogincp(Request $request) 
	{
		$admin_mail = $request->admin_mail;
		$admin_password = $request->admin_password;
		$user = DB::table('tbl_admin')
		->where('admin_mail','=',$admin_mail)
		->where('admin_password','=',$admin_password)->get();

		if($user && $user != null){
			//  redirect ('dashboard.get');
			return redirect()->route('admincp.get');
		}
		else 
		{
			dd('loged in fail');
		}
		
	}

	/**
	 * 
	 */
	public function getRegistercp() 
	{

		return view('master-header::admin.registercp');
	}

	/**
	 * 
	 */
	public function postRegistercp(Request $request) 
	{
		// dd($request->all());
		$admin_mail = $request->admin_mail;
		$admin_password = $request->admin_password;
		$admin_name = $request->admin_name;
		$admin_phone = $request->admin_phone;
		

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
			'admin_mail'=>$admin_mail,
			'admin_phone'=>$admin_phone,
			'admin_name'=>$admin_name,
			'admin_password'=>Hash::make($admin_password)
				// dd(Hash::make('123456'));
			
		];
		// $request->all()
		AdminUser::create($data);
		return redirect()->route('logincp.get');
		
	}

	/**
	 * 
	 */
	public function getContentadmin() 
	{
		return view('master-header::admin.contentadmin');
	}

	/**
	 * 
	 */
	public function getCustomer() 
	{
		$customer = DB::table('users')->get();
		// $manager_category_product = view('master-header::admin.customer')->('all_category_product',$all_category_product);
		// return view('admincp')->with('master-header::admin.customer',$manager_category_product);
		return view('master-header::admin.customer',compact('customer'));
	}

	/**
	 * 
	 */
	public function getListadmin() 
	{
		$listadmin = DB::table('tbl_admin')->get();
		// $manager_category_product = view('master-header::admin.listadmin')->('all_category_product',$all_category_product);
		// return view('admincp')->with('master-header::admin.listadmin',$manager_category_product);
		return view('master-header::admin.listadmin',compact('listadmin'));
	}

	/**
	 * 
	 */
	public function getEditadmin() 
	{

		return view('master-header::admin.editadmin');
	}

	public function postEditadmin(Request $request, $id){
        // Tìm đến đối tượng muốn update
        $item = User::findOrFail($id);
        $item->username = $request->username;   
		$item->email = $request->email;
		$item->password = $request->password;
        
        $item->save();
        
    }

	public function getDeleteadmin($id){
        // return view('delete');
        // $item = User::findOrFail($id);

        // $item->delete();
        // echo"success delete item";

		DB::table('tbl_admin')
		->where('id',$id)
		->delete();
		
		return redirect()->route('admin.get');
    }

	/**
	 * 
	 */
	public function postSaveadmin(Request $request) 
	{
		$data= array();
		$data['admin_name'] = $request ->admin_name;
		// dd($request ->category_product_name);
		$data['admin_email'] = $request ->admin_email;
		$data['admin_password'] = $request ->admin_password;
		
		
		DB::table('tbl_admin')->insert($data);
		

		return redirect()->route('editadmin.get');
		
	}

	/**
	 * 
	 */
	public function getEditcustomer() 
	{

		return view('master-header::admin.editcustomer');
	}

	public function postEditcustomer(Request $request, $id){
        // Tìm đến đối tượng muốn update
        $item = User::findOrFail($id);
        $item->username = $request->username;   
		$item->email = $request->email;
		$item->password = $request->password;
        
        $item->save();
        
    }

	public function getDeletecustomer($id){
        // return view('delete');
        // $item = User::findOrFail($id);

        // $item->delete();
        // echo"success delete item";

		DB::table('users')
		->where('id',$id)
		->delete();
		
		return redirect()->route('customer.get');
    }

	/**
	 * 
	 */
	public function postSavecustomer(Request $request) 
	{
		$data= array();
		$data['username'] = $request ->username;
		// dd($request ->category_product_name);
		$data['email'] = $request ->email;
		$data['password'] = $request ->password;
		
		
		DB::table('users')->insert($data);
		

		return redirect()->route('editcustomer.get');
		
	}

}
