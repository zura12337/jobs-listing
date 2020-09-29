<?php

function list_jobs($user_mail = null)
{
    $json = file_get_contents($_SERVER["DOCUMENT_ROOT"].'/database/data.json');
    $data = json_decode($json, true);
    $answer = "<table>
                   <tr>
                       <th>Job</th>
                       <th>Provider</th>
                       <th>Date</th>
                   </tr>
                        ";
//    var_dump($data);
    foreach ($data as $item_id => $content) {
        if (!isset($user_mail) || $content["creator-email"] == $user_mail) {
            $date = explode(' ', $content["date"])[0];
            $answer .= "<tr>
                            <td>{$content["job-name"]}</td>
                            <td>{$content["creator-name"]}</td>
                            <td>{$date}</td>
                        </tr>
                        ";
        }
    }
    return $answer . "</table>";
}

//print list_jobs();
//echo $_SERVER["DOCUMENT_ROOT"];
