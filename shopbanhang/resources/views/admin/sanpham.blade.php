@extends('master-header::admin.admincp')
@section('contentadmin')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading" style="padding-top: 81px">
      Liệt Kê Danh Mục Sản Phẩm
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
            <th style="width:20px;">
              <label class="i-checks m-b-none">
                <input type="checkbox"><i></i>
              </label>
            </th>
            <th>ID</th>
            <th>Tên sản phẩm</th>
            <th>Gía</th>
            <th>Hình ảnh</th>
            <th>Hiển Thị</th>
            <th>Mô tả</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody> 
          @foreach($sanpham as $item)
          
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>{{$item->id}}</td>
            <td>{{$item->name}}</td>
            <td>{{$item->price}}</td>
            <td><img src="{{asset('images')}}/{{$item->images}}" width="50"></td>
            <td><span class="text-ellipsis">
              <?php
              if($item->status==0){
              ?>
                <a href="{{route('an.get',$item->id)}}"><span class="fa-thumb-styling fa fa-thumbs-up"></span></a> ;
              <?php
              }else{
              ?>
                <a href="{{route('hienthi.get',$item->id)}}"><span class="fa-thumb-styling fa fa-thumbs-down"></span></a>;
              <?php
              }
              ?>
              </span></td></span></td>
            
            <td><span class="text-ellipsis">
            {{$item->desc}}
            <td>
              <a href="" class="active" ui-toggle-class="">
              <a href="{{route('suasanpham.get',$item->id)}}" class="fa fa-pencil-square-o text-success text-active"></a>
              <a href="" class="fa fa-times text-danger text"></a></a>
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