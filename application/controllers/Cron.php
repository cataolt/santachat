<?php
class Cron extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->library('session');
        $this->load->model('User', 'user', TRUE);
        $this->load->model('Message', 'message', TRUE);
    }

    public function reminder()
    {
        $messages = $this->user->getUnrespondedMessages();
        $user = $this->user;

        if($messages){
            foreach ( $messages as $message) {
                $userId = $message->user_id;
                $userinfo = $user->getUserInfo($userId);

                $link = site_url() . '/main/user';

                $this->email->set_mailtype('html');
                $this->email->set_header('MIME-Version', '1.0; charset=utf-8');
                $this->email->set_header('Content-type', 'text/html');

                $this->email->from('contact@santachat.ro', 'Mos Craciun');
                $this->email->to($userinfo->email);

                $this->email->subject('Email Test');
                $this->email->set_crlf( "\r\n" );
                $this->email->message($this->load->view('email/email_new_message', array('link'=>$link), TRUE));
                if($this->email->send())
                {
                    log_message('info', 'Email sent to' . $userinfo->email);
                }
                else
                {
                    show_error($this->email->print_debugger());
                }
            }
        }
    }
}