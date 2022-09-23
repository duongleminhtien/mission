@extends('master-header::admin.admincp')
@section('contentadmin')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel" style="padding-top: 81px";
>
                        <header class="panel-heading">
                            Sửa Banner
                        </header>
                        <div class="panel-body">
                            <div class="position-center">
                                <form role="form" action="" method="post">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên Banner</label>
                                    <input type="text" value="{{$data->name}}"name="name" class="form-control" id="exampleInputEmail1" placeholder="Tên Danh Mục">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Chọn Ảnh Chính</label>
                                    <input type="file" value="{{$data->imgmain}}"name="imgmain" class="form-control" id="exampleInputEmail1" placeholder="Tên Danh Mục">
                                    @foreach($banner as $item)
                                        <td><img src="{{asset('images')}}/{{$item->imgmain}}" width="100"></td>
                                    @endforeach
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Chọn Ảnh Phụ</label>
                                    <input type="file" value="{{$data->imgextra}}"name="imgextra" class="form-control" id="exampleInputEmail1" placeholder="Tên Danh Mục">
                                    @foreach($banner as $item)
                                        <td><img src="{{asset('images')}}/{{$item->imgextra}}" width="100"></td>
                                    @endforeach
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô Tả 1</label>
                                    <textarea  style="resize: none"  rows="5" name="text1" class="form-control" id="exampleInputPassword1" placeholder="Mô tả danh mục">
                                        {{$data->text1}}
                                    </textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô Tả 2</label>
                                    <textarea  style="resize: none"  rows="5" name="text2" class="form-control" id="exampleInputPassword1" placeholder="Mô tả danh mục">
                                        {{$data->text2}}
                                    </textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Link</label>
                                    <input type="text" value="{{$data->button}}"name="button" class="form-control" id="exampleInputEmail1" placeholder="Tên Danh Mục">
                                </div>
                                <div class="form-group">
                                    <label  for="exampleInputFile">Hiển thị</label>
                                        <select name="status" class="form-control input-sm m-bot15">
                                          
                                            <option {{($data->status == 0) ? 'selected' : '' }} value="0">Ẩn</option>                                            
                                            <option {{($data->status == 1) ? 'selected' : '' }} value="1">Hiển thị</option>
                                            
                                        </select>
                                    </label>
                                </div>
                                <button type="submit" name="add_products" class="btn btn-info">Sửa Banner</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
           
        </div>
@endsection