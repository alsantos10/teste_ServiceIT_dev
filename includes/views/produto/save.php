<div class="row">
	<div class="col-md-12">
		<h1>Cadastrar Produto</h1>
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
			<input type="hidden" required="required" name="id" value="<?=$produto!=null&&$produto->getId()?$produto->getId():null?>" />
			<div class="form-group">
				<label for="nome">Nome:</label>
				<input class="form-control" type="text" required="required" name="nome" placeholder="Nome do Produto" value="<?=$produto!=null&&$produto->getNome()?$produto->getNome():null?>" /></p>
			</div>
			<div class="form-group">
				<label for="descricao">Descrição:</label>
				<input class="form-control" type="text" name="descricao" placeholder="Descrição" value="<?=$produto!=null&&$produto->getDescricao()?$produto->getDescricao():null?>" /></p>
			</div>
			<div class="form-group">
				<label for="preco">Preço:</label>
				<input class="form-control" type="text" name="preco" required="required" placeholder="Preço" value="<?=$produto!=null&&$produto->getPreco()?$produto->getPreco():null?>" /></p>
			</div>
			<div class="form-group">
				<input class="btn btn-primary" type="submit" value="Gravar" />
				<a href="/Produto" class="btn btn-default">Listar Produtos</a>
			</div>
		</form>
	</div>
</div>
