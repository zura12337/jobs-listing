<?php

function Input($name, $label, $type = "text", $value=""){
    echo ("
    <label for='$name'>$label:</label>
    <input type='$type' class='form-control' name='$name' id='$name' value='$value'/>
    <span id='$name-error' for='$name' class='invalid'></span><br/>
    ");
}

function Radio($name, $id, $label){
    echo ("<div class='form-check mt-3'>
    <label for='$id'>$label</label>
    <input class='form-check-label' type='radio' name='$name' id='$id'>
    </div>");
}

function Submit($label = "Submit"){
    echo ("<button class='btn btn-primary mt-3 mb-3' type='submit'>$label</button>");
}

function ImageUpload($name, $label){
    echo ("<label for='$name'>$label</label><br><input type='file'/>");
}

function NavLink($label, $link){
    echo ("<li class='nav-item'>
    <a class='nav-link' href='$link'>$label</a>
  </li>");
}

function TextArea($name, $label){
    echo ("<label for='$name'>$label</label>
    <textarea id='$name' class='form-control' name='$name'></textarea>");
}

function Checkbox($name, $label) {
    echo ("<input id='$name' class='mt-4' type='checkbox' name='$name'/>
    <label for='$name'>$label</label><br />");
}
