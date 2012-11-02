<? if($posts == array ()): ?>
	<h2>You're not following anyone.&nbsp You may follow other users with similar interest below.</h2>
	<a href="/posts/users/">You may follow other users here</a>

		<? else: ?>
		
		<? foreach($posts as $post): ?>
			<div class="infotext">Posted on <?=Time::display($post['modified'])?></div>
			<h2><?=$post['first_name']?> <?=$post['last_name']?> posted:</h2>
			<?=$post['content']?>
			<br><br>
		<? endforeach; ?>
<? endif; ?>











