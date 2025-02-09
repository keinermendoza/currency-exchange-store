<?php 
namespace Http\Validator; 
use Http\Validator\SimpleValidator;

class PostValidator extends SimpleValidator  {
    public string $tableName = "posts";
    public $keys = ["title", "excerpt", "body", "show_in_home", "image"];


    public function buildInsertQuery() {
        $columnas = array_keys($this->cleanedData);
        $columnasStr = implode(", ", $columnas);
        $placeholders = implode(", ", array_map(fn($col) => ":$col", $columnas));
        return "INSERT INTO $this->tableName ($columnasStr) VALUES ($placeholders)";
    }

    public function buildUpdateQuery() {
        $columnas = array_keys($this->cleanedData);
        $setClause = implode(", ", array_map(fn($col) => "$col = :$col", $columnas));

        return "UPDATE $this->tableName SET $setClause WHERE id = :id";
    }
    
    public function __construct(array $data) {
        $this->data = $data;
        $this->notEmptyNorBlank($data, "title", "debe proporcionar un titulo");
        $this->allowEmptyNotBlank($data, "excerpt", "si proporciona un texto este no puede estar en blanco");
        $this->allowEmptyNotBlank($data, "body", "si proporciona un texto este no puede estar en blanco");
        $this->notEmptyNorBlank($data, "show_in_home");
        $this->isNumber($data, "show_in_home");

        
        $this->min($data, 0, "show_in_home", "por favor porporcione un valor valido");
        $this->max($data, 1, "show_in_home", "por favor porporcione un valor valido");

        $this->validate();
    }

    public function getCleanedData($keys = null) {
        return parent::getCleanedData($this->keys); 
    }

    
}
