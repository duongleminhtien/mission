@extends('master-header::admin.admincp')
@section('contentadmin')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel" style="padding-top: 81px";
>
                        <header class="panel-heading">
                            Sửa Bài Viết
                        </header>
                        <div class="panel-body">
                            <div class="position-center">
                                <form role="form" action="" method="post">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tiêu đề</label>
                                    <input type="text" value="{{$data->name}}" name="title" class="form-control" id="exampleInputEmail1" placeholder="Tên Danh Mục">
                                </div>
                                <div class="form-group">
                                    <label>Ảnh đại diện (500x300)</label>
                                    <div class="input-group col-xs-12" style="display: flex">
                                        <input type="text" name="thumbnail" value="{{$data->thumbnail}}" id="ckfinder-input-1" class="form-control file-upload-info" placeholder="Upload Image">
                                        <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-primary" id="ckfinder-popup-1"  type="button">Chọn ảnh</button>
                                    </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Danh mục</label>
                                    <select name="category_id" class="form-control input-sm m-bot15">
                                        <option value="">Chọn danh mục</option>
                                        @foreach($blogcategory as $item)
                                        
                                                <option value="{{$item->id}}" selected>{{$item->category}}</option>
                                                
                                        @endforeach    
                                        </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô Tả</label>
                                    <textarea  style="resize: none"  rows="5" name="desc" class="form-control" id="exampleInputPassword1" placeholder="Mô tả danh mục">{{$data->desc}}
                                    </textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Nội Dung</label>
                                    <textarea  style="resize: none"  rows="5" name="content" class="form-control" id="exampleInputPassword1" placeholder="Mô tả danh mục">{{$data->content}}
                                    </textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Thẻ</label>
                                    <input type="text" value="{{$data->tags}}"name="tags" class="form-control" id="exampleInputEmail1" placeholder="Tên Danh Mục">
                                </div>
                                <div class="form-group">
                                    <label  for="exampleInputFile">Trạng thái</label>
                                        <select name="status" class="form-control input-sm m-bot15">
                                          
                                            <option {{($data->status == 0) ? 'selected' : '' }} value="0">Ẩn</option>                                            
                                            <option {{($data->status == 1) ? 'selected' : '' }} value="1">Hiển thị</option>
                                            
                                        </select>
                                    </label>
                                </div>
                                <button type="submit" name="add_products" class="btn btn-info">Sửa bài viết</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
           
        </div>
@endsection