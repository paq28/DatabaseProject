<?php require "../../StudentDatabase/studentdata_connection.php";

$query = "SELECT * FROM STUDENT";
$result=mysqli_query($std_db_connection,$query);
if (mysqli_num_rows($result) > 0){
    echo "<table>
            <thead>
                <th> STUDENT_ID </th>
                <th> SAT_VERBAL </th>
                <th> SAT_MATH </th>
                <th> HS_RANK </th>
                <th> HS_OUTOF </th>
                <th> DEGREE_DATE </th>
                <th> DEGREE_ID </th>
                <th> MAJOR_ID </th>
                <th> GPA </th>
                <th> GENDER </th> </thead>";
    while($row=mysqli_fetch_assoc($result)){
        echo "<tr>
                <td>".$row["STUDENT_ID"]."</td>
                <td>".$row["SAT_VERBAL"]."</td>
                <td>".$row["SAT_MATH"]."</td>
                <td>".$row["HS_RANK"]."</td>
                <td>".$row["HS_OUTOF"]."</td>
                <td>".$row["DEGREE_DATE"]."</td>
                <td>".$row["DEGREE_ID"]."</td>
                <td>".$row["MAJOR_ID"]."</td>
                <td>".$row["GPA"]."</td>
                <td>".$row["GENDER"]."</td></tr>";
    }
    echo "</table>";

}
?>
