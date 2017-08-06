<table class="table table-striped">
  <thead>
    <td>Course Name</td>
    <td>Qty</td>
    <td>Price</td>
    <td>&nbsp;</td>
  </thead>
  <tbody>
    <?php
    if(count($cart_items) == 0)
    {
    ?>
      <tr>
      <td colspan="4">No course has been added</td>
      </tr>
    <?php
    }
    for($i = 0; $i < count($cart_items); $i++)
    {
    ?>
    <tr>
      <td>
        <span class="course_name"><?=$cart_items[$i]['name']?> (<?=$cart_items[$i]['id']?>)</span>
        <br>
        <span class="course_offer"><?=isset($cart_items[$i]['offer_detail'])?"Offer:".$cart_items[$i]['offer_detail']:""?></span>
      </td>
      <td>
        <?= isset($cart_items[$i]['free_qty'])?($cart_items[$i]['qty']-$cart_items[$i]['free_qty'])." + ".$cart_items[$i]['free_qty']." free = ".$cart_items[$i]['qty']:$cart_items[$i]['qty'] ?>
      </td>
      <td>
        <?php 
          if(isset($cart_items[$i]['price_drop']))
            echo "<del>$".($cart_items[$i]['price']*$cart_items[$i]['qty'])."</del><br>";
          echo "$".$cart_items[$i]['total']; 
        ?>
      </td>
      <td>
        <input type="button" value="Del" onClick="deleteCartItem('<?=$cart_items[$i]['id']?>', this)"></input>
      </td>
    </tr>
    <?php
    }
    ?>
  </tbody>
  <tfoot class="total_amt">
    <td colspan="2">
      Total
    <td colspan="2">
      $<?= $total_price ?>
    </td>
  </tfoot>
</table>
<div class="center_align">
  <a class="btn btn-default" href="<?=site_url('courses')?>">Courses</a>
</div>
    