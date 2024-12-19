<?php

function article_select(){
    require(CONNEX_DIR);
    $sql = "SELECT article.*, users.name AS author_name FROM article JOIN users ON article.user_id = users.id ORDER BY created_at DESC";
    $result = mysqli_query($connex, $sql);
    $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $result;
}

function article_insert($request){
    require(CONNEX_DIR);
    foreach($request as $key=>$value){
        $$key= mysqli_real_escape_string($connex, $value);
    }
  
    $sql = "INSERT INTO article (title, content, created_at, user_id) VALUES ('$title', '$content', NOW(), '$user_id')";
    if(mysqli_query($connex, $sql)){
       return mysqli_insert_id($connex);
    } else {
       return false;
    }
}

function article_select_id($id){
    require(CONNEX_DIR);
    $id = mysqli_real_escape_string($connex, $id);
    $sql = "SELECT article.*, users.name AS author_name FROM article JOIN users ON article.user_id = users.id  WHERE article.id = '$id'";
    $result = mysqli_query($connex, $sql);
    $result = mysqli_fetch_array($result, MYSQLI_ASSOC);
    return $result;
}

function article_update($request){
    require(CONNEX_DIR);
    foreach($request as $key=>$value){
        $$key = mysqli_real_escape_string($connex, $value);
    }
    $sql = "UPDATE article SET title = '$title', content = '$content',created_at = '$created_at',user_id = '$user_id' WHERE id = '$id'";
    if(mysqli_query($connex, $sql)){
        return true;
    } else {
        return false;
    }
}

function article_delete($id) {
    require(CONNEX_DIR);

    if (!is_numeric($id)) {
        return false;
    }
    $sql = "DELETE FROM article WHERE id = ?";
    $stmt = mysqli_prepare($connex, $sql);
    
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $id);
        $result = mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        mysqli_close($connex);
        return $result;
    } else {
        mysqli_close($connex);
        return false;
    }
}

?>
