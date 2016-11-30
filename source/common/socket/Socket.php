<?php

namespace common\socket;

class Socket {

    public static function bin2dec($str) {
        $dec = '';
        $len = strlen($str);
        $sub = '';
        for ($i = 0; $i < $len; $i ++) {
            $sub .= $str[$i];
            if (strlen($sub) == 4) {
                $dec .= bindec($sub);
                $sub = '';
            }
        }
        return $dec;
    }

    public static function dec2bin($str, $length = 4) {
        $bin = '';
        $len = strlen($str);
        for ($i = 0; $i < $len; $i ++) {
            $sub = decbin($str[$i]);
            while (strlen($sub) < $length) {
                $sub = '0' . $sub;
            }
            $bin .= $sub;
        }
        return $bin;
    }

    public static function alldec2bin($str, $length = 8) {
        $bin = decbin($str);
        while (strlen($bin) < $length) {
            $bin = '0' . $bin;
        }
        return $bin;
    }

}
