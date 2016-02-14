

$(document).ready(function(){
	$("#form_data").hide();
	$("div").on("click",".foundation-competence",function(event){
		 event.stopPropagation();
          $(this).unbind("click");

		$(".sub-foundation-competence").show();
		$(".sub-foundation-study").hide();
		$(".introduce").hide();
		$("#foundation").val("기초 역량");
		$("#form_data").show();
	});

	$("div").on("click",".foundation-study",function(event){
		 event.stopPropagation();
          $(this).unbind("click");
		
		$(".sub-foundation-competence").hide();
		$(".sub-foundation-study").show();
		$(".introduce").hide();
		$("#foundation").val("기초 학문");
		$("#form_data").show();

	});
  $("div").on("click",".introduction",function(event){
    $(".sub-foundation-competence").hide();
    $(".sub-foundation-study").hide();
    $("#form_data").hide();
    $(".introduce").show();
  });

	$("div").on("click",".sub-foundation-competence",function(event){
		 event.stopPropagation();
          $(this).unbind("click");
         var Course=$("#course_name").text($(this).children().text());
          Course = Course.text();
         var foundation = $("#foundation").val();
      		
           $.ajax(
            { url : "ShowCourse.php",
              data : {
                      'Course' : Course,
                      'foundation':foundation
                    },
              async : false,
              type : "POST",
              success:function(resp){  

                 $(".input_data").eq(0).html(resp);
                
               
                },
                error: function(xhr, option, error){
                  alert(xhr.status); //오류코드
                  alert(error); //오류내용                  
                 } 

          });
		$("#form_data").show();
	

	});
	$("div").on("click",".sub-foundation-study",function(event){
		 event.stopPropagation();
          $(this).unbind("click");
          var Course=$("#course_name").text($(this).children().text());
          Course = Course.text();
           var foundation = $("#foundation").val();
      	
           $.ajax(
            { url : "ShowCourse.php",
              data : {
                      'Course' : Course,
                        'foundation':foundation
                    },
              async : false,
              type : "POST",
              success:function(resp){  

                 $(".input_data").eq(0).html(resp);
          
               
                },
                error: function(xhr, option, error){
                  alert(xhr.status); //오류코드
                  alert(error); //오류내용                  
                 } 

          });
		$("#form_data").show();

	});

	$("div").on("click","#submit_btn",function(event){
			$("#form_data").submit();

	});


});