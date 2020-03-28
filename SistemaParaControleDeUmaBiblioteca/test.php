<div style="width:360px;">
<?php
$escolha=$_REQUEST['fo'];
if($escolha=='0') echo "<form action=\"lista_usuario.php\" method=\"post\">";
else echo "<form action=\"busca_date.php\" method=\"post\">";
?>
<fieldset>
<table border="0" cellpadding="0" cellspacing="0" vspace="0" hspace="0" width="360px">
      <legend>Informe o intervalo de Tempo</legend>
	<tr>		
		<td><label>De
		<input name="data_1" type="text" size="15" maxlength="12"/></label></td>
		<td><label>Até<input name="data_2"<style="background:$000000;" type="text" size="15" maxlength="12"/></label></td>
		</tr>
	<tr>
		<td><label>
		<input name="enviar_datas" type="submit" value="Enviar"/></label></td>
		<td colspan="2"><label>
		<input name="enviar_datass" type="reset" value="Limpar"/></label></td>
		</tr>
</table></div>
		</fieldset>
</form>