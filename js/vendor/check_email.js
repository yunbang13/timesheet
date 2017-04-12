$(document).ready(function(){

	$(document).on("change","#emailLogin",function(){

		var email = $(this).val();
		var hdnURL = $("#hdnURL").val();

		$.ajax({
			type:"POST",
			url : hdnURL+"register/check_email",
			data : "email="+email,
			success : function(data){
				if(data!=0){
					$("#passEmail").html("<span style='color:#red;font-weight:bold;'>Email already registered</span>");
					$("#btnSubmit").prop("disabled", true);
				} else {
					$("#passEmail").html("");
					$("#btnSubmit").prop("disabled", false);
				}
			}
		});
		// alert(email);

	});

	$(document).on("change","#slxStateSelection",function(){

		var hdnURL = $("#hdnURL").val();
		var state = $(this).val();

		// alert(state);

		$.ajax({
			type:"POST",
			url : hdnURL+"register/getDistrict/"+state,
			success : function(data){
				// alert(data);

				document.getElementById("sessions").options.length = 0;

				console.log(data);
				var toAppend = "";
				// toAppend += "<select name='slxClass'>";
				toAppend += "<option value=''>- SELECT -</option>";
		        $.each(data,function(i,o){
		           toAppend += "<option value='"+o.KodDaerah+"'>"+o.Daerah+"</option>";
		        });
		        // toAppend += "</select>";

		        if(data != 0){
		        	$('#sessions').append(toAppend);
				} else {
					document.getElementById("sessions").options.length = 0;
				}
			}
		});

	});

});