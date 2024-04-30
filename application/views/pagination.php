<!-- Search form (start) -->
<form method='post' action="<?= base_url() ?>publisher" >
     <input type='text' name='search' value='<?= $search ?>'><input type='submit' name='submit' value='Submit'>
   </form>
   <br/>

   <!-- Posts List -->
   <table border='1' width='100%' style='border-collapse: collapse;'>
    <tr>
      <th>S.no</th>
      <th>Title</th>
    </tr>
    <?php 
    $sno = $row+1;
    foreach($result as $data){

      //$content = substr($data['content'],0, 180)." ...";
      echo "<tr>";
      echo "<td>".$sno."</td>";
      echo "<td><a href='".$data['link']."' target='_blank'>".$data['reportTitle']."</a></td>";
      //echo "<td>".$content."</td>";
      echo "</tr>";
      $sno++;

    }
    if(count($result) == 0){
      echo "<tr>";
      echo "<td colspan='3'>No record found.</td>";
      echo "</tr>";
    }
    ?>
   </table>

   <!-- Paginate -->
   <div style='margin-top: 10px;'>
   <?= $pagination; ?>
   </div>