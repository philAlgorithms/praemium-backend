function jigsaw(callback){
    $("#jigsaw").modal('show');
    var captcha = sliderCaptcha({
        id:'captcha',
	setSrc: function (){
	    return 'https://source.unsplash.com/' + getRandomInt(500,600) + 'x' + getRandomInt(350,400) + '/?crypto';
	},
	onSuccess: function(){
	    $("#jigsaw").modal('hide');
	    $("#captcha").empty();
	    callback(); 
	},
    });
}


