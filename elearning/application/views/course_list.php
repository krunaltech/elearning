<table class="table table-striped">
  <tbody>
    <?php
    for($i = 0; $i < count($courses); $i++)
    {
    ?>
    <tr>
      <td>
        <span class="course_name"><?=$courses[$i]['name']?> (<?=$courses[$i]['id']?>)</span><br>
        <span class="course_offer"><?=isset($offers[$courses[$i]['id']])?"Offer:".$offers[$courses[$i]['id']]['offer_detail']."<br>":""?></span>
        Price: $<?=$courses[$i]['price']?><br>
        Qty: <input type="number" class="qty_input" value="0" min="0" id="qty_<?=$courses[$i]['id']?>"><br>
        <button type="button" class="btn btn-default add_btn" onClick="addToCart('<?=$courses[$i]['id']?>')">Add</button>
      </td>
    </tr>
    <?php
    }
    ?>
  </tbody>
</table>
<div class="center_align">
  <a class="btn btn-default" href="<?=site_url('cart')?>">View Cart</a>
</div>
<div class="alert alert-success alert_box" role="alert" id="alert" style="display: none;"></div>
    