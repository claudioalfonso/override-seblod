<?php
// No Direct Access
defined( '_JEXEC' ) or die;

//nao salvou os dados
// conexão com banco e consulta
$db = JFactory::getDbo();

$query = $db->getQuery(true);
//$term = $_GET['term'];

// Prepare query.
$query = "SELECT * FROM #__cck_store_form_contatos WHERE pj_ou_pf=1";
//$query->select('title');
//$query->from('#__content');
//$query->where('state=1');
//$query->where('catid=58');

// Inject the query and load the result.
$db->setQuery($query);
$result = $db->loadAssocList();

// Check for errors
if ($error = $db->getErrorMsg()) {
    $this->setError($error);
    $result = false;
    return $result;
}

//print_r($result);

?>


<?php
// laço para pegar valores

foreach ($result as $valor){
        ($dados[] = array("value" => $valor['junta_nome_cpf'],
                          "nome" => $valor['junta_nome_cpf'],
						  "bairro" => $valor['bairro_cont'],
                        
                          ));
}

$titulos = json_encode($dados);
// print_r($titulos);
?>
<?php
//essa biblioteca que estava dando conflito: https://code.jquery.com/jquery-1.12.4.js
?>

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script type="text/javascript">
      jQuery(function(){
					 jQuery('#pega_title').autocomplete({
						source : <?php echo $titulos ?>,
						select : function(event, ui){
							jQuery('#pega_title').val(ui.item.value);
							jQuery('#pega_cpf').val(ui.item.nome);
						    jQuery('#atende_bairro').val(ui.item.bairro);
                         
                                                    	}
					});
				});
				
    </script>

<span class="help-inline">Nome:</span><br>
<input type="text" id="pega_title" name="pega_title" class="input-large search-query" placeholder="Buscar"><br/>
 <?php echo $cck->renderField('limpar_atende'); ?><br/>
<?php echo $cck->renderField('pega_cpf'); ?>
<br/>
<div class="baixo">
    <?php echo $cck->renderField('pega_cnpjfim'); ?>
    <?php echo $cck->renderField('cpfoucnpj'); ?><br/>
    <?php echo $cck->renderField('atende_bairro'); ?><br/>
    <?php echo $cck->renderField('protocolo_num'); ?>
    <?php echo $cck->renderField('responsavel_atende'); ?><br/>
	<?php echo $cck->renderField('data_atende'); ?><br/>
    <?php echo $cck->renderField('tp_atendimento'); ?><br/>
	<?php echo $cck->renderField('situa_atende'); ?><br/>
	<?php echo $cck->renderField('situa_encaminha'); ?><br/>
	<?php echo $cck->renderField('situa_resolvido'); ?><br/>
	<?php echo $cck->renderField('detalhe_at'); ?><br/>
	<?php echo $cck->renderField('salva_atendimentos_f'); ?><br/>
	<?php echo $cck->renderField('titulo_atendimento'); ?><br/>
	<?php echo $cck->renderField('nom_atendimento'); ?><br/>
	<?php echo $cck->renderField('edita_atende'); ?><br/>
	<?php echo $cck->renderField('apaga_atende'); ?><br/>
	<?php echo $cck->renderField('salva_at'); ?><br/>
	
	<br/><br/>

