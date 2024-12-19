<?php

function user_select(){
    require(CONNEX_DIR);
    $sql = "SELECT * FROM users ORDER BY name";
    $result = mysqli_query($connex, $sql);
    $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $result;
}

function user_insert($request){
    require(CONNEX_DIR);
    foreach($request as $key=>$value){
        $$key= mysqli_real_escape_string($connex, $value);
      }
      $sql = "INSERT INTO users (name, email, birth_date ,password) values ('$name', '$email', '$birth_date','$password' )";
      if(mysqli_query($connex, $sql)){
        return mysqli_insert_id($connex);
      }else{
        return false;
      }
}

function user_select_id($id) {
    require(CONNEX_DIR);
    $id = mysqli_real_escape_string($connex, $id);
    $sql = "SELECT * FROM users WHERE id = '$id'";
    $result = mysqli_query($connex, $sql);

    if ($result) {
        return mysqli_fetch_assoc($result);
    } else {
        return null;
    }
}

function user_update($request){
  require(CONNEX_DIR);
  foreach($request as $key=>$value){
      $$key= mysqli_real_escape_string($connex, $value);
    }
    $sql = "UPDATE users SET password='$password',name='$name', email='$email', birth_date='$birth_date' WHERE id='$id'";
    if(mysqli_query($connex, $sql)){
      return true;
    }else{
      return false;
    }
}

function user_delete($id){
    require(CONNEX_DIR);
    $id= mysqli_real_escape_string($connex, $id);
    $sql = "DELETE FROM users WHERE id='$id'";
    if(mysqli_query($connex, $sql)){
      return true;
    }else{
      return false;
    }
}

function user_select_by_email($email) {
    require(CONNEX_DIR);

    // ฬแๆํัํ วา อใแวส SQL Injection
    $email = mysqli_real_escape_string($connex, $email);

    // วฬัวํ ๆฦัํ ศัวํ ํฯว ัฯไ วัศั ศั วำวำ ไวใ วัศัํ
    $sql = "SELECT * FROM users WHERE email = '$email'";
  
    $result = mysqli_query($connex, $sql);

    // วั ไสํฬๅวํ ํวÝส ิฯก วัศั ัว ศัใํัฯวไฯ
    if ($result && mysqli_num_rows($result) > 0) {
        return mysqli_fetch_assoc($result);
    } else {
        return null;
    }
}

?>