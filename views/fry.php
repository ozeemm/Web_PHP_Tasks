<?php
    $is_image = ($url == "/Fry/image");
    $is_info = ($url == "/Fry/info");
?>

<div class="mt-3 mb-3">
    <h1>Фрай</h1>
    <ul class="nav nav-pills">
    <li class="nav-item">
        <a class="nav-link <?php if($is_image) { echo "active"; } ?>" href="/Fry/image">Картинка</a>
    </li>
    <li class="nav-item">
        <a class="nav-link <?= $is_info ? "active" : "" ?>" href="/Fry/info">Описание</a>
    </li>
    </ul>
</div>

<ul class="list-group">
  <li class="list-group-item">
    <?php
        if($is_image)
            require "fry_image.php";
        else if($is_info)
            require "fry_info.php";
        else
            require "default_info.php";
    ?>
  </li>
</ul>