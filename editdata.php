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
        echo "<tr id='row".$row["STUDENT_ID"]."'> <i class='fas fa-edit icon' id='icon".$row["STUDENT_ID"]."' onclick='editor(this.id)' ></i>
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
}?>
<div id="form">
    <form id="myform" action="form.php" method="post">
        <input type="number" name="STUDENT_ID"/>
        <input type="number" max=100 min=-1 name="SAT_VERBAL"/>
        <input type="number" max=100 min=-1 name="SAT_MATH"/>
        <input type="number" min=-1 name="HS_RANK"/>
        <input type="number" min=-1 name="HS_OUTOF"/>
        <input type="date"  name="DEGREE_DATE"/>
        <input type="number" name="DEGREE_ID"/>
        <input type="number" name="MAJOR_ID"/>
        <input type="number" step="0.0001" name="GPA"/>
        <input type="radio" value="F"  name="GENDER"/> F <input type="radio" value="M"  name="GENDER"/> M
        <input type="submit" value="submit" name="submit_edit"/>
</form>
</div>

<script>
    funtion editor(id){
        //takes the word icon out and uses the number
        newId=id[4:-1]
        row=document.getElementById("row"+newId);
        //loops through each value inside row
        for(var i = 1; i<row.children.length;i++){
            elements=document.getElementById("myform").children;
            for(var x=0;x<elements.length-1;x++){
                elements[x].value=row.children[i].innerText;
            }
        }

    }

</script>
