<?php  
  require_once "./app/db/Conexao.php";  
  require_once "./app/mpdf60/mpdf.php";  

  class reportCliente extends mpdf{  

    // Atributos da classe  
    private $pdo  = null;  
    private $pdf  = null;
    private $css  = null;  
    private $titulo = null; 
 
    /*  
    * Construtor da classe  
    * @param $css  - Arquivo CSS  
    * @param $titulo - Título do relatório   
    */  
    public function __construct($css, $titulo) {  
      $this->pdo  = Database::getConnection();
      $this->titulo = $titulo;  
      $this->setarCSS($css);  
    }
  
    /*  
    * Método para setar o conteúdo do arquivo CSS para o atributo css  
    * @param $file - Caminho para arquivo CSS  
    */  
    public function setarCSS($file){  
     if (file_exists($file)):  
       $this->css = file_get_contents($file);  
     else:  
       echo 'Arquivo inexistente!';  
     endif;  
    }  

    /*  
    * Método para montar o Cabeçalho do relatório em PDF  
    */  
    protected function getHeader(){  
       $data = date('j/m/Y');  
       $retorno = "<table class=\"tbl_header\" width=\"1000\">  
               <tr>  
                 <td align=\"left\">Biblioteca mPDF</td>  
                 <td align=\"right\">Gerado em: $data</td>  
               </tr>  
             </table>";  
       return $retorno;  
     }  

     /*  
     * Método para montar o Rodapé do relatório em PDF  
     */  
     protected function getFooter(){  
       $retorno = "<table class=\"tbl_footer\" width=\"1000\">  
               <tr>  
                 <td align=\"left\"><a href=''>devwilliam.blogspot.com</a></td>  
                 <td align=\"right\">Página: {PAGENO}</td>  
               </tr>  
             </table>";  
       return $retorno;  
     }  

    /*   
    * Método para construir a tabela em HTML com todos os dados  
    * Esse método também gera o conteúdo para o arquivo PDF  
    */  
    private function getTabela(){  
      $color  = false;  
      $retorno = "";  

      $retorno .= "<h2 style=\"text-align:center\">{$this->titulo}</h2>";  
      $retorno .= "<table border='1' width='1000' align='center'>  
           <tr class='header'>  
             <th>Nome</td>  
             <th>Telefone</td>  
             <th>Idade</td>  
             <th>Profissão</td>  
             <th>E-mail</td>  
             <th>Endereço</td>  
             <th>Cidade</td>  
             <th>Estado</td>  
           </tr>";  

      $sql = "SELECT * FROM usuario";  
      foreach ($this->pdo->query($sql) as $reg):  
         $retorno .= ($color) ? "<tr>" : "<tr class=\"zebra\">";  
         $retorno .= "<td class='destaque'>{$reg['id']}</td>";  
         $retorno .= "<td>{$reg['nome']}</td>";  
         $retorno .= "<td>{$reg['datanasc']}</td>";  
         $retorno .= "<td>{$reg['email']}</td>";  
       $retorno .= "<tr>";  
       $color = !$color;  
      endforeach;  

      $retorno .= "</table>";  
      return $retorno;  
    } 

    /*   
    * Método para construir o arquivo PDF  
    */  
    public function BuildPDF(){  
     $this->pdf = new mPDF('utf-8', 'A4-L');  
     $this->pdf->WriteHTML($this->css, 1);  
     $this->pdf->SetHTMLHeader($this->getHeader());  
     $this->pdf->SetHTMLFooter($this->getFooter());  
     $this->pdf->WriteHTML($this->getTabela());   
    }   

    /*   
    * Método para exibir o arquivo PDF  
    * @param $name - Nome do arquivo se necessário grava-lo  
    */  
    public function Exibir($name = null) {  
     $this->pdf->Output($name, 'I');  
    }  
  }   