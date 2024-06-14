<?php

require_once("../classes/Instrutor.php");

class Aula
{
    private $id;
    private $nome;
    private $horario;
    private $instrutor;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getHorario()
    {
        return $this->horario;
    }

    public function setHorario($horario)
    {
        $this->horario = $horario;
    }

    public function getInstrutor()
    {
        return $this->instrutor;
    }

    public function setInstrutor(Instrutor $instrutor)
    {
        $this->instrutor = $instrutor;
    }

    public function inserirAula()
    {
        try {
            $conexao = conectarBanco();
            $sql = "INSERT INTO aula (nome, horario, instrutor_id) VALUES (:nome, :horario, :instrutor_id)";
            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(":nome", $this->nome);
            $stmt->bindValue(":horario", $this->horario);
            $stmt->bindValue(":instrutor_id", $this->instrutor->getId());
            if ($stmt->execute()) {
                $this->id = $conexao->lastInsertId();
                return true;
            }
            return false;
        } catch (PDOException $ex) {
            return false;
        }
    }

    public static function getAula($id)
    {
        try {
            $conexao = conectarBanco();
            $sql = "SELECT * FROM aula WHERE id = :id";
            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(":id", $id);
            $stmt->execute();
            $obj = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($obj != null) {
                $aula = new Aula();
                $aula->setId($obj['id']);
                $aula->setNome($obj['nome']);
                $aula->setHorario($obj['horario']);
                $instrutor = Instrutor::getInstrutor($obj['instrutor_id']);
                $aula->setInstrutor($instrutor);
                return $aula;
            }
        } catch (PDOException $ex) {
            return null;
        }
    }

    public static function getAulas($nome)
    {
        try {
            $conexao = conectarBanco();
            $sql = "SELECT * FROM aula WHERE nome LIKE :nome";
            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(":nome", "%" . $nome . "%");
            $stmt->execute();
            $aulas = array();
            foreach ($stmt as $a) {
                $aula = new Aula();
                $aula->setId($a['id']);
                $aula->setNome($a['nome']);
                $aula->setHorario($a['horario']);
                $instrutor = Instrutor::getInstrutor($a['instrutor_id']);
                $aula->setInstrutor($instrutor);
                $aulas[] = $aula;
            }
            return $aulas;
        } catch (PDOException $ex) {
            return null;
        }
    }

    public static function getTodasAulas()
    {
        try {
            $conexao = conectarBanco();
            $sql = "SELECT * FROM aula";
            $stmt = $conexao->prepare($sql);
            $stmt->execute();
            $aulas = array();
            foreach ($stmt as $a) {
                $aula = new Aula();
                $aula->setId($a['id']);
                $aula->setNome($a['nome']);
                $aula->setHorario($a['horario']);
                $instrutor = Instrutor::getInstrutor($a['instrutor_id']);
                $aula->setInstrutor($instrutor);
                $aulas[] = $aula;
            }
            return $aulas;
        } catch (PDOException $ex) {
            return null;
        }
    }

    public static function getAulasPorInstrutor($instrutor_id)
    {
        try {
            $conexao = conectarBanco();
            $sql = "SELECT * FROM aula WHERE instrutor_id = :instrutor_id";
            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(":instrutor_id", $instrutor_id);
            $stmt->execute();
            $aulas = array();
            foreach ($stmt as $a) {
                $aula = new Aula();
                $aula->setId($a['id']);
                $aula->setNome($a['nome']);
                $aula->setHorario($a['horario']);
                $instrutor = Instrutor::getInstrutor($a['instrutor_id']);
                $aula->setInstrutor($instrutor);
                $aulas[] = $aula;
            }
            return $aulas;
        } catch (PDOException $ex) {
            return null;
        }
    }

    public function salvarAlteracoes()
    {
        try {
            $conexao = conectarBanco();
            $sql = "UPDATE aula SET nome = :nome, horario = :horario, instrutor_id = :instrutor_id WHERE id = :id";
            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(":nome", $this->nome);
            $stmt->bindValue(":horario", $this->horario);
            $stmt->bindValue(":instrutor_id", $this->instrutor->getId());
            $stmt->bindValue(":id", $this->id);
            return $stmt->execute();
        } catch (PDOException $ex) {
            return false;
        }
    }

    public function excluirAula()
    {
        try {
            $conexao = conectarBanco();
            $sql = "DELETE FROM aula WHERE id = :id";
            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(":id", $this->id);
            return $stmt->execute();
        } catch (PDOException $ex) {
            return false;
        }
    }
}
