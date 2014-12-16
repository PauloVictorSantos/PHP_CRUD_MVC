<div class="form">
<div class="container">
	<form action="" method="post" id="id_ajax">
		<fieldset>
			<legend>Editar Usuário</legend>
			<div class="control-group">
				<label>Nome:</label>
				<input type="text"  name="nome" value="<?php echo $usuarios->nome; ?>" class="input-block-level"/>
			</div>
			<div class="control-group">
				<label>Email:</label>
				<input type="text" name="email" value="<?php echo $usuarios->email; ?>" class="input-block-level"/>
			</div>
			<div class="control-group">
				<label>Senha:</label>
				<input type="password" name="senha" value="<?php echo $usuarios->senha; ?>" class="input-block-level"/>
			</div>
			<div class="control-group">
				<label>Data de nascimento:</label>
				<input type="text" id="data" name="data" value="<?php echo $usuarios->data; ?>" class="input-block-level"/>
			</div>
			<input type="submit" name="submit" value="Enviar" class="btn btn-large btn-primary"/>
		</fieldset>	
	</form>
	</div>
</div>
	