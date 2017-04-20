<?php 
/* ------------------ */
/* classes/author.php */
/* ------------------ */


  class Author {
      private $id; 
      private $username;
      private $publicName;
      private $email;

      function __construct($id = 0) {
          if($id!=0) {
              $res = requete_sql("SELECT * from author WHERE id='".$id."'");
              $author = $res->fetch_assoc();
              $this->id = $author['id'];
              $this->username = $author['username'];
              $this->publicName = $author['public_name'];
              $this->email = $author['email'];
          }
      }

      function getId() {
          return $this->id;
      }
      function getUsername() {
          return $this->username;
      }
      function setUsername($username) {
          $this->username = $username;
      }
      function getPublicName() {
          return $this->publicName;
      }
      function setPublicName($publicName){
          $this->publicName = $publicName;
      }
      function setEmail($email) {
          $this->email = $email;
      }
      function getEmail() {
          return $this->email;
      }

      static function authorConnect($username,$password) {
          $check = requete_sql("
              SELECT id
              FROM author
              WHERE username='".addslashes($username)."'
              AND password='".md5($password)."'");
          $nbRes = $check->num_rows;
          if($nbRes == 0) {
              return FALSE;
          }
          elseif($nbRes == 1) {
              $authorId = $check->fetch_assoc()['id'];
              $_SESSION['id'] = $authorId;
              return new Author($authorId);
          }
          else {
              return FALSE;
          }
      }
      function disconnect() {
      	 session_destroy();
         session_start();
         header('Location: login.php');
      }
  }