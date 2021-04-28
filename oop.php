<?php
  header('Content-type: text/html; charset=utf-8');
   /*
    Создать дедушку по маминой линии
    Создать бабушку по папиной линии
    Создать дедушку по папиной линии
    Доработать getInfo так, чтобы метод выводил всю информацию про бабушек и дедушек.
  */
  class Person{
    private $name;
    private $age;
    private $hp;
    private $mother;
    private $father;
    
    
    function __construct($name,$age,$mother,$father){
      $this->name = $name;
      $this->age = $age;
      $this->hp = 100;
      $this->mother = $mother;
      $this->father = $father;
    }
    
    function getMother(){return $this->mother;}
    function getName(){return $this->name;}
    function getFather(){return $this->father;}
    
    }
    
    function getInfo(){
      $info = "Привет, меня зовут ".$this->name."<br>
              Мне ".$this->age." лет<br>";
      if($this->mother != null){
        $info .= "Мою маму зовут ".$this->mother->getName()."<br>";
      if($this->father != null){
        $info .= "Папу зовут ".$this->father->getName();
      }
      if($this->mother->getMother() != null){
          $info .= "Бабушку по маминой линии зовут ".$this->mother->getMother()->getName()."<br>";
        }
      }
        
      if($this->mother->getMother()->getMother() != null){
          $info .= "Дедушку по маминой линии зовут ".$this->mother->getFather()->getName()."<br>";
        }
      if($this->father->getFather()->getFather() != null){
          $info .= "Бабушку по папиной линии зовут ".$this->father->getMother()->getName()."<br>";
        }  
      if($this->father->getFather()->getFather() != null){
          $info .= "Дедушку по папиной линии зовут ".$this->father->getFather()->getFather()->getName()."<br>";
        }  
      
    }
  
  
  $nina = new Person("Нина",70);
  $valyaFath = new Person("Валя",65);
  $oleg = new Person("Олег",34, $valyaFath, $ivanFath);
  $olga = new Person("Ольга",34,$nina,$fedorMoth);
  $igor = new Person("Игорь",10,$olga,$oleg);
  $fedorMoth = new Person("Федор",75);
  $ivanFath = new Person("Иван",73);
  echo $igor->getInfo();
?>
