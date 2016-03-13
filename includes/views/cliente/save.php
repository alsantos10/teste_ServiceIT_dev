<div class="row">
	<div class="col-md-12">
		<h1>Cadastrar Cliente</h1>
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
			<input type="hidden" required="required" name="id" value="<?=$cliente!=null&&$cliente->getId()?$cliente->getId():null?>" />
			
			<div class="form-group">
				<label for="nome">Nome:</label>
				<input class="form-control" type="text" required="required" name="nome" placeholder="Cliente" value="<?=$cliente!=null&&$cliente->getNome()?$cliente->getNome():null?>" />
			</div>
			<div class="form-group">
				<label for="email">E-mail:</label>
				<input class="form-control" type="email" required="required" name="email" placeholder="Email" value="<?=$cliente!=null&&$cliente->getEmail()?$cliente->getEmail():null?>" />
			</div>
			<div class="form-group">
				<label for="telefone">Telefone:</label>
				<input class="form-control" type="text" required="required" name="telefone" placeholder="Telefone" value="<?=$cliente!=null&&$cliente->getTelefone()?$cliente->getTelefone():null?>" />
			</div>
			<div class="form-group">
				<input class="btn btn-primary" type="submit" value="Gravar" />
				<a href="/Cliente" class="btn btn-default">Listar Clientes</a>
			</div>
		</form>
	</div>
</div>

