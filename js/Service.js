$(document).ready(function(){
	$("div").on("click",".foundation-competence",function(event){
		 event.stopPropagation();
          $(this).unbind("click");

		$(".sub-foundation-competence").show();
		$(".sub-foundation-study").hide();
		$(".introduce").hide();
		$("table").hide();
	});

	$("div").on("click",".foundation-study",function(event){
		 event.stopPropagation();
          $(this).unbind("click");
		
		$(".sub-foundation-competence").hide();
		$(".sub-foundation-study").show();
		$(".introduce").hide();
		$("table").hide();
	});

	$("div").on("click",".sub-foundation-competence",function(event){
		 event.stopPropagation();
          $(this).unbind("click");

		$("table").show();

	});
	$("div").on("click",".sub-foundation-study",function(event){
		 event.stopPropagation();
          $(this).unbind("click");

		$("table").show();

	});


});