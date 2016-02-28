

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
    $("#course").html("<center>캠  프</center>");

	});

	$("div").on("click",".foundation-study",function(event){
		 event.stopPropagation();
          $(this).unbind("click");
		
		$(".sub-foundation-competence").hide();
		$(".sub-foundation-study").show();
		$(".introduce").hide();
		$("#foundation").val("기초 학문");
		$("#form_data").show();
    $("#course").html("<center>학  회</center>");

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
              async : true,
              type : "POST",
              success:function(resp){  

                 $(".input_data").eq(0).html(resp);
                  if(Course=="ICT심화")
                  {
                     $("#course").html("<center>학 회</center>");
                   
                  }
                  else
                  {
                    $("#course").html("<center>캠  프</center>");
                  }
                           
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
              async : true,
              type : "POST",
              success:function(resp){  

                 $(".input_data").eq(0).html(resp);
                 $("#course").html("<center>학  회</center>");   
               
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
  $("div").on("click",".chk_confirm",function()
  {   
       event.stopPropagation();
          
      $(this).unbind("click");
      if($(this).is(":checked")==true)
      {
        var year_list = '<div class="dropdown" style="float:right" ><button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">year</button><ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1"></ul><input type="hidden" name="year_array[]" class="year" value=""></div>'

        var temp=$(this).next().after(year_list);
        var current_year = parseInt((new Date).getFullYear());
        var temp_string="";
        for(var i = 2011; i<=current_year; i++)
        {
            temp_string=temp_string.concat('<li class="year_data" role="presentation"><a role="menuitem" tabindex="-1">' + i +'</a></li>');
    
        }   
      
        $(this).next().next().find(".dropdown-menu").html(temp_string);
        $(this).next().show();
      }
      else
      {
        $(this).next().next().remove();
      }
  });
  $("div").on("click",".year_data",function()
  {    event.stopPropagation();
          
      $(this).unbind("click");
      var direction=$(this).parent();
      direction.prev().prev().text($(this).text());
      direction.prev().attr("aria-expanded","false");
      direction.prev().parent().attr("class","dropdown");
      direction.next().val($(this).text());

  });
  $(".intro_div").hover(
    function()
    {$(this).css("background-image","none");$(this).find('[class=inner_div]').show();}
    ,
    function()
    {$(this)
      $(this).css("background-image", 'url(../img/college-graduation.png)');
      $(this).css("background-size", '100px');
      $(this).css("background-position","center");
      $(this).find('[class=inner_div]').hide();});

});