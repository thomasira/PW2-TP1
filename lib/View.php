<?php

class View {

    static function render($path, $data) {
        header("location: $path");
        return $data;
    }
}