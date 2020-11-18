<?php require "../../StudentDatabase/studentdata_connection.php";


$query = "SELECT * FROM PENDING_USERS";
$result=mysqli_query($std_db_connection,$query);
if (mysqli_num_rows($result) > 0){
    echo "<table>
            <thead>
                <th> EDIT </th>
                <th> USERNAME </th>
                <th> EMAIL </th>
                <th> PASSCODE </th>
            </thead>";
    $rowCount=0;
    while($row=mysqli_fetch_assoc($result)){
        echo "<tr id='row".$rowCount."'> <td><i class='fas fa-edit icon' id='icon".$rowCount."' onclick='editor(this.id)' ></i></td>
                <td>".$row["USERNAME"]."</td>
                <td>".$row["EMAIL"]."</td>
                <td>".$row["PASSCODE"]."</td>
               </tr>";
    }
    echo "</table>";
}?>
<form action="form.php" method="post">
    <input type="text" name="username">
    <input type="number" name="role">
    <input type="submit" name="pending" value="Approve">
    <input type="submit" name="pending" value="Decline">
</form>

<?php $query = "SELECT * FROM USER";
$result=mysqli_query($std_db_connection,$query);
if (mysqli_num_rows($result) > 0){
    echo "<table>
            <thead>
                <th> EDIT </th>
                <th> USERNAME </th>
                <th> EMAIL </th>
                <th> PASSCODE </th>
                <th> ROLE_ID </th>
            </thead>";
    while($row=mysqli_fetch_assoc($result)){
        echo "<tr id='row".$row["ID_USER"]."'> <td> <i class='fas fa-edit icon' id='icon".$row["ID_USER"]."' onclick='editor(this.id)' ></i></td>
                <td>".$row["USERNAME"]."</td>
                <td>".$row["EMAIL"]."</td>
                <td>".$row["PASSCODE"]."</td>
                <td>".$row["ROLE_ID"]."</td>
               </tr>";
    }
    echo "</table>";
?>
<div id="form">
    <form id="myform" action="form.php" method="post">
        <input type="number" name="ID_USER"/>
        <input type="text" name="USERNAME"/>
        <input type="email" name="EMAIL"/>
        <input type="password" name="PASSCODE"/>
        <input type="number"  name="ROLE_ID"/>        
        <input type="submit" value="submit" name="submit_request"/>
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
