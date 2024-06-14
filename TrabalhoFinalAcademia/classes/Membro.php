<?php


class Membro
{

    private $id;
    private $nome;
    private $idade;
    private $tipo_plano;

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

    public function getIdade()
    {
        return $this->idade;
    }

    public function setIdade($idade)
    {
        $this->idade = $idade;
    }

    public function getTipo_plano()
    {
        return $this->tipo_plano;
    }

    public function setTipo_plano($tipo_plano)
    {
        $this->tipo_plano = $tipo_plano;
    }

    public function inseriorMembro()
    {
        try {
            $conexao = conectarBanco();
            $sql = "INSERT INTO membro (nome, idade, tipo_plano) VALUES (:nome, :idade, :tipo_plano)";
            $stmt =  $conexao->prepare($sql);
            $stmt->bindValue(":nome", $this->nome);
            $stmt->bindValue(":idade", $this->idade);
            $stmt->bindValue(":tipo_plano", $this->tipo_plano);
            if ($stmt->execute()) {
                $this->id = $conexao->lastInsertId();
                return true;
            }
        } catch (PDOException $ex) {
            return false;
        }
    }

    public static function getMembro($id)
    {
        try {
            $conexao = conectarBanco();
            $sql = "SELECT * FROM membro WHERE id = :id";
            $stmt =  $conexao->prepare($sql);
            $stmt->bindValue(":id", $id);
            $stmt->execute();
            $obj = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($obj != null) {
                $membro = new Membro();
                $membro->setId($obj['id']);
                $membro->setNome($obj['nome']);
                $membro->setIdade($obj['idade']);
                $membro->setTipo_plano($obj['tipo_plano']);
                return $membro;
            }
        } catch (PDOException $ex) {
            return null;
        }
    }

    public static function getMembros($nome)
    {
        try {
            $conexao = conectarBanco();
            $sql = "SELECT * FROM membro WHERE nome LIKE :nome";
            $stmt =  $conexao->prepare($sql);
            $stmt->bindValue(":nome", "%" . $nome . "%");
            $stmt->execute();
            $membros = array();
            foreach ($stmt as $memb => $m) {
                $membro = new Membro();
                $membro->setId($m['id']);
                $membro->setNome($m['nome']);
                $membro->setIdade($m['idade']);
                $membro->setTipo_plano($m['tipo_plano']);
                $membros[] = $membro;
            }
            return $membros;
        } catch (PDOException $ex) {
            return null;
        }
    }

    public static function getTodosMembros()
    {
        try {
            $conexao = conectarBanco();
            $sql = "SELECT * FROM membro";
            $stmt =  $conexao->prepare($sql);
            $stmt->execute();
            $membros = array();
            foreach ($stmt as $memb => $m) {
                $membro = new Membro();
                $membro->setId($m['id']);
                $membro->setNome($m['nome']);
                $membro->setIdade($m['idade']);
                $membro->setTipo_plano($m['tipo_plano']);
                $membros[] = $membro;
            }
            return $membros;
        } catch (PDOException $ex) {
            return null;
        }
    }

    public function salvarAlteracoes()
    {
        try {
            $conexao = conectarBanco();
            $sql = "UPDATE membro SET nome = :nome, idade = :idade, tipo_plano = :tipo_plano WHERE id = :id";
            $stmt =  $conexao->prepare($sql);
            $stmt->bindValue(":nome", $this->nome);
            $stmt->bindValue(":idade", $this->idade);
            $stmt->bindValue(":tipo_plano", $this->tipo_plano);
            $stmt->bindValue(":id", $this->id);
            return $stmt->execute();
        } catch (PDOException $ex) {
            return false;
        }
    }

    public function excluirMembro()
    {
        try {
            $conexao = conectarBanco();
            $sql = "DELETE FROM membro WHERE id = :id";
            $stmt =  $conexao->prepare($sql);
            $stmt->bindValue(":id", $this->id);
            return $stmt->execute();
        } catch (PDOException $ex) {
            return false;
        }
    }
}
