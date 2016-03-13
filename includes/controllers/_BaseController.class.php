<?php
abstract class _BaseController
{
	protected $id;
	public $msg;
	protected $footer;
	protected $layout;
	protected $header;
	protected $titleHead;
	
	public function __construct($action=null, $data=null) {
		$this->id = $data;
		$this->msg = null;
		
		$this->footer = 'includes/views/main/footer.php';
		$this->header = 'includes/views/main/header.php';
		$this->layout = 'includes/views/main/layout.php';
		$this->titleHead = 'Teste Service IT - Desenvolvedor';
	
		if(isset($action) && method_exists( $this, $action)){
			$this->$action();
		}else{
			$this->index();
		}
	}
	
	protected function getScriptDatatable(){
		return '<script type="text/javascript">
		$(document).ready(function(){
			$(".table").DataTable({
				"oLanguage":{
				    "sEmptyTable": "Nenhum registro encontrado",
				    "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
				    "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
				    "sInfoFiltered": "(Filtrados de _MAX_ registros)",
				    "sInfoPostFix": "",
				    "sInfoThousands": ".",
				    "sLengthMenu": "_MENU_ resultados por página",
				    "sLoadingRecords": "Carregando...",
				    "sProcessing": "Processando...",
				    "sZeroRecords": "Nenhum registro encontrado",
				    "sSearch": "Pesquisar",
				    "oPaginate": {
				        "sNext": "Próximo",
				        "sPrevious": "Anterior",
				        "sFirst": "Primeiro",
				        "sLast": "Último"
				    },
				    "oAria": {
				        "sSortAscending": ": Ordenar colunas de forma ascendente",
				        "sSortDescending": ": Ordenar colunas de forma descendente"
				    }
				}
			});
		});
		</script>';
	}
}