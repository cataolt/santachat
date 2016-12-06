<?php
class Message extends CI_Model {
    public function insertMessage($d)
    {
        $string = array(
            'user_id'    => $d['user_id'],
            'type'       => $d['type'],
            'message'    => $d['message'],
            'created_at' => date('Y-m-d h:i:s A'),
            'parent_id'  => $d['parent_id'],
        );
        $q = $this->db->insert_string('messages',$string);
        $this->db->query($q);
        return $this->db->insert_id();
    }

    public function changeStatus($id, $status = 1)
    {
        $data = array(
            'read' => $status,
        );
        $this->db->where('id', $id);
        $this->db->update('messages', $data);

    }

    public function getUnrespondedMessages(){
        $this->db->select('*');
        $this->db->where('type', 1);
        $this->db->where('read', 0);
        $this->db->order_by("created_at", "desc");
        $this->db->group_by('user_id');
        $query = $this->db->get('messages');
        if($this->db->affected_rows() > 0){
            return $query->result();
        }

        return false;
    }
}