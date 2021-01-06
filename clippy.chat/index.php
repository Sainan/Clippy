<?php
require "vendor/autoload.php";
$locales = Clippy\Command::getOutputLocales();
$lang=(empty($_GET["lang"])||!in_array($_GET["lang"],$locales))?"en-GB":$_GET["lang"];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Talk to Clippy</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.6.5/dist/css/uikit.min.css" />
</head>
<body>
	<div class="uk-container uk-container-expand uk-margin-top">
		<h1>Talk to Clippy</h1>
		<form method="GET" action="/">
			<p>
				Output Locale: <select name="lang">
					<?php
					foreach($locales as $locale)
					{
						?>
						<option<?=($locale==$lang?" selected":"")?>><?=$locale;?></option>
						<?php
					}
					?>
				</select>
			</p>
			<input class="uk-input" type="text" name="message" value="<?=htmlspecialchars(@$_GET['message']);?>"<?=(empty($_GET["message"])?" autofocus":"");?> />
		</form>
		<?php
		if(!empty($_GET["message"]))
		{
			$is_rand = empty($_GET["seed"]);
			$seed = $is_rand ? rand() : intval($_GET["seed"]);
			srand($seed);
			Clippy\Command::setOutputLocale($lang);
			$command = Clippy\Command::match($_GET["message"]);
			?>
			<p class="uk-h3"><i>Clippy says</i> <?=nl2br($command->getResponse());?></p>
			<?php
			if(is_subclass_of($command::class, Clippy\CommandRandomised::class))
			{
				?>
				<div class="uk-alert-primary" uk-alert>
					<?php
					if($is_rand)
					{
						?>
						<p>This message is randomised; use <a href="/?lang=<?=$lang;?>&message=<?=urlencode($_GET['message']);?>&seed=<?=$seed;?>" rel="noreferer">a static link</a> if you want to share it.</p>
						<?php
					}
					else
					{
						?>
						<p>You're using a static link so the message is always the same; <a href="/?lang=<?=$lang;?>&message=<?=urlencode($_GET['message']);?>" rel="noreferer">click here for a random response</a>.</p>
						<?php
					}
					?>
				</div>
				<?php
			}
			?>
			<p>This message was returned by calling <code>-&gt;getResponse()</code> on</p>
			<pre><?php var_dump($command); ?></pre>
			<p>which was the result of <code>Clippy\Command::match($_GET["message"])</code></p>
			<hr>
			<?php
		}
		?>
		<p><a href="https://github.com/Sainan/Clippy" rel="noreferer">Clippy is open-source</a></a></p>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/uikit@3.6.5/dist/js/uikit.min.js"></script>
</body>
</html>
