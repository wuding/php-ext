<?php

for ($i=6; $i < 30; $i++) {
    echo $s = "copy /Y \"C:\Users\dings\AppData\Local\Google\Chrome SxS\User Data\Profile $i\Bookmarks\" \"G:\Storage\Users\Windows11\Chrome SxS\Bookmarks\\$i.json\"". PHP_EOL;
}
