<?php
namespace Model;

use Model\Conexao;

// class Enderecos extends Conexao
class Enderecos
{
    /**
     * Armazena um novo endereco no sistema
     * 
     * @param $endereco Nome da endereco
     * @return BOOLEAN TRUE se o cadastro ocorrer com sucesso ou FALSE se houver falha
     */
    public static function create($endereco, $bairro, $cep, $uf, $municipio)
    {
        $query = 'INSERT INTO enderecos (endereco, bairro, cep, uf, municipio) VALUES (?,?,?,?,?)';
        $data = [
            0 => [
                '#' => 1,
                'value' => $endereco
            ],
            1 => [
                '#' => 2,
                'value' => $bairro
            ],
            2 => [
                '#' => 3,
                'value' => $cep
            ],
            3 => [
                '#' => 4,
                'value' => $uf
            ],
            4 => [
                '#' => 5,
                'value' => $municipio
            ]
        ];

        $conexao = new Conexao();

        return $conexao->execute($query, $data);
    }

    /**
     * Retorna o(s) endereco(s) cadastrado(s). Se houver parâmetro, retorna os dados da endereco em questão
     * 
     * @param $endereco Nome do endereco
     * @return array Dados do(s) usuário(s)
     */
    public static function read($endereco = null)
    {
        $query = 'SELECT id, endereco, bairro, cep, uf, municipio FROM enderecos';
        
        if(!empty($endereco))
        {
            $query .= " WHERE id=?";
        }

        $query .= " ORDER BY id ASC";

        $conexao = new Conexao();

        return $conexao->select($query, $endereco);
    }

    public static function getLastId(){
        $query = 'SELECT max(id) as id FROM enderecos';
        
        $conexao = new Conexao();

        return $conexao->select($query)[0]['id'];
    }
    
    public function update()
    {
        //
    }
}