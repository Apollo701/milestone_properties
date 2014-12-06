<?php
for ($i = 1; $i <=35; $i++){
    echo "UPDATE student_f14g02.listings SET image1='home" . $i . "_1.jpg', image2='home" . $i . "_2.jpg', image3='home" . $i . "_3.jpg' WHERE id='" . $i . "';<br>";
}
?>