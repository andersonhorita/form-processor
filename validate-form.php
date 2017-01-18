<?php
/* #######################################################################

VALIDATE FORM CLASS
Author: Anderson Horita
NOTES: 

######################################################################### */

class ValidateForm {
	public $field_required_arr;
	public $field_email_arr;
	public $msg_error;
	private $error;
 
    function __construct() {
		// hi
    } 
	
	function dataValidateForm(){
		foreach($_POST as $key => $value){
			if(! self::uselessField($key)){
				foreach($this->field_required_arr as $value2){
					if(strtolower($key) == strtolower($value2)){
						if(! $this->requiredValidate($value)){
							$this->addErrorMsgRequired($key);							
						}						
					}
				}
				foreach($this->field_email_arr as $value3){
					if(strtolower($key) == strtolower($value3)){
						if(! $this->emailValidate($value)){
							$this->addErrorMsgEmail($key);							
						}						
					}
				}				
			}					
		}
		if($this->error){
			return false;
		} else {
			return true;
		}
	}
	
	private function addErrorMsgRequired($field){
		$this->msg_error .= utf8_encode("<div class='alert alert-danger'>The <b>".strtoupper($field)."</b> field is required</div>");
		$this->error = true;
	}
	
	private function addErrorMsgEmail($field){
		$this->msg_error .= utf8_encode("<div class='alert alert-danger'>The <b>".strtoupper($field)."</b> field must be a valid email address</div>");
		$this->error = true;
	}
	
	public static function uselessField($field){
		if(strtolower($field)=="submit"){
			return true;
		} else {
			return false;
		}
	}
	
	function requiredValidate($dado){
		if(strlen($dado)>0){
			return true;
		} else {
			return false;
		}
	}
	
	function emailValidate($email){
		if (preg_match('/^[a-zA-Z0-9\-_\.]+@[a-zA-Z0-9\-_\.]+\.[a-zA-Z]{2,3}(\/\S*)?$/',$email)){
			return true;
		} else {
			return false;
		}
	}
	
	function __destruct() {
       // hi
    }
}
?>