<?php 

	$pages = array();

	$headers['pricing']['title'] = 'Pricing';
	$headers['faq']['title'] = 'FAQ';
	

	$pages['largeprojects']['title'] = 'Large Projects';
	$pages['largeprojects']['link'] = 'largeprojects';
	$pages['largeprojects']['parent'] = 'pricing';


	$pages['smallprojects']['title'] = 'Small Projects';
	$pages['smallprojects']['parent'] = 'pricing';
	$pages['smallprojects']['link'] = 'smallprojects';

	

	/*if ($page != '') {


		$subhead = '<div class="subhead">';
		foreach ($pages as $key => $val) {

				if ($pages[$key]['parent'] === $page){
					$subhead .= '<a href="'.$pages[$key]['link'].'"">'.$pages[$key]['title'].'</a>';
					
					$parent = $pages[$key]['parent'];
				}
				
		
		}
		$subhead .= '</div><div class="clear"></div>';
		if (!empty($parent)) {
			echo '<a href="'.$parent.'" class="page-title"><h1>'.$headers[$parent]['title'].'</h1></a>';
		}else if(!empty($headers[$page]['title'])) {
			echo '<a href="'.$page.'" class="page-title"><h1>'.$headers[$page]['title'].'</h1></a>';
		}
		echo $subhead;

	}*/

	?>