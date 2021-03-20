<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
        "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Music Viewer</title>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <link href="viewer.css" type="text/css" rel="stylesheet" />
</head>
<>
<div id="header">
    <h1>190M Music Playlist Viewer</h1>
    <h2>Search Through Your Playlists and Music</h2>
</div>
<?php if(isset($_REQUEST["playlist"])) { ?>
<div class="homebar">
    <ul>
        <li class="homeitem"><a href="music.php">Home</a></li>
    </ul>
</div>
<?php
}
?>


<div id="listarea">
    <ul id="musiclist">

        <?php
            if(isset($_REQUEST["playlist"])){
                $songs = file("songs/".$_REQUEST["playlist"]);
                foreach ($songs as $song){ ?>
                    <li class="mp3item">
                        <a href="<?= $song?>"><?= basename($song)?></a>
                        <?php
                        $size=filesize(trim($song));
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
                <?php
                    }
                }
                else{
                    $songs = glob("songs/*.mp3");
                    foreach ($songs as $song){
                        ?>
                        <li class="mp3item">
                            <a href="<?= $song?>"><?= basename($song)?></a>
                            <?php
                            $size=filesize(trim($song));
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
                        <?php
                    }
                    $playlists = glob("songs/*.txt");
                    foreach ($playlists as $playlist){
            ?>
                        <li class="playlistitem">
                            <a href="<?= "index.php?playlist=".basename($playlist)?>"><?= basename($playlist) ?></a>
                        </li>
            <?php } } ?>
    </ul>
</div>
</body>
</html>