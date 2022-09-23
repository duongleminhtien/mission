@extends('master-header::admin.admincp')
@section('contentadmin')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel" style="padding-top: 81px";
>
                        <header class="panel-heading">
                            Thêm Sản Phẩm
                        </header>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="panel-body">
                            <div class="position-center">
                                <form role="form" action="{{route('saveproducts.post')}}" method="post">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên Sản Phẩm</label>
                                    <input type="text" name="products_name" class="form-control" id="exampleInputEmail1" placeholder="Tên Danh Mục">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Mã Sản Phẩm</label>
                                    <input type="text" name="products_sku" class="form-control" id="exampleInputEmail1" placeholder="Tên Danh Mục">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Gía sản phẩm</label>
                                    <input type="text" name="products_price" class="form-control" id="exampleInputEmail1" placeholder="Tên Danh Mục">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Gía khuyến mãi</label>
                                    <input type="text" name="products_pricesale" class="form-control" id="exampleInputEmail1" placeholder="Tên Danh Mục">
                                </div>
                                <div class="form-group">
                                    <label  for="exampleInputFile">Category_ID</label>
                                        <select name="products_category_id" class="form-control input-sm m-bot15">
                                        <option value="">Chọn danh mục</option>
                                        @foreach($all_category_id as $item)
                                        
                                                <option value="{{$item->id}}">{{$item->category_name}}</option>
                                                
                                        @endforeach    
                                        </select>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hình ảnh</label>
                                        <input type="file" name="products_image">
                                </div>
                                <div class="form-group">
                                    <label  for="exampleInputFile">Brand_ID</label>
                                    <select name="products_brand_id" class="form-control input-sm m-bot15">
                                        <option value="">Chọn thương hiệu</option>
                                        @foreach($all_category_product as $item) 
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                    </label>
                                </div>
                                <!-- <div class="form-group">
                                    <label for="exampleInputPassword1">Kho ảnh</label>
                                    <textarea style="resize: none" rows="5" name="products_images" class="form-control" id="exampleInputPassword1" placeholder="Mô tả danh mục"></textarea>
                                </div> -->
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô Tả</label>
                                    <textarea style="resize: none" rows="5" name="products_desc" class="form-control" id="exampleInputPassword1" placeholder="Mô tả danh mục"></textarea>
                                </div>
                                <div class="form-group">
                                    <label  for="exampleInputFile">Hiển thị</label>
                                        <select name="products_status" class="form-control input-sm m-bot15">
                                            <option value="0">Ẩn</option>
                                            <option value="1">Hiển thị</option>
                                            
                                        </select>
                                    </label>
                                </div>
                                <button type="submit" name="add_products" class="btn btn-info">Thêm Sản Phẩm</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
            <div class="col-lg-12">
                

            </div>
        </div>
@endsection