// $('#status option:selected').val()
$(document).ready(function(){
    
    $('.btnXem').on('click',function(){
        var btn=$(this);
        var id = btn.data('id');
        location.href='/admin/chitiet/'+id;
    });
    $('.btnXoa').on('click',function(){
        var btn=$(this);
        var id = btn.data('id');
        location.href='/admin/xoaUser/'+id;
    });
    $('.btnCapquyen').on('click',function(){
        var btn=$(this);
        var id = btn.data('id');
        location.href='/admin/capquyenUser/'+id;
    });
    $('.btnXoaquyen').on('click',function(){
        var btn=$(this);
        var id = btn.data('id');
        location.href='/admin/xoaquyenUser/'+id;
    });
    $('#status').on('change',function(){
        var btn=$(this).children('option:selected').val();
        if(btn==11)$('#result').css('display','block');
        else $('#result').css('display','none');
    });
    $('#status1').on('change',function(){
        var btn=$(this).children('option:selected').val();
        if(btn==12)$('#result1').css('display','block');
        else $('#result1').css('display','none');
    });
    var t=$('#status1 option:selected').val();
    // alert(t);
    if(t==12){
        $('#result1').css('display','block');
    }
    else $('#result1').css('display','none');
    $('#change').on('change',function(){
        var btn=$(this).children('option:selected').val();
        $('#changed').val(btn);
        $('#changed1').val(btn);
    });
})