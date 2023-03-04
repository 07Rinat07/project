<?php

function resize($source_image_path, $resized_image_path, $resize)
{

    if (!file_exists($source_image_path)) {
        return false;
    }

    if (!getimagesize($source_image_path)) {
        return false;
    }

    list($source_width, $source_height, $source_type) = getimagesize($source_image_path);

    switch ($source_type) {
        case IMAGETYPE_GIF:
            $source_gdim = imagecreatefromgif($source_image_path);
            break;
        case IMAGETYPE_JPEG:
            $source_gdim = imagecreatefromjpeg($source_image_path);
            break;
        case IMAGETYPE_PNG:
            $source_gdim = imagecreatefrompng($source_image_path);
            break;
    }

    if ( $source_width > $source_height ) {
        $result_width = $resize;
        $result_height = round(($source_height / $source_width) * $resize);
    } else {
        $result_height = $resize;      
        $result_width = round(($source_width / $source_height) * $resize) ;  
    }
    
    $temp_gdim = imagecreatetruecolor($result_width, $result_height);

    imagecopyresampled(
        $temp_gdim,
        $source_gdim,
        0,
        0,
        0,
        0,
        $result_width,
        $result_height,
        $source_width,
        $source_height
    );

    imagejpeg($temp_gdim, $resized_image_path, 90);
    imagedestroy($source_gdim);
    imagedestroy($temp_gdim);
    return true;
}
