<?php
/* #######################################################################

SEND FORM CLASS
Author: Anderson Horita
NOTES: 

######################################################################### */

class SendForm {
	private $email_from;
	private $email_to;
	private $subject1;
	private $body1;
	private $headers1;
	private $header1;
	private $footer1;
	public $msg_return;
 
    function __construct() {
		$this->send_adm = false;
		$this->send_wm = true;
		$this->send_usr = false;
		$this->email_from = 'Test <teste@netfreegames.com>';
		$this->email_to = 'test@test.com';
		$this->headers1  = "MIME-Version: 1.0\r\n";
		$this->headers1 .= "Content-type: text/html;charset=\"iso-8859-1\"\r\n";
		$this->headers1 .= "From: ".$this->email_from."\n";
		$this->subject1 = "Form processor example";
		$this->body1 = strtoupper($this->subject1)."<br><br>\n\n";
    } 
	function takeDataForm(){
		foreach($_POST as $key => $value){
			if(! ValidateForm::uselessField($key)){
				$this->body1 .= "<b>".ucfirst($key).":</b> ".htmlspecialchars($value)."<br>\n";
			}					
		}
	}
		
	function sendEmail(){
		if ($_POST) {
			$this->takeDataForm();			
			if (@mail($this->email_to, $this->subject1, $this->body1, $this->headers1)){
				$this->msg_return = "<div class='alert alert-success'>Data successfully sent!</div>";
				
			} else {
				$this->msg_return = "<div class='alert alert-danger'>Unfortunately the data could not be sent. Please try again later.</div>";
			}
		}
	}
	
	function __destruct() {
       // hi
    }
}
?>