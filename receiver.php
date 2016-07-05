<?php
	
class ActionObject {
	var $name;
	var $timestamp;

	function ActionObject($name, $timestamp) {
		$this->name = $name;
		$this->timestamp = $timestamp;
	}

	function getName() {
		return $this->name;
	}

	function getTimestamp() {
		return $this->timestamp;
	}

	function getTimestampInMillis() {
		return $this->timestamp;
	}
}

class QuestionObject extends ActionObject {
	
	var $question;
	var $answer;

	function QuestionObject($name, $timestamp, $question, $answer) {
		$this->ActionObject($name, $timestamp);
		$this->question = $question;
		$this->answer = $answer;
	}

	function getQuestion() {
		return $this->question;
	}

	function getAnswer() {
		return $this->answer;
	}
}

function getDuration($timestamp1, $timestamp2) {
	return $timestamp2-$timestamp1;
}

// {"0": [{"answer": "Nintendo", "time": 1467044387344}], "1": [{"answer": "Daddy", "time": 1467044389390}], "2": [{"answer": "cake", "time": 1467044391753}], "3": [{"answer": "mov//ie-tickets", "time": 1467044394746}], "4": [{"answer": "yes", "time": 1467044397012}], "5": [{"answer": "A girl has no name", "time": 1467044399048}], "variant": "spsq-long-short//", "participantId": "1000"}

$string = '{"variant": "spsq-long-short", "participantId": "1000"}';


$jsonString = json_decode(file_get_contents('php://input'), true);
if(json_last_error() == 0) {
//	if($jsonString->participantId >) {
$filename = $jsonString['participantId'];
$filename .= '-';
$filename .= $jsonString['variant'];

if(file_exists($filename . '.txt')) {
$date = new DateTime();
$filename .= '-';
$filename .= $date->getTimestamp();
}

$filename .= '.txt';


$file = fopen($filename, 'w') or die("can't open file");
		fwrite($file, json_encode($jsonString));
		fclose($file);
//	} else {
//	echo json_last_error();
//}

}

?>
