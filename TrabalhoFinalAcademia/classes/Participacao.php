<?php
require_once("Aula.php");
require_once("Membro.php");

class Participacao
{
    private $id;
    private $data_hora;
    private $membro;
    private $aula;


    public function getData_hora()
    {
        return $this->data_hora;
    }

    public function setData_hora($data_hora)
    {
        $this->data_hora = $data_hora;
    }

    public function getMembro()
    {
        return $this->membro;
    }

    public function setMembro(Membro $membro)
    {
        $this->membro = $membro;
    }

    public function getAula()
    {
        return $this->aula;
    }

    public function setAula(Aula $aula)
    {
        $this->aula = $aula;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function inserirParticipacao()
    {
        try {
            $conexao = conectarBanco();
            $sql = "INSERT INTO participacao (data_hora, membro_id, aula_id) VALUES (:data_hora, :membro_id, :aula_id)";
            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(":data_hora", $this->data_hora);
            $stmt->bindValue(":membro_id", $this->membro->getId());
            $stmt->bindValue(":aula_id", $this->aula->getId());
            if ($stmt->execute()) {
                $this->id = $conexao->lastInsertId();
                return true;
            }
        } catch (PDOException $ex) {
            return false;
        }
    }

    public static function getParticipacao($id)
    {
        try {
            $conexao = conectarBanco();
            $sql = "SELECT * FROM participacao WHERE id = :id";
            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(":id", $id);
            $stmt->execute();
            $obj = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($obj != null) {
                $membro = Membro::getMembro($obj['membro_id']);
                $aula = Aula::getAula($obj['aula_id']);
                $participacao = new Participacao();
                $participacao->setId($obj['id']);
                $participacao->setData_hora($obj['data_hora']);
                $participacao->setMembro($membro);
                $participacao->setAula($aula);
                return $participacao;
            }
        } catch (PDOException $ex) {
            return null;
        }
    }

    public static function getParticipacoesMembro($membro)
    {
        try {
            $conexao = conectarBanco();
            $sql = "SELECT * FROM participacao WHERE membro_id = :membro_id";
            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(":membro_id", $membro->getId());
            $stmt->execute();
            $participacoes = array();
            foreach ($stmt as $part => $p) {
                $aula = Aula::getAula($p['aula_id']);
                $participacao = new Participacao();
                $participacao->setId($p['id']);
                $participacao->setData_hora($p['data_hora']);
                $participacao->setMembro($membro);
                $participacao->setAula($aula);
                $participacoes[] = $participacao;
            }
            return $participacoes;
        } catch (PDOException $ex) {
            return null;
        }
    }

    public static function getParticipacoesAula($aula)
    {
        try {
            $conexao = conectarBanco();
            $sql = "SELECT * FROM participacao WHERE aula_id = :aula_id";
            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(":aula_id", $aula->getId());
            $stmt->execute();
            $participacoes = array();
            foreach ($stmt as $part => $p) {
                $membro = Membro::getMembro($p['membro_id']);
                $aula = Aula::getAula($p['aula_id']);
                $participacao = new Participacao();
                $participacao->setId($p['id']);
                $participacao->setData_hora($p['data_hora']);
                $participacao->setMembro($membro);
                $participacao->setAula($aula);
                $participacoes[] = $participacao;
            }
            return $participacoes;
        } catch (PDOException $ex) {
            return null;
        }
    }

    public static function getTodasParticipacoes()
    {
        try {
            $conexao = conectarBanco();
            $sql = "SELECT * FROM participacao";
            $stmt = $conexao->prepare($sql);
            $stmt->execute();
            $participacoes = array();
            foreach ($stmt as $part => $p) {
                $membro = Membro::getMembro($p['membro_id']);
                $aula = Aula::getAula($p['aula_id']);
                $participacao = new Participacao();
                $participacao->setId($p['id']);
                $participacao->setData_hora($p['data_hora']);
                $participacao->setMembro($membro);
                $participacao->setAula($aula);
                $participacoes[] = $participacao;
            }
            return $participacoes;
        } catch (PDOException $ex) {
            return null;
        }
    }

    public static function getParticipacoes($search)
    {
        try {
            $conexao = conectarBanco();
            $sql = "SELECT p.*, m.nome AS membro_nome, a.nome AS aula_nome 
                    FROM participacao p
                    JOIN membro m ON p.membro_id = m.id
                    JOIN aula a ON p.aula_id = a.id
                    WHERE m.nome LIKE :termo OR a.nome LIKE :termo";
            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(":termo", '%' . $search . '%');
            $stmt->execute();
            $participacoes = array();
            foreach ($stmt as $p) {
                $membro = Membro::getMembro($p['membro_id']);
                $aula = Aula::getAula($p['aula_id']);
                $participacao = new Participacao();
                $participacao->setId($p['id']);
                $participacao->setData_hora($p['data_hora']);
                $participacao->setMembro($membro);
                $participacao->setAula($aula);
                $participacoes[] = $participacao;
            }
            return $participacoes;
        } catch (PDOException $ex) {
            return null;
        }
    }

    public function salvarAlteracoes()
    {
        try {
            $conexao = conectarBanco();
            $sql = "UPDATE participacao SET data_hora = :data_hora, membro_id = :membro_id, aula_id = :aula_id WHERE id = :id";
            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(":data_hora", $this->data_hora);
            $stmt->bindValue(":membro_id", $this->membro->getId());
            $stmt->bindValue(":aula_id", $this->aula->getId());
            $stmt->bindValue(":id", $this->id);
            return $stmt->execute();
        } catch (PDOException $ex) {
            return false;
        }
    }

    public function excluirParticipacao()
    {
        try {
            $conexao = conectarBanco();
            $sql = "DELETE FROM participacao WHERE id = :id";
            $stmt =  $conexao->prepare($sql);
            $stmt->bindValue(":id", $this->id);
            return $stmt->execute();
        } catch (PDOException $ex) {
            return false;
        }
    }
}
