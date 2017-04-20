<?php

/* ----------- */
/* classes/comment.php */
/* ----------- */


class Comment {
    private $id; // Integer
    private $postId; // Integer
    private $commentor; // String
    private $commentDate; // Date
    private $content; // String
    
    function __construct($id=0) {
        if($id!=0) {
          $comment = requete_sql("SELECT * FROM comment WHERE id='".$id."'");
          $com = $comment->fetch_assoc();
          $this->id = $com['id'];
          $this->postId = $com['post_id'];
          $this->commentor = $com['commentor'];
          $this->commentDate = $com['comment_date'];
          $this->content = $com['content'];
        }
    }
    
    function getId() {
        return $this->id;
    }
    function setPostId($id) {
        $this->postId = $id;
    }
    function getPostId() {
        return $this->postId;
    }
    function setCommentor($commentor) {
        $this->commentor = $commentor;
    }
    function getCommentor() {
        return $this->commentor;
    }
    function setCommentDate($date) {
        $this->commentDate = $date;
    }
    function getCommentDate() {
        return $this->commentDate;
    }
    function setContent($text) {
        $this->content = $text;
    }
    function getContent() {
        return $this->content;
    }
    function push() {
        if(empty($this->id)) {
            $rqst = requete_sql("
                INSERT INTO comment VALUES (
                NULL,
                '".addslashes($this->postId)."',
                '".addslashes($this->commentor)."',
                now(),
                '".addslashes($this->content)."'
                )");
            if($rqst) {
                return TRUE;
            }
            else {
                return FALSE;
            }
        }
        else {
            return FALSE;
        }
    }
    static function listComment($postId) {
        $res = requete_sql("SELECT id FROM comment WHERE post_id='".$postId."' ORDER BY comment_date");
        $list = array();
        while($c = $res->fetch_assoc()) {
            array_push($list, new Comment($c['id']));
        }
        return $list;
    }
}