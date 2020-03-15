<?php

session_start();
$_SESSION['timeout'] = time();



//Zeit setzen
#<<Zeit>>
if (!isset($_SESSION['zeit'])) {
	$_SESSION['zeit'] = date("H:i:s");
}

include_once 'builder.php';
include_once 'database.php';

$temp = trim($_SERVER['REQUEST_URI'], '/');
$url = explode('/', $temp);

if (!empty($url[1])) {
	//alles zu kleinbuchstaben umwandeln
	$url[1] = strtolower($url[1]);
	switch ($url[1]) {
			// hier weitere seiten einfügen

		case 'login':
			build('login.php');
			break;
		case 'themen':
			build('themen.php');
			break;

		case 'userhome':
			build('userhome.php');
			break;

		case 'feed':
			build('feed.php');
			break;

		case 'impressum':
			build('impressum.php');
			break;

		case 'hilfe':
			build('hilfe.php');
			break;

		case 'spenden':
			build('spenden.php');
			break;

		case 'card':
			build('card.php');
			break;

		case 'trashform':
			build('trashform.php');
			break;

		case 'erfolgreich':
			build('erfolgreich.php');
			break;

		case 'account_create':
			build('account_create.php');
			break;

		case 'voting_create':
			build('voting_create.php');
			break;

		case 'form_auftrag':
			build('form_auftrag.php');
			break;

		case 'write_vote':
			build('write_vote.php');
			break;

		case 'session_destroy':
			build('session_destroy.php');
			break;

		case 'frage_add':
			build('frage_add.php');
			break;

		case 'abstimmung_erstellen':
			build('abstimmung_erstellen.php');
			break;

		case 'abstimmung_review':
			build('abstimmung_review.php');
			break;

		case 'loginvalidation':
			build('loginvalidation.php');
			break;

		case 'account_write':
				build('account_write.php');
				break;

		case '404':
				build('404.php');
				break;
	
		default:
			build('404.php');
			break;
	}
} else {
	build('login.php');
}
