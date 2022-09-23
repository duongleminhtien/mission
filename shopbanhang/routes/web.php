<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'DashboardController@getDashboard') ->name('dashboard.get');

//AdminController
Route::get('shop','AdminController@getShop')->name('shop.get');
Route::post('shop','AdminController@postShop')->name('shop.post');
Route::get('product-details/{slug}','AdminController@getProductdetails')->name('product-details.get');
Route::post('product-details/{slug}','AdminController@postProductdetails')->name('product-details.post');
Route::get('product','AdminController@getProduct')->name('product.get');
Route::post('product','AdminController@postProduct')->name('product.post');
Route::get('shop.html','AdminController@getProduct')->name('product.get');
Route::post('shop.html','AdminController@postProduct')->name('product.post');
Route::get('checkout.html','AdminController@getCheckout')->name('checkout.get');
Route::post('checkout.html','AdminController@postCheckout')->name('checkout.post');
Route::get('cart.html','AdminController@getCart')->name('cart.get');
Route::post('cart.html','AdminController@postCart')->name('cart.post');
Route::get('login.html','AdminController@getLogin')->name('login.get');
Route::post('login.html','AdminController@postLogin')->name('login.post');
Route::get('account','AdminController@getAccount')->name('account.get');
Route::post('account','AdminController@postAccount')->name('account.post');
Route::get('wishlist','AdminController@getWishlist')->name('wishlist.get');
Route::post('wishlist','AdminController@postWishlist')->name('wishlist.post');

Route::get('logout','AdminController@getLogout')->name('logout.get');
Route::get('register','AdminController@getRegister')->name('register.get');
Route::post('register','AdminController@postRegister')->name('register.post');
Route::get('showdashboard','AdminController@getShowdashboard')->name('showdashboard.get');

//DashboardController
Route::get('welcome','DashboardController@getWelcome')->name('welcome.get');
Route::get('category','DashboardController@getCategory')->name('category.get');
Route::get('dashboard','DashboardController@getDashboard')->name('dashboard.get');
Route::post('dashboard','DashboardController@postDashboard')->name('dashboard.post');

//HomeController
Route::get('admincp','HomeController@getAdmincp')->name('admincp.get');
Route::post('admincp','HomeController@postAdmincp')->name('admincp.post');
Route::get('registercp','HomeController@getRegistercp')->name('registercp.get');
Route::post('registercp','HomeController@postRegistercp')->name('registercp.post');
Route::get('logincp','HomeController@getLogincp')->name('logincp.get');
Route::post('logincp','HomeController@postLogincp')->name('logincp.post');
Route::get('admincp/user','HomeController@getuser')->name('user.get');
Route::post('admincp/user','HomeController@postuser')->name('user.post');
Route::get('admincp/product','HomeController@getProduct')->name('product.get');
Route::post('admincp/product','HomeController@postProduct')->name('product.post');
Route::get('contentadmin','HomeController@getContentadmin')->name('contentadmin.get');
Route::post('contentadmin','HomeController@postContentadmin')->name('contentadmin.post');
Route::get('logoutcp','HomeController@getLogoutcp')->name('logoutcp.get');
Route::post('logoutcp','HomeController@postLogoutcp')->name('logoutcp.post');
Route::get('customer','HomeController@getCustomer')->name('customer.get');
Route::post('customer','HomeController@postCustomer')->name('customer.post');
Route::get('editcustomer/{id}','HomeController@getEditcustomer')->name('editcustomer.get');
Route::post('editcustomer/{id}','HomeController@postEditcustomer')->name('editcustomer.post');
Route::get('deletecustomer/{id}','HomeController@getDeletecustomer')->name('deletecustomer.get');
Route::get('listadmin','HomeController@getListadmin')->name('listadmin.get');
Route::post('listadmin','HomeController@postListadmin')->name('listadmin.post');
Route::post('savecustomer','HomeController@postSavecustomer')->name('savecustomer.post');
Route::get('savecustomer','HomeController@getSavecustomer')->name('savecustomer.get');
Route::get('editadmin/{id}','HomeController@getEditadmin')->name('editadmin.get');
Route::post('editadmin/{id}','HomeController@postEditadmin')->name('editadmin.post');
Route::get('deleteadmin/{id}','HomeController@getDeleteadmin')->name('deleteadmin.get');
Route::post('saveadmin','HomeController@postSaveadmin')->name('saveadmin.post');
Route::get('saveadmin','HomeController@getSaveadmin')->name('saveadmin.get');



