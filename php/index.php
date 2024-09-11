<?php

// 设置默认时区为亚洲/上海（北京时间）

$hour = 6;
date_default_timezone_set('Asia/Shanghai');


echo (new DateTime())->format('H');



echo date("Y-m-d H:i:s");
