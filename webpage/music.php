<?php
include("header.php");
?>

<div id="listarea">
    <ul id="musiclist">

        <?php
            foreach(glob("songs\*.mp3") as $mp3){
        ?>
        <li class="mp3item">
            <a href="<?= $mp3?>"><?= basename($mp3)?></a>
            <?php
            $size=filesize(trim($mp3));
            if($size <1023){
                $size= round($size, 2);
                print(" (" . $size . "b)");
            }
            elseif ($size>1023 && $size <1048575){
                $size/=1024;
                $size=round($size, 2);
                print(" (" . $size . "kb)");
            }
            elseif ($size>1048576){
                $size=$size/pow(1024, 2);
                $size=round($size, 2);
                print(" (" . $size . "mb)");
            }
            ?>
        </li>
        <?php } ?>
        <?php
            foreach (glob("songs\*.txt") as $list){
                $url = basename(str_replace(".txt", ".php", $list));
        ?>
        <li class="playlistitem">
            <a href="<?= $url?>"><?= basename($list) ?></a>
            <?php
            $size=filesize(trim($list));
            if($size <1023){
                $size= round($size, 2);
                print(" (" . $size . "b)");
            }
            elseif ($size>1023 && $size <1048575){
                $size/=1024;
                $size=round($size, 2);
                print(" (" . $size . "kb)");
            }
            elseif ($size>1048576){
                $size=$size/pow(1024, 2);
                $size=round($size, 2);
                print(" (" . $size . "mb)");
            }
            ?>
        </li>
        <?php } ?>

    </ul>
</div>

<?php
include("footer.php");
?>

