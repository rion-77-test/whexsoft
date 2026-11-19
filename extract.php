<?php
$data = file_get_contents($argv[1]);
$out = '';
$offset = 0;
while (($pos = strpos($data, 'stream', $offset)) !== false) {
    $start = $pos + 6;
    if (substr($data, $start, 2) === "\r\n") $start += 2;
    elseif ($data[$start] === "\n") $start++;
    $end = strpos($data, 'endstream', $start);
    if ($end === false) break;
    $chunk = substr($data, $start, $end - $start);
    $decoded = @gzuncompress($chunk);
    if ($decoded === false) $decoded = @gzinflate($chunk);
    if ($decoded !== false) $out .= $decoded . "\n";
    $offset = $end + 9;
}
file_put_contents($argv[2], $out);
echo strlen($out) . " bytes\n";
