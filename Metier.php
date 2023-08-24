 <?php
  class Coach {
    public $id;
    public $name;
    public $phone;
    public $email;
    public $class;

    public function __construct($id, $name, $phone, $email) {
        $this->id = $id;
        $this->name = $name;
        $this->phone = $phone;
        $this->email = $email;
    }
    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getPhone() {
        return $this->phone;
    }
    public function getEmail(){
    return $this->email;
    }
    public function getClass(){
        return $this->class;
     }
    public function setCoach($coach) {
        $this->id = $coach->getId();
        $this->name = $coach->getName();
        $this->phone = $coach->getPhone();
        $this->email = $coach->getEmail();
      }
}

class ClassHas {
    public $id;
    public $name;
    public $day;
    public $time;
    public $coach = array();

    public function __construct($id, $name, $day, $time) {
        $this->id = $id;
        $this->name = $name;
        $this->day = $day;
        $this->time = $time;
    }
   
    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getDay() {
        return $this->day;
    }

    public function getTime() {
        return $this->time;
    }
 
    public function getCoach(){
       return $this->coach;
    }
      public function setCoach($coach) {
        $this->coach = $coach;
      }
 
}

 class ClassList {
    public $classes = [];
    
    public function addClass(ClassHas $class) {
        $this->classes[] = $class;
    }
    
    public function getClassById($id) {
        foreach ($this->classes as $class) {
            if ($class->id == $id) {
                return $class;
            }
        }
        return null;
    }
    public function deleteClass($id) {
        foreach ($this->classes as $key => $class) {
            if ($class->id === $id) {
                unset($this->classes[$key]);
                return true;
            }
        }
        return false;
    }
    public function getAllClass(){
        return $this->classes;
        
    }
      
    public function getClassesByCoach(Coach $coach)
    {
        $classess = array();
    
        foreach ($this->classes as $class) {
            if ($class->getCoach() == $coach) {
                $classess[] = $class;
            }
        }
    
        return $classess;
    }
}
class CoachList {
    public $coaches = [];

    public function addCoach(Coach $coach) {
        $this->coaches[] = $coach;
    }
    public function getAllCoachs(){
        return $this->coaches;

    }
    public function getCoachById($id) {
        foreach ($this->coaches as $coach) {
            if ($coach->id == $id) {
                return $coach;
            }
        }
        return null;
    }
   
}


?>