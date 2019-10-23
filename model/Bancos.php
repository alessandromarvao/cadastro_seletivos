<?php
namespace Model;

use Model\Conexao;

// class Bancos extends Conexao
class Bancos
{
    /**
     * Armazena um novo banco no sistema
     * 
     * @param $banco Nome da banco
     * @return BOOLEAN TRUE se o cadastro ocorrer com sucesso ou FALSE se houver falha
     */
    public static function create($banco)
    {
        $query = 'INSERT INTO bancos (banco) VALUES (?)';
        $data = [
            0 => [
                '#' => 1,
                'value' => $banco
            ]
        ];

        $conexao = new Conexao();

        return $conexao->execute($query, $data);
    }

    /**
     * Retorna o(s) banco(s) cadastrado(s). Se houver parâmetro, retorna os dados da banco em questão
     * 
     * @param $banco Nome do banco
     * @return array Dados do(s) usuário(s)
     */
    public static function read($banco = null)
    {
        $query = 'SELECT id, banco FROM bancos';
        
        if(!empty($banco))
        {
            $query .= " WHERE id=?";
        }

        $query .= " ORDER BY id ASC";

        $conexao = new Conexao();

        return $conexao->select($query, $banco);
    }
    
    public function update()
    {
        //
    }
}