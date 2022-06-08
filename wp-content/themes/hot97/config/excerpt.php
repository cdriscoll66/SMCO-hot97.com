<?php

function excerpt_length($length){
    return 24;
}
add_filter('excerpt_length', 'excerpt_length');
