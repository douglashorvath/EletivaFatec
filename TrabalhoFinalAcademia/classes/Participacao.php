<?php

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

    public static function getParticipacao($data_hora, Membro $membro, Aula $aula)
    {
        try {
            $conexao = conectarBanco();
            $sql = "SELECT * FROM participacao WHERE data_hora = :data_hora AND membro_id = :membro_id AND aula_id = :aula_id";
            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(":data_hora", $data_hora);
            $stmt->bindValue(":membro_id", $membro->getId());
            $stmt->bindValue(":aula_id", $aula->getId());
            $stmt->execute();
            $obj = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($obj != null) {
                $participacao = new Participacao();
                $participacao->setData_hora($obj['data_hora']);
                $participacao->setMembro($membro);
                $participacao->setAula($aula);
                return $participacao;
            }
        } catch (PDOException $ex) {
            return null;
        }
    }

    public static function getParticipacoes(Membro $membro)
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
            $sql = "UPDATE participacao SET data_hora = :data_hora WHERE membro_id = :membro_id AND aula_id = :aula_id";
            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(":data_hora", $this->data_hora);
            $stmt->bindValue(":membro_id", $this->membro->getId());
            $stmt->bindValue(":aula_id", $this->aula->getId());
            return $stmt->execute();
        } catch (PDOException $ex) {
            return false;
        }
    }
}
