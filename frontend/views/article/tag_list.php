	<li class="comment">
		<?= $title ?>:
		<div class="comment-body">
			<p>
				<?php 
				foreach($items as $item){
					echo '<a href="#" class="reply" ' . (isset($schema) ? $schema : '') . ' >' . $item . '</a> ';
				} 
				?>
			</p>
		</div> 
	</li>