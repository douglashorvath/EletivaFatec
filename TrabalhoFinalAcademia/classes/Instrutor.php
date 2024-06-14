<?php

class Instrutor
{
    private $id;
    private $nome;
    private $certificacoes = array();
    private $especializacoes = array();


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

    public function getCertificacoes()
    {
        return $this->certificacoes;
    }

    public function setCertificacoes($certificacoes)
    {
        $this->certificacoes = $certificacoes;
    }

    public function getEspecializacoes()
    {
        return $this->especializacoes;
    }

    public function setEspecializacoes($especializacoes)
    {
        $this->especializacoes = $especializacoes;
    }

    public function addCertificacao($certificacao)
    {
        $this->certificacoes[] = $certificacao;
    }

    public function addEspecializacao($especializacao)
    {
        $this->especializacoes[] = $especializacao;
    }

    public function inserirInstrutor()
    {
        try {
            $conexao = conectarBanco();
            $sql = "INSERT INTO instrutor (nome) VALUES (:nome)";
            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(":nome", $this->nome);
            if ($stmt->execute()) {
                $this->id = $conexao->lastInsertId();
                $this->salvarCertificacoes();
                $this->salvarEspecializacoes();
                return true;
            }
            return false;
        } catch (PDOException $ex) {
            return false;
        }
    }

    public static function getInstrutor($id)
    {
        try {
            $conexao = conectarBanco();
            $sql = "SELECT * FROM instrutor WHERE id = :id";
            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(":id", $id);
            $stmt->execute();
            $obj = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($obj != null) {
                $instrutor = new Instrutor();
                $instrutor->setId($obj['id']);
                $instrutor->setNome($obj['nome']);
                $instrutor->setCertificacoes(self::getTodasCertificacoes($obj['id']));
                $instrutor->setEspecializacoes(self::getTodasEspecializacoes($obj['id']));
                return $instrutor;
            }
        } catch (PDOException $ex) {
            return null;
        }
    }

    public static function getInstrutores($nome)
    {
        try {
            $conexao = conectarBanco();
            $sql = "SELECT * FROM instrutor WHERE nome LIKE :nome";
            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(":nome", "%" . $nome . "%");
            $stmt->execute();
            $instrutores = array();
            foreach ($stmt as $instr => $i) {
                $instrutor = new Instrutor();
                $instrutor->setId($i['id']);
                $instrutor->setNome($i['nome']);
                $instrutor->setCertificacoes(self::getTodasCertificacoes($i['id']));
                $instrutor->setEspecializacoes(self::getTodasEspecializacoes($i['id']));
                $instrutores[] = $instrutor;
            }
            return $instrutores;
        } catch (PDOException $ex) {
            return null;
        }
    }

    public static function getTodosInstrutores()
    {
        try {
            $conexao = conectarBanco();
            $sql = "SELECT * FROM instrutor";
            $stmt = $conexao->prepare($sql);
            $stmt->execute();
            $instrutores = array();
            foreach ($stmt as $instr => $i) {
                $instrutor = new Instrutor();
                $instrutor->setId($i['id']);
                $instrutor->setNome($i['nome']);
                $instrutor->setCertificacoes(self::getTodasCertificacoes($i['id']));
                $instrutor->setEspecializacoes(self::getTodasEspecializacoes($i['id']));
                $instrutores[] = $instrutor;
            }
            return $instrutores;
        } catch (PDOException $ex) {
            return null;
        }
    }

    public function salvarAlteracoes()
    {
        try {
            $conexao = conectarBanco();
            $sql = "UPDATE instrutor SET nome = :nome WHERE id = :id";
            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(":nome", $this->nome);
            $stmt->bindValue(":id", $this->id);
            if ($stmt->execute()) {
                $this->salvarCertificacoes();
                $this->salvarEspecializacoes();
                return true;
            }
            return false;
        } catch (PDOException $ex) {
            return false;
        }
    }

    private function salvarCertificacoes()
    {
        try {
            $conexao = conectarBanco();
            $sql = "DELETE FROM certificacao_instrutor WHERE instrutor_id = :instrutor_id";
            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(":instrutor_id", $this->id);
            $stmt->execute();

            foreach ($this->certificacoes as $certificacao) {
                $sql = "INSERT INTO certificacao_instrutor (descricao, instrutor_id) VALUES (:descricao, :instrutor_id)";
                $stmt = $conexao->prepare($sql);
                $stmt->bindValue(":descricao", $certificacao);
                $stmt->bindValue(":instrutor_id", $this->id);
                $stmt->execute();
            }
        } catch (PDOException $ex) {
            return false;
        }
    }

    private function salvarEspecializacoes()
    {
        try {
            $conexao = conectarBanco();
            $sql = "DELETE FROM especializacao_instrutor WHERE instrutor_id = :instrutor_id";
            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(":instrutor_id", $this->id);
            $stmt->execute();

            foreach ($this->especializacoes as $especializacao) {
                $sql = "INSERT INTO especializacao_instrutor (descricao, instrutor_id) VALUES (:descricao, :instrutor_id)";
                $stmt = $conexao->prepare($sql);
                $stmt->bindValue(":descricao", $especializacao);
                $stmt->bindValue(":instrutor_id", $this->id);
                $stmt->execute();
            }
        } catch (PDOException $ex) {
            return false;
        }
    }

    private static function getTodasCertificacoes($instrutor_id)
    {
        try {
            $conexao = conectarBanco();
            $sql = "SELECT descricao FROM certificacao_instrutor WHERE instrutor_id = :instrutor_id";
            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(":instrutor_id", $instrutor_id);
            $stmt->execute();
            $certificacoes = array();
            foreach ($stmt as $cert => $c) {
                $certificacoes[] = $c['descricao'];
            }
            return $certificacoes;
        } catch (PDOException $ex) {
            return array();
        }
    }

    private static function getTodasEspecializacoes($instrutor_id)
    {
        try {
            $conexao = conectarBanco();
            $sql = "SELECT descricao FROM especializacao_instrutor WHERE instrutor_id = :instrutor_id";
            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(":instrutor_id", $instrutor_id);
            $stmt->execute();
            $especializacoes = array();
            foreach ($stmt as $esp => $e) {
                $especializacoes[] = $e['descricao'];
            }
            return $especializacoes;
        } catch (PDOException $ex) {
            return array();
        }
    }

    public function excluirInstrutor()
    {
        try {
            $conexao = conectarBanco();
            $sql = "DELETE FROM certificacao_instrutor WHERE instrutor_id = :instrutor_id";
            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(":instrutor_id", $this->id);
            $stmt->execute();
            $sql = "DELETE FROM especializacao_instrutor WHERE instrutor_id = :instrutor_id";
            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(":instrutor_id", $this->id);
            $stmt->execute();
            $sql = "DELETE FROM instrutor WHERE id = :id";
            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(":id", $this->id);
            return $stmt->execute();
        } catch (PDOException $ex) {
            echo $ex;
            return false;
        }
    }
}
