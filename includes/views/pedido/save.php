<div class="row">
	<div class="col-md-12">
		<h1>Cadastrar Pedido</h1>
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
		<form method="post">
			<div class="form-group">
			    <label for="id_cliente">Cliente:</label>
			    <?php if(!empty($listClientes)):?>	
				<select name="id_cliente" required="required" class="form-control">
					<option value="">-- Selecione o Cliente --</option>
					<?php foreach ($listClientes as $cliente):?>
					<option value="<?=$cliente['id']?>"><?=$cliente['nome']?></option>
					<?php endforeach;?>
				</select>
				<?php else: ?>
					<div class="alert alert-danger">
						<span class="glyphicon glyphicon-alert"></span> Nenhum cliente encontrado:<a class="btn btn-link" href="/Cliente/save">Cadastrar cliente</a>					
					</div>
				<?php endif; ?>			    
		  	</div>
		  	
			<div class="form-group">
			    <label for="id_produto">Produto:</label>
			    <?php if(!empty($listClientes)):?>	
				<select name="id_produto" required="required" class="form-control">
					<option value="">-- Selecione o Produto --</option>
					<?php foreach ($listProdutos as $produto):?>
					<option value="<?=$produto['id']?>"><?=$produto['nome']?></option>
					<?php endforeach;?>
				</select>
				<?php else: ?>
					<div class="alert alert-danger">
						<span class="glyphicon glyphicon-alert"></span> Nenhum produto encontrado:<a class="btn btn-link" href="/Produto/save">Cadastrar produto</a>					
					</div>
				<?php endif; ?>			    
		  	</div>
		  	
		  	<div class="form-group">
		  		<input type="submit" class="btn btn-default btn-primary" value="Gravar" />
		  		<a href="/Pedido" class="btn btn-default">Listar Pedidos</a>
		  	</div>
			
		</form>
	</div>
</div>


