<html>
  <body>
    <?php
    echo $this->Common->create_random_string(10)."<br>";
    echo $this->Paginator->prev('« Previous ', null, null, array('class' => 'disabled')); //Shows the next and previous links
    echo " | " . $this->Paginator->numbers() . " | "; //Shows the page numbers
    echo $this->Paginator->next(' Next »', null, null, array('class' => 'disabled')); //Shows the next and previous links
    echo " Page " . $this->Paginator->counter(); // prints X of Y, where X is current page and Y is number of pages
    ?> 
    <?php
    if ($data == NULL) {
      echo "<h2>Dada Empty</h2>";
    } else {
      echo "<table>
            <tr>
              <td>id</td>
              <td>Title</td>
            </tr>";
      foreach ($data as $item) {
        echo "<tr>";
        echo "<td>" . $item['Book']['id'] . "</td>";
        echo "<td><a href='" . $this->webroot . "books/view/" . $item['Book']['id'] . "' >" . $item['Book']['title'] . "</a></td>";
        echo "</tr>";
      }
    }
    ?>
  </body>
</html>