<?php

function uploadImage($image, $folder)
{
    $original_name = $image->getClientOriginalName();
    $image_size = $image->getSize();
    $extension = strtolower($image->extension());
    $directory = 'uploads/' . $folder;
    $image_name = time().rand(100, 999).'.'.$extension;
    $full_save_path_name = $directory . '/' . $image_name;
    $image->move(public_path($directory), $image_name);

    return ['image_path' => $full_save_path_name];
}