//UserController
Route::get('index','UserController@getIndex')->name('user.index.get');
Route::post('index','UserController@postIndex')->name('user.index.post');
//Create user
Route::get('create', 'UserController@getCreate')->name('user.create.get');
Route::post('create', 'UserController@postCreate')->name('user.create.post');
// Update user
// Nhớ là phải truyền thêm id để biết được đối tượng muốn sửa nhé
Route::get('user-edit/{id}', 'UserController@getEdit')->name('user.edit.get');
Route::post('user-edit/{id}', 'UserController@postEdit')->name('user.edit.post');
// Delete user
Route::get('delete/{id}', 'UserController@getDelete')->name('delete.get');
Route::post('delete/{id}', 'UserController@postDelete')->name('delete.post');

//CategoryProductController
Route::get('addcategory','CategoryProductController@getAddcategory')->name('addcategory.get');
Route::post('addcategory','CategoryProductController@postAddcategory')->name('addcategory.post');
Route::get('allcategory','CategoryProductController@getAllcategory')->name('allcategory.get');
Route::post('allcategory','CategoryProductController@postAllcategory')->name('allcategory.post');
Route::get('editcategory/{id}','CategoryProductController@getEditcategory')->name('editcategory.get');
Route::post('editcategory/{id}','CategoryProductController@postEditcategory')->name('editcategory.post');
Route::get('deletecategory/{id}','CategoryProductController@getDeletecategory')->name('deletecategory.get');
    //sanpham
Route::get('sanpham','CategoryProductController@getSanpham')->name('sanpham.get');
Route::post('sanpham','CategoryProductController@postSanpham')->name('sanpham.post');
Route::get('themsanpham','CategoryProductController@getThemsanpham')->name('themsanpham.get');
Route::post('themsanpham','CategoryProductController@postThemsanpham')->name('themsanpham.post');
Route::get('suasanpham/{id}','CategoryProductController@getSuasanpham')->name('suasanpham.get');
Route::post('suasanpham/{id}','CategoryProductController@postSuasanpham')->name('suasanpham.post');

Route::post('upload', function (Request $request) {
    // Kiểm tra xem người dùng có upload file nên không
    // if (!$request->hasFile('image')) {
    //     // Nếu không thì in ra thông báo
    //     return "Mời chọn file cần upload";
    // }
    // Nếu có thì thục hiện lưu trữ file vào public/images
})->name('upload.handle');

Route::post('save_category_product','CategoryProductController@postSavecategoryproduct')->name('savecategoryproduct.post');
Route::post('store','CategoryProductController@postStore')->name('store.post');
    //luu san pham
Route::post('luusanpham','CategoryProductController@postLuusanpham')->name('luusanpham.post');

Route::get('item-create', 'CategoryProductController@getCreate')->name('item.create.get');
Route::post('create', 'CategoryProductController@postCreate')->name('item.create.post');
     // Update item
    // Nhớ là phải truyền thêm id để biết được đối tượng muốn sửa nhé
Route::get('item-edit/{id}', 'CategoryProductController@getEdit')->name('item.edit.get');
Route::post('item-edit/{id}', 'CategoryProductController@postEdit')->name('item.edit.post');
    // Delete item
    // Route::get('delete/{id}', 'CategoryProductController@getDelete')->name('delete.get');
    // Route::post('delete/{id}', 'CategoryProductController@postDelete')->name('delete.post');

Route::get('/unactive-category-product/{id}','CategoryProductController@getUnactivecategoryproduct')->name('unactive_category_product.get');
Route::get('/active-category-product/{id}','CategoryProductController@getActivecategoryproduct')->name('active_category_product.get');

    //an/hien
Route::get('/an/{id}','CategoryProductController@getAn')->name('an.get');
Route::get('/hien-thi/{id}','CategoryProductController@getHienthi')->name('hienthi.get');

