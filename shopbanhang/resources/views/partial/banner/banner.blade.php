@extends('master-header::admin.admincp')
@section('contentadmin')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading" style="padding-top: 81px">
       Danh Sách Banner
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">
        <select class="input-sm form-control w-sm inline v-middle">
          <option value="0">Bulk action</option>
          <option value="1">Delete selected</option>
          <option value="2">Bulk edit</option>
          <option value="3">Export</option>
        </select>
        <button class="btn btn-sm btn-default">Apply</button>  
        <a class="btn btn-sm btn-success" href="{{route('addbanner.get')}}"><i class="fa fa-plus"></i> Thêm mới</a>          
      </div>
      <div class="col-sm-4">
      </div>
      <div class="col-sm-3">
        <div class="input-group">
          <input type="text" class="input-sm form-control" placeholder="Search">
          <span class="input-group-btn">
            <button class="btn btn-sm btn-default" type="button">Go!</button>
          </span>
        </div>
      </div>
    </div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th style="width:30px;"></th>
            <th>ID</th>
            <th>Tên</th>
            <th>Banner</th>
            <th>Ảnh phụ</th>
            <th>Mô tả 1</th>
            <th>Mô tả 2</th>
            <th>Button</th>
            <th>Slug</th>
            <th>Hiển Thị</th>
            <th>Thao tác</th>
          </tr>
        </thead>
        <tbody> 
          @foreach($banner as $item)
          
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>{{$item->id}}</td>
            <td>{{$item->name}}</td>
            <td><img src="{{asset('images')}}/{{$item->imgmain}}" width="50"></td>
            <td><img src="{{asset('images')}}/{{$item->imgextra}}" width="50"></td>
            <td>{{$item->text1}}</td>
            <td>{{$item->text2}}</td>
            <td>{{$item->button}}</td>
            <td>{{$item->slug}}</td>
            <td><span class="text-ellipsis">
              <?php
              if($item->status==0){
              ?>
                <a class="btn btn-sm btn-danger" href="{{route('unactivebanner.get',$item->id)}}"><i class=""></i>Ẩn</a>
              <?php
              }else{
              ?>
                <a class="btn btn-sm btn-success" href="{{route('activebanner.get',$item->id)}}"><i class=""></i>  Hiển thị</a>
              <?php
              }
              ?>
              </span></td></span></td>
              <td>
              <a href="" class="active" ui-toggle-class="">
              <a href="{{route('editbanner.get',$item->id)}}" class="fa fa-pencil-square-o text-success text-active"></a>
              <a href="{{route('deletebanner.get',$item->id)}}" class="fa fa-times text-danger text"></a></a>
            </td>
          </tr>
          @endforeach
      
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
        
        <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
        </div>
        <div class="col-sm-7 text-right text-center-xs">                
          <ul class="pagination pagination-sm m-t-none m-b-none">
            <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
            <li><a href="">1</a></li>
            <li><a href="">2</a></li>
            <li><a href="">3</a></li>
            <li><a href="">4</a></li>
            <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
          </ul>
        </div>
      </div>
    </footer>
  </div>
</div>


@endsection