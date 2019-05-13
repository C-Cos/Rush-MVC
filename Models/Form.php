<?php

class Form{

    protected $surround = 'p';
    protected $_data;
    protected $_name;
    protected $_type;
    protected $_id;

    public function __construct($data = array()){
        
        $this->_data = $data;
    }

    function startForm($action = ' ', $method = 'post', $id = '', $attr_ar = array() ) {
        $str = "<form action=\"$action\" method=\"$method\"";
        if ( !empty($id) ) {
            $str .= " id=\"$id\"";
        }
        $str .= $attr_ar? $this->addAttributes( $attr_ar ) . '>': '>';
        return $str;
    }

    function endForm() {
        return "</form>";
    }
    function surround($html){
        return "<{$this->surround}>{$html}</{$this->surround}>";
    }

    function input($name, $type, $value=''){
        $this->_name = $name;
        $this->_type = $type;

        return $this->surround(
            '<label for ="' . $this->_name . '">' . $this->_name . '</label>
            <input type ="' . $this->_type . '" name ="' . $this->_name . '" placeholder= "' . $this->_name . '" value="' . $value . '" . id = "' . $this->_name . '">');
    }

    function submit($name, $id){
        $this->_name = $name;
        $this->_id = $id;

        return $this->surround('<input type="submit" value="'.$this->_name.'" name="' . $this->_name . '" id="' . $this->_id . '"></input>');
    }

    function textarea($name, $id){
        $this->_name = $name;
        $this->_id = $id;

        return $this->surround(
            '<label for ="' . $this->_name . '">' . $this->_name . '</label>
            <textarea rows="4" cols="50" id="' . $this->_id . '" name="' . $this->_name . '"></textarea>');
    }
}