$("document").ready(function(){
    $("#send").click(function(){
        var dannie = $("form").serialize();
        $.ajax({
            url:"index.php?r=post/default/ajax",
            type:"POST",
            data:dannie,
            success: function(data){
               // alert(data);
                 if(data){
                 alert("Новость вставлена");
                 }else{
                 alert("Ошибка");
                 }
            }
        });
    });
    setInterval(function(){
        getNews()
    }, 2000);
    function getNews() {
        $.ajax({
            url: "index.php?r=post/default/news",
            type: "POST",
            success: function (data) {
                // alert(data);
                data = jQuery.parseJSON(data);
                //$.each(data, function (i, item) {
                // alert(data);
                $("#news").html("<h1>" + data.title + "</h1><p>" + data.content + "</p>");
                //});
            }
        });
    }
});
