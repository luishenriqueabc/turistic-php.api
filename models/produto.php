<?php class Produto{
    public $id;
    public $name;
    public $value;
    public $writer;
    public $inventory;
    function __construct($id, $name, $value, $writer, $inventory) {
        $this->id = $id;
        $this->name = $name;
        $this->value = $value;
        $this->writer = $writer;
        $this->inventory = $inventory;
    }
    function create(){
        echo "Cadastrar no banco  "."<br>"."<br>"
        ."Id : ". $this->id. "<br>"
        ."Name : ".$this->name."<br>"
        ."Valor : ".$this->value."<br>"
        ."Escritor : ".$this->writer."<br>"
        ."Inventário : ".$this->inventory."<br>";
    }
    function delete(){
        echo "Delete no banco   "."<br>"."<br>"
        ."Id : ". $this->id. "<br>"
        ."Name : ".$this->name."<br>"
        ."Valor : ".$this->value."<br>"
        ."Escritor : ".$this->writer."<br>"
        ."Inventário : ".$this->inventory."<br>";
    }
}
?>