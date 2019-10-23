<?php
namespace Model;

use Model\Conexao;

// class Fiscais extends Conexao
class Fiscais
{
    /**
     * Armazena um novo fiscal no sistema
     * 
     * @param $fiscal Nome da fisca
     * @return BOOLEAN TRUE se o cadastro ocorrer com sucesso ou FALSE se houver falha
     */
    public static function create($fiscal, $escola, $conta, $endereco, $cpf, $matricula, $nome, $rg, $sexo, $orgao_exp, $data_exped, $email)
    {
        date_default_timezone_set('America/Recife');
        $date = DATE('Y-m-d');
        $query = 'INSERT INTO fiscais (id, id_escolas, contas_id, enderecos_id, cpf, matricula, nome, rg, sexo, orgao_exp, data_exped, email, created_at) VALUES (?)';
        $data = [
            0 => [
                '#' => 1,
                'value' => $fiscal
            ]
        ];

        $conexao = new Conexao();

        return $conexao->execute($query, $data);
    }

    /**
     * Retorna o(s) fisca(s) cadastrado(s). Se houver parâmetro, retorna os dados da fisca em questão
     * 
     * @param $fisca Nome do fisca
     * @return array Dados do(s) usuário(s)
     */
    public static function read($fiscal = null)
    {
        $query = 'SELECT id, id_escolas, contas_id, enderecos_id, cpf, matricula, nome, rg, sexo, orgao_exp, data_exped, email, created_at FROM fiscais';
        
        if(!empty($fiscal))
        {
            $query .= " WHERE id=?";
        }

        $query .= " ORDER BY id ASC";

        $conexao = new Conexao();

        return $conexao->select($query, $fiscal);
    }
    
    public function update()
    {
        //
    }
}