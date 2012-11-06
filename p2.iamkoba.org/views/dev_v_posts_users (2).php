<? foreach($users as $key => $user): ?>

	<?=$user['first_name']?> <?=$user['last_name']?>
	
		<?$user_id = $user['user_id'] ?>
		
		<? if(isset($connections[$user_id])): ?>
			<a href='/posts/unfollow/<?=$user['user_id']?>'>Unfollow</a>
			<? else: ?>
		<a href='/posts/follow/<?=$user['user_id']?>'>Follow</a>
				<? endif; ?>
	
	
	<br>
	
<? endforeach; ?>