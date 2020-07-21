<?php
namespace Controller\Classes;

include_once '../../bootstrap.php';

class LDAPController
{
    private $conn;
    private $ldapBind;

    function __construct(){
        $this->conn = \ldap_connect($_ENV['LDAP_SERVER'], $_ENV['LDAP_PORT']) or die ("Sem conexão com o servidor de domínio");
    }

    /**
     * Confere a credencial do usuário no servidor de domínio.
     * 
     * @param $usr Credencial do usuário
     * @param $pwd Senha do usuário
     * @return TRUE se confirmar credencial e FALSE se não.
     */
    public function checkAccess($usr, $pwd){
        // using ldap bind
        $ldaprdn  = $usr . "@". $_ENV['LDAP_DOMAIN'];     // ldap rdn or dn
        $ldappass = $pwd;  // associated password
        
        // connect to ldap server
        if ($this->conn) {
            // binding to ldap server
            $this->ldapBind = @ldap_bind($this->conn, $ldaprdn, $ldappass);
            
            // verify binding
            if ($this->ldapBind) {
                return $this->search($usr);
            } else {
                return FALSE;
            }
        }
        // if(@ldap_bind($this->conn, $usr."@".LDAP_DOMAIN, $pwd)) {
        //     return TRUE;
        // } else {
        //     echo "Erro no login";
        //     return FALSE;
        // }
    }

    /**
     * Pesquisa os dados do usuário no domínio
     * 
     * @param $usr Credencial do usuário
     * @return array Dados do usuário selecionado
     */
    private function search($usr){
        $base_dn = "OU=ifma,DC=ifma,DC=edu";
        // $filter = "(&(objectClass=user))";
        $filter = "(&(samaccountname=" . $usr . "))";
        if($search=ldap_search($this->conn, $base_dn, $filter)){
            $number_returned = ldap_count_entries($this->conn, $search);
            $info = ldap_get_entries($this->conn, $search);
            // echo substr($info[0]['extensionattribute7'][0], 0, -4) . "-" . substr($info[0]['extensionattribute7'][0], 4, 2) . "-" . substr($info[0]['extensionattribute7'][0],6,2); //data de nascimento
            // echo $info[0]['extensionattribute6'][0]; //cpf
            // echo $info[0]['mail'][0]; //email
            // echo $info[0]['cn'][0]; //matrícula
            // echo $info[0]['description'][0]; // Nome completo

            return array(
                'usr' => $usr,
                'cpf' => $info[0]['extensionattribute6'][0],
                'nome' => $info[0]['description'][0],
                'email' => $info[0]['mail'][0],
                'bday' => substr($info[0]['extensionattribute7'][0], 0, -4) . "-" . substr($info[0]['extensionattribute7'][0], 4, 2) . "-" . substr($info[0]['extensionattribute7'][0],6,2),
            );
        }
        return TRUE;
    }

    function __destroy(){
        return @ldap_close($this->conn);
    }
}
