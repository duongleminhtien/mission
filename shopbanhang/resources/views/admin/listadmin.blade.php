@extends('master-header::admin.admincp')
@section('contentadmin')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading" style="padding-top: 81px">
      Danh Sách Quản Trị Viên
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
            <th>Tên ADMIN</th>
            <th>Email</th>
            <th>Số Điện Thoại</th>
            <th>Mật khẩu</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody> 
          @foreach($listadmin as $item)
          
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>{{$item->id}}</td>
            <td>{{$item->admin_name}}</td>
            
            <td><span class="text-ellipsis">
            {{$item->admin_mail}}
            </span></td>
            <td><span class="text-ellipsis">
            {{$item->admin_phone}}
            </span></td>
            <td><span class="text-ellipsis">
            {{$item->admin_password}}
            </span></td>
            <td>
              <a href="" class="active" ui-toggle-class="">
              <a href="{{route('editadmin.get',$item->id)}}" class="fa fa-pencil-square-o text-success text-active"></a>
              <a href="{{route('deleteadmin.get',$item->id)}}" class="fa fa-times text-danger text"></a></a>
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