//BrandController
Route::get('brand','BrandController@getBrand')->name('brand.get');
Route::post('brand','BrandController@postBrand')->name('brand.post');
Route::get('addbrand','BrandController@getAddbrand')->name('addbrand.get');
Route::post('addbrand','BrandController@postAddbrand')->name('addbrand.post');
Route::get('editbrand/{id}','BrandController@getEditbrand')->name('editbrand.get');
Route::post('editbrand/{id}','BrandController@postEditbrand')->name('editbrand.post');
Route::get('deletebrand/{id}','BrandController@getDeletebrand')->name('deletebrand.get');
Route::get('/unactive-brand/{id}','BrandController@getUnactivebrand')->name('unactivebrand.get');
Route::get('/active-brand/{id}','BrandController@getActivebrand')->name('activebrand.get');
Route::post('savebrand','BrandController@postSavebrand')->name('savebrand.post');

//ProductsController
Route::get('products','ProductsController@getProducts')->name('products.get');
Route::post('products','ProductsController@postProducts')->name('products.post');
Route::get('addproducts','ProductsController@getAddproducts')->name('addproducts.get');
Route::post('addproducts','ProductsController@postAddproducts')->name('addproducts.post');
Route::get('editproducts/{id}','ProductsController@getEditproducts')->name('editproducts.get');
Route::post('editproducts/{id}','ProductsController@postEditproducts')->name('editproducts.post');
Route::get('deleteproducts/{id}','ProductsController@getDeleteproducts')->name('deleteproducts.get');
Route::get('/unactive-products/{id}','ProductsController@getUnactiveproducts')->name('unactiveproducts.get');
Route::get('/active-products/{id}','ProductsController@getActiveproducts')->name('activeproducts.get');
Route::post('saveproducts','ProductsController@postSaveproducts')->name('saveproducts.post');

//BlogcategoryController
Route::get('blog','BlogController@getBlog')->name('blog.get');
Route::post('blog','BlogController@postBlog')->name('blog.post');
Route::get('createblog','BlogController@getCreateblog')->name('createblog.get');
Route::post('createblog','BlogController@postCreateblog')->name('createblog.post');
Route::get('directory','BlogController@getDirectory')->name('directory.get');
Route::post('directory','BlogController@postDirectory')->name('directory.post');
Route::get('editblog/{id}','BlogController@getEditblog')->name('editblog.get');
Route::post('editblog/{id}','BlogController@postEditblog')->name('editblog.post');
Route::get('deleteblog/{id}','BlogController@getDeleteblog')->name('deleteblog.get');
Route::get('/unactive-blog/{id}','BlogController@getUnactiveblog')->name('unactiveblog.get');
Route::get('/active-blog/{id}','BlogController@getActiveblog')->name('activeblog.get');
Route::post('saveblog','BlogController@postSaveblog')->name('saveblog.post');

Route::get('blogcategory','BlogController@getBlogcategory')->name('blogcategory.get');
Route::post('blogcategory','BlogController@postBlogcategory')->name('blogcategory.post');
Route::get('createblogcategory','BlogController@getCreateblogcategory')->name('createblogcategory.get');
Route::post('createblogcategory','BlogController@postCreateblogcategory')->name('createblogcategory.post');
Route::get('editblogcategory/{id}','BlogController@getEditblogcategory')->name('editblogcategory.get');
Route::post('editblogcategory/{id}','BlogController@postEditblogcategory')->name('editblogcategory.post');
Route::get('deleteblogcategory/{id}','BlogController@getDeleteblogcategory')->name('deleteblogcategory.get');
Route::get('/unactive-blogcategory/{id}','BlogController@getUnactiveblogcategory')->name('unactiveblogcategory.get');
Route::get('/active-blogcategory/{id}','BlogController@getActiveblogcategory')->name('activeblogcategory.get');
Route::post('saveblogcategory','BlogController@postSaveblogcategory')->name('saveblogcategory.post');

Route::get('blogtags','BlogController@getBlogtags')->name('blogtags.get');
Route::post('blogtags','BlogController@postBlogtags')->name('blogtags.post');
Route::get('createblogtags','BlogController@getCreateblogtags')->name('createblogtags.get');
Route::post('createblogtags','BlogController@postCreateblogtags')->name('createblogtags.post');
Route::get('directory','BlogController@getDirectory')->name('directory.get');
Route::post('directory','BlogController@postDirectory')->name('directory.post');
Route::get('editblogtags/{id}','BlogController@getEditblogtags')->name('editblogtags.get');
Route::post('editblogtags/{id}','BlogController@postEditblogtags')->name('editblogtags.post');
Route::get('deleteblogtags/{id}','BlogController@getDeleteblogtags')->name('deleteblogtags.get');
Route::get('/unactive-blogtags/{id}','BlogController@getUnactiveblogtags')->name('unactiveblogtags.get');
Route::get('/active-blogtags/{id}','BlogController@getActiveblogtags')->name('activeblogtags.get');
Route::post('saveblogtags','BlogController@postSaveblogtags')->name('saveblogtags.post');

