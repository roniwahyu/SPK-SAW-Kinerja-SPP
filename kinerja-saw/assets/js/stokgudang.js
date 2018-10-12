    $("body").on("click",'.reset',function(e){
            e.preventDefault();
             // $(".reset").click(function() {
            // $(this).closest('form').find("input[type=text],input[type=hidden], textarea").val("");
            // $(this).closest('form').find("input[type=text],input[type=hidden], textarea").reset();
            $('form').clearForm();
            var id=null;
        });
	$('body').on('click','.loginbtn',function(e){
		e.preventDefault();
		$('.formlogin').show(200);
		$('.panel-daftar').hide(100);
	});
	$('body').on('click','.daftarbtn',function(e){
		e.preventDefault();
		$('.panel-daftar').show(100);
		$('.formlogin').hide(200);
		
	});