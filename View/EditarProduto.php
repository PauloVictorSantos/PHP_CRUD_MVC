
	<body>
		<div class="form">
		<div class="container">
			<form action="" method="post" id="id_ajax">
				<fieldset>
					<legend>Editar Produto</legend>
					<div class="control-group">
						<label>Nome:</label>
						<input type="text"  name="nome" class="input-block-level" value="<?php echo $produtos->nome; ?>"/>
					</div>
					<div class="control-group">
						<label>Quantidade</label>
						<input type="text" name="quantidade" class="input-block-level" value="<?php echo $produtos->qtd ; ?>"/>
					</div>
					<div class="control-group">
						<label>Valor</label>
						<input type="text" name="valor" class="input-block-level" value="<?php echo $produtos->valor; ?>"/>
					</div>
					<input type="submit" name="submit" value="Enviar" class="btn btn-large btn-primary"/>
				</fieldset>	
			</form>
			</div>
			</div>