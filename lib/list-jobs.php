<?php

require "get-user-info-by-email.php";

function list_jobs($page_num = 1, $user_mail = null, $count_pages = false)
{   
    $json = file_get_contents(getcwd().'/database/data.json');
    $data = json_decode($json, true);
    $data_count = 0;
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
            $data_count += 1;
            $creator_email = $content["creator-email"];
            if (!$count_pages && ceil($data_count / 20) == $page_num) {
                $answer .= "<tbody>
                            <tr>
                                <td><a href='?job-id=".$item_id."'>{$content["job-name"]}</a></td>
                                <td><a href='?profile-id=.$creator_email.'><img src={$user['logo']} alt='logo' id='navbar-logo'/> " . $user['fullName'] . "</a></td>
                                <td>{$date}</td>
                                $editButton
                            </tr>
                        </tbody>
                        ";
                $date = explode(' ', $content["date"])[0];
                $user =  getUserInfo($content['creator-email']);
                if($user_mail) $editButton =  "<td><a href='edit-job.php/?jobId=$item_id' class='btn btn-primary btn-sm'>Edit</a></td>";
            }
        }
    }

    if ($count_pages) {
        return ceil($data_count / 20);
    } else {
        return $answer . "</table>";
    }
}

list_jobs();

//echo $_SERVER["DOCUMENT_ROOT"];
