<?php
include "db.php";
include "header.php";
$fetch_sql = "SELECT * FROM Students";
$allresult = $conn->query($fetch_sql);
?>



            <article>
                <h2>Student List</h2>

                <table border="1">
                    <tr>
                        <th>Class ID</th>
                        <th>Name</th>
                        <th>Department</th>
                        <th>Batch</th>
                        <th>Section</th>
                        <th>Session</th>
                        <th>Result</th>
                    </tr>
                    <?php 
                        if ($allresult->num_rows > 0) {
                            // output data of each row
                            while($row = $allresult->fetch_assoc()) {
                            
                        ?>
                      <tr>
                        <td><?php  echo $row["class_id"];?></td>
                        <td><?php  echo $row["name"];?></td>
                        <td><?php  echo $row["department"];?></td>
                        <td><?php  echo $row["batch"];?></td>
                        <td><?php  echo $row["section"];?></td>
                        <td><?php  echo $row["session"];?></td>
                        <td>
                            <form action="results.php" method="get">

                                <select name="semester" required="required">
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
                                <input type="hidden" name="class_id" value="<?php echo $row["class_id"];?>">
                                <input type="submit" value="Submit">
                            </form>

                        </tr>

                    <?php }}
        else {
            echo "0 results";
        }
        ?>

                    </table>

                </article>
            </section>

<?php include "footer.php";?>