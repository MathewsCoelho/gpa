<?php

function mostraAlerta($tipo) {
	if(isset($_SESSION[$tipo])) {
?>
		<div class="conteudoAlerta <?= $tipo ?>">
			<button id="remove"> <i class="fa fa-times" aria-hidden="true"></i> </button>
			<p> <?= $_SESSION[$tipo]?> </p>
		</div>
<?php
		unset($_SESSION[$tipo]);
	}
}