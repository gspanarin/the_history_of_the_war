	<li class="comment">
		<?= $title ?>:
		<div class="comment-body">
			<p>
				<?php 
				foreach($items as $item){
					echo 
						'<a href="#" class="reply">' .
							(isset($schema_type) ? '<div ' . $schema_type . '>' : '' ) . 
							'<span ' . (isset($schema) ? $schema : '') . '>' . $item . '</span>' . 
							(isset($schema_type) ? '</div>' : '' ) . 
						'</a> ';
				} 
				?>
			</p>
		</div> 
	</li>