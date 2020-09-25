<?php

function Input($name, $label, $type = "text"){
    echo ("
    <label for='$name'>$label</label>
    <input type='$type' class='form-control' name='$name' id='$name'/>
    ");
}

function Submit($label = "Submit"){
    echo ("<button class='btn btn-primary mt-3' type='submit'>$label</button>");
}

function NavLink($label, $link){
    echo ("<li class='nav-item'>
    <a class='nav-link' href='$link'>$label</a>
  </li>");
}

?>