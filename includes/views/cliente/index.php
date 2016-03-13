<div class="row">
	<div class="col-md-12">
		<h1>Clientes</h1>
	</div>
</div>
<hr />

<?php if (isset($this->msg[0][0])):?>
<div class="alert alert-<?=$this->msg[0][1]?> alert-dismissible" role="alert">
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	  <strong>Aviso!</strong> <?=$this->msg[0][0]?>
</div>
<?php endif;?>

<div class="row">
	<div class="col-md-12">
		<a href="/Cliente/save" class="btn btn-primary btn-md">Novo Cliente</a>
	</div>
</div>
<hr />

<h2>Lista de Clientes</h2>
<table class="table table-hover">
	<thead>
		<tr><th>Nome</th>
		<th>Email</th>
		<th>Telefone</th>
		<th></th>
		</tr>
	</thead>
	
	<tbody>
	<?php foreach ($clientes as $cliente):?>
		<tr><td><?=$cliente->getNome()?></td>
		<td><?=$cliente->getEmail()?></td>
		<td><?=$cliente->getTelefone()?></td>
		<td><a href="/Cliente/save/<?=$cliente->getId()?>" title="Editar"><span class="glyphicon glyphicon-edit"></span></a> <a href="/Cliente/excluir/<?=$cliente->getId()?>" title="Excluir"><span class="glyphicon glyphicon-minus-sign"></span></a></td>
		</tr>
	<?php endforeach; ?>
	</tbody>
</table>
