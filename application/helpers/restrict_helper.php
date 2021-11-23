<?php
function is_logged_in()
{
    $ci = get_instance();
    if (!$ci->session->userdata('id')) {
        echo "<script>alert('You dont Have Permission To access this Page!');location='auth'</script>";
    }
}