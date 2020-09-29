<?php

function Input($name, $label, $type = "text", $value=""){
    echo ("<br/>
    <label class='hidden' for='$name'>$label:</label>
    <input type='$type' class='form-control' placeholder='$label' name='$name' id='$name' value='$value'/>
    <span id='$name-error' for='$name' class='invalid'></span>
    ");
}

function Radio($name, $id, $label, $checked = ""){
    echo ("<div class='form-check mt-3'>
    <label for='$id'>$label</label>
    <input class='form-check-label' type='radio' name='$name' id='$id' value='$id' $checked>
    </div>");
}

function Submit($label = "Submit"){
    echo ("<br><button class='btn btn-primary mt-3 mb-3' type='submit'>$label</button>");
}

function NavLink($label, $link, $icon = ""){
    ?>
    <li class='nav-item'>
        <a id="<?php echo $label ?>-button" class='nav-link <?php echo $class ?>' href=<?php echo $link ?>><i class="<?php echo $icon ?>"></i><?php echo $label?></a>
    </li>
    <?php
}

function TextArea($name, $label, $value = ""){
    echo ("<label for='$name'>$label</label>
    <textarea id='$name' class='form-control' name='$name'>$value</textarea>");
}

function Checkbox($name, $label, $published = "") {
    echo ("<input id='$name' class='mt-4' type='checkbox' name='$name' $published/>
    <label for='$name'>$label</label><br />");
}
