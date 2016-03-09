<?php
	class Total_Subject
	{
		var $number_foundation = [3,2,2,2];
	 	var $number_study = [3,2,3];
		var $count_cert=0;
		var $foundation_cert = ["인문사회","이공학","ICT","ICT심화"];
		var $study_cert = ["인문사회","이공학","융합"];
		var $course_count=null;
			
		function __construct($foundation,$course)
		{
			if(!strcmp($foundation,"기초역량"))
			{
				$temp_array = $this->foundation_cert;
				$temp_number = $this->number_foundation;		
			}
			else
			{
				$temp_array = $this->study_cert;
				$temp_number = $this->number_study;
			}
			$i=0;
			foreach($temp_array as $temp)
			{
				if(!strcmp($course,$temp))
				{
					$this->count_cert = $temp_number[$i];
					if(!strcmp($foundation,"기초역량") && !strcmp($course,"인문사회"))
					{
						$this->course_data = ["인문사회","고전강독","세계관"];
						$this->course_count = [6,2,4];
					}
					else if(!strcmp($foundation,"기초역량") && !strcmp($course,"이공학"))
					{
						$this->course_data = ["수학과학","소통-융복합"];
						$this->course_count = [9,3];
					}
					else if(!strcmp($foundation,"기초역량") && !strcmp($course,"ICT"))
					{
						$this->course_data = ["ICT융합기초","소통-융복합"];
						$this->course_count = [9,3];
					}
					else if(!strcmp($foundation,"기초역량") && !strcmp($course,"ICT심화"))
					{
						$this->course_data = ["ICT융합기초","소통-융복합"];
						$this->course_count = [15,3];	
					}
					else if(!strcmp($foundation,"기초학문") && !strcmp($course,"인문사회"))
					{
						$this->course_data = ["인문사회","고전강독","세계관"];
						$this->course_count = [12,2,4];
					}
					else if(!strcmp($foundation,"기초학문") && !strcmp($course,"이공학"))
					{
						$this->course_data = ["ICT융합기초","소통-융복합"];
						$this->course_count = [15,3];
					}
					else if(!strcmp($foundation,"기초학문") && !strcmp($course,"융합"))
					{
						$this->course_data = ["인문사회","수학과학","소통-융복합"];
						$this->course_count = [9,6,3];
					}
				}
				$i++;
			}
		}
		
			
			
                                             
		
	}

?>