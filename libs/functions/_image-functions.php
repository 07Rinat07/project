<?php

function resize_and_crop($source_image_path, $thumbnail_image_path, $result_width, $result_height) {

    if (!file_exists($source_image_path)) {
        return false;
    }

    if (!getimagesize($source_image_path)) {
        return false;
    }

    $source_path = $source_image_path;

    /*
 * Add file validation code here
 */

    list($source_width, $source_height, $source_type) = getimagesize($source_path);

    switch ($source_type) {
        case IMAGETYPE_GIF:
            $source_gdim = imagecreatefromgif($source_path);
            break;
        case IMAGETYPE_JPEG:
            $source_gdim = imagecreatefromjpeg($source_path);
            break;
        case IMAGETYPE_PNG:
            $source_gdim = imagecreatefrompng($source_path);
            break;
    }

    $source_aspect_ratio = $source_width / $source_height;
    $desired_aspect_ratio = $result_width / $result_height;

    if ($source_aspect_ratio > $desired_aspect_ratio) {
        /*
     * Triggered when source image is wider
     */
        $temp_height = $result_height;
        $temp_width = (int) ($result_height * $source_aspect_ratio);
    } else {
        /*
     * Triggered otherwise (i.e. source image is similar or taller)
     */
        $temp_width = $result_width;
        $temp_height = (int) ($result_width / $source_aspect_ratio);
    }

    /*
 * Resize the image into a temporary GD image
 */

    $temp_gdim = imagecreatetruecolor($temp_width, $temp_height);
    imagecopyresampled(
        $temp_gdim,
        $source_gdim,
        0,
        0,
        0,
        0,
        $temp_width,
        $temp_height,
        $source_width,
        $source_height
    );

    /*
 * Copy cropped region from temporary image into the desired GD image
 */

    $x0 = ($temp_width - $result_width) / 2;
    $y0 = ($temp_height - $result_height) / 2;
    $desired_gdim = imagecreatetruecolor($result_width, $result_height);
    imagecopy(
        $desired_gdim,
        $temp_gdim,
        0,
        0,
        $x0,
        $y0,
        $result_width,
        $result_height
    );

    
 // Render the image
 // Alternatively, you can save the image in file-system or database
 
    // header('Content-type: image/jpeg');
    // imagejpeg($desired_gdim);

 // * Add clean-up code here
 
    imagejpeg($desired_gdim, $thumbnail_image_path, 90);
    imagedestroy($source_gdim);
    imagedestroy($desired_gdim);
    return true;
}

function resize_and_crop_portfolio($source_image_path, $thumbnail_image_path, $result_width, $result_height) {

    if (!file_exists($source_image_path)) {
        return false;
    }

    if (!getimagesize($source_image_path)) {
        return false;
    }

    $source_path = $source_image_path;

    // Add file validation code here
 
    list($source_width, $source_height, $source_type) = getimagesize($source_path);

    switch ($source_type) {
        case IMAGETYPE_GIF:
            $source_gdim = imagecreatefromgif($source_path);
            break;
        case IMAGETYPE_JPEG:
            $source_gdim = imagecreatefromjpeg($source_path);
            break;
        case IMAGETYPE_PNG:
            $source_gdim = imagecreatefrompng($source_path);
            break;
    }


    $source_aspect_ratio = $source_width / $source_height;
    $desired_aspect_ratio = $result_width / $result_height;

    if ($source_aspect_ratio > $desired_aspect_ratio) {
        
    // Triggered when source image is wider
     
        $temp_height = $result_height;
        $temp_width = (int) ($result_height * $source_aspect_ratio);
    } else {

    // Triggered otherwise (i.e. source image is similar or taller)

        $temp_width = $result_width;
        $temp_height = (int) ($result_width / $source_aspect_ratio);
    }

    // Resize the image into a temporary GD image
 
    $temp_gdim = imagecreatetruecolor($temp_width, $temp_height);
    imagecopyresampled(
        $temp_gdim,
        $source_gdim,
        0,
        0,
        0,
        0,
        $temp_width,
        $temp_height,
        $source_width,
        $source_height
    );

    
    // Copy cropped region from temporary image into the desired GD image
 

    $x0 = ($temp_width - $result_width) / 2;
    $y0 = ($temp_height - $result_height) / 2;
    $desired_gdim = imagecreatetruecolor($result_width, $result_height);
    imagecopy(
        $desired_gdim,
        $temp_gdim,
        0,
        0,
        $x0,
        0,
        // $y0,
        $result_width,
        $result_height
    );

    // Render the image
    // Alternatively, you can save the image in file-system or database
 
    // header('Content-type: image/jpeg');
    // imagejpeg($desired_gdim);

    // Add clean-up code here
 
    imagejpeg($desired_gdim, $thumbnail_image_path, 90);
    imagedestroy($source_gdim);
    imagedestroy($desired_gdim);
    return true;
}

function resize_without_crop($source_image_path, $thumbnail_image_path, $result_width, $result_height) {

    if (!file_exists($source_image_path)) {
        return false;
    }

    if (!getimagesize($source_image_path)) {
        return false;
    }

    $source_path = $source_image_path;

    /*
 * Add file validation code here
 */

    list($source_width, $source_height, $source_type) = getimagesize($source_path);

    switch ($source_type) {
        case IMAGETYPE_GIF:
            $source_gdim = imagecreatefromgif($source_path);
            break;
        case IMAGETYPE_JPEG:
            $source_gdim = imagecreatefromjpeg($source_path);
            break;
        case IMAGETYPE_PNG:
            $source_gdim = imagecreatefrompng($source_path);
            break;
    }

    $source_aspect_ratio = $source_width / $source_height;
    $desired_aspect_ratio = $result_width / $result_height;

    if ($source_aspect_ratio > $desired_aspect_ratio) {
    /*
     * Triggered when source image is wider
     */
        $temp_width = $result_width;
        $temp_height = (int) ($result_width / $source_aspect_ratio);
    } else {
    /*
     * Triggered otherwise (i.e. source image is similar or taller)
     */
        $temp_height = $result_height;
        $temp_width = (int) ($result_height * $source_aspect_ratio);
    }

    /*
 * Resize the image into a temporary GD image
 */

    $temp_gdim = imagecreatetruecolor($temp_width, $temp_height);

    imagecopyresampled(
        $temp_gdim,
        $source_gdim,
        0,
        0,
        0,
        0,
        $temp_width,
        $temp_height,
        $source_width,
        $source_height
    );

    /*
 * Copy cropped region from temporary image into the desired GD image
 */

    $x0 = ($result_width - $temp_width) / 2;
    $y0 = ($result_height - $temp_height) / 2;

    $desired_gdim = imagecreatetruecolor($result_width, $result_height);

    $white = imagecolorallocate($desired_gdim, 255, 255, 255);
    
    imagefill($desired_gdim , 0, 0, $white);

    imagecopy(
        $desired_gdim,
        $temp_gdim,
        $x0,
        $y0,
        0,
        0,
        $temp_width,
        $temp_height
    );

    /*
 * Render the image
 * Alternatively, you can save the image in file-system or database
 */

    // header('Content-type: image/jpeg');
    // imagejpeg($desired_gdim);

    /*
 * Add clean-up code here
 */

    imagejpeg($desired_gdim, $thumbnail_image_path, 90);

    imagedestroy($source_gdim);
    imagedestroy($desired_gdim);
    imagedestroy($temp_gdim);
    return true;
}