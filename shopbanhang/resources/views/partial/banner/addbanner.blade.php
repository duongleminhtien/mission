@extends('master-header::admin.admincp')
@section('contentadmin')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel" style="padding-top: 81px";
>
                        <header class="panel-heading">
                            Thêm Banner
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
                                <form role="form" action="{{route('savebanner.post')}}" method="post">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên Banner</label>
                                    <input type="text" name="banner_name" class="form-control" id="exampleInputEmail1" placeholder="Tên Danh Mục">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Banner</label>
                                        <input type="file" name="banner_image_main">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Ảnh phụ</label>
                                        <input type="file" name="banner_image_extra">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Mô tả 1</label>
                                    <input type="text" name="banner_text1" class="form-control" id="exampleInputEmail1" placeholder="Tên Danh Mục">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Mô tả 2</label>
                                    <input type="text" name="banner_text2" class="form-control" id="exampleInputEmail1" placeholder="Tên Danh Mục">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Button</label>
                                    <input type="text" name="banner_button" class="form-control" id="exampleInputEmail1" placeholder="Tên Danh Mục">
                                </div>
                                <!-- <div class="form-group">
                                    <label for="exampleInputEmail1">Slug</label>
                                    <input type="text" name="banner_slug" class="form-control" id="exampleInputEmail1" placeholder="Slug">
                                </div> -->
                                <div class="form-group">
                                    <label  for="exampleInputFile">Hiển thị</label>
                                        <select name="banner_status" class="form-control input-sm m-bot15">
                                            <option value="0">Ẩn</option>
                                            <option value="1">Hiển thị</option>
                                            
                                        </select>
                                    </label>
                                </div>
                                <button type="submit" name="add_banner" class="btn btn-info">Thêm Banner</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
            <div class="col-lg-12">
                

            </div>
        </div>
@endsection