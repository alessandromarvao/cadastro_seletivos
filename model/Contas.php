<?php
namespace Model;

use Model\Conexao;

// class Contas extends Conexao
class Contas
{
    /**
     * Armazena um novo conta no sistema
     * 
     * @param $conta Nome da conta
     * @return BOOLEAN TRUE se o cadastro ocorrer com sucesso ou FALSE se houver falha
     */
    public static function create($banco, $ag, $conta, $tipo, $op)
    {
        $query = 'INSERT INTO contas (id_bancos, agencia, conta, tipo, operacao) VALUES (?,?,?,?,?)';
        $data = [
            0 => [
                '#' => 1,
                'value' => $banco
            ],
            1 => [
                '#' => 2,
                'value' => $ag
            ],
            2 => [
                '#' => 3,
                'value' => $conta
            ],
            3 => [
                '#' => 4,
                'value' => $tipo
            ],
            4 => [
                '#' => 5,
                'value' => $op
            ]
        ];

        $conexao = new Conexao();

        return $conexao->execute($query, $data);
    }

    /**
     * Retorna o(s) conta(s) cadastrado(s). Se houver parâmetro, retorna os dados da conta em questão
     * 
     * @param $conta Nome do conta
     * @return array Dados do(s) usuário(s)
     */
    public static function read($conta = null)
    {
        $query = 'SELECT contas.id, bancos.id, bancos.banco, contas.agencia, contas.conta, contas.tipo, contas.operacao FROM contas LEFT JOIN bancos ON bancos.id=bancos.id_bancos';
        
        if(!empty($conta))
        {
            $query .= " WHERE contas.id=?";
        }

        $query .= " ORDER BY contas.id ASC";

        $conexao = new Conexao();

        return $conexao->select($query, $conta);
    }

    public static function getLastId(){
        $query = 'SELECT max(id) as id FROM contas';
        
        $conexao = new Conexao();

        return $conexao->select($query)[0]['id'];
    }
    
    public function update()
    {
        //
    }
}