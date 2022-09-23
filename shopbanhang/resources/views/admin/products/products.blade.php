@extends('master-header::admin.admincp')
@section('contentadmin')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading" style="padding-top: 81px">
       Danh Sách Sản Phẩm
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
        <a class="btn btn-sm btn-success" href="{{route('addproducts.get')}}"><i class="fa fa-plus"></i> Thêm mới</a>          
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
            <th>Mã sản phẩm</th>
            <th>Tên sản phẩm</th>
            <th>Gía</th>
            <th>Gía KM</th>
            <!-- <th>category_id</th> -->
            <th>Hình ảnh</th>
            <th>Thương Hiệu</th>
            <th>Slug</th>
            <!-- <th>Kho ảnh</th> -->
            <!-- <th>Mô tả</th> -->
            <th>Hiển Thị</th>
            <th>Thao tác</th>
          </tr>
        </thead>
        <tbody> 
          @foreach($products as $item)
          
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>{{$item->id}}</td>
            <td>{{$item->sku}}</td>
            <td>{{$item->name}}</td>
            <td>{{$item->price}}</td>
            <td>{{$item->pricesale}}</td>     
            
            <td><img src="{{asset('images')}}/{{$item->image}}" width="50"></td>
            <td>{{$item->brand_id}} </td>
            <td>{{$item->slug}}</td>
            
            <td><span class="text-ellipsis">
              <?php
              if($item->status==0){
              ?>
                <a class="btn btn-sm btn-danger" href="{{route('unactiveproducts.get',$item->id)}}"><i class=""></i>Ẩn</a>
              <?php
              }else{
              ?>
                <a class="btn btn-sm btn-success" href="{{route('activeproducts.get',$item->id)}}"><i class=""></i>  Hiển thị</a>
              <?php
              }
              ?>
              </span></td></span></td>
              
              <td>
              <a href="" class="active" ui-toggle-class="">
              <a href="{{route('editproducts.get',$item->id)}}" class="fa fa-pencil-square-o text-success text-active"></a>
              <a href="{{route('deleteproducts.get',$item->id)}}" class="fa fa-times text-danger text"></a></a>
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
          {{$products->links()}}
        </div>
      </div>
    </footer>
  </div>
</div>


@endsection