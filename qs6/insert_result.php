<?php
include "db.php";
include "header.php";
// define variables and set to empty values
$semesterErr = $markErr = $creditErr = $course_idErr = $course_nameErr = $class_idErr ="";
$course_name = $course_id = $credit = $mark = $semester =  $class_id = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  
  if (empty($_POST["class_id"])) {
    $class_idErr = "Must not be empty";
  } else {
    $class_id = test_input($_POST["class_id"]);
  }
  if (empty($_POST["course_name"])) {
    $course_nameErr = "Must not be empty";
  } else {
    $course_name = test_input($_POST["course_name"]);
  }

  
  if (empty($_POST["course_id"])) {
    $course_idErr = "Must not be empty";
  } else {
    $course_id = test_input($_POST["course_id"]);
  }

  
  if (empty($_POST["credit"])) {
    $creditErr = "Must not be empty";
  } else {
    $credit = test_input($_POST["credit"]);
  }

  
  if (empty($_POST["mark"])) {
    $markErr = "Must not be empty";
  } else {
    $mark = test_input($_POST["mark"]);
  }
    
  if (empty($_POST["semester"])) {
    $semesterErr = "Must not be empty";
  } else {
    $semester = test_input($_POST["semester"]);
  }

 
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


if (!empty($class_id) && !empty($course_name) && !empty($course_id) && !empty($credit) && !empty($mark) && !empty($semester) ) {

    $check_sql = "SELECT * FROM result WHERE course_id = '$course_id' AND class_id = '$class_id'";    
    if($conn->query($check_sql) === FALSE){

        $sql = "INSERT INTO result (class_id,course_name,course_id,credit,mark,semester)
        VALUES ('$class_id','$course_name','$course_id','$credit','$mark','$semester')";
    
        if ($conn->query($sql) === TRUE) {
            $success = "New record created successfully";
        } else {
            $failure =  "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    else {
        $failure = "Record Already Exist";
    }

}
$conn->close();
?>


            <article>
                <h2>Insert Student's Result</h2>
                 <h4 style="color:green"><?php if(isset($success)){echo $success;}?></h4>
                 <h4 style="color:red"><?php if(isset($failure)){echo $failure;}?></h4>
                <form
                    method="post"
                    action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                

                    Class ID:
                    <br>
                    <input type="text" name="class_id" >
                    <span class="error">*<?php echo $class_idErr;?></span>
                    <br><br>
                    Course Name:
                    <br>
                    <input type="text" name="course_name" >
                    <span class="error">*<?php echo $course_nameErr;?></span>
                    <br><br>
                    Course ID:
                    <br>
                    <input type="text" name="course_id" >
                    <span class="error">*<?php echo $course_idErr;?></span>
                    <br><br>
                    Credit:
                    <br>
                    <input type="text" name="credit" ">
                    <span class="error">*<?php echo $creditErr;?></span>
                    <br><br>
                    Mark:
                    <br>
                    <input type="text" name="mark" ">
                    <span class="error">*<?php echo $markErr;?></span>
                    <br><br>
                    Semester:
                    <br>
                    <select name="semester" >
                                    <option value="">Select a semester</option>
                                    <option value="First">First</option>
                                    <option value="Second">Second</option>
                                    <option value="Third">Third</option>
                                    <option value="Fourth">Fourth</option>
                                    <option value="Fifth">Fifth</option>
                                    <option value="Sixth">Sixth</option>
                                    <option value="Seventh">Seventh</option>
                                    <option value="Eight">Eight</option>
                                </select>
                    <span class="error">*<?php echo $semesterErr;?></span>
                    <br><br>
                    <input type="submit" name="submit" value="Submit">
                </form>

            </article>
        </section>

        <?php include "footer.php";?>