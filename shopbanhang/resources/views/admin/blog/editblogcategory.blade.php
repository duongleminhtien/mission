@extends('master-header::admin.admincp')
@section('contentadmin')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel" style="padding-top: 81px";
>
                        <header class="panel-heading">
                            Sửa danh mục bài viết
                        </header>
                        <div class="panel-body">
                            <div class="position-center">
                                <form role="form" action="" method="post">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên danh mục bài viết</label>
                                    <input type="text" value="{{$data->category}}"name="name" class="form-control" id="exampleInputEmail1" placeholder="Tên Danh Mục">
                                </div>
                                <!-- <div class="form-group">
                                    <label for="exampleInputPassword1">Mô Tả</label>
                                    <textarea  style="resize: none"  rows="5" name="desc" class="form-control" id="exampleInputPassword1" placeholder="Mô tả danh mục">{{$data->desc}}
                                </textarea>
                                </div> -->
                                <div class="form-group">
                                    <label  for="exampleInputFile">Hiển thị</label>
                                        <select name="status" class="form-control input-sm m-bot15">
                                          
                                            <option {{($data->status == 0) ? 'selected' : '' }} value="0">Ẩn</option>                                            
                                            <option {{($data->status == 1) ? 'selected' : '' }} value="1">Hiển thị</option>
                                            
                                        </select>
                                    </label>
                                </div>
                                <button type="submit" name="add_blogcategory" class="btn btn-info">Sửa Danh Mục</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
           
        </div>
@endsection