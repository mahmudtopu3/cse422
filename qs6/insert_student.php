<?php
include "db.php";
include "header.php";
// define variables and set to empty values
$nameErr = $departmentErr = $batchErr = $sectionErr = $sessionErr = $class_idErr ="";
$name = $batch = $department = $section = $session =  $class_id = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed"; 
    }
  }
  
  if (empty($_POST["class_id"])) {
    $class_idErr = "Must not be empty";
  } else {
    $class_id = test_input($_POST["class_id"]);
  }
  if (empty($_POST["department"])) {
    $departmentErr = "Must not be empty";
  } else {
    $department = test_input($_POST["department"]);
  }

  
  if (empty($_POST["batch"])) {
    $batchErr = "Must not be empty";
  } else {
    $batch = test_input($_POST["batch"]);
  }

  
  if (empty($_POST["section"])) {
    $sectionErr = "Must not be empty";
  } else {
    $section = test_input($_POST["section"]);
  }

  
  if (empty($_POST["session"])) {
    $sessionErr = "Must not be empty";
  } else {
    $session = test_input($_POST["session"]);
  }

 
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


if (!empty($class_id) && !empty($name) && !empty($department) && !empty($section) && !empty($batch) && !empty($session) && !empty($session) ) {

$sql = "INSERT INTO students (class_id,name,department,section,batch,session)
VALUES ('$class_id','$name','$department','$section','$batch','$session')";

if ($conn->query($sql) === TRUE) {
  $success = "New record created successfully";
} else {
  $failure =  "Error: " . $sql . "<br>" . $conn->error;
}
}
$conn->close();
?>


            <article>
                <h2>Insert Student Data</h2>
                <h4 style="color:green"><?php if(isset($success)){echo $success;}?></h4>
                <h4 style="color:red"><?php if(isset($failure)){echo $failure;}?></h4>
                <form
                    method="post"
                    action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    Name:
                    <br>
                    <input type="text" name="name" >
                    <span class="error">*
                        <?php echo $nameErr;?></span>
                    <br><br>

                    Class ID:
                    <br>
                    <input type="text" name="class_id" >
                    <span class="error">*<?php echo $class_idErr;?></span>
                    <br><br>
                    Department:
                    <br>
                    <input type="text" name="department" >
                    <span class="error">*<?php echo $departmentErr;?></span>
                    <br><br>
                    Batch:
                    <br>
                    <input type="text" name="batch" >
                    <span class="error">*<?php echo $batchErr;?></span>
                    <br><br>
                    Section:
                    <br>
                    <input type="text" name="section" >
                    <span class="error">*<?php echo $sectionErr;?></span>
                    <br><br>
                    Session:
                    <br>
                    <input type="text" name="session" >
                    <span class="error">*<?php echo $sessionErr;?></span>
                    <br><br>
                    <input type="submit" name="submit" value="Submit">
                </form>

            </article>
        </section>

        <?php include "footer.php";?>