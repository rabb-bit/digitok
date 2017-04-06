<?php

class PrepareAttributes {

	public function perform(){
		return (new static)->handle();
	}

    public function handle($sessionAttributes = [],$adminAttributes = [],$dataToValidate){

        $data = $this->prepareSessionAttributes($attributes,$dataToValidate);

        $data = $this->prepareAdminAttributes($adminAttributes,$dataToValidates);

        return $data;
    }

     private function prepareSessionAttributes($attributes = [],$dataToValidate){
        if(is_null($data)) return null; //throw exception
        foreach ($attributes as $attribute) {
            $data[$attribute] = $this->hasValue($data[$attribute]);
        }
        return $data;
    }

    private function prepareAdminAttributes($attributes = [],$dataToValidate){
        if(is_null($attributes)) return null; //throw exception
        foreach ($attributes as $attribute) {
            $data[$attribute] = $this->isTrue($dataToValidate[$attribute]);
        }

        return $data;
    }

	public function hasValue($attribute){
        return (isset($attribute) && $attribute != "") ? $attribute : '';
    }

    private function isTrue($attribute){
        return ($attribute== 'true') ? 'yes' : 'no';
    }

   

  

}