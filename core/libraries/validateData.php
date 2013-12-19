<?php
	
	class ValidateData {

		public function validateEmail ($data) {
			if (!preg_match('//', $data)) :
				throw new Exception("[ERROR] E-mail inválido");
			else:
				return true;
			endif;
		} // validateEmail

		public function validateNumber ($data) {
			if (!preg_match("//", $data)) :
				throw new Exception("[ERROR] Erro ao validar número");
			else :
				return true;
			endif;	
		} // validateNumber

		public function validateDate ($data) {
			if (!preg_match("//", $data)) :
				throw new Exception("[ERROR] Erro ao validar data");
			else :
				return true;
			endif;	
		} // validateDate

		public function validateTime ($data) {
			if (!preg_match("//", $data)) :
				throw new Exception("[ERROR] Erro ao validar a hora");
			else :
				return true;
			endif;	
		} // validateTime

		public function validateDateTime ($data) {
			if (!preg_match("//", $data)) :
				throw new Exception("[ERROR] Erro ao validar data e hora");
			else :
				return true;
			endif;	
		} // validateDateTime

		public function escapeString ($data) {
			return addslashes($data);
		} // validateNumber

	} // ValidateData

?>