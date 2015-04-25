<?php
// include the image library for resizing
require_once("wideimage/WideImage.php");

// checking to see if the image is valid
// checking MIME type (GIF or JPEG) and maximum upload size
if ((($_FILES["iconfile"]["type"] == "image/gif")
|| ($_FILES["iconfile"]["type"] == "image/jpeg")
|| ($_FILES["iconfile"]["type"] == "image/pjpeg"))
&& ($_FILES["iconfile"]["size"] < 2000000))
{
    // checking for any error code in the data
    if ($_FILES["iconfile"]["error"] > 0) {
		echo "Error Code: " . $_FILES["iconfile"]["error"] . "<br />";

    } else {
        // displaying image information
		echo "File Name: " . $_FILES["iconfile"]["name"] . "<br />\n";
		echo "MIME Type: " . $_FILES["iconfile"]["type"] . "<br />\n";
		echo "Size: " . round($_FILES["iconfile"]["size"] / 1024, 1) . " KB<br />\n";
		echo "Temp file location: " . $_FILES["iconfile"]["tmp_name"] . "</p>\n";

		// checking if file with same name already exists in our destination directory
		if (file_exists("images/icon" . $_FILES["iconfile"]["name"])) {
			echo "WARNING: Icon Image (".$_FILES["iconfile"]["name"].") NOT uploaded as it already exists.\n";

		} else {
            //creating file name, resizing image for icon/logo use and saving to images directory
			$newName = $_FILES["iconfile"]["name"];
            $newFullName = "images/{$newName}";
            $file = $_FILES["iconfile"]["tmp_name"];
            $image = WideImage::load($file);
            $thumbnailImage = $image->resize(200, 300);
            $thumbFullName = "images/icon{$newName}";
            $thumbnailImage->saveToFile($thumbFullName);
            //setting permissions to image
            chmod($thumbFullName, 0644);
            echo "Stored icon or logo as: $thumbFullName<br />\n";
            $size = getimagesize($thumbFullName);
            echo "<img src=\"$thumbFullName\" " . $size[3] . " /><br />\n";
		}
	}
} else {
	echo "Invalid file, icon file not added by you or could be any other reason at this point";
}
?>