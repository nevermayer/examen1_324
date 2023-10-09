<?php 
    class Persona extends CI_Model {

        public function agregar($persona) {
            $this->db->insert('personas', $persona);
            $this->db->query("INSERT INTO estudiante (id_persona) VALUES ('".$persona['id_persona']."')");
        }//end agregar

        public function seleccionar_todo() {
            $this->db->select('*');
            $this->db->from('personas');
            return $this->db->get()->result();
        }//end seleccionar_todo
        public function estudiantes() {
            $datos=$this->db->query("select * from personas where id_persona in (select id_persona from estudiante)");

            return $datos->result_array();
        }//end seleccionar_todo

        public function eliminar($id_persona) {
            $this->db->where('id_persona', $id_persona);
            $this->db->delete('estudiante');
            $this->db->where('id_persona', $id_persona);
            $this->db->delete('personas');
        }//end eliminar

        public function actualizar($persona, $id_persona) {
            $this->db->where('id_persona', $id_persona);
            $this->db->update('personas', $persona);
        }//end actualizar
    }//end Class Persona
?>