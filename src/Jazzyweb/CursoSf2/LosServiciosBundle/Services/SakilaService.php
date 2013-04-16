<?php

namespace Jazzyweb\CursoSf2\LosServiciosBundle\Services;

class SakilaService {

    protected $conexion;

    public function __construct($dbname, $dbuser, $dbpass, $dbhost, $charset = 'utf8') {

        $this->db = new \PDO("mysql:host=$dbhost;dbname=$dbname;charset=$charset", $dbuser, $dbpass);

        $this->db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        $this->db->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false);
    }

    public function getActors() {
        $stmt = $this->db->query("select * from actor");

        $stmt->execute();

        $rows = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        return $rows;
    }

    public function getActorById($id) {

        if (!$id) {
            throw new Exception("Falta el parámetro $id");
        }

        $stmt = $this->db->query("select * from actor where actor_id = ?");

        $stmt->execute(array($id));

        $rows = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        return $rows[0];
    }

    public function getActorsByName($name) {
        if (!$name) {
            throw new Exception("Falta el parámetro $name");
        }

        $stmt = $this->db->prepare("select * from actor 
            where first_name like :first_name or last_name like :last_name");

        $stmt->execute(array('first_name' => $name, 'last_name' => $name));

        $rows = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        return $rows;
    }

    public function getFilmById($id) {
        if (!$id) {
            throw new Exception("Falta el parámetro $id");
        }

        $stmt = $this->db->query("select * from film where film_id = ?");

        $stmt->execute(array($id));

        $rows = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        return $rows[0];
    }

    public function getFilmsOfActor($id) {

        if (!$id) {
            throw new Exception("Falta el parámetro $id");
        }

        $stmt = $this->db->query("select title, description 
            from film as f, actor as a, film_actor as fm 
            where  
            a.actor_id=? and a.actor_id=fm.actor_id and f.film_id=fm.film_id
            ");

        $stmt->execute(array($id));

        $rows = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        return $rows;
    }

    // A partir de aquí, mogollón de métodos para surfear por la base de datos
}
