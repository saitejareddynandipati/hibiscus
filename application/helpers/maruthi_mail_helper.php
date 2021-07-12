<?php
defined('BASEPATH') OR exit('No direct script access allowed');
function entransys_send_email($from, $to,$body, $cc=NULL, $bcc=NULL, $replyto=NULL, $subject = "---",  $attachments=[]) {
    $ci = & get_instance();
    
    $ci->load->library('email');
   
    $config['protocol'] = 'smtp';
    $config['smtp_host'] = 'ssl://smtp.gmail.com';
    $config['smtp_port'] = '465';
    $config['smtp_timeout'] = '7';
    $config['smtp_user'] = 'maruthib952@gmail.com'; // test gmail email id
    $config['smtp_pass'] = 'mARUTHI@143'; // and password...
    $config['charset'] = 'utf-8';
    $config['newline'] = "\r\n";
    $config['mailtype'] = 'html'; // or html
    $config['validation'] = TRUE; // bool whether to validate email or not     

    $ci->email->initialize($config);
    $email_object = $ci->email;

    $email_object->from($from);
    $email_object->to($to);
    $email_object->cc($cc);
    // $email_object->cc("");
    $email_object->subject($subject);
    $email_object->message($body);
    $email_object->bcc($bcc);
    $email_object->reply_to($replyto);
   
    if(count($attachments)>0){
        foreach($attachments as $temp_name=>$path){
            $email_object->attach($path, 'attachment',$temp_name);
        }
    }
    $status = $email_object->send();
   
    

    //echo $ci->email->print_debugger();
return $status;
  
    $email_object->clear(TRUE);
}
