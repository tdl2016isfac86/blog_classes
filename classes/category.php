<?php
/*---------------------*/
/* classe/category.php */
/*---------------------*/

class Category {
	private $id;
	private $name;
	private $description;

	function __construct($id=0) {
		if($id!=0) {
			$res = requete_sql("SELECT * FROM category WHERE id='".$id."'");
			$c = $res->fetch_assoc();
			$this->id = $c['id'];
			$this->name = $c['name'];
			$this->description = $c['description'];
		}
	}
	function getId() {
		return $this->id;
	}
	function setName($name) {
		$this->name = $name;
	}
	function getName() {
		return $this->name;
	}
	function setDescription($description) {
		$this->description = $description;
	}
	function getDescription() {
		return $this->description;
	}
	function push() {
		if(is_numeric($this->id)){
			$res = requete_sql("UPDATE category SET
			name = '".addslashes($this->name)."',
			description = '".addslashes($this->description)."'
			WHERE id='".addslashes($this->id)."'
			");
			return $res;
		}
		else {
			$res = requete_sql("
				INSERT INTO
				category VALUES(
					NULL,
					'".$this->name."',
					'".$this->description."'
					)");
			if(!$res) {
				return FALSE;
			}
			else {
				$this->id = $res;
				return TRUE;
			}
			
		}
	}
    static function listCategories() {
    	$list = requete_sql("SELECT id FROM category");
        $res = array();
        while($c = $list->fetch_assoc()) {
        	array_push($res, new Category($c['id']));        
        }
        return $res;
    }
    
    function listPost() {
    	$list = requete_sql("SELECT post_id FROM post_category WHERE category_id = '".$this->id."'");
        $res = array();
        while($c = $list->fetch_assoc()) {
        	array_push($res, new Post($c['post_id']));
        }
	    return $res;
    }
    
    function form($target) 
    {
    	echo '<form action="'.$target.'" method="post">
    	<input type="text" name="name" value="'.$this->name.'">
    	<textarea name="description">'.$this->description.'</textarea>
    	<input type="hidden" name="id" value="'.$this->id.'">
    	<input type="submit" value="Publier">
    	</form>';
    	
    }
    
}
