<?php
include "db.php";
include "header.php";
if(isset($_GET['semester'])){
    $semester = $_GET['semester'];
}
if(isset($_GET['class_id'])){
    $class_id = $_GET['class_id'];
}


$fetch_all_results = "SELECT * FROM result WHERE semester = '$semester' AND class_id = '$class_id' ";
$allresult = $conn->query($fetch_all_results);


?>



            <article>
                <h2>Result of Class ID:
                    <?php echo $class_id;?></h2>
                <?php if(isset($failure)){
                  echo "Result Not Found";
                }
                ?>
                <table border="1">
                    <tr>

                        <th>Course ID</th>
                        <th>Course Name</th>
                        <th>Credit</th>
                        <th>Mark</th>
                        <th>Grade</th>

                    </tr>
                    <?php 
                      if ($allresult->num_rows > 0) {
                        
                         $total_credit= 0;
                         $val = 0;
                          // output data of each row
                          while($row = $allresult->fetch_assoc()) {
                      
                            $total_credit += $row['credit'];
                            $val += $row['credit']*grade($row['mark'])[1];

                      ?>

                    <tr>

                        <td><?php echo $row['course_id']; ?></td>
                        <td><?php echo $row['course_name']; ?></td>
                        <td><?php echo $row['credit']; ?></td>
                        <td><?php echo $row['mark']; ?></td>
                        <td><?php echo grade($row['mark'])[0]; ?></td>

                    </tr>
                 
                <?php }}
                 
                  ?>
                  
                </table>
                <h4>CGPA: <?php if(isset($val) && isset($total_credit)){echo $val/$total_credit;} else {echo "Not Found";}?></h4>

            </article>
        </section>

        <?php include "footer.php";?>

<?php 
  function grade($mark){
      if($mark>=80){
          return array("A+",4);
      }
      else if ($mark>=75 && $mark<80){
        return array("A",3.75);
      }
      else if ($mark>=70 && $mark<75){
        return array("A-",3.50);
      }
      else if ($mark>=65 && $mark<70){
        return array("B+",3.25);
      }
      else if ($mark>=60 && $mark<65){
        return array("B",3.00);
      }
      else if ($mark>=55 && $mark<60){
        return array("B-",2.75);
      }
      else if ($mark>=50 && $mark<55){
        return array("C+",2.50);
      }
      else if ($mark>=45 && $mark<50){
        return array("C",2.25);
      }
      else if ($mark>=40 && $mark<45){
        return array("D",2.00);
      }
      else if ($mark<40){
        return array("F",0);
      }
  }



 ?>