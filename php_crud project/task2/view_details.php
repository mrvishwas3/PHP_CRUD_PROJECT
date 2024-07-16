<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Details</title>
</head>
<body>
    <h2>View Details</h2>

    <!-- Display Records -->
    <table border="1">
        <tr>
            <th>Name</th>
            <th>USN</th>
            <th>Phone Number</th>

        </tr>

        <?php
          
        
            $conn=new mysqli('localhost','root','','wshop');
            
            if($conn->connect_error){
                die('connection failed:'.$conn->connect_error);
            }
        // Add the relevant code here to connect to the database
        

        $search_query = "";
        if (isset($_GET['query'])) {
            $search_query = $_GET['query'];
        }

        $sort_by = "name";
        if (isset($_GET['sort'])) {
            $sort_by = $_GET['sort'];
        }

        $sql = "SELECT * FROM students";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row["name"] . "</td>
                        <td>" . $row["usn"] . "</td>
                        <td>" . $row["phone"] . "</td>
                        
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No records found</td></tr>";
        }
        $conn->close();
    
        ?>
    </table>
</body>
</html>
