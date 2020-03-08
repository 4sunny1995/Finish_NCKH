$(document).ready(function(){
    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
      });
    $("#btnImportUser123").on('submit',function(){
      var data=$("#customFile").val();
      $.ajaxSetup({headers:{'csrftoken':'{{csrf_tokenn()}}' } });
      $.ajax({
        type: "POST",
        url: "/admin/import/User",
        contentType: false,
        dataType: "Json",
        data: {'data':data},
        success: function(data) {
           alert(data);
        },
        error: function (jqXHR, textStatus, errorThrown) {
           alert(jqXHR.responseText);
    }});
    })
})