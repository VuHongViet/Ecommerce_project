<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Products;
use Validator;
use App\Product_Detail;
use File;
use DB;
class ProductController extends Controller
{
    public function getAdd(){
        $cate = Category::select('id','name','parent_id')->get();
        return view('pages.product.add',compact('cate'));
    }
    public function postAdd(Request $request){
        $v = Validator::make($request->all(),
        [
            "txtname" => "required|unique:products,name",
            "txtprice" => "required",
            "txtintro" => "required",
            "txtcontent" => "required",
            "txtkeyword" => "required",
            "txtdescription" => "required"
        ],
        [
            "txtname.required" => "Vui long nhap vao ten san pham",
            "txtname.unique" => "Ten san pham da ton tai",
            "txtprice.required" => "Vui long nhap vao gia san pham",
            "txtintro.required" => "Vui long nhap vao mo ta san pham",
            "txtcontent.required" => "Vui long nhap noi dung cho san pham",
            "txtkeyword.required" => "Vui long nhap vao Keyword",
            "txtdescription.required" => "Vui long nhap vao day"
        ]);
        if($v->fails()){
            return redirect()->route('getAdd')->withErrors($v->errors());
        }
        $product = new Products();
        $filename = $request->file('photos')->getClientOriginalName();
        $product->name = $request->input('txtname');
        $product->alias = changeTitle($request->input('txtname'));
        $product->price = $request->input('txtprice');
        $product->intro = $request->input('txtintro');
        $product->content = $request->input('txtcontent');
        $product->image = $filename;
        $product->keywords = $request->input('txtkeyword');
        $product->description = $request->input('txtdescription');
        $product->cate_id = $request->input('sltSelect');
        $request->file('photos')->move('resources/upload/product/',$filename);
        $product->save();
        if($request->hasFile('Image')){
            $allowedfileExtension=['jpg','png'];
            $files=$request->file('Image');
            $exe_flg = true;
            foreach($files as $file){
                $extension=$file->getClientOriginalExtension();
                $check=in_array($extension,$allowedfileExtension);
                if(!$check){
                    $exe_flg=false;
                    break;
                }
            }
            if($exe_flg){
                $arr=[];
                $i=0;
                $product_id = $product->id;
                foreach($request->file('Image') as $photo){
                    $filename=$photo->getClientOriginalName();
                    $arr[$i]=$filename;
                    $i++;
                    $photo->move('resources/upload/product_detail/',$filename);
                }
                $filename=implode(";",$arr);
                $product_detail = new Product_Detail();
                $product_detail->image = $filename;
                $product_detail->product_id = $product_id;
                $product_detail->save();
                return redirect()->route('getAddProduct')->with(['message'=>'Insert San Pham Thanh Cong !!!']);
            }else {
				echo "Falied to upload. Only accept jpg, png photos.";
			}
        }
    }
    public function getList(){
        $data = Products::select('id','name','price','cate_id','created_at')->get();
        return view('pages.product.list',compact('data'));
    }
    public function getDelete($id){
        $product_image = Products::find($id)->product_detail->toArray();
        $data = explode(";",$product_image[0]['image']);
        foreach($data as $item){
            File::delete('resources/upload/product_detail/'.$item);
        }
        $product = Products::find($id);
        File::delete('resources/upload/product/'.$product->image);
        $product->delete($id);
        return redirect()->route('getListProduct')->with(['message'=>'Delete Success']);
    }
    public function delImg(Request $request,$id){
        if($request->ajax()){
            $idProduct = (int)$request->get('idProduct');
            $idDetail = (int)$request->get('idDetail');
            $idObject = (int)$request->get('idObject');
            $data = Product_Detail::select('image')->where('product_id',$idProduct)->get()->toArray();
            $files = explode(";",$data[0]['image']);
            if(!empty($files[$idDetail])){
                $img = 'resources/upload/product_detail/'.$files[$idDetail];
                if(File::exists($img)){
                    File::delete($img);
                }
            }
            $file = [];
            for($i=0;$i<count($files);$i++){
                if($files[$i] != $files[$idDetail]){
                    $file[] = $files[$i];
                }
            }
            $arrr = implode(";",$file);
            $images = implode(";",$files);
            $val = str_replace($images,$arrr,$images);
            $Image = Product_Detail::find($idObject);
            $Image->image = $val;
            $Image->save();
            return "Fuck";
        }
    }
    public function getEdit($id){
        $parent = Products::findOrFail($id)->toArray();
        $product = Category::select('id','name','parent_id')->get()->toArray();
        $fuck = Product_detail::select('id')->where('product_id',$id)->get()->toArray();
        return view('pages.product.edit',compact('parent','product','fuck'));
    }
    public function postEdit(Request $request,$id){
        $product = Products::find($id);
        $filename = $request->file('photos')->getClientOriginalName();
        $product->name = $request->input('txtname');
        $product->alias = changeTitle($request->input('txtname'));
        $product->price = $request->input('txtprice');
        $product->intro = $request->input('txtintro');
        $product->content = $request->input('txtcontent');
        $product->image = $filename;
        $product->keywords = $request->input('txtkeyword');
        $product->description = $request->input('txtdescription');
        $product->cate_id = $request->input('txtselect');
        $request->file('photos')->move('resources/upload/product/',$filename);
        $product->save();
        if($request->hasFile('Image')){
            $allowedfileExtension=['jpg','png'];
            $files=$request->file('Image');
            $exe_flg = true;
            foreach($files as $file){
                $extension=$file->getClientOriginalExtension();
                $check=in_array($extension,$allowedfileExtension);
                if(!$check){
                    $exe_flg=false;
                    break;
                }
            }
            if($exe_flg){
                $arr=[];
                $i=0;
                $product_id = $product->id;
                foreach($request->file('Image') as $photo){
                    $filename=$photo->getClientOriginalName();
                    $arr[$i]=$filename;
                    $i++;
                    $photo->move('resources/upload/product_detail/',$filename);
                }
                $filename=implode(";",$arr);
                $product_detail = new Product_Detail();
                $product_detail->product_id = $product_id;
                $product_detail->image = $filename;
                $product_detail->save();
                return redirect()->route('getListProduct')->with(['message'=>'Insert San Pham Thanh Cong !!!']);
            }else {
				echo "Falied to upload. Only accept jpg, png photos.";
			}
        }
    }
}
