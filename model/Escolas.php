<?php
namespace Model;

use Model\Conexao;

// class Escolas extends Conexao
class Escolas
{
    /**
     * Armazena uma nova escola no sistema
     * 
     * @param $escola Nome da escola
     * @return BOOLEAN TRUE se o cadastro ocorrer com sucesso ou FALSE se houver falha
     */
    public static function create($escola)
    {
        $query = 'INSERT INTO escolas (escola) VALUES (?)';
        $data = [
            0 => [
                '#' => 1,
                'value' => $escola
            ]
        ];

        $conexao = new Conexao();

        return $conexao->execute($query, $data);
    }

    /**
     * Retorna a(s) escola(s) cadastrada(s). Se houver parâmetro, retorna os dados da escola em questão
     * 
     * @param $escola Nome da escola
     * @return array Dados do(s) usuário(s)
     */
    public static function read($escola = null)
    {
        $query = 'SELECT id, escola FROM escolas';
        
        if(!empty($escola))
        {
            $query .= " WHERE id=?";
        }

        $query .= " ORDER BY id ASC";

        $conexao = new Conexao();

        return $conexao->select($query, $escola);
    }
    
    public function update()
    {
        //
    }
}