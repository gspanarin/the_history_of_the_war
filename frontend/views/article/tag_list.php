	<li class="comment">
		<?= $title ?>:
		<div class="comment-body">
			<p>
				<?php 
				foreach($items as $item){
					echo '<a href="#" class="reply"><span ' . (isset($schema) ? $schema : '') . '>' . $item . '</span></a> ';
				} 
				?>
			</p>
		</div> 
	</li>