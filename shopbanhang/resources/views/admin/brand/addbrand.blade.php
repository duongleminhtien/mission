@extends('master-header::admin.admincp')
@section('contentadmin')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel" style="padding-top: 81px";
>
                        <header class="panel-heading">
                            Thêm Thương Hiệu
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
                                <form role="form" action="{{route('savebrand.post')}}" method="post">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên Thương Hiệu</label>
                                    <input type="text" name="brand_name" class="form-control" id="exampleInputEmail1" placeholder="Tên Danh Mục">
                                </div>
                                <!-- <div class="form-group">
                                    <label for="exampleInputEmail1">Slug</label>
                                    <input type="text" name="brand_slug" class="form-control" id="exampleInputEmail1" placeholder="Slug">
                                </div> -->
                                <div class="form-group">
                                    <label  for="exampleInputFile">Hiển thị</label>
                                        <select name="brand_status" class="form-control input-sm m-bot15">
                                            <option value="0">Ẩn</option>
                                            <option value="1">Hiển thị</option>
                                            
                                        </select>
                                    </label>
                                </div>
                                <button name="add_brand" class="btn btn-info">Thêm Thương Hiệu</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
            <div class="col-lg-12">
                

            </div>
        </div>
@endsection