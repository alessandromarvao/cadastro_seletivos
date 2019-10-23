<?php

namespace Model;

include_once '../../env.php';

/**
 * Esta classe cria a conexão com o Banco de Dados usando o PDO, 
 * que fornece seguranãa e também cria pools de conexão para administrar
 * o tráfego de informações no Banco de Dados
 *
 * @author Alessandro Marvão <alessandromarvao@gmail.com>
 * @version 1.0
 * @copyright (c) 2015, Alessandro Marvão
 * @access public
 */
class Conexao {
    
    protected $conn;
    
    /**
     * Retorna um objeto da classe PDO já com as informações
     * necessárias à ligação com o Banco de Dados
     * 
     * @access public
     * @return PDO retorna um objeto PDO
     */
    function __construct(){
        try {
            $this->conn = new \PDO('mysql:host=' . HST . ';dbname=' . BD, USR, PWD);
        } catch (Exception $ex) {
            print_r("Erro ao conectar com o Banco de Dados. " . $ex->getMessage());
        }
        return $this->conn;
    }

    public function execute($query, $data)
    {
        $stmt = $this->conn->prepare($query);
        
        foreach($data as $row){
            $stmt->bindParam($row['#'], $row['value']);
        }

        return $stmt->execute();
    }

    public function select($query, $id=NULL)
    {
        $stmt = $this->conn->prepare($query);
        
        if(!empty($id)){
            $stmt->bindParam(1, $id);
        }
        
        $stmt->execute();
        
        if(!empty($id)){
            return $stmt->fetch(\PDO::FETCH_ASSOC);
        } else {
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }
    }
    
    public function selectByParams($query, $params){
        $stmt = $this->conn->prepare($query);
        
        foreach($params as $row){
            $stmt->bindParam($row['#'], $row['value']);
        }

        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function beginTransaction()
    {
        return $this->conn->beginTransaction();
    }

    public function commit()
    {
        return $this->conn->commit();
    }

    public function rollback()
    {
        return $this->conn->rollback();
    }

    function __destroy(){
        $this->conn = null;
    }
}