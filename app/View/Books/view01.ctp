<html>
<body>
<?php
if($data01==NULL){
    echo "<h2>Dada Empty</h2>";
}
else{
    echo "<table>
          <tr>
            <td>id</td>
            <td>Title</td>
          </tr>";
    foreach($data01 as $item){
        echo "<tr>";
        echo "<td>".$item['Book']['id']."</td>";
        echo "<td><a href='books/view/".$item['Book']['id']."' >".$item['Book']['title']."</a></td>";
        echo "</tr>";
    }
}
?>
</body>
</html>