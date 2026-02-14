<?php
function valid(){
   http_response_code(810);
   echo http_response_code();
}
function invalid(){
    http_response_code(800);
    echo http_response_code();
}

?>
