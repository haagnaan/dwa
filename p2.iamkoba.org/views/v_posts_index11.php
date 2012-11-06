<?IF(isset($no_followers)): ?>
	<? echo $no_followers; ?>
	
		<? else: ?>
		
			<? foreach($posts as $key => $post): ?>
						
				<?=$post['title']?>
				<br><?=$post['first_name']?><?=$post['last_name']?><?=Time::time_ago($post['created'], '-1');?>
				<br><?=$post['content']?>
			<br><br>

				<? endforeach; ?>
				
<? ENDIF; ?>












