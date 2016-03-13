<div class="row">
	<div class="col-md-12">
		<h1>Pedidos</h1>
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
		<a href="/Pedido/save" class="btn btn-primary btn-md">Novo Pedido</a>
	</div>
</div>

<h2>Lista de Pedidos</h2>
<table class="table table-hover">
	<thead>
		<tr><th>Cliente</th>
		<th>Produto</th>
		<th>Data</th>
		</tr>
	</thead>
	
	<tbody>
	<?php foreach ($pedidos as $pedido):?>
		<tr><td><?=$pedido->getCliente()->getNome()?></td>
		<td><?=$pedido->getProduto()->getNome()?></td>
		<td><?=$pedido->getDataPedido()?></td>
		</tr>
	<?php endforeach; ?>
	</tbody>
	

</table>