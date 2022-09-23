@extends('master-header::admin.admincp')
@section('contentadmin')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel" style="padding-top: 81px";
>
                        <header class="panel-heading">
                            Sửa Sản Phẩm
                        </header>
                        <div class="panel-body">
                            <div class="position-center">
                                <form role="form" action="" method="post">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên sản phẩm</label>
                                    <input type="text" value="{{$data->name}}"name="name" class="form-control" id="exampleInputEmail1" placeholder="Tên Danh Mục">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Mã sản phẩm</label>
                                    <input type="text" value="{{$data->sku}}"name="sku" class="form-control" id="exampleInputEmail1" placeholder="Tên Danh Mục">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Gía</label>
                                    <input type="text" value="{{$data->price}}"name="price" class="form-control" id="exampleInputEmail1" placeholder="Tên Danh Mục">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Gía khuyến mãi</label>
                                    <input type="text" value="{{$data->pricesale}}"name="pricesale" class="form-control" id="exampleInputEmail1" placeholder="Tên Danh Mục">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Category_ID</label>
                                    <select name="category_id" class="form-control input-sm m-bot15">
                                        <option value="">Chọn danh mục</option>
                                        @foreach($all_category_id as $item)
                                        
                                                <option value="{{$item->id}}" selected>{{$item->category_name}}</option>
                                                
                                        @endforeach    
                                        </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hình ảnh</label>
                                    <input type="text" value="{{$data->image}}"name="image" class="form-control" id="exampleInputEmail1" placeholder="Tên Danh Mục">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Brand ID</label>
                                    <select name="products_brand_id" class="form-control input-sm m-bot15">
                                        <option value="">Chọn thương hiệu</option>
                                        @foreach($all_category_product as $item) 
                                            <option value="{{$item->id}}" selected>{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                    
                                </div>
                               
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô Tả</label>
                                    <textarea  style="resize: none"  rows="5" name="desc" class="form-control" id="exampleInputPassword1" placeholder="Mô tả danh mục">
                                        {{$data->desc}}
                                    </textarea>
                                </div>
                                <div class="form-group">
                                    <label  for="exampleInputFile">Hiển thị</label>
                                        <select name="status" class="form-control input-sm m-bot15">
                                          
                                            <option {{($data->status == 0) ? 'selected' : '' }} value="0">Ẩn</option>                                            
                                            <option {{($data->status == 1) ? 'selected' : '' }} value="1">Hiển thị</option>
                                            
                                        </select>
                                    </label>
                                </div>
                                <button type="submit" name="add_products" class="btn btn-info">Sửa Sản Phẩm</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
           
        </div>
@endsection