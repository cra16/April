

$(document).ready(function(){
	$("#form_data").hide();
	$("div").on("click",".foundation-competence",function(event){
		 event.stopPropagation();
          $(this).unbind("click");

		$(".sub-foundation-competence").show();
		$(".sub-foundation-study").hide();
		$(".introduce").hide();
		$("#form_data").show();
	});

	$("div").on("click",".foundation-study",function(event){
		 event.stopPropagation();
          $(this).unbind("click");
		
		$(".sub-foundation-competence").hide();
		$(".sub-foundation-study").show();
		$(".introduce").hide();
		$("#form_data").show();

	});

	$("div").on("click",".sub-foundation-competence",function(event){
		 event.stopPropagation();
          $(this).unbind("click");
        $("#course_name").text($(this).children().text());
		$("#form_data").show();

	});
	$("div").on("click",".sub-foundation-study",function(event){
		 event.stopPropagation();
          $(this).unbind("click");
          $("#course_name").text($(this).children().text());
		$("#form_data").show();

	});

	$("div").on("click","#submit_btn",function(event){
			$("#form_data").submit();

	});
});