
<?php

require_once "get-user-info-by-email.php";


function list_jobs($page_num = 1, $user_mail = null, $count_pages = false, $isAdmin = null, $protected = false)
{   
    $dir = str_replace("/var/www/html", "", getcwd());
//
    $json = file_get_contents(getcwd().'/database/data.json');
    $data = json_decode($json, true);
//
    $data = array_reverse($data, true);
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
        if(!$isAdmin && !$protected && !isset($content['published'])){
            continue;
        }
        if (!isset($user_mail) || $content["creator-email"] == $user_mail) {
            $data_count += 1;
            $creator_email = $content["creator-email"];
            if (!$count_pages && ceil($data_count / 10) == $page_num) {
                $user =  getUserInfo($content['creator-email']);
                $jobLogo = $user['logo'];
                $jobLogo[0] = "/";
                $date = explode(' ', $content["date"])[0];
                if($protected && $user_mail || $isAdmin) {
                    $editButton =  "<td><a href='$dir/edit-job.php/?jobId=$item_id' class='btn btn-primary btn-sm'>Edit</a></td>";
                    $deleteButton = "<td><a class='btn btn-danger btn-sm' href='$dir/delete-job.php/?jobId=$item_id'>Delete</a></td>";
                }
                $answer .= "<tbody>
                            <tr>
                                <td><a href='$dir/job.php/?jobId=".$item_id."'>{$content["job-name"]}</a></td>
                                <td><a href='$dir/user.php/?profileId=$creator_email'><img src='$dir$jobLogo' alt='logo' class='logo logo-sm'/> " . $user['fullName'] . "</a></td>
                                <td>{$date}</td>
                                $editButton
                                $deleteButton
                            </tr>
                        </tbody>
                        ";
            }
        }
    }

    if ($count_pages) {
        return ceil($data_count / 10);
    } else {
        return $answer . "</table>";
    }
}

list_jobs();

//echo $_SERVER["DOCUMENT_ROOT"];
