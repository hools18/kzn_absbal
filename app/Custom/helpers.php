<?php
if (!function_exists('get_media_path')) {

    function get_media_path($media_id)
    {
        $return = '';
        $path_array = str_split($media_id);

        foreach ($path_array as $path) {
            $return .= $path . '/';
        }

        return $return;
    }
}
