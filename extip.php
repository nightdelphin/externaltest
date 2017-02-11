<?php
try
{
    $ip = file_get_contents('https://myexternalip.com/json');
    if (!$ip)
    {
      throw new Exception('unknown');
    }
    echo('Success. IP:'.$ip);
}
catch (\Exception $e)
{
    echo('FAIL. Error: '.$e->getMessage());
}