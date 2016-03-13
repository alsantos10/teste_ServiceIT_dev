<div class="row">
	<div class="col-md-12">
		<h1>Produtos</h1>
	</div>
</div>
<hr />


<?php if (isset($this->msg[0])):?>
<div class="alert alert-<?=$this->msg[1]?> alert-dismissible" role="alert">
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	  <strong>Aviso!</strong> <?=$this->msg[0]?>
</div>
<?php endif;?>

<div class="row">
	<div class="col-md-12">
		<a href="/Produto/save" class="btn btn-primary btn-md">Novo Produto</a>
	</div>
</div>
<hr />

<h2>Lista de Produtos</h2>
<table class="table table-hover">
	<thead>
		<tr><th>Nome</th>
		<th>Descrição</th>
		<th>Preço</th>
		<th></th>
		</tr>
	</thead>
	
	<tbody>
	<?php foreach ($produtos as $produto):?>
		<tr><td><?=$produto->getNome()?></td>
		<td><?=$produto->getDescricao()?></td>
		<td><?=$produto->getPreco()?></td>
		<td><a href="/Produto/save/<?=$produto->getId()?>" title="Editar"><span class="glyphicon glyphicon-edit"></span></a> <a href="/Produto/excluir/<?=$produto->getId()?>" title="Excluir"><span class="glyphicon glyphicon-minus-sign"></span></a></td>
		</tr>
	<?php endforeach; ?>
	</tbody>
</table>