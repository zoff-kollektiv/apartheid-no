<?php
$title = get_field('title');
$caption = get_field('caption');
$description = get_field('description');

get_component('video/video', [
    'image_id' => get_field('preview_image'),
    'quote' => get_field('quote'),
    'length' => get_field('length'),
    'url' => get_field('youtube_url')
]);

?>
