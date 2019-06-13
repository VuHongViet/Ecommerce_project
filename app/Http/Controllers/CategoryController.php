<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Validator;
class CategoryController extends Controller
{
    public function getAdd(){
        $cate = Category::select('id','name','parent_id')->get();
        return view('pages.category.add',compact('cate'));
    }
    public function postAdd(Request $request){
        $validator = Validator::make($request->all(),
        [
            "txtname" => "required|unique:category,name",
            "txtorder" => "required",
            "txtkeywords" => "required"
        ],
        [
            "txtname.required" => "Vui long nhap vao ten mat hang",
            "txtname.unique" => "Ten mat hang da ton tai vui long kiem tra lai",
            "txtorder.required" => "Vui long nhap vao truong nay",
            "txtkeywords.required" =>  "Vui long nhap vao truong nay"
        ]);
        if($validator->fails()){
            return redirect()->route('getAdd')->withErrors($validator->errors());
        }
        $cate = new Category();
        $cate->name=$request->input('txtname');
        $cate->alias = changeTitle($request->txtname);
        $cate->order=$request->input('txtorder');
        $cate->parent_id=$request->input('txtselect');
        $cate->keywords=$request->input('txtkeywords');
        $cate->description=$request->input('txtdescription');
        $cate->save();
        return redirect()->route('getList')->with(['level'=>'success','message'=>'Insert thanh cong']);
    }
    public function getList(){
        $data = Category::all();
        return view('pages.category.list',compact('data'));
    }
    public function getEdit($id){
        $parent = Category::findOrFail($id)->toArray();
        $cate = Category::select('id','name','parent_id')->get()->toArray();
        return view('cate.edit',compact('parent','cate'));
    }
    public function postEdit(Request $request,$id){
        $validator = Validator::make($request->all(),
        [
            "txtname" => "required|unique:category,name",
            "txtorder" => "required",
            "txtkeywords" => "required"
        ],
        [
            "txtname.required" => "Vui long nhap vao ten mat hang",
            "txtname.unique" => "Ten mat hang da ton tai vui long kiem tra lai",
            "txtorder.required" => "Vui long nhap vao truong nay",
            "txtkeywords.required" =>  "Vui long nhap vao truong nay"
        ]);
        if($validator->fails()){
            return redirect()->route('getAdd')->withErrors($validator->errors());
        }
        $cate = Category::find($id);
        $cate->name=$request->input('txtname');
        $cate->alias = changeTitle($request->txtname);
        $cate->order=$request->input('txtorder');
        $cate->parent_id=$request->input('txtselect');
        $cate->keywords=$request->input('txtkeywords');
        $cate->description=$request->input('txtdescription');
        $cate->save();
        return redirect()->route('getList')->with(['level'=>'success','message'=>'Edit thanh cong!']);
    }
    public function getDelete(Request $request,$id){
        $cate = Category::find($id);
        $cate->delete();
        return redirect()->route('getList')->with(['level'=>'success','message'=>'Edit thanh cong!']);
    }
}
