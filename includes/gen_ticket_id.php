<?php

$chars = "01234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
$randId = "";

for ($i = 0; $i < 5; $i++)
{
    $randId .= $characters[rand(0, strlen($characters) - 1)];
}

return $randId;
?>