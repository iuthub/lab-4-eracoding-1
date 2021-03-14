<?php
include("header.php");
?>

    <div id="listarea">
        <ul id="musiclist">
            <?php
            $musicItems = file("songs/playlist.txt");
            foreach($musicItems as $mp3){
                $url = "songs/" . $mp3;
                ?>
                <li class="mp3item">
                    <a href="<?= $url?>"><?= $mp3?></a>
                    <?php
                    $size=filesize(trim($url));
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