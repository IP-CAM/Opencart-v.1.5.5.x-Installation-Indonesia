<div class="box">
  <div class="box-heading"><?php echo $heading_title; ?></div>
  <div class="box-content ym">
    <ul>
      <?php foreach ($accounts as $account) { ?>
      <li>
        <span class="ym-title"><?php echo $account['title']; ?></span>
        <a href="ymsgr:sendIM?<?php echo $account['username']; ?>"><img src="http://opi.yahoo.com/online?u=<?php echo $account['username']; ?>&m=g&t=<?php echo $account['icon']; ?>" /></a>
      </li>
      <?php } ?>
    </ul>
  </div>
</div>