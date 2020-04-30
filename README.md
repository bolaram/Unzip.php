# Unzip.php
This script lists all of the .zip files in a directory and allows you to unzip.  Unlike CPanel's file manager, it _will_ overwrite existing files. 
To use this script, FTP or paste this script into a file in the directory with that  .zip you want to unzip.  Then point your web browser at this script and choose which file to unzip.

Example: 

I've a zip named file.zip and uploaded to www.domainname.com directory
Now i've to upload the unzip.php on that directory . then go www.domainname.com/unzip.php
You can see file.zip is ready to unzip. Have fun. Thanks

###Script

$file = $_GET['file'];

    if (isset($file))
    {
       echo "Unzipping " . $file . "<br>";
       system('unzip -o ' . $file);
       exit;
    }

    // a handler to read \ directory contents
    $handler = opendir(".");

    echo "Please select a file to unzip: " . "<br>";

    
    echo '<FORM action="" method="get">';

    $found = FALSE; // check valid files

    
    while ($file = readdir($handler))
    {
        if (preg_match ("/.zip$/i", $file))
        {
            echo '<input type="radio" name="file" value=' . $file . '> ' . $file . '<br>';
            $found = true;
        }
    }

    closedir($handler);

    if ($found == FALSE)
        echo "No .zip files found<br>";
    else
        echo '<br>Alert: All Existing files will be overwritten.<br><br><INPUT type="submit" value="Unzip!">';

    echo "</FORM>";
?>
