<?php
if (isset($_GET["callback"]) && !empty($_GET["callback"])) {
  $callback = $_GET["callback"];
	//Header für ein JavaScript
  	header("Content-Type: application/javascript");
  	
  	if (isset($_GET["id"]) && !empty($_GET["id"])) {
		$id_nummber = $_GET["id"];
	} else { echo "Error: Ajax !"; }
  	
  	
  	echo $callback. "('";
            echo '<form action="/wp-comments-post.php" method="post" id="commentform" class="comment-form"><p class="comment-notes">Deine E-Mail-Adresse wird nicht veröffentlicht. Erforderliche Felder sind markiert <span class="required">*</span></p>	<p class="comment-form-author"><label for="author">Name <span class="required">*</span></label> <input id="author" name="author" type="text" value="" size="30" aria-required="true"></p><p class="comment-form-email"><label for="email">E-Mail-Adresse <span class="required">*</span></label> <input id="email" name="email" type="text" value="" size="30" aria-required="true"></p><p class="comment-form-url"><label for="url">Website</label> <input id="url" name="url" type="text" value="" size="30"></p><p class="comment-form-comment"><label for="comment">Kommentar</label> <textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea></p><p class="form-allowed-tags">Du kannst folgende <abbr title="HyperText Markup Language">HTML</abbr>-Tags benutzen: <code>&lt;a href="" title=""&gt; &lt;abbr title=""&gt; &lt;acronym title=""&gt; &lt;b&gt; &lt;blockquote cite=""&gt; &lt;cite&gt; &lt;code&gt; &lt;del datetime=""&gt; &lt;em&gt; &lt;i&gt; &lt;q cite=""&gt; &lt;strike&gt; &lt;strong&gt; </code></p>	<p class="form-submit"><input name="submit" type="submit" id="submit" value="Kommentar abschicken"><input type="hidden" name="comment_post_ID" value="'.$id_nummber.'" id="comment_post_ID"><input type="hidden" name="comment_parent" id="comment_parent" value="0"></p></form>';	
	echo "')";
}
?>
