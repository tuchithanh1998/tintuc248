<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\nhomtin;

class nhomtinController extends Controller
{
   

	public function getdanhsachnhomtin($id_nhomtin)
			{
			$nhomtin=nhomtin::find($id_nhomtin);
			$loaitin=$nhomtin->loaitin;

			return view('admin.loaitin.danhsach',['loaitin'=>$loaitin]);

			}
   public function getdanhsach(){

    	$nhomtin=nhomtin::all();
    	return view('admin.nhomtin.danhsach',['nhomtin'=>$nhomtin]);
        
    }
     public function getthem(){

    	return view('admin.nhomtin.them');
    }
     public function postthem(Request $request){
       $this->validate($request,
            [
                'ten'=>'required|min:3|max:100|unique:nhomtin,ten_nhomtin'
            ],
            [   
                'ten.unique'=>'Đã tồn tại tên nhóm tin.',
                'ten.required'=>'Bạn chưa nhập tên nhóm tin.',
                'ten.min'=>'Tên nhóm tin phải có độ dài từ 3 cho đến 100 ký tự.',
                'ten.max'=>'Tên nhóm tin phải có độ dài từ 3 cho đến 100 ký tự.',
            ]

        );
 
        $nhomtin=new  nhomtin;
        $nhomtin->ten_nhomtin=$request->ten;
        $nhomtin->save();

        return redirect('admin/nhomtin/them.html')->with('thongbao','Thêm thành công.');

    }

    public function getsua($id_nhomtin){
      
        $nhomtin=nhomtin::find($id_nhomtin);
    	
    	return view('admin.nhomtin.sua',['nhomtin'=>$nhomtin]);
   		
    }

     public function postsua(Request $request,$id_nhomtin){

            $nhomtin=nhomtin::find($id_nhomtin);

         $this->validate($request,
            [
                'ten'=>'required|min:3|max:100|'
            ],
            [
                
                'ten.required'=>'Bạn chưa nhập tên nhóm tin.',
                'ten.min'=>'Tên nhóm tin phải có độ dài từ 3 cho đến 100 ký tự.',
                'ten.max'=>'Tên nhóm tin phải có độ dài từ 3 cho đến 100 ký tự.',
            ]

        );

       
        $nhomtin->ten_nhomtin=$request->ten;
        $nhomtin->trangthai=$request->radios;
      
       $nhomtin->save();
         return redirect('admin/nhomtin/sua-'.$id_nhomtin.'.html')->with('thongbao','Sửa thành công.');

    }

    public function getxoa($id_nhomtin){
         $nhomtin=nhomtin::find($id_nhomtin);
         $nhomtin->delete();
         return redirect('admin/nhomtin/danhsach.html')->with('thongbao','Xóa thành công.');
    }
}
