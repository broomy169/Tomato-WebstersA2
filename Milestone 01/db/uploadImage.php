<?php

// include the image library for resizing
require_once("wideimage/WideImage.php");

// checking to see if the image is valid
// checking MIME type (GIF or JPEG) and maximum upload size
if ((($_FILES["imagefile"]["type"] == "image/gif")
|| ($_FILES["imagefile"]["type"] == "image/jpeg")
|| ($_FILES["imagefile"]["type"] == "image/pjpeg"))
&& ($_FILES["imagefile"]["size"] < 2000000))
{
    // checking for any error code in the data
	if ($_FILES["imagefile"]["error"] > 0) {
		echo "Error Code: " . $_FILES["imagefile"]["error"] . "<br >";
	} else {
        // displaying image information
		echo "Upload File Name: " . $_FILES["imagefile"]["name"] . "<br >\n";
		echo "MIME Type: " . $_FILES["imagefile"]["type"] . "<br >\n";
		echo "Size: " . round($_FILES["imagefile"]["size"] / 1024, 1) . " KB<br >\n";
		echo "Temp file: " . $_FILES["imagefile"]["tmp_name"] . "</p>\n";

        // checking if file with same name already exists in our destination directory
        if (file_exists("images/" . $_FILES["imagefile"]["name"])) {
			echo $_FILES["imagefile"]["name"] . " already exists. \n";
		} else {
            //creating file name, resizing image and saving to images directory
			$newName = time() . $_FILES["imagefile"]["name"];
            $newFullName = "images/{$newName}";
			// move the temporary file to the destination directory (images) and give it its new name
			move_uploaded_file($_FILES["imagefile"]["tmp_name"], $newFullName);

			//resizing image
            $bigImage = WideImage::load($newFullName);
            $resizeImage = $bigImage->resize(800, 800);
            $newFullName = "images/pic{$newName}";
            $resizeImage->saveToFile($newFullName);

			// setting permission on the file
			chmod($newFullName, 0644);
			echo "Stored Photo as: $newFullName<br >\n";
			// at this point, we could save the filename to a database if we wanted to...
            $size = getimagesize($newFullName);
            echo "<img src=\"$newFullName\" " . $size[3] . " ><br >\n";

            // if user already chosen image then following code won't run
            // otherwise code will run and create icon/thumbnail image out of actual added image
            if (!file_exists($thumbFullName)) {
                $image = WideImage::load($newFullName);
                $thumbnailImage = $image->resize(400, 300);
                $thumbFullName = "images/icon{$newName}";
                $thumbnailImage->saveToFile($thumbFullName);
                echo "Stored Icon as: $thumbFullName<br >\n";
                $size = getimagesize($thumbFullName);
                echo "<img src='$thumbFullName' " . $size[3] . " ><br >\n";
            }
		}
	}
} else {
    echo "Invalid file, image file not added by you or could be any other reason at this point";
}
?>