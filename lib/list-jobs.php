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
            $user =  getUserInfo($content['creator-email']);
            if(!$user_mail){
                if(!empty($content["published"])){
                    if($user_mail) $editButton =  "<td><a href='edit-job.php/?jobId=$item_id' class='btn btn-primary btn-sm'>Edit</a></td>";
                    $answer .= "<tbody>
                                    <tr>
                                        <td><a href='job.php/?jobId=$item_id'>{$content["job-name"]}</a></td>
                                        <td><img src={$user['logo']} alt='logo' class='logo logo-sm'/> " . $user['fullName'] . "</td>
                                        <td>{$date}</td>
                                        $editButton
                                    </tr>
                                </tbody>
                                ";
                };
            }else{
                if($user_mail) $editButton =  "<td><a href='edit-job.php/?jobId=$item_id' class='btn btn-primary btn-sm'>Edit</a></td>";
                    $answer .= "<tbody>
                                    <tr>
                                        <td><a href='job.php/?jobId=$item_id'>{$content["job-name"]}</a></td>
                                        <td><img src={$user['logo']} alt='logo' class='logo logo-sm'/> " . $user['fullName'] . "</td>
                                        <td>{$date}</td>
                                        $editButton
                                    </tr>
                                </tbody>
                                ";
            }
        }
    }
    return $answer . "</table>";
}

//print list_jobs();
//echo $_SERVER["DOCUMENT_ROOT"];
