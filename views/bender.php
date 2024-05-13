<?php
    $is_image = ($url == "/Bender/image");
    $is_info = ($url == "/Bender/info");
?>

<div class="mt-3 mb-3">
    <h1>Бендер</h1>
    <ul class="nav nav-pills">
    <li class="nav-item">
        <a class="nav-link <?php if($is_image) { echo "active"; } ?>" href="/Bender/image">Картинка</a>
    </li>
    <li class="nav-item">
        <a class="nav-link <?= $is_info ? "active" : "" ?>" href="/Bender/info">Описание</a>
    </li>
    </ul>
</div>   

<ul class="list-group">
  <li class="list-group-item">    
        <?php
            if($is_image)
                require "bender_image.php";
            else if($is_info)
                require "bender_info.php";
            else
                require "default_info.php";
        ?>
  </li>
</ul>