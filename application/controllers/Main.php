<?php
class Main extends CI_Controller {

    public $status;
    public $roles;
    public $pages;

    function __construct(){
        parent::__construct();
        $this->load->model('User', 'user', TRUE);
        $this->load->model('Message', 'message', TRUE);
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->library('email',array('type'=>'html'));
        $this->load->helper('url');
        $this->load->helper('cookie');
        $this->load->helper('html');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        $this->status = $this->config->item('status');
        $this->pages = $this->config->item('pages');
    }

    public function wellcome() {
        $user = $this->user->getUser();
        if($user && $this->user->isValidUser($user->id)){
            redirect(site_url().'main/user');
        } else {
            $this->load->view('header');
            $this->load->view('wellcome');
            $this->load->view('footer');;
        }
    }

    public function user()
    {
        $user = $this->user->getUser();
        if($user && $this->user->isValidUser($user->id)){
                $messages = $this->user->loadMessages($user->id);
                $data['message'] = $messages;
                $data['logged'] = TRUE;
                $this->load->view('header',$data);
                $this->load->view('user',$data);
                $this->load->view('footer', $data);
        } else {
            redirect(site_url().'main/wellcome');
        }
    }

    public function response()
    {
        $user = $this->user->getUser();
        if($user && $this->user->isValidUser($user->id)){
            $this->form_validation->set_rules('message', 'Message', 'required');
            if($this->form_validation->run() == FALSE) {
                redirect(site_url().'main/user');
            } else {
                $user = $this->user->getUser();
                $clean = $this->security->xss_clean($this->input->post(NULL, TRUE));
                $clean['type'] = 2;
                $clean['user_id'] = $user->id;
                $this->message->insertMessage($clean);
                $this->message->changeStatus($clean['parent_id'],1);
                redirect(site_url().'main/user');
            }
        } else {
            redirect(site_url().'main/loginregister');
        }
    }

    public function loginregister()
    {
        $this->load->view('header');
        $this->load->view('loginregister');
        $this->load->view('footer');
    }

    public function register()
    {

        $this->form_validation->set_rules('firstname', 'Prenume', 'required');
        $this->form_validation->set_rules('lastname', 'Nume', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Parola', 'required|min_length[5]');
        $this->form_validation->set_rules('terms', 'TERM BOX', 'callback__acept_term');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('header');
            $this->load->view('loginregister');
            $this->load->view('footer');
        }else{
            if($this->user->isDuplicate($this->input->post('email'))){
                $this->session->set_flashdata('flash_message', 'Emailul este deja folosit!');
                redirect(site_url().'main/loginregister');
            }else{
                $clean = $this->security->xss_clean($this->input->post(NULL, TRUE));
                $id = $this->user->insertUser($clean);
                $token = $this->user->insertToken($id);

                $qstring = $this->base64url_encode($token);
                $link = 'http://minuninoprotector.ro/complete.php/' . $token;

                $this->email->set_mailtype('html');
                $this->email->set_header('MIME-Version', '1.0; charset=utf-8');
                $this->email->set_header('Content-type', 'text/html');

                $this->email->from('contact@santachat.com', 'Mos Craciun');
                $this->email->to($clean['email']);

                $this->email->subject('Activare cont');
                $this->email->set_crlf( "\r\n" );
                $this->email->set_newline( "\r\n" );

                $this->email->message($this->load->view('email/email_confirmation', array('link'=>$link), TRUE));
                if($this->email->send())
                {
                    redirect(site_url().'/registrationsuccess');
                }
                else
                {
                    show_error($this->email->print_debugger());
                }

            };
        }
    }

    public function editaccount(){
        $user = $this->user->getUser();
        if($user && $this->user->isValidUser($user->id)) {

            $this->form_validation->set_rules('firstname', 'Prenume', 'required');
            $this->form_validation->set_rules('lastname', 'Nume', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

            $data['user'] = $user;
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('header');
                $this->load->view('edit', $data);
                $this->load->view('footer');
            } else {
                if($this->input->post('email') != $user->email) {
                    if ($this->user->isDuplicate($this->input->post('email'))) {
                        $this->session->set_flashdata('flash_message', 'Emailul este deja folosit!');
                        redirect(site_url() . 'main/editaccount');
                    }
                } else {
                    $clean = $this->security->xss_clean($this->input->post(NULL, TRUE));
                    $id = $this->user->updateUser($user->id, $clean);
                    redirect(site_url().'main/user');
                };
            }
        } else {
            redirect(site_url().'main/loginregister');
        }
    }

