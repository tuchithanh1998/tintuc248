
@extends('admin.layout.index')

@section('content')





<div id="content">


<div id="content-header">
    <div id="breadcrumb"> <a title="" class="tip-bottom"><i class="icon-home"></i>Bình luận</a></div>
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
            <h5>Danh sách bình tin</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  
                  <th>ID bình luận</th>
                  <th>Email</th>
                  <th>Thời gian</th>
                  <th>Nội dung</th>
                  <th>Trạng thái</th>
                  <th>ID tin</th>
                  <th>ID admin</th>
                  <th>Thao tác</th>
                  

                  

                </tr>
              </thead>
              <tbody>

                
               
                 @foreach($binhluan as $bl )

                <tr class="gradeX">

                  <td>{{$bl['id_binhluan']}}</td>
                     <td>{{$bl['email']}}</td>
                        <td>{{$bl['thoigian']}}</td>
                           <td>{{$bl['noidung']}}</td>
                              <td>
                                  @if($bl['trangthai']==0)
                                  Chưa duyệt
                                  @endif
                                 @if($bl['trangthai']==1)
                                  Đã duyệt
                                    @endif


                            </td>
                                 <td>{{$bl['id_tin']}}</td>
                                    <td>{{$bl['id_admin']}}</td>
                     <td><div class="form-actions" style="padding:0px; margin: 0px; border: 0px; ">
              <form  action="admin/binhluan/sua-{{$bl['id_binhluan']}}.html">
              <button type="submit" class="btn btn-mini">Duyệt</button></form>

              
              
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