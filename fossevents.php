<?php
$host = "localhost";
$user = "mitsfoss_lime107";
$password = "]7g4S!9wyp";
$database = "mitsfoss_lime107";
$con = new mysqli($host, $user, $password, $database);
if ($con->connect_error)
{
    echo "error1";
    file_put_contents("log.txt", "connenbcts error" . $con->connect_error);
    exit('[]');
}
else
{
 $sql = "select event as result from fossevents where JSON_UNQUOTE(JSON_EXTRACT(event,'$.status'))!=-1";
        $result = $con->query($sql);
        if (mysqli_num_rows($result) > 0)
        {
            while ($array = mysqli_fetch_array($result))
            {
                $jsonData[] = $array['result'];
            }
            $tot = count($jsonData);
            for ($i = 0; $i < $tot; $i++)
            {
                $jsonData[$i] = json_decode($jsonData[$i]);
            }
            header('Access-Control-Allow-Origin: *');
            header('Access-Control-Allow-Methods: GET, POST');
            header('Content-Type: application/json');
            $json = json_encode($jsonData,JSON_UNESCAPED_SLASHES);
            echo $json;
        }
}