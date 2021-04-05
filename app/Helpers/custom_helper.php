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

function str_break($char)
{
    return str_replace(array("\r\n", "\r", "\n"), "<br/>", $char);
}

function tanggal($date, bool $dash = true)
{
    $date_format = date('D, d M Y', strtotime($date));
    $days = explode(",", $date_format);
    if ($days[0] == "Sun") {
        $hari = "Minggu";
    } elseif ($days[0] == "Mon") {
        $hari = "Senin";
    } elseif ($days[0] == "Tue") {
        $hari = "Selasa";
    } elseif ($days[0] == "Wed") {
        $hari = "Rabu";
    } elseif ($days[0] == "Thu") {
        $hari = "Kamis";
    } elseif ($days[0] == "Fri") {
        $hari = "Jumat";
    } elseif ($days[0] == "Sat") {
        $hari = "Sabtu";
    } else {
        $hari = "";
    }

    $months = explode(" ", $days[1]);
    if ($months[2] == "Jan") {
        $bulan = "Jan";
    } elseif ($months[2] == "Feb") {
        $bulan = "Feb";
    } elseif ($months[2] == "Mar") {
        $bulan = "Mar";
    } elseif ($months[2] == "Apr") {
        $bulan = "Apr";
    } elseif ($months[2] == "May") {
        $bulan = "Mei";
    } elseif ($months[2] == "Jun") {
        $bulan = "Jun";
    } elseif ($months[2] == "Jul") {
        $bulan = "Jul";
    } elseif ($months[2] == "Aug") {
        $bulan = "Agt";
    } elseif ($months[2] == "Sep") {
        $bulan = "Sep";
    } elseif ($months[2] == "Oct") {
        $bulan = "Okt";
    } elseif ($months[2] == "Nov") {
        $bulan = "Nov";
    } elseif ($months[2] == "Dec") {
        $bulan = "Des";
    } else {
        $bulan = "";
    }

    $tanggal = $months[1];
    $tahun = $months[3];

    if ($dash == false) {
        return "$hari $tanggal $bulan $tahun";
    } else {
        return "$hari, $tanggal $bulan $tahun";
    }
}

function image_foto($jk)
{
    return false;
}

function format_size($bytes)
{
    if ($bytes >= 1073741824) {
        $bytes = number_format($bytes / 1073741824, 2) . ' GB';
    } elseif ($bytes >= 1048576) {
        $bytes = number_format($bytes / 1048576, 2) . ' MB';
    } elseif ($bytes >= 1024) {
        $bytes = number_format($bytes / 1024, 2) . ' KB';
    } elseif ($bytes > 1) {
        $bytes = $bytes . ' bytes';
    } elseif ($bytes == 1) {
        $bytes = $bytes . ' byte';
    } else {
        $bytes = '0 bytes';
    }

    return $bytes;
}

function status($status)
{
}
