<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "a654e955", "raefo7ye", "a654e955");


/* checks connection */
if ($mysqli->connect_errno)
{
  printf("Connect failed:%s\n", $mysqli->connect_error);
  exit();
}
$name = $_POST["username"];
if($name !="")
{
  $flag =True;
  $query = "SELECT * FROM Users WHERE user_Id = '$name'";
  $result = $mysqli->query($query);
  while($row = $result->fetch_assoc()) {
    $flag =False;
  }
  if($flag == TRUE )
  {
    $insert = "INSERT INTO Users VALUES ('$name')";


    if ($mysqli->query($insert) === TRUE) {
      echo "New user created successfully";
    } else {
      echo "Error: " . $mysqli . "<br>" . $mysqli->error;
    }
  }
  else {
    echo "Username already exists";
  }
}
else {
  echo "Username cannot be empty";
}
/* close connection */
$mysqli->close();
?>