// <-------------------------------------FRONT-END-------------------------------------------------------------->

//Brand
Route::get('brandmt','DashboardController@getBrandmt')->name('brandmt.get');
Route::post('brandmt','DashboardController@postBrandmt')->name('brandmt.post');
Route::get('banner','DashboardController@getbanner')->name('banner.get');
Route::post('banner','DashboardController@postbanner')->name('banner.post');
Route::get('addbanner','DashboardController@getaddbanner')->name('addbanner.get');
Route::post('addbanner','DashboardController@postaddbanner')->name('addbanner.post');
Route::get('createaddbanner','DashboardController@getCreateblogcategory')->name('createblogcategory.get');
Route::post('createblogcategory','DashboardController@postCreateblogcategory')->name('createblogcategory.post');
Route::get('blogcategory','DashboardController@getBlogcategory')->name('blogcategory.get');
Route::post('blogcategory','DashboardController@postBlogcategory')->name('blogcategory.post');
Route::get('createblogcategory','DashboardController@getCreateblogcategory')->name('createblogcategory.get');
Route::post('createblogcategory','DashboardController@postCreateblogcategory')->name('createblogcategory.post');
Route::get('blogcategory','DashboardController@getBlogcategory')->name('blogcategory.get');
Route::post('blogcategory','DashboardController@postBlogcategory')->name('blogcategory.post');
Route::get('createblogcategory','DashboardController@getCreateblogcategory')->name('createblogcategory.get');
Route::post('createblogcategory','DashboardController@postCreateblogcategory')->name('createblogcategory.post');

Route::get('banner','BannerController@getBanner')->name('banner.get');
Route::post('banner','BannerController@postBanner')->name('banner.post');
Route::get('addbanner','BannerController@getAddbanner')->name('addbanner.get');
Route::post('addbanner','BannerController@postAddbanner')->name('addbanner.post');
Route::get('editbanner/{id}','BannerController@getEditbanner')->name('editbanner.get');
Route::post('editbanner/{id}','BannerController@postEditbanner')->name('editbanner.post');
Route::get('deletebanner/{id}','BannerController@getDeletebanner')->name('deletebanner.get');
Route::get('/unactive-banner/{id}','BannerController@getUnactivebanner')->name('unactivebanner.get');
Route::get('/active-banner/{id}','BannerController@getActivebanner')->name('activebanner.get');
Route::post('savebanner','BannerController@postSavebanner')->name('savebanner.post');

//Category
Route::get('kids','DashboardController@getKids')->name('kids.get');
Route::post('kids','DashboardController@postKids')->name('kids.post');
Route::get('fashion','DashboardController@getFashion')->name('fashion.get');
Route::post('fashion','DashboardController@postFashion')->name('fashion.post');
Route::get('households','DashboardController@getHouseholds')->name('households.get');
Route::post('households','DashboardController@postHouseholds')->name('households.post');
Route::get('interiors','DashboardController@getInteriors')->name('interiors.get');
Route::post('interiors','DashboardController@postInteriors')->name('interiors.post');
Route::get('clothing','DashboardController@getClothing')->name('clothing.get');
Route::post('clothing','DashboardController@postClothing')->name('clothing.post');
Route::get('bags','DashboardController@getBags')->name('bags.get');
Route::post('bags','DashboardController@postBags')->name('bags.post');
Route::get('shoes','DashboardController@getShoes')->name('shoes.get');
Route::post('shoes','DashboardController@postShoes')->name('shoes.post');
Route::get('quat-may','DashboardController@getQuatmay')->name('quat-may.get');
Route::post('quat-may','DashboardController@postQuatmay')->name('quat-may.post');
Route::get('banh-keo','DashboardController@getBanhkeo')->name('banh-keo.get');
Route::post('banh-keo','DashboardController@postBanhkeo')->name('banh-keo.post');