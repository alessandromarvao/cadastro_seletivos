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
    public static function create($escola, $conta, $endereco, $cpf, $matricula, $nome, $rg, $sexo, $orgao_exp, $data_exped, $email)
    {
        date_default_timezone_set('America/Recife');
        $date = DATE('Y-m-d H:i:s');
        $query = 'INSERT INTO fiscais (id_escolas, id_contas, id_enderecos, cpf, matricula, nome, rg, sexo, orgao_exp, data_exped, email, created_at) ' . 
        'VALUES (?,?,?,?,?,?,?,?,?,?,?,?)';
        $data = [
            0 => [
                '#' => 1,
                'value' => $escola
            ],
            1 => [
                '#' => 2,
                'value' => $conta
            ],
            2 => [
                '#' => 3,
                'value' => $endereco
            ],
            3 => [
                '#' => 4,
                'value' => $cpf
            ],
            4 => [
                '#' => 5,
                'value' => $matricula
            ],
            5 => [
                '#' => 6,
                'value' => $nome
            ],
            6 => [
                '#' => 7,
                'value' => $rg
            ],
            7 => [
                '#' => 8,
                'value' => $sexo
            ],
            8 => [
                '#' => 9,
                'value' => $orgao_exp
            ],
            9 => [
                '#' => 10,
                'value' => $data_exped
            ],
            10 => [
                '#' => 11,
                'value' => $email
            ],
            11 => [
                '#' => 12,
                'value' => $date
            ]
        ];

        $conexao = new Conexao();

        return $conexao->execute($query, $data);
    }

    /**
     * Retorna o(s) fiscal(is) cadastrado(s). Se houver parâmetro, retorna os dados da fisca em questão
     * 
     * @param $fisca Nome do fisca
     * @return array Dados do(s) usuário(s)
     */
    public static function read($fiscal = null)
    {
        $query = 'SELECT fiscais.id, escolas.escola, bancos.banco, contas.conta, contas.agencia, contas.operacao, contas.tipo, ' . 
        'enderecos.endereco, enderecos.bairro, enderecos.cep, enderecos.municipio, enderecos.uf, ' . 
        'fiscais.cpf, fiscais.matricula, fiscais.nome, fiscais.rg, fiscais.sexo, fiscais.orgao_exp, fiscais.data_exped, fiscais.email, fiscais.created_at  FROM fiscais ' . 
        'LEFT JOIN contas ON fiscais.id_contas=contas.id ' .
        'LEFT JOIN bancos ON contas.id_bancos=bancos.id ' .
        'LEFT JOIN enderecos ON fiscais.id_enderecos = enderecos.id ' .
        'LEFT JOIN escolas ON fiscais.id_escolas=escolas.id';
        
        if(!empty($fiscal))
        {
            $query .= " WHERE fiscais.id=?";
        }

        $query .= " ORDER BY fiscais.id ASC";

        $conexao = new Conexao();

        return $conexao->select($query, $fiscal);
    }
    
    public function update()
    {
        //
    }
}