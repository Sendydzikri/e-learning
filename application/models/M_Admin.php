<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_Admin extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
        $this->load->library('encryption');
    }


    public function getDataCount($type){

        if($type == "guru"){
            return $this->db->count_all_results('teacher');
        }

        if($type=="siswa"){
            return $this->db->count_all_results('student');
        }

        if($type=="mapel"){
            return $this->db->count_all_results('quiz_subjects');
        }

        if($type=="kelas"){
            return $this->db->count_all_results('student_class');
        }

        return 0;
    }


    public function checkUser($email,$password){


        if($email){
            $query1 = $this->db->query("SELECT users.*, role.* FROM users INNER JOIN role ON users.role_id = role.role_id WHERE users.email ='$email' AND role.name = 'Admin' ");
            $row = $query1->row_array();

            if(password_verify($password, $row['password'])){
                return 1;
            }else{
                return 0;
            }
        }

        return 0;

    }


    public function getDataKelas(){
        $query = $this->db->query("SELECT * FROM student_class");
        return $query->result_array();
    }

    public function getDataKelasById($id){
        $data = $this->db->query("SELECT * from student_class WHERE student_class_id ='$id' ");
        return $data->result_array();
    }
    public function updateDataKelas($id,$data){
        $this->db->where('student_class_id',$id);
        return $this->db->update('student_class',$data);
    }

    public function getDataGuru(){
        $query = $this->db->query("SELECT role.name , users.user_id , users.email , teacher.teacher_name FROM users INNER JOIN role ON users.role_id = role.role_id INNER JOIN teacher ON users.user_id = teacher.user_id");
        return $query->result_array();
    }

    public function getDataGuruById($id){
        $data = $this->db->query("SELECT users.* , teacher.* FROM users INNER JOIN teacher ON users.user_id = teacher.user_id WHERE users.user_id ='$id' ");
        return $data->result_array();
    }

    public function tambahDataGuru($data1,$data2){

        $query1 = $this->db->insert('users', $data1);
        $query2 = $this->db->insert('teacher', $data2);
        if($query1 && $query2){
            return true;
        }else{
            return false;
        }
    }

    public function tambahDataSiswa($data1,$data2){

        $query1 = $this->db->insert('users', $data1);
        $query2 = $this->db->insert('student', $data2);
        if($query1 && $query2){
            return true;
        }else{
            return false;
        }
    }



    public function hapusDataGuru($id)
    {
        $query = $this->db->query("DELETE users.* , teacher.* FROM users INNER JOIN teacher ON users.user_id = teacher.user_id WHERE users.user_id='$id' ");
        if($query){
            redirect('C_Admin/guru');
        }else{
            redirect('C_Admin/error');
        }
    }

    public function hapusDataSiswa($id)
    {
        $query = $this->db->query("DELETE users.* , student.* FROM users INNER JOIN student ON users.user_id = student.user_id WHERE users.user_id='$id' ");
        if($query){
            redirect('C_Admin/siswa');
        }else{
            redirect('C_Admin/error');
        }
    }
    public function updateDataGuru($id,$data){
        $this->db->where('user_id',$id);
        $this->db->update('teacher',array("teacher_name"=>$data['teacher_name']));

        $this->db->where('user_id',$id);
        $this->db->update('users',array("password"=>$data['password'])); 

        return true;    
    }
    public function tambahDataKelas($data){
        $this->db->insert('student_class', $data);
    }

    public function getDataRole(){
        $query = $this->db->query("SELECT * FROM role");
        return $query->result_array();
    }

    public function hapusDataKelas($id){
        $this->db->where('student_class_id ', $id);
        return $this->db->delete('student_class');
    }

    public function getDataSiswa(){
         $query = $this->db->query("SELECT student.student_id, student_name , student.user_id, student_gender , student_class.student_class_name , users.email FROM student INNER JOIN student_class ON student.student_class_id = student_class.student_class_id INNER JOIN users ON student.user_id = users.user_id ");
         return $query->result_array();
    }

    public function getDataSiswaById($id){
        $data = $this->db->query("SELECT users.* , student.* FROM users INNER JOIN student ON users.user_id = student.user_id WHERE users.user_id ='$id' ");
        return $data->result_array();
    }

    public function updateDataSiswa($id,$data){
        $this->db->where('user_id',$id);
        $this->db->update('student',array(
            'student_gender' => $data['student_gender'], 
            'student_class_id' => $data['student_class_id'],
            'student_name' => $data['student_name']
        ));

        $this->db->where('user_id',$id);
        $this->db->update('users',array("password"=>$data['password'])); 

        return true;
    }


    public function getDataMapel(){
        $query = $this->db->query("SELECT * FROM quiz_subjects");
        return $query->result_array();
    }    

    public function updateDataMapel($id,$data){
        $this->db->where('quiz_subject_id',$id);
        return $this->db->update('quiz_subjects',$data);
    }    


    public function getDataMapelById($id){
        $data = $this->db->query("SELECT * FROM quiz_subjects WHERE quiz_subject_id ='$id' ");
        return $data->result_array();
    }

    public function hapusDataMapel($id){
        $this->db->where('quiz_subject_id ', $id);
        return $this->db->delete('quiz_subjects');
    }    

    public function tambahDataMapel($data){
        return $this->db->insert('quiz_subjects', $data);
    }    

    public function ambilRole($data){
        $query = $this->db->query("SELECT role_id FROM role WHERE name ='$data' ");

        $row = $query->row_array();
        return $row['role_id'];
    }
}