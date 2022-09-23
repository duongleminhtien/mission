<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Schema;
use App\Models\User;


// Thêm thư viện để mã hóa password


class UserController extends Controller
{ 
	/**
	 * 
	 */
	public function getIndex() 
	{
		
        $list = User::all();

		return view('user.index',compact('list'));
	}
	
    public function getCreate(){
        return view('user.create');
    }

    public function postCreate(Request $request){
        $email = $request->email;
		$password = $request->password;
		$name = $request->name;
        $data = [
			'email'=>$email,
			'password'=>Hash::make($password),
			'name'=>$name
		];
		User::create($data);
        echo"success create user";

    }

	public function postStore(Request $request) {
        // Kiểm tra xem dữ liệu từ client gửi lên bao gốm những gì
        // dd($request);

        // gán dữ liệu gửi lên vào biến data
        // $data = $request->all();
        // dd($data);
        // mã hóa password trước khi đẩy lên DB
        // $data['password'] = Hash::make($request->password);

        // Tạo mới user với các dữ liệu tương ứng với dữ liệu được gán trong $data
        // User::create($data);
        $email = $request->email;
		$password = $request->password;
		$name = $request->name;
        $data = [
			'email'=>$email,
			'password'=>Hash::make($password),
			'name'=>$name
		];
		User::create($data);
        echo"success create user";

    }
    public function getEdit($id){
        // Tìm đến đối tượng muốn update
        $user = User::findOrFail($id);

        // điều hướng đến view edit user và truyền sang dữ liệu về user muốn sửa đổi
        return view('user.edit', compact('user'));
    }

    public function postEdit(Request $request, $id){
        // Tìm đến đối tượng muốn update
        $user = User::findOrFail($id);
        $user->email = $request->email;   
		$user->password = $request->password;
		$user->name = $request->name;
        
        $user->save();
        echo"success update user";
    }

    public function getDelete($id){
        // return view('delete');
        $user = User::findOrFail($id);

        $user->delete();
        echo"success delete user";
    }

    public function postDelete($id){
        // Tìm đến đối tượng muốn xóa
        $user = User::findOrFail($id);

        $user->delete();
        echo"success delete user";
    }

}






