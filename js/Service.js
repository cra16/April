

$(document).ready(function(){
	$("#form_data").hide();
  $(".register_table").hide();
  $(".register_table_mobile").hide();
	$("div").on("click",".foundation-competence",function(event){
		 event.stopPropagation();
          $(this).unbind("click");

		$(".sub-foundation-competence").show();
		$(".sub-foundation-study").hide();
		$(".introduce").hide();
		$("#foundation").val("기초역량");
		$("#form_data").show();
    $(".register_table").hide();
    $(".register_table_mobile").hide();
    $("#course").html("<center>캠  프</center>");

	});

	$("div").on("click",".foundation-study",function(event){
		 event.stopPropagation();
          $(this).unbind("click");
		
		$(".sub-foundation-competence").hide();
		$(".sub-foundation-study").show();
		$(".introduce").hide();
		$("#foundation").val("기초학문");
		$("#form_data").show();
    $(".register_table").hide();
    $(".register_table_mobile").hide();
    $("#course").html("<center>학  회</center>");

	});
  $("div").on("click",".introduction",function(event){
    $(".sub-foundation-competence").hide();
    $(".sub-foundation-study").hide();
    $("#form_data").hide();
    $(".register_table").hide();
    $(".register_table_mobile").hide();
    $(".introduce").show();
    
  

  });
  $("div").on("click",".register_data",function(event)
  {
    $(".sub-foundation-competence").hide();
    $(".sub-foundation-study").hide();
    $("#form_data").hide();
    $(".introduce").hide();
    
    $(".register_table").show();
  })

	$("div").on("click",".sub-foundation-competence",function(event){
		 event.stopPropagation();
          $(this).unbind("click");
          var data=$(this).children().text();
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
                     $("#area").val(data);
                  }
                  else
                  {
                    $("#course").html("<center>캠  프</center>");
                    $("#area").val(data);
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
          var data=$(this).children().text();
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
                 $("#area").val(data); 
               
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
        var indexcount_list = '<input type="hidden" name="index_array[]" value="">';
        var temp=$(this).next().after(year_list);
        $(this).next().before(indexcount_list);
        var current_year = parseInt((new Date).getFullYear());
        var temp_string="";
        for(var i = 2011; i<=current_year; i++)
        {
            temp_string=temp_string.concat('<li class="year_data" role="presentation"><a role="menuitem" tabindex="-1"><input type="checkbox" class="year_class" name = "year_array[]" value='+"\""+i+"\""+'>'+i+'</a></li>');
    
        }   
        $(this).next().next().next().find(".dropdown-menu").html(temp_string);
        $(this).next().next().show();
     }
      else
      {
        $(this).next().next().next().remove();
        $(this).next().remove();
      }
  });
  $("div").on("click",".year_class",function()
  {   
        event.stopPropagation();
        $(this).unbind("click");
      
        var Parent = $(this).parent().parent();
        var count=0;
        var temp=Parent.parent().find(".year_class");
        temp.each(function(){
           if($(this).is(":checked")==true)
            count++;
        });
        
       Parent.parent().parent().prev().prev().val(count); 
      
  


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
  $("body").on("click","#check_btn",function()
  { 
     var foundation = $("#foundation").val();
     var area = $("#course_name").text();
          var formdata = $("#form_data").serializeArray();

      $.ajax(

            { url : "RequestCheck.php",
              data : formdata,
              async : true,
              type : "POST",
              success:function(resp){  
                  $( "div.success" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );
                  //alert(resp);
                  
               
                },
                error: function(xhr, option, error){
                  //alert(xhr.status); //오류코드
                  //alert(error); //오류내용

                     $( "div.failure" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );           
                    if(xhr.responseText=="1")
                    {
                      $("div.failure").text("교과목이 부족");
                    }
                    else if(xhr.responseText=="2")
                    {
                      $("div.failure").text("비교과 부족");
                    }
                    else if(xhr.responseText=="3")
                    {
                      $("div.failure").text("현장 부족");
                    }
                 } 

          });
  });

  var windowsize = $(window).width();
  if (windowsize < 450) {
      //if the window is greater than 440px wide then turn on jScrollPane..
        $('.introduce').hide();
        $(".introduce_mobile").show();

    }
    else
    {
        $('.introduce').show();
        $(".introduce_mobile").hide();
    }
  $(window).resize(function() {
    windowsize = $(window).width();
    if (windowsize < 450) {
      //if the window is greater than 440px wide then turn on jScrollPane..
        if($('.introduce').css("display")=='block')
        {
            $('.introduce').hide();
            $(".introduce_mobile").show();
            $('.register_table').hide();
            $('.register_table_mobile').hide();

        }

        if($('.register_table').css("display")=='block')
        {
            $('.register_table').hide();
            $('.register_table_mobile').show();
            $('.introduce').hide();
            $(".introduce_mobile").hide();

        }    

    }
    else
    {
        if($('.introduce_mobile').css("display")=='block')
        {
            $('.introduce').show();
            $(".introduce_mobile").hide();
            $('.register_table').hide();
            $('.register_table_mobile').hide();

        }
        if($('.register_table_mobile').css("display")=='block')
        {
            $('.register_table').show();
            $('.register_table_mobile').hide();
            $('.introduce').hide();
            $(".introduce_mobile").hide();

        }
    }
});

});


