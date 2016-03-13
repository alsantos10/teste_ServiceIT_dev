<!DOCTYPE html>
<html lang="pt-BR">

	<?php include($this->header);?>
	
	<body>
		<nav class="navbar navbar-inverse navbar-fixed-top">
	      <div class="container">
	        <div class="navbar-header">
	          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
	            <span class="sr-only">Toggle navigation</span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	          </button>
	          <a class="navbar-brand" href="/"><?=$this->titleHead?></a>
	        </div>
	        <div id="navbar" class="navbar-collapse collapse">
	          <ul class="nav navbar-nav navbar-right">
		        <li><a href="/Cliente">Clientes</a></li>
		        <li><a href="/Produto">Produtos</a></li>
		        <li><a href="/Pedido">Pedidos</a></li>
		        <li role="separator" class="divider"></li>
		        <li class="dropdown">
		          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Cadastrar <span class="caret"></span></a>
		          <ul class="dropdown-menu">
		            <li><a href="/Cliente/save">Adicionar Cliente</a></li>
		            <li><a href="/Produto/save">Adicionar Produto</a></li>
		            <li><a href="/Pedido/save">Adicionar Pedido</a></li>
		          </ul>
		        </li>
		      </ul>
	          
	        </div><!--/.navbar-collapse -->
	      </div>
	    </nav>
	    <div class="main">		    
		    <div class="container">
    		    <?php include($content)?>
		    </div>
	    </div>
	    
	    <div class="container">
     	<?php include($this->footer)?>	
		</div>
	
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	    <script type="text/javascript" src="/assets/js/bootstrap.js" ></script>
	    <script type="text/javascript" src="/assets/js/jquery.dataTables.min.js" ></script>	    
	    <?php if(isset($scripts)&&$scripts!=null)echo $scripts;?>
	    
	</body>
	
</html>