    public function complete()
    {
        $token = $this->uri->segment(4);
        $cleanToken = $this->security->xss_clean($token);

        $user_info = $this->user->isTokenValid($cleanToken); //either false or array();
        if(!$user_info || $user_info->active == 0){
            $this->session->set_flashdata('flash_message', 'Emailul este invalid sau expirat');
            redirect(site_url().'main/login');
        }

        $this->user->changeStatus($user_info->id);

        foreach($user_info as $key=>$val){
            $this->session->set_userdata($key, $val);
        }
        $this->load->view('header');
        $this->load->view('complete',array('user'=>$user_info));
        $this->load->view('footer');
    }

    public function base64url_encode($data) {
        return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
    }
    public function base64url_decode($data) {
        return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT));
    }

    public function login()
    {
        $this->form_validation->set_rules('email-login', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password-login', 'Parola', 'required');

        if($this->form_validation->run() == FALSE) {
            $this->load->view('header');
            $this->load->view('loginregister');
            $this->load->view('footer');
        }else{
            $user = $this->user->getUser();
            if($user && $this->user->isValidUser($user->id)){
                redirect(site_url().'main/user');
            }
            $post = $this->input->post();
            $clean = $this->security->xss_clean($post);
            $userInfo = $this->user->checkLogin($clean);
            if(!$userInfo){
                $this->session->set_flashdata('flash_message', 'Adresa de email sau parola sunt gresite!');
                redirect(site_url().'main/login');
            } else {
                $this->session->set_userdata(array('id' => $userInfo->id));
            }
            $cookie = array(
                'name'   => 'user',
                'value'  => $userInfo->id,
                'expire' => time()+86500,
                'path'   => '/',
                'secure' => TRUE
            );
//            set_cookie($cookie);

            redirect(site_url().'main/user');
        }
    }

    public function forgot()
    {

        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

        if($this->form_validation->run() == FALSE) {
            $this->load->view('header');
            $this->load->view('forgot');
            $this->load->view('footer');
        }else{
            $email = $this->input->post('email');
            $clean = $this->security->xss_clean($email);
            $userInfo = $this->user->getUserInfoByEmail($clean);

            if(!$userInfo){
                $this->session->set_flashdata('flash_message', 'We cant find your email address');
                redirect(site_url().'main/login');
            }
            if($userInfo->status != 1){ //if status is not approved
                $this->session->set_flashdata('flash_message', 'Your account is not in approved status');
                redirect(site_url().'main/login');
            }

            //build token

            $token = $this->user->insertToken($userInfo->id);
            $qstring = $this->base64url_encode($token);
            $url = 'http://minuninoprotector.ro/forget.php/' . $qstring;

            $this->email->set_mailtype('html');
            $this->email->set_header('MIME-Version', '1.0; charset=utf-8');
            $this->email->set_header('Content-type', 'text/html');

            $this->email->from('contact@santachat.ro', 'Mos Craciun');
            $this->email->to($userInfo->email);

            $this->email->subject('Resetare parola');
            $this->email->set_crlf( "\r\n" );
            $this->email->set_newline( "\r\n" );

            $this->email->message($this->load->view('email/email_confirmation', array('link'=>$url), TRUE));
            if($this->email->send())
            {
                redirect(site_url().'main/user');
            }
            else
            {
                show_error($this->email->print_debugger());
            }

        }

    }

    public function reset_password()
    {
        $token = $this->uri->segment(4);
        $cleanToken = $this->security->xss_clean($token);

        $user_info = $this->user->isTokenValid($cleanToken); //either false or array();

        if(!$user_info){
            $this->session->set_flashdata('flash_message', 'Token is invalid or expired');
            redirect(site_url().'main/login');
        }
        $data = array(
            'firstName'=> $user_info->firstname,
            'email'=>$user_info->email,
            'token'=>base64_encode($token),
            'id'=>$user_info->id
        );

        $this->form_validation->set_rules('password', 'Parola', 'required|min_length[5]');
        $this->form_validation->set_rules('passconf', 'Confirma Parola', 'required|matches[password]');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('header');
            $this->load->view('reset_password', $data);
            $this->load->view('footer');
        }else{
            $post = $this->input->post(NULL, TRUE);
            $cleanPost = $this->security->xss_clean($post);
            $hashed = md5($cleanPost['password']);
            $cleanPost['password'] = $hashed;
            $cleanPost['user_id'] = $user_info->id;
            unset($cleanPost['passconf']);
            if(!$this->user->updatePassword($cleanPost)){
                $this->session->set_flashdata('flash_message', 'Parola nu a putut fi resetata. Va rugam folositi o parola diferita de cea veche.');
            }else{
                $this->session->set_flashdata('flash_message', 'Parola a fost resetata.');
            }
            redirect(site_url().'main/login');
        }
    }

    public function logout(){
        $user = $this->user->getUser();
        if($user){
            $this->session->unset_userdata('id');
            delete_cookie('user');
        }
        redirect(site_url().'main/user');
    }

    public function children(){
        $user = $this->user->getUser();
        if($user && $this->user->isValidUser($user->id)){
            $messages = $this->user->loadMessages($user->id,2);
            $sentMessages = $this->user->loadMessages($user->id,1);
            $data['message'] = $messages;
            $data['sentMessage'] = $sentMessages;
            $this->load->view('santachat/header');
            if(empty($messages)){
                $pages = $this->pages;
                $page =  $pages[array_rand($pages)];
                $this->load->view('santachat/pages/' . $page);
            } else {
                redirect(site_url().'main/letters');
            }
            $this->load->view('santachat/footer');
        } else {
            redirect(site_url().'main/noaccount');
        }
    }

    public function letter()
    {
        $user = $this->user->getUser();
        if($user && $this->user->isValidUser($user->id)){
            $this->form_validation->set_rules('message', 'Message', 'required');
            if($this->form_validation->run() == FALSE) {
                $messages = $this->user->loadMessages($user->id,2);
                $sentMessages = $this->user->loadMessages($user->id,1);
                $data['message'] = $messages;
                $data['sentMessage'] = $sentMessages;

                $this->load->view('santachat/header');
                $this->load->view('santachat/content',$data);
                $this->load->view('santachat/footer');
            } else {
                $user = $this->user->getUser();
                $clean = $this->security->xss_clean($this->input->post(NULL, TRUE));
                $clean['type'] = 1;
                $clean['user_id'] = $user->id;
                $this->message->insertMessage($clean);

                $link = 'http://minuninoprotector.ro';

                $this->email->set_mailtype('html');
                $this->email->set_header('MIME-Version', '1.0; charset=utf-8');
                $this->email->set_header('Content-type', 'text/html');

                $this->email->from('contact@santachat.ro', 'Mos Craciun');
                $this->email->to($user->email);

                $this->email->subject('Mesaj nou');
                $this->email->set_crlf( "\r\n" );
                $this->email->set_newline( "\r\n" );

                $this->email->set_newline( "\r\n" );
                $this->email->message($this->load->view('email/email_new_message', array('link'=>$link), TRUE));
                if($this->email->send())
                {
                    redirect(site_url().'main/children');
                }
                else
                {
                    show_error($this->email->print_debugger());
                }

                redirect(site_url().'main/children');
            }
        } else {
            redirect(site_url().'main/children');
        }
    }

    public function letters()
    {
        $user = $this->user->getUser();
        if($user && $this->user->isValidUser($user->id)){
            $messages = $this->user->loadMessages($user->id,2);
            $data['message'] = $messages;

            $this->load->view('santachat/header');
            $this->load->view('santachat/letters',$data);
            $this->load->view('santachat/footer');
        } else {
            redirect(site_url().'main/children');
        }
    }

    function _acept_term($str){
        if ($str === 'on'){
            return TRUE;
        }
        $this->form_validation->set_message('_acept_term', 'Trebuie sa acceptati termenii si conditiile');
        return FALSE;
    }

    public function noaccount(){
        $data['noletter'] = true;
        $this->load->view('santachat/header',$data);
        $this->load->view('santachat/noaccount');
        $this->load->view('santachat/footer');
    }
}