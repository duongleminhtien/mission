@extends('master-header::admin.admincp')
@section('contentadmin')
<div class="row" style="padding-top:80px">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="post" enctype="multipart/form-data" action="{{route('saveblog.post')}}">
            {{csrf_field()}}
            <div class="col-sm-8">
                <div class="panel">
                    <div class="panel-heading">
                        <h4 class="panel-title">Thêm Bài viết</h4>
                        <p>Bạn cần nhập đầy đủ các thông tin để thêm Bài viết mới</p>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label>Tiêu đề</label>
                            <input class="form-control"
                                   name="blog_title"
                                   type="text"
                                   value=""
                                   placeholder="Tiêu đề bài viết">
                        </div>
                        <div class="form-group">
                            <label>Mô tả</label>
                            <textarea id="" name="blog_desc" class="form-control" rows="3" placeholder="Mô tả ngắn"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Nội dung bài viết</label>
                            <textarea id="editor1" name="blog_content" class="form-control makeMeRichTextarea" rows="3" placeholder="Nội dung bài viết"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Tags (Từ khóa)</label>
                            <input class="form-control" name="blog_tags" type="text" placeholder="Từ khóa liên quan">
                        </div>
                        <div class="form-group">
                            <label>Thẻ Meta title</label>
                            <input class="form-control"
                                   name="meta_title"
                                   type="text"
                                   value="{{old('meta_title')}}"
                                   placeholder="">
                        </div>
                        <div class="form-group">
                            <label>Thẻ meta description</label>
                            <textarea id="" name="meta_desc" class="form-control" rows="3" placeholder="Thẻ Meta description">{{old('meta_desc')}}</textarea>
                        </div>

                        <div class="form-group">
                            <button class="btn btn-primary">Lưu lại</button>
                            <!-- <a class="btn btn-primary" href="{{route('blog.get')}}"> <i class=""></i> Lưu lại</a> -->
                            <a class="btn btn-sm btn-success" name="continue_post" href="{{route('createblog.get')}}"> <i class=""></i> Lưu và tiếp tục thêm</a>
                        </div>
                    </div>
                </div><!-- panel -->

            </div><!-- col-sm-6 -->  

            <!-- ####################################################### -->

            <div class="col-sm-4">
                <div class="panel">
                    <div class="panel-heading">
                        <h4 class="panel-title">Tùy chọn thêm</h4>
                        <p>Thông tin các tùy chọn thêm </p>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <select id="" name="blog_category_id" class="form-control" style="width: 100%" data-placeholder="Danh mục bài viết">
                                <option value="0">--Chọn danh mục--</option>
                                    @foreach($blogcategory as $item)
                                            
                                            <option value="{{$item->id}}">{{$item->category}}</option>
                                            
                                    @endforeach  
                                <!-- $catmodel->optionCategory0,1,4,0,0 -->
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Vị trí hiển thị</label>
                            <select id="" name="display" class="form-control" style="width: 100%" data-placeholder="Trạng thái">
                                <option value="0" {{ (old('display') ==0 ) ? 'selected' : ''}}>Không chọn</option>
                                <option value="1" {{ (old('display') ==1 ) ? 'selected' : ''}}>Trang chủ</option>
                                <option value="2" {{ (old('display') ==2 ) ? 'selected' : ''}}>Nổi bật</option>
                                <option value="3" {{ (old('display') ==3 ) ? 'selected' : ''}}>Hiển thị slider</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Trạng thái</label>
                            <select name="blog_status" class="form-control input-sm m-bot15">
                                <option value="0">Ẩn</option>
                                <option value="1">Hiển thị</option>
                                
                            </select>
                            <!-- <select id="" name="status" class="form-control" style="width: 100%" data-placeholder="Trạng thái">
                                <option value="active"  (old('status')=='active') ? 'selected' : ''>Hiển thị</option>
                                <option value="disable"  (old('status')=='disable') ? 'selected' : ''>Tạm ẩn</option>
                            </select> -->
                        </div>

                        <div class="form-group">
                            <label>Ảnh đại diện (500x300)</label>
                            <div class="input-group col-xs-12" style="display: flex">
                                <input type="text" name="blog_thumbnail" value="<?= old('thumbnail'); ?>" id="ckfinder-input-1" class="form-control file-upload-info" placeholder="Upload Image">
                                <span class="input-group-append">
								<button class="file-upload-browse btn btn-primary" id="ckfinder-popup-1"  type="button">Chọn ảnh</button>
							</span>
                            </div>
                        </div>

                        <!-- <div class="form-group">
                            <label>Ảnh slider nếu có (860x360)</label>
                            <div class="input-group col-xs-12" style="display: flex">
                                <input type="text" name="banner" value="'banner'); ?>" id="ckfinder-input-2" class="form-control file-upload-info" placeholder="Upload Image">
                                <span class="input-group-append">
								<button class="file-upload-browse btn btn-primary" id="ckfinder-popup-2"  type="button">Chọn ảnh</button>
							</span>
                            </div>
                        </div> -->

                        <div class="form-group">
                            <button class="btn btn-primary">Lưu lại</button>
                            <!-- <a class="btn btn-primary" href="{{route('blog.get')}}"> <i class=""></i> Lưu lại</a> -->
                            <a class="btn btn-sm btn-success" name="continue_post" href="{{route('createblog.get')}}"> <i class=""></i> Lưu và tiếp tục thêm</a>
                        </div>

                    </div><!-- col-sm-6 -->
                </div><!-- row -->

            </div>

        </form>
    </div>
@endsection
