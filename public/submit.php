<?php

if(isset($_POST['post']) && empty($_POST["email_2"])) {
  unset($_POST['email_2']);
  formSubmit($_POST['post']);
} else {
  ajaxResponse('error', 'No post was made.');
}

/**
 * Handles the ajax request from admin-ajax.php
 *
 * @param string
 *
 * @return array
 */
function formSubmit($post) {
  parse_str($post, $data);

  foreach($data as $key => $value) {
    if($key == 'email' && !(filter_var($value, FILTER_VALIDATE_EMAIL))) {
      ajaxResponse('error', 'Email is not valid');
    }
  }

  $submission = true;
  $message    = "This is fake code that should be replaced with a proper curl function.";

  if($submission === true) {
    ajaxResponse('success', $message);
  } else {
    ajaxResponse('error', $message);
  }
}

/**
 * Sends the ajax response
 *
 * @param string, string, string, string
 *
 * @return exit(array)
 */
function ajaxResponse($status, $message) {
  $response = array(
    'status'   => $status,
    'message'  => $message
  );
  $output = json_encode($response);
  exit($output);
}