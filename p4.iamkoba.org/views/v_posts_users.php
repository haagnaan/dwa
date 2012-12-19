<form method = 'Post' action='/posts/p_follow'>


		<? foreach($users as $user): ?>

			<?=$user['first_name']?> <?=$user['last_name']?>
			
				<?$user_id = $user['user_id'] ?>
				
				<? if(isset($connections[$user['user_id']])): ?>
						<a href='/posts/unfollow/<?=$user['user_id']?>'>Unfollow</a>
					<? else: ?>
				<a href='/posts/follow/<?=$user['user_id']?>'>Follow</a>
						<? endif; ?>
			
			
			<br>
			
		<? endforeach; ?>
		
</form>