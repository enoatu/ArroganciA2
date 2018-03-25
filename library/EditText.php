<?php
# 
# Atsushi ENOMOTO <enotiru@moove.co.jp>
# moove Co., Ltd.

class EditText {
    public function getEndText($text, $target) {
        $position = strrpos($text, $target);
        if (!$position) return false;
        $endText = substr($text, $position + 1);

        return $endText;
    }
}
