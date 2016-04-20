<?php
include 'resize.image.class.php';

$image = new Resize_Image;

$image->new_width = 200;
$image->new_height = 200;

$image->image_to_resize = "images/water-lilies.jpg"; // Full Path to the file

$image->ratio = true; // Keep Aspect Ratio?

// Name of the new image (optional) - If it's not set a new will be added automatically

$image->new_image_name = 'water_lilies_thumbnail';

/* Path where the new image should be saved. If it's not set the script will output the image without saving it */

$image->save_folder = 'thumbs/';

$process = $image->resize();

if($process['result'] && $image->save_folder)
{
echo 'The new image ('.$process['new_file_path'].') has been saved.';
}
?>