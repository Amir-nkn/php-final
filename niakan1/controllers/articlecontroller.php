<?php 

function article_controller_index(){
   require_once(MODEL_DIR."/article.php");
   $articles = article_select();
   $data = ['articles' => $articles];
   return render("article/index.php", $data);
}

function article_controller_create(){
   return render("article/create.php");
}
function article_controller_store($_request){
   if($_SERVER['REQUEST_METHOD'] != 'POST'){
      header('location:?controller=article');
   }
   $user_id = $_request['user_id'];
   $title = $_request['title'];
   $created_at = $_request['created_at'];
   $content = $_request['content'];
   require_once(MODEL_DIR."/article.php");
   
   $data = article_insert(['title' => $title,'content' => $content,'created_at' => $created_at,'user_id' => $user_id]);
   if($data){
      header('location:?controller=article');
   }else{
      echo "error";
   }

}

function article_controller_show($request){
   $id=$request['id'];
   require_once(MODEL_DIR."/article.php");
   $data = article_select_id($id);
   return render("article/show.php", $data);
}

function article_controller_edit($request){
   $id=$request['id'];
   require_once(MODEL_DIR."/article.php");
   $article = article_select_id($id);
   $data = array('article' => $article);
   return render("article/edit.php", $data);
}

function article_controller_update($_request){
   if($_SERVER['REQUEST_METHOD'] != 'POST'){
      header('location:?controller=article');
   }
   $id = $_request['id'];
   $title = $_request['title'];
   $created_at = $_request['created_at'];
   $content = $_request['content'];
   $user_id = $_request['user_id'];

   require_once(MODEL_DIR."/article.php");
   $data = article_update(['id' => $id,'title' => $title,'content' => $content,'created_at' => $created_at,'user_id' => $user_id]);
   $data = article_update($request);
   if($data){
      header('location:?controller=article');
   }else{
      echo "error";
   }
}

function article_controller_delete($request){
   if($_SERVER['REQUEST_METHOD'] != 'POST'){
     header('location:?controller=article');
   }
   $id = $request['id'];
   require_once(MODEL_DIR."/article.php");
   $data = article_delete($id);
   if($data){
      header('location:?controller=article');
   }else{
      echo "error";
   }
}

