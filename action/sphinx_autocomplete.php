<?php

function action_sphinx_autocomplete() {
	$terms = explode(' ', _request('term'));
	$max_terms = 10;

	$search = array_pop($terms);
	$auto = [];


	if (strlen($search) >= 2) {
		include_spip('inc/charsets');

		$racine = strtolower(translitteration($search));

		$ab = mb_substr($racine, 0, 2);
		$a = mb_substr($ab, 0, 1);

		$f = 'squelettes/autocomplete/'.$a.'/'.$ab.'.txt';

		if (!file_exists($f)) return;
		$mots = array_map('trim', file($f));

		foreach($mots as $m) {
			$m1 = strtolower(translitteration($m));
			if (substr($m1, 0, strlen($racine)) == $racine
			AND strlen($m1) > strlen($racine)) {
				$t = $terms;
				array_push($t, $m);
				$auto[$m1] = array("label" => $m, "value" => join(" ", $t));
				
				if (count($auto) >= $max_terms) break;
			}
		}
	}

	// retrier les résultats par ordre alphabétique
	ksort($auto);

	header('Content-Type: text/json');
	echo json_encode(array_values($auto));

}

