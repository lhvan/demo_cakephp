<html>
  <body>
    <?php
    echo '<table>
              <tr>
                <td>id</td>
                <td>Title</td>
              </tr>';
     foreach($data as $item){
        echo "<tr>";
        echo "<td>".$item['books']['id']."</td>";
        echo "<td>".$item['books']['title']."</td>";
        echo "</tr>";
    }
    ?>
  </body>
</html>