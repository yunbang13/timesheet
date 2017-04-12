$(document).ready(function(){

	$(document).on("change","#slxRoleBaru",function(){

		var value = $(this).val();

		if(value==3){
			$(".hideKalauRoleHR").hide();
		} else {
			$(".hideKalauRoleHR").show();
		}

	});

	$(document).on("change","#inpUsernameBaru",function(){

		var email = $(this).val();
		var hdnURL = $("#hdnURL").val();

		$.ajax({
			type:"POST",
			url : hdnURL+"register/check_email",
			data : "email="+email,
			success : function(data){
				// alert(data)
				if(data!=0){
					$("#passEmail").html("<span style='color:#red;font-weight:bold;'>Email already registered</span>");
					$("#btnSubmit").prop("disabled", true);
				} else {
					$("#passEmail").html("");
					$("#btnSubmit").prop("disabled", false);
				}
			}
		});

	});

});