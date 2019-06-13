$(document).ready(function(){
    $("a#del_img").on('click',function(){
        var url="http://localhost/DoAn/lar/product/delImg/";
        var _token=$("form[name='frmEdit']").find("input[name='_token']").val();
        var image = $(this).parent().find("img").attr("src");
        var idProduct = $(this).parent().find("img").attr("idProduct");
        var idDetail = $(this).parent().find("img").attr("idDetail");
        var idObject = $(this).parent().find("img").attr("idObject");
        $.ajax({
            url:url + idProduct,
            type:'GET',
            cache:false,
            data:{"_token":_token,"idProduct":idProduct,"image":image,"idDetail":idDetail,"idObject":idObject},
            success:function(data){
                if(data == "Fuck"){
                    $("#"+idDetail).remove();
                }else{
                    alert('Not Remove');
                }
            }
        });
    });
});