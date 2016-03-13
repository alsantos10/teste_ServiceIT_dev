<div class="row">
	<div class="col-md-12">
		<h1>Excluir Produto</h1>
	</div>
</div>
<hr />

<?php if (isset($this->msg[0])):?>
<div class="alert alert-<?=$this->msg[1]?> alert-dismissible" role="alert">
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	  <strong>Aviso!</strong> <?=$this->msg[0]?>
</div>
<?php endif;?>


<a href="/Produto" class="btn btn-primary">Listar Produtos</a>