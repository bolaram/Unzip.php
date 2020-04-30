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
