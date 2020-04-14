<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tin;
use App\nhomtin;
use App\loaitin;
use Illuminate\Support\Str;


class tinController extends Controller
{
   public function getdanhsach(){
    		$tin=tin::all();
    	return view('admin.tin.danhsach',['tin'=>$tin]);
    }

   public function getthem(){
		$loaitin=loaitin::where('id_nhomtin',1)->get();
     	$nhomtin=nhomtin::all();
    	return view('admin.tin.them',['loaitin'=>$loaitin,'nhomtin'=>$nhomtin]);
    }

    public function postThem(Request $request)
    {
    	
    	$this->validate($request,[
    		'tieude'=>'required|min:3|unique:tin,tieude',
    		'loaitin'=>'required',
    		'tacgia'=>'required|min:3',
    		'mota'=>'required',
    		'tinhot'=>'required',
    		'noidung'=>'required',
            'file'=>'required',
    	],[
    		'tieude.min'=>'Tiêu đề phải có ít nhất 3 kí tự.',
    		'tieude.required'=>'Tiêu đề chưa nhập.',
    		'tieude.unique'=>'Đã tồn tại.',

    		'loaitin.required'=>'Chưa chọn loại tin.',

    		'tacgia.min'=>'Tên tác giả phải có ít nhất 3 kí tự.',

    	'tacgia.required'=>'Tên tác giả phải có ít nhất 3 kí tự.',
    	'mota.required'=>'Mô tả không được để trống.',
    	'tinhot.required'=>'Chọn tin hot hay bình thường.',
    	'noidung.required'=>'Nội dung không được để trống.'


    	]);

    	$tin=new tin;
    	$tin->tieude=$request->tieude;
        $tin->tieudeseo=str_slug($request->tieude);
    	$tin->id_loaitin=$request->loaitin;
    	$tin->tacgia=$request->tacgia;
    	$tin->mota=$request->mota;
    	$tin->tinhot=$request->tinhot;
    	$tin->noidung=$request->noidung;
    	if($request->hasFile('file'))
    	{
    			$file=$request->file('file');
    			$name=$file->getClientOriginalName();
    			$hinh=str::random(4)."_".$name;
    			while ( file_exists("upload/tintuc/".$hinh)) {
    				$hinh=str_random(4)."_".$name;
    			}
    			$file->move("upload/tintuc/",$hinh);
    			$tin->hinhdaidien=$hinh;    			
    	}
    	else
    	{
    		$tin->hinhdaidien="";
    	}
    	$tin->save();
    	return redirect("admin/tin/them.html")->with('thongbao','Thêm thành công.');

    }

    public function getxoa($id_tin){
         $tin=tin::find($id_tin);
         $tin->delete();
         return redirect('admin/tin/danhsach.html')->with('thongbao','Xóa thành công.');
    }


     public function getsua($id_tin){

  	   $tin=tin::find($id_tin);
	   $loaitin=loaitin::find($tin->id_loaitin);
	   $idloaitin=$loaitin->id_loaitin;
       $nhomtin=nhomtin::find($loaitin->id_nhomtin);
       $idnhomtin=$nhomtin->id_nhomtin;
 	   $dsloaitin=$nhomtin->loaitin;
       $dsnhomtin=$nhomtin::all();

  return view('admin.tin.sua',['tin'=>$tin,'idloaitin'=>$idloaitin,'idnhomtin'=>$idnhomtin,'dsloaitin'=>$dsloaitin,'dsnhomtin'=>$dsnhomtin]);
        
    }

public function postsua(Request $request,$id_tin){

            $tin=tin::find($id_tin);
        
        $this->validate($request,[
            'tieude'=>'required|min:3|max:200|unique:tin,tieude,'.$id_tin.',id_tin',
            'loaitin'=>'required',
            'tacgia'=>'required|min:3',
            'mota'=>'required',
            'tinhot'=>'required',
            'noidung'=>'required'
        ],[
            'tieude.min'=>'Tiêu đề phải có ít nhất 3 kí tự.',
            'tieude.required'=>'Tiêu đề chưa nhập.',
            'tieude.unique'=>'Tiêu đề đã tồn tại.',

            'loaitin.required'=>'Chưa chọn loại tin.',

            'tacgia.min'=>'Tên tác giả phải có ít nhất 3 kí tự.',

        'tacgia.required'=>'Tên tác giả phải có ít nhất 3 kí tự.',
        'mota.required'=>'Mô tả không được để trống.',
        'tinhot.required'=>'Chọn tin hot hay bình thường.',
        'noidung.required'=>'Nội dung không được để trống.'


        ]);

        $tin->tieude=$request->tieude;
         $tin->loaitinseo=str_slug($request->tieude);
        $tin->id_loaitin=$request->loaitin;
        $tin->tacgia=$request->tacgia;
        $tin->mota=$request->mota;
        $tin->tinhot=$request->tinhot;
        $tin->noidung=$request->noidung;
        if($request->hasFile('file'))
        {
                $file=$request->file('file');
                $name=$file->getClientOriginalName();
                $hinh=str::random(4)."_".$name;
                while ( file_exists("upload/tintuc/".$hinh)) {
                    $hinh=str_random(4)."_".$name;
        }

        $file->move("upload/tintuc/",$hinh);
            if (file_exists('upload/tintuc/'. $tin->hinhdaidien))
            {
                 unlink("upload/tintuc/".$tin->hinhdaidien);
            }
                $tin->hinhdaidien=$hinh;
                
        }
       
        $tin->save();
        return redirect('admin/tin/sua-'.$id_tin.'.html')->with('thongbao','Sửa thành công.');
    }

}
