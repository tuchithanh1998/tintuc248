<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\loaitin;
use App\nhomtin;

class loaitinController extends Controller
{
    public function getdanhsach(){
    	$loaitin=loaitin::all();
    	return view('admin.loaitin.danhsach',['loaitin'=>$loaitin]);
    }
     public function getthem(){
    	$nhomtin=nhomtin::all();
    	return view('admin.loaitin.them',['nhomtin'=>$nhomtin]);
    }
    public function postthem(Request $request){
       $this->validate($request,
            [
                'ten'=>'required|min:3|max:100|unique:loaitin,ten_loaitin|regex:/[a-zA-Z]+/',
                'id'=>'required|min:1|max:5|unique:loaitin,id_loaitin|regex:/^[a-zA-Z0-9]+$/'
            ],
            [   
                'ten.unique'=>'Đã tồn tại tên loại tin.',
                'ten.required'=>'Bạn chưa nhập tên loại tin.',
                'ten.min'=>'Tên loại tin phải có độ dài từ 3 cho đến 100 ký tự.',
                'ten.max'=>'Tên loại tin phải có độ dài từ 3 cho đến 100 ký tự.',
                'ten.regex'=>'Phải chứa a-zA-Z.',
                'id.unique'=>'Đã tồn tại id loại tin.',
                'id.required'=>'Bạn chưa nhập id loại tin.',
                'id.min'=>'ID loại tin phải có độ dài từ 1 cho đến 5 ký tự.',
                'id.max'=>'ID loại tin phải có độ dài từ 1 cho đến 5 ký tự.',
                'id.regex'=>'ID loại tin a-zA-Z0-9'
            ]

        );
 
        $loaitin=new  loaitin;
        $loaitin->id_loaitin=$request->id;
         $loaitin->loaitinseo=str_slug($request->ten);
        $loaitin->ten_loaitin=$request->ten;

        $loaitin->id_nhomtin=$request->nhomtin;
        $loaitin->save();

        return redirect('admin/loaitin/them.html')->with('thongbao','Thêm thành công.');

    }

    public function getsua($id_loaitin){
      
        $loaitin=loaitin::find($id_loaitin);
        if($loaitin==null)
          return redirect('admin/loaitin/danhsach.html')->with('thongbao','Không tồn tại loại tin.');
        
        $nhomtin=nhomtin::all();
      
        return view('admin.loaitin.sua',['loaitin'=>$loaitin,'nhomtin'=>$nhomtin]);
      
    }

    public function postsua(Request $request,$id_loaitin){

            $loaitin=loaitin::find($id_loaitin);

          $this->validate($request,
            [

            
             'ten'=>'required|min:3|max:100|unique:loaitin,ten_loaitin,'.$id_loaitin.',id_loaitin|regex:/[a-zA-Z]+/'
                
            ],
            [   
                'ten.regex'=>'Phải chứa a-zA-Z.',
                'ten.unique'=>'Đã tồn tại tên loại tin.',
                'ten.required'=>'Bạn chưa nhập tên loại tin.',
                'ten.min'=>'Tên loại tin phải có độ dài từ 3 cho đến 100 ký tự.',
                'ten.max'=>'Tên loại tin phải có độ dài từ 3 cho đến 100 ký tự.',
                
            ]

        );

     
        $loaitin->ten_loaitin=$request->ten;
        $loaitin->id_nhomtin=$request->nhomtin;
        $loaitin->trangthai=$request->radios;
            $loaitin->loaitinseo=str_slug($request->ten);
        $loaitin->save();
         return redirect('admin/loaitin/sua-'.$id_loaitin.'.html')->with('thongbao','Sửa thành công.');

    }


    public function getxoa($id_loaitin){
         $loaitin=loaitin::find($id_loaitin);

          if(count($loaitin->tin)==0)
           {
         $loaitin->delete();
         return redirect('admin/loaitin/danhsach.html')->with('thongbao','Xóa thành công.');
            }
            else
            {
                  return redirect('admin/loaitin/danhsach.html')->with('thongbao','Xóa không thành công.'); 
            }

    }

}
