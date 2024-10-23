<ul>
<?php
foreach ($items as $item){
		echo '<li><a href="/article?section_id=' . $item['id']  . '" class="btn btn-lg  btn-outline-info mt-2  font-weight-bold button">' . $item['title'] . '</a>';
			
		if (isset($item['items'])){
			echo $this->render('collections_items', [
				'items' => $item['items']
			]) ;

		}	
		echo '</li>';
	}
?>
</ul>