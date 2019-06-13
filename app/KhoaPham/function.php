<?php
    function stripUnicode($str){
        if(!$str) return false;
        $unicode=array(
            'a'=>'á|â|ả|ã|ạ|ă|ắ|ằ|ẳ|ằ|ặ|â|ấ|ầ|ẩ|ậ',
            'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ằ|Ẳ|Ẵ|Ặ|Â|Ấ|Ầ|Ẩ|Ậ',
            'd'=>'đ',
            'e'=>'é|è|ẽ|ẹ|ẻ|ê|ế|ề|ệ|ễ|ể',
            'E'=>'É|È|Ẽ|Ẹ|Ẻ|Ê|Ế|Ề|Ệ|Ễ|Ể',
            'i'=>'í|ì|ỉ|ị|ĩ',
            'I'=>'Í|Ì|Ỉ|Ị|Ĩ',
            'o'=>'ó|ò|ỏ|ọ|õ|ô|ố|ồ|ộ|ỗ|ổ|ơ|ớ|ờ|ỡ|ợ|ở',
            'O'=>'Ó|Ò|Ỏ|Ọ|Õ|Ô|Ố|Ồ|Ộ|Ỗ|Ổ|Ơ|Ớ|Ờ|Ỡ|Ợ|Ở',
            'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ữ|ự|ử',
            'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ữ|Ự|Ử',
            'y'=>'ý|ỳ|ỷ|ỹ|ỵ',
            'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ'
        );
        foreach ($unicode as $khongdau => $codau) {
            $arr=explode("|",$codau);
            $str=str_replace($arr,$khongdau,$str);
        }
        return $str;
    }
    function changeTitle($str){
        $str=trim($str);
        if($str=="") return "";
        $str=str_replace(' " ','',$str);
        $str=str_replace(" ' ",'',$str);
        $str=stripUnicode($str);
        $str=mb_convert_case($str,MB_CASE_LOWER,'utf-8');
        $str=str_replace(' ','-',$str);
        return $str;
    }
    function cate_parent($data,$parent=0,$str="--",$select=0){
        foreach($data as $key=>$value){
            $id=$value['id'];
            $name=$value['name'];
            if($value['parent_id']==$parent){
                if($select!=0 && $id==$select){
                    echo "<option value='$id' selected='selected'>$str $name</option>";
                }else{
                    echo "<option value='$id'>$str $name</option>";
                }
                cate_parent($data,$id,$str."--",$select);
            }
        }
    }
?>