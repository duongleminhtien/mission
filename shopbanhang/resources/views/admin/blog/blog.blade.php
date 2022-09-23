@extends('master-header::admin.admincp')
@section('contentadmin')
<ol class="breadcrumb breadcrumb-quirk">
        <li><a href="{{route('admincp.get')}}"><i class="fa fa-home mr5"></i> Dashboard</a></li>
        <li><a href="">Danh sách bài viết</a></li>
    </ol>
    <div class="panel" >
        <div class="panel-heading" >
            <h4 class="panel-title">Danh sách bài viết</h4>
            <p>Danh sách bài viết trên trang</p>
        </div>

        <div class="search_page">
            <div class="panel-body" style="padding-left:100px">
                <div class="row">
                    <form method="get">
                        <div class="col-sm-5">
                            <input type="text" name="name" placeholder="Nhập tiêu đề" class="form-control">
                        </div>
                        <div class="col-sm-2">
                            <button type="submit" class="btn btn-info">Tìm kiếm</button>
                            <a href="{{route('blog.get')}}" class="btn btn-default">Làm lại</a>
                        </div>
                        <div class="col-sm-5">
                            <div class="button_more">
                                <a class="btn btn-primary" href="{{route('createblog.get')}}">Thêm mới</a>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>

        <div class="panel-body">
            <div class="table-responsive">
                @if (session('edit'))
                    <div class="alert alert-info">{{session('edit')}}</div>
                @endif
                @if (session('create'))
                    <div class="alert alert-success">{{session('create')}}</div>
                @endif
                @if (session('delete'))
                    <div class="alert alert-success">{{session('delete')}}</div>
                @endif
                <table class="table nomargin">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tiêu đề</th>
                        <th>Hình ảnh</th>         
                        <th>Danh mục</th>
                        <!-- <th>Người soạn</th> -->
                        <!-- <th>Lượt xem</th> -->
                        <th>Slug</th>
                        <th>Mô tả</th>
                        <th>Thẻ</th>
                        
                        <th class="">Trạng thái</th>
                        <th class="">Ngày tạo</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($blog as $d)
                        <tr>
                            <td>{{$d->id}}</td>
                            <td>{{$d->title}}</td>
                            <td>
                                <div class="img bg-transparent border">
                                    <img src="{{asset('images')}}/{{$d->thumbnail}}" width="100" alt="">
                                </div>
                            </td>
                            <td>{{$d->category_id}}</td>
                            <!-- <td>$d->meta_title</td> -->
                            <!-- <td>$d->user_post</td> -->
                            <!-- <td>$d->count_view</td> -->
                            <td>{{$d->slug}}</td>
                            <td>{{$d->desc}}</td>
                            <td>{{$d->tags}}</td>
                            <td><span class="text-ellipsis">
                            <?php
                            if($d->status==0){
                            ?>
                                <a class="btn btn-sm btn-danger" href="{{route('unactiveblog.get',$d->id)}}"><i class=""></i>Ẩn</a>
                            <?php
                            }else{
                            ?>
                                <a class="btn btn-sm btn-success" href="{{route('activeblog.get',$d->id)}}"><i class=""></i>  Hiển thị</a>
                            <?php
                            }
                            ?>
                            </span></td></span></td>
                            
                            <td>
                            <a href="" class="active" ui-toggle-class="">
                            <a href="{{route('editblog.get',$d->id)}}" class="fa fa-pencil-square-o text-success text-active"></a>
                            <a href="{{route('deleteblog.get',$d->id)}}" class="fa fa-times text-danger text"></a></a>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
                
            </div><!-- table-responsive -->
        </div>
    </div>
@endsection
