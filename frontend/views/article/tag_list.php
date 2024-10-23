	<li class="comment">
		<?= $title ?>:
		<div class="comment-body">
			<p>
				<?php 
				foreach($items as $item){
					echo '<a href="#" class="reply">' . $item . '</a> ';
				} 
				?>
			</p>
		</div> 
	</li>