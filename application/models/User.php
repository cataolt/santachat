<?php
class User extends CI_Model {
    public $status;
    function __construct(){
        // Call the Model constructor
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('cookie');
        $this->status = $this->config->item('status');
    }

    public function insertUser($d)
    {
        $string = array(
            'firstname'  => $d['firstname'],
            'lastname'   => $d['lastname'],
            'email'      => $d['email'],
            'password'   => md5($d['password']),
            'subscribed' => (array_key_exists('subscribed',$d)) ? 1 : 0,
            'phone'      => $d['phone'],
            'active'     => 1,
            'status'     => $this->status[0]
        );
        $q = $this->db->insert_string('users',$string);
        $this->db->query($q);
        return $this->db->insert_id();
    }

    public function changeStatus($id, $status = 1)
    {
        $data = array(
            'status' => $status,
        );
        $this->db->where('id', $id);
        $this->db->update('users', $data);

    }

    public function updateUser($id, $d)
    {
        $data = array(
            'firstname'  => $d['firstname'],
            'lastname'   => $d['lastname'],
            'email'      => $d['email'],
            'subscribed' => (array_key_exists('subscribed',$d)) ? 1 : 0,
            'phone'      => $d['phone'],
        );
        $this->db->where('id', $id);
        $this->db->update('users', $data);

    }

    public function isDuplicate($email)
    {
        $this->db->get_where('users', array('email' => $email), 1);
        return $this->db->affected_rows() > 0 ? TRUE : FALSE;
    }

    public function insertToken($user_id)
    {
        $token = substr(sha1(rand()), 0, 30);
        $date = date('Y-m-d');

        $string = array(
            'token'=> $token,
            'user_id'=>$user_id,
            'created'=>$date
        );
        $query = $this->db->insert_string('tokens',$string);
        $this->db->query($query);
        return $token . $user_id;

    }

    public function isTokenValid($token)
    {
        $tkn = substr($token,0,30);
        $uid = substr($token,30);

        $q = $this->db->get_where('tokens', array(
            'tokens.token' => $tkn,
            'tokens.user_id' => $uid), 1);

        if($this->db->affected_rows() > 0){
            $row = $q->row();

            $created = $row->created;
            $createdTS = strtotime($created);
            $today = date('Y-m-d');
            $todayTS = strtotime($today);

            if($createdTS != $todayTS){
                return false;
            }

            $user_info = $this->getUserInfo($row->user_id);
            return $user_info;

        }else{
            return false;
        }

    }

    public function checkLogin($post)
    {
        $this->db->select('*');
        $this->db->where('email', $post['email-login']);
        $this->db->where('status', 1);
        $this->db->where('active', 1);
        $query = $this->db->get('users');
        $userInfo = $query->row();

        if(md5($post['password-login']) != $userInfo->password){
            error_log('Unsuccessful login attempt('.$post['email-login'].')');
            return false;
        }

        $this->updateLoginTime($userInfo->id);

        unset($userInfo->password);
        return $userInfo;
    }

    public function updateLoginTime($id)
    {
        $this->db->where('id', $id);
        $this->db->update('users', array('lastlogin' => date('Y-m-d h:i:s A')));
        return;
    }

    public function updatePassword($post)
    {
        $this->db->where('id', $post['user_id']);
        $this->db->update('users', array('password' => $post['password']));
        $success = $this->db->affected_rows();
        if(!$success){
            error_log('Unable to updatePassword('.$post['user_id'].')');
            return false;
        }
        return true;
    }

    public function getUserInfoByEmail($email)
    {
        $q = $this->db->get_where('users', array('email' => $email), 1);
        if($this->db->affected_rows() > 0){
            $row = $q->row();
            return $row;
        }else{
            error_log('no user found getUserInfo('.$email.')');
            return false;
        }
    }

    public function getUserInfo($id)
    {
        $q = $this->db->get_where('users', array('id' => $id), 1);
        if($this->db->affected_rows() > 0){
            $row = $q->row();
            return $row;
        }else{
            error_log('no user found getUserInfo('.$id.')');
            return false;
        }
    }

    public function isValidUser($id){
        $this->db->select('*');
        $this->db->where('id', $id);
        $this->db->where('active', 1);
        $this->db->where('status', 1);
        $query = $this->db->get('users');
        $userInfo = $query->row();
        if($this->db->affected_rows() > 0){
            return true;
        }

        return false;
    }

    public function getUser(){
        $result = false;
        $cookieData = $this->input->cookie('user', false);
        if($cookieData){
            $userId = $cookieData['íd'];
        }
        $userId = $this->session->userdata('id');
        if($userId){
            $result = $this->getUserInfo($userId);
        }
        return $result;

    }

    public function loadMessages($id, $type = 1){
        $this->db->select('*');
        $this->db->where('user_id', $id);
        $this->db->where('type', $type);
        $this->db->order_by("created_at", "desc");
        $query = $this->db->get('messages');
        if($this->db->affected_rows() > 0){
            return $query->result();
        }
        return false;
    }
}