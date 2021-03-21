<?php

function level($level)
{
    if ($level == 'admin') {
        return 'Admin';
    } else {
        return 'Petugas';
    }
}

function get_small_char($char, $max)
{
    if (strlen($char) <= $max) {
        return substr($char, 0, $max) . "";
    } else {
        return substr($char, 0, $max) . " ...";
    }
}

function time_ago($datetime, $full = false)
{
    date_default_timezone_set('ASIA/JAKARTA');
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'tahun',
        'm' => 'bulan',
        'w' => 'minggu',
        'd' => 'hari',
        'h' => 'jam',
        'i' => 'menit',
        's' => 'detik',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? ' yang' : ' yang');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' lalu' : 'baru saja';
}
