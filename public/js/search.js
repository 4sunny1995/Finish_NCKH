$(document).ready(function(){
    // alert("OK");
    $.ajaxSetup({headers:{'csrftoken':'{{csrf_tokenn()}}' } });
    //LiveSearch
    $('#adminsearchuser').on('keyup',function(){
        var value=$(this).val();
        // alert(value);
        $.ajax({
            type:'get',
            url:'/admin/searchUser',
            data:{'search':value},
            success:function(result){
                // alert(result.length);
                var data='';
                for(var i=0;i<result.length;i++)data+=result[i];
                // result.forEach(element =>data+el);
                $('#subdanhsachuser').html(data);
            }
        });
    });
    $('#adminsearchdetai').on('keyup',function(){
        var value=$(this).val();
        // alert(value);
        $.ajax({
            type:'get',
            url:'/admin/searchTopic',
            data:{'search':value},
            success:function(result){
                // alert(result.length);
                var data='';
                for(var i=0;i<result.length;i++)data+=result[i];
                // result.forEach(element =>data+el);
                $('#subdanhsach').html(data);
            }
        });
    });
    $('input[name=btnSearch]').on('keyup',function(){
        var value=$(this).val();
        // alert(value);
        $.ajax({
            type:'get',
            url:'/user/searchTopic',
            data:{'search':value},
            success:function(result){
                // alert(result.length);
                var data='';
                for(var i=0;i<result.length;i++)data+=result[i];
                // result.forEach(element =>data+el);
                $('#subdanhsach').html(data);
            }
        });
    });
})