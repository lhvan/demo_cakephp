<html>
<body>
<?php
if($data02==NULL){
    echo "<h2>Dada Empty</h2>";
}
else{
    echo "<table>
          <tr>
            <td>id</td>
            <td>Title</td>
          </tr>";
    foreach($data02 as $item){
        echo "<tr>";
        echo "<td>".$item['Book']['id']."</td>";
        echo "<td>".$item['Book']['title']."</td>";
        echo "</tr>";
    }
}

if($data03==NULL){
    echo "<h2>Dada Empty</h2>";
}
else{
    echo "<table style='margin-top:50px;'>
          <tr>
            <td>id</td>
            <td>Title</td>
          </tr>";
    foreach($data03 as $item1){
        echo "<tr>";
        echo "<td>".$item1['books']['id']."</td>";
        echo "<td>".$item1['books']['title']."</td>";
        echo "</tr>";
    }
    echo "<p> Nums of row: ".$num_row."</p>";
}
?>
</body>
</html>