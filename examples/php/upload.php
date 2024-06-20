<?php

if (isset($_POST["cropImage"])) {
    $data = $_POST['cropImage'];
    $fileName = $_POST["fileName"];
    $destinationPath = $_POST["relativePath"];

    $Path = dirname(__DIR__ );

    //Define the temp folder path
    $fullStoragePath = 'tmp/_files';

    // Let's define different folders and sizes
    $tempFolders =  ['thumbnail', 'medium', 'large'];
    $resizeDimensions = [320, 480, 1500];

    $associatedParameters = array_combine($tempFolders, $resizeDimensions);

    list($type, $data) = explode(';', $data);
    list(, $data) = explode(',', $data);

    $data = base64_decode($data);

    $originalImageName = $Path . '/upload' . $destinationPath . '/' .  'crop_' .  $fileName . '.png';

    if (file_exists($originalImageName)) {
        $inc = 1;
        while (file_exists($Path . '/upload' . $destinationPath . '/' . 'crop_' .  $fileName . '-' . $inc . '.' . 'png')) $inc++;
        $originalImageName = $Path . '/upload' . $destinationPath . '/' . 'crop_' .  $fileName . '-' . $inc . '.' . 'png';
    }

    file_put_contents($originalImageName, $data);

    // A function that creates images of different sizes
    function resizeImage($file, $width, $output) {
        list($originalWidth, $originalHeight) = getimagesize($file);
        $aspectRatio = $originalWidth / $originalHeight;

        // We calculate the new height, maintaining the proportions
        $height = $width / $aspectRatio;

        $src = imagecreatefrompng($file);
        $dst = imagecreatetruecolor($width, $height);

        // Let's change the transparency correctly
        imagesavealpha($dst, true);
        $trans_colour = imagecolorallocatealpha($dst, 0, 0, 0, 127);
        imagefill($dst, 0, 0, $trans_colour);

        imagecopyresampled($dst, $src, 0, 0, 0, 0, $width, $height, $originalWidth, $originalHeight);
        imagepng($dst, $output);
        imagedestroy($dst);
        imagedestroy($src);
    }

    // We create images of different sizes
    foreach ($associatedParameters as $tempFolder => $resizeDimension) {
        if ($destinationPath == null) {
            $newPath = $Path . '/' . $fullStoragePath . '/' . $tempFolder . '/' . basename($originalImageName);
        } else {
            $newPath = $Path . '/' . $fullStoragePath . '/' . $tempFolder . '/' . $destinationPath . '/' . basename($originalImageName);
        }
        resizeImage($originalImageName, $resizeDimension,  $newPath);
    }

    echo 'Images have been resized and saved successfully.';

}

