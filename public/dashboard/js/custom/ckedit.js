$(document).ready(function(){
    var editor;
    var send = $("#send");
    var loading = $("#loading");
    var cl = $('#user');
    var subject = $("#subject");
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

    if (document.getElementById('user')) {
      var user = document.getElementById('user');
      const example = new Choices(user, {
	searchPlaceholderValue: 'Search Client',
      });
    }

    send.click(function(){
	body = '';
	body += editor.getData();	    

	var thatBtn = $(this);

        showLoading($(this), loading);

	var req = {
	    user: cl.val(),
	    subject: subject.val(),
	    body: body,
	    _token: token
	};

	$.ajax({
	    type:"POST",
	    url:"api/send-mail",
	    headers: {
            	'Accept': 'application/json',
	    	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    },
	    data: req,
	    error: function(err){
	    	var error = err.responseJSON;
		hideLoading(thatBtn, loading);
		handleCommonErrors(error);
		aJ(error);
	    },
	    success:function(data){
		    aJ(data);
		hideLoading(thatBtn, loading);
		Swal.fire(
      		    'Successful',
      		    data.message,
      		    'success'
		);
		//location.reload();
	    }
    	});
    });

});
