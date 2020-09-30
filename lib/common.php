<?php

function Input($name, $label, $type = "text", $value=""){
    ?>
    <br/>
    <label for='<?php echo $name ?>'><?php echo $label?>:</label>
    <input type='<?php echo $type?>' class='form-control' placeholder='<?php echo $label ?>' name='<?php echo $name ?>' id='<?php echo $name?>' value='<?php echo $value?>'/>
    <span id='<?php echo $name ?>-error' for='<?php echo $name ?>' class='invalid'></span>
    <?php
}

function Radio($name, $id, $label, $checked = ""){
    ?>
    <div class='form-check mt-3'>
    <label for='<?php echo $id ?>'><?php echo $label ?></label>
    <input class='form-check-label' type='radio' name='<?php echo $name?>' id='<?php echo $id ?>' value='<?php echo $id ?>' <?php echo $checked?>>
    </div>
    <?php    
}

function Submit($label = "Submit"){
    ?>
    <br><button class='btn btn-primary mt-3 mb-3' type='submit'><?php echo $label?></button>
    <?php
}

function NavLink($label, $link, $icon = ""){
    ?>
    <li class='nav-item'>
        <a id="<?php echo $label ?>-button" class='nav-link <?php echo $class ?>' href=<?php echo $link ?>><i class="<?php echo $icon ?>"></i><?php echo $label?></a>
    </li>
    <?php
}

function TextArea($name, $label, $value = ""){
    ?>
    <label for='<?php echo $name?>'><?php echo $label?></label>
    <textarea id='<?php echo $name?>' class='form-control' name='<?php echo $name?>'><?php echo $value?></textarea>
    <?php
}

function Checkbox($name, $label, $published = "") {
    ?>
    <input id='<?php echo $name?>' class='mt-4' type='checkbox' name='<?php echo $name ?>' <?php echo $published?>/>
    <label for='<?php echo $name?>'><?php echo $label?></label><br />
    <?php
}
