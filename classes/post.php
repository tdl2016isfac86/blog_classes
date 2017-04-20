<?php
/*------------*/
/*  post.php  */
/*------------*/

// Classe Post

class Post {
	private $id; // Integer
	private $title; // String
	private $content; // String
	private $author_id; // Integer
	private $author_name; // String
	private $publication_date; // String date format
	public $category; // Array of Object Category

	function __construct($id=0) {
		if($id != 0) {
			$res = requete_sql("SELECT * FROM post WHERE id='".$id."'");
			$a = $res->fetch_assoc();
			$this->id = $a['id'];
			$this->title = $a['title'];
			$this->content = $a['content'];
			$this->setAuthorId($a['author_id']);
			$this->publication_date = $a['publication_date'];

			$this->category = array();
			$res = requete_sql("SELECT category_id FROM post_category WHERE post_id='".$id."'");
			while($c = $res->fetch_assoc()) {
			array_push($this->category,new Category($c['category_id']));
			}
		}
        else {
        	$this->category = array();
        }
	}

	function getId() {
		return $this->id;
	}
	function setTitle($title) {
		$this->title = $title;
	}
	function getTitle() {
		return $this->title;
	}
	function setContent($content) {
		$this->content = $content;
	}
	function getContent() {
		return $this->content;
	}
	function setPublicationDate($date) {
		if(preg_match("^[0-9]{4}-[0-1][0-9]-[0-3][0-9] [0-2][0-9]:[0-5][0-9]:[0-5][0-9]$",$date)) {
			$this->publication_date = $date;
			return TRUE;
		}
		else {
			return FALSE;
		}
	}
	function getPublicationDate() {
		return $this->publication_date;
	}
	function setAuthorId($id) {
		$res = TRUE;
		if(is_numeric($id)) {
			$this->author_id = $id;
			$author = requete_sql("SELECT public_name from author WHERE id='".$id."'");
			if(!$author) {
				$res = FALSE;
			}
			else {
				$n = $author->fetch_assoc();
				$this->author_name = $n['public_name'];
			}
		}
		else {
			$res = FALSE;
		}
		return $res;
	}
	function getAuthorId() {
		return $this->author_id;
	}
	function getAuthorName() {
		return $this->author_name;
	}
    function form($target) {
    	?><form action="<?php echo $target; ?>" method="post">
        <input type="text" name="title" value="<?php echo $this->getTitle(); ?>">
        <textarea name="content"><?php echo $this->getContent(); ?></textarea>
        <?php
        $cats = Category::listCategories();
        
        $catsAssociated = array();
        foreach($this->category as $mieux) {
        	array_push($catsAssociated, $mieux->getId());
        }
        
        foreach($cats as $c) {
        	echo '<input type="checkbox" name="category[]" id="C'.$c->getId().'" value="'.$c->getId().'"';
         	if(in_array($c->getId(), $catsAssociated)) {
            	echo ' checked';
            }
            echo '><label for="C'.$c->getId().'">'.$c->getName().'</label><br>';
        }
        ?>
        <input type="hidden" name="id" value="<?php echo $this->getId(); ?>">
        <input type="submit" value="Publier"><?php
    }
	function push() {
		if(is_numeric($this->id)) {
			$resUpdate = requete_sql("
				UPDATE post SET
				title ='".addslashes($this->title)."',
				content = '".addslashes($this->content)."',
				author_id = '".addslashes($this->author_id)."'
				WHERE id='".addslashes($this->id)."'");
			$resDelete = requete_sql("DELETE FROM post_category WHERE post_id='".$this->id."'");
			$insertCat = 'INSERT INTO post_category VALUES ';
			foreach ($this->category as $cat) {
				$insertCat .= '('.$this->id.','.$cat->getId().'),';
			}
			$insertCat = rtrim($insertCat, ',');
			$resInsert = requete_sql($insertCat);
			if($resInsert && $resDelete && $resUpdate) {
				return TRUE;
			}
			else {
				return FALSE;
			}
		}
		else {
			$resInsertArticle = requete_sql("
				INSERT INTO post VALUES (
				NULL,
				'".addslashes($this->title)."',
				now(),
				'".addslashes($this->content)."',
				'".addslashes($this->author_id)."'
				)");
			$this->id = $resInsertArticle;
			$insertCat = 'INSERT INTO post_category VALUES ';
			foreach ($this->category as $cat) {
				$insertCat .= '('.$this->id.','.$cat->getId().'),';
			}
			$insertCat = rtrim($insertCat, ',');
			$resInsertCategory = requete_sql($insertCat);
			if($resInsertArticle && $resInsertCategory) {
				return TRUE;
			}
			else {
				return FALSE;
			}
		}
	}
	function delete() {
		$resDeleteArticle = requete_sql("
			DELETE FROM post
			WHERE id='".$this->id."'
			");
		$resDeleteCategory = requete_sql("
			DELETE FROM post_category
			WHERE post_id='".$this->id."'
			");
		if($resDeleteArticle && $resDeleteCategory) {
			return TRUE;
		}
		else {
			return FALSE;
		}
	}
    
    static function listPosts($startNb=0, $nbElmts=10) {
    	$res = requete_SQL("
        	SELECT id
            FROM post
            ORDER BY publication_date DESC
            LIMIT ".$startNb.",".$nbElmts
            );
        $list = array();
        while($i = $res->fetch_assoc()) {
        	array_push($list, new Post($i['id']));
        }
        return $list;
    }

	static function nbTotalPosts (){

		$res = requete_sql("SELECT COUNT(*) as total FROM post ");	
		return $res->fetch_assoc()['total'];
		
		// return requete_sql("SELECT COUNT(*) as total FROM post ")->fetch_assoc()['total'];
		 
	}
}	

class Flash extends Post {
	
	function __construct($id=0) {
		if($id != 0) {
			$res = requete_sql("SELECT * FROM post WHERE id='".$id."'");
			$a = $res->fetch_assoc();
			$this->id = $a['id'];
			$this->content = $a['content'];
			$this->setAuthorId($a['author_id']);
			$this->publication_date = $a['publication_date'];
		}
	}
	function setTitle() {
		echo "Une info flash ne peut avoir de titre";
		// En vrai on lève une erreur, mais on s'occupera de ce que ça veut dire plus tard
	}
	
    static function listPosts($startNb=0, $nbElmts=10) {
    	$res = requete_SQL("
        	SELECT id
            FROM post
            ORDER BY publication_date DESC
            LIMIT ".$startNb.",".$nbElmts
            );
        $list = array();
        while($i = $res->fetch_assoc()) {
        	array_push($list, new Flash($i['id']));
        }
        return $list;
    }
}