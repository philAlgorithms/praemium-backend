$(document).ready(function(){
    var editor;
    var send = $("#send");
    var loading = $("#loading");
    var title = $("#title");
    var banner = $("#banner");
    var token = $('[name="_token"]').val()
    var body;

    ClassicEditor.create(document.querySelector("#editor"),{
	extraPlugins: [],
    })
    .then(function(newEditor){
	editor = newEditor;
    })
    .catch(function(error){
	aJ(error);
    });

    send.click(function(){
	var post = editor.getData();	    
	var file = banner[0].files[0];

	var thatBtn = $(this);

	showLoading($(this), loading);

	var req = new FormData();
	var body = {
	    title: title.val(),
	    banner: file,
	    blog_post: post,
	    _token: token
	};
    
	//req.append('banner', file);
	for (var key in body) {
	    if(body[key] != null || body[key] != undefined){
		req.append(key, body[key]);
	    }
	}
	$.ajax({
	    type:"POST",
	    url:"/api/blogs/create",
	    headers: {
		'Accept': 'application/json',
		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    },
	    processData: false,
	    contentType: false,
	    data: req,
	    error: function(err){
		var error = err.responseJSON;
		hideLoading(thatBtn, loading);
		handleCommonErrors(error);
	    },
	    success:function(data){
		hideLoading(thatBtn, loading);
		Swal.fire(
		    'Successful',
		    data.message,
		    'success'
		);
		location.reload();
	    }
	});
    });
});
