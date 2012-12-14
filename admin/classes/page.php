<?php
	class Page
	{
			//class page atributes
			var $content;
			var $title;
			var $keywords;




			//class Page Operations

			function SetContent($newcontent)
			{
				$this->content .= $newcontent;
			}

			function SetTitle($newtitle)
			{
				$this->title = $newtitle;
			}

			function SetKeywords($newkeywords)
			{
				$this->keywords = $newkeywords;
			}

			function Display()
			{
			 echo $this->content;
			 $this->content = '';
			}

			function DisplayTitle()
			{
				
			}


			function DisplayKeywords()
			{
				
			}

			function DisplayMenu()
			{
				
			}
			


	}






?>