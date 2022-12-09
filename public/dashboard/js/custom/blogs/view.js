const dataTableSearch = new simpleDatatables.DataTable("#datatable-search", {
    searchable: true,
    fixedHeight: false,
    perPageSelect: false
});

$(document).ready(function(){
    $(".delete").click(function(){
	var that = $(this);
	var loading = that.closest('div').find('.loading-delete');
	showLoading(that, loading);

	Swal.fire({
	    title: 'Delete post?',
	    text: "This blog post will be removed from the system",
	    icon: 'warning',
	    showCancelButton: true,
	    confirmButtonColor: '#3085d6',
	    cancelButtonColor: '#d33',
	    confirmButtonText: 'Yes, delete it!'
	}).then((result) => {
	    if (result.isConfirmed) {
		$.ajax({
		    type:"DELETE",
		    url:"/api/blogs/"+that.attr('data-uuid'),
		    headers: {
			'Accept': 'application/json',
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
		    },
		    error: function(err){
			var error = err.responseJSON;aJ(error);
			handleCommonErrors(error);
		    },
		    success:function(data){
			Swal.fire(
			    'Deleted!',
			    'This post has been deleted.',
			    'success'
			);

			location.reload();
		    }
		});
	    }
	});
    });
});
