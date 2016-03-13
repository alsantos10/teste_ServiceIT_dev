<div class="row">
	<div class="col-md-12">
		<h1><?=$this->titleHead?></h1>
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
	<div class="col-md-4">
		<div class="panel panel-default">
		 	<div class="panel-heading">
			    <h3 class="text-center">Clientes</h3>
		  	</div>
		  	<div class="panel-body">
				 <a class="btn btn-primary btn-block" href="/Cliente"><span class="glyphicon glyphicon-list"></span> Lista de Clientes</a>
				 <a class="btn btn-default btn-block" href="/Cliente/save"><span class="glyphicon glyphicon-plus"></span> Inserir Cliente</a>	
			</div>
		</div>
	</div>
	
	<div class="col-md-4">
		<div class="panel panel-default">
			<div class="panel-heading">
		    	<h3 class="text-center">Produtos</h3>
		  	</div>
		  	<div class="panel-body">
			    <a class="btn btn-primary btn-block" href="/Produto"><span class="glyphicon glyphicon-list"></span> Lista de Produtos</a>
				<a class="btn btn-default btn-block" href="/Produto/save"><span class="glyphicon glyphicon-plus"></span> Inserir Produto</a>	
		  	</div>
		</div>
	</div>
	
	<div class="col-md-4">
		<div class="panel panel-default">
		  	<div class="panel-heading">
		  	  	<h3 class="text-center">Pedidos</h3>
		  	</div>
		  	<div class="panel-body">
			 	<a class="btn btn-primary btn-block" href="/Pedido"><span class="glyphicon glyphicon-list"></span> Lista de Pedidos</a>
			 	<a class="btn btn-default btn-block" href="/Pedido/save"><span class="glyphicon glyphicon-plus"></span> Inserir Pedido</a>	
			</div>
		</div>
	</div>
</div>

