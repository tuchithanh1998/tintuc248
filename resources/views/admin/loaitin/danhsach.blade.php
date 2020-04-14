
@extends('admin.layout.index')

@section('content')





<div id="content">


<div id="content-header">
    <div id="breadcrumb"> <a title="" class="tip-bottom"><i class="icon-home"></i> Loại tin</a></div>
  </div>



  
  <div class="container-fluid">

    <hr>
    <div class="row-fluid">
      <div class="span12">
         @if(session('thongbao'))
          <div class="alert">
            
            {{session('thongbao')}}
          </div>
          @endif
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Danh sách loại tin</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  
                  <th>ID loại tin</th>
                  <th>Tên loại tin</th>
                  <th>Tên nhóm tin</th>
                  <th>Trạng thái</th>
                  <th  >Thao tác</th>
                  <th  >Thao tác</th>

                  

                </tr>
              </thead>
              <tbody>

                
               
                 @foreach($loaitin as $lt )

                <tr class="gradeX">

                  <td>{{$lt['id_loaitin']}}</td>
                  <td>{{$lt->ten_loaitin}}</td>
                  <td>{{$lt->nhomtin->ten_nhomtin}}</td>
                  <td>
                    @if($lt->trangthai==1)
                      Hiện
                      @else
                      Ẩn
                   @endif                  
                    </td>
               
            <td class="center"><div class="form-actions" style="padding:0px; margin: 0px; border: 0px; ">
              <form  action="admin/loaitin/sua-{{$lt->id_loaitin}}.html">
              <button type="submit" class="btn btn-mini">Sửa</button></form>

              
              
            </div></td>
            <td class="center"><div class="form-actions" style="padding:0px; margin: 0px; border: 0px; ">
             

              <form  action="admin/loaitin/xoa-{{$lt->id_loaitin}}.html">
              <button type="submit" class="btn btn-mini">Xóa</button></form>
              
            </div></td>

            
                </tr>

                @endforeach

                
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
    @endsection