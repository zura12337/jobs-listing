<?php

require "get-user-info-by-email.php";

function list_jobs($user_mail = null)
{   
    $json = file_get_contents(getcwd().'/database/data.json');
    $data = json_decode($json, true);
    $answer = "<table class='table'>
                <thead>
                   <tr>
                       <th>Job</th>
                       <th>Provider</th>
                       <th>Date</th>
                   </tr>
                </thead>";
    foreach ($data as $item_id => $content) {
        if (!isset($user_mail) || $content["creator-email"] == $user_mail) {
            $date = explode(' ', $content["date"])[0];
            $logo =  getUserInfo($content['creator-email']);
            $answer .= "<tbody>
                            <tr>
                                <td>{$content["job-name"]}</td>
                                <td><img src={$logo} alt='logo' id='navbar-logo'/>{$content["creator-name"]}</td>
                                <td>{$date}</td>
                            </tr>
                        </tbody>
                        ";
        }
    }
    return $answer . "</table>";
}

//print list_jobs();
//echo $_SERVER["DOCUMENT_ROOT"];
