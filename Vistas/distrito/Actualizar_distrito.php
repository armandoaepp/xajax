<div id="divActualizar_distrito">
<form id="frmActualizar_distrito" name="frmRegistrar_distrito" class="hform" method="post" action="<?php echo $accionf;?>">
<fieldset> <legend> Actualizar Distrito</legend>
<fieldset><label for="DistritoId_">DistritoId : </label><input type="text" name="DistritoId_" id="DistritoId_" value="<?php echo $DistritoId;?>"/></fieldset>
<fieldset><label for="DistritoNombre_">DistritoNombre : </label><input type="text" name="DistritoNombre_" id="DistritoNombre_" value="<?php echo $DistritoNombre;?>"/></fieldset>
<fieldset><label for="ProvinciaId_">ProvinciaId : </label><input type="text" name="ProvinciaId_" id="ProvinciaId_" value="<?php echo $ProvinciaId;?>"/></fieldset>
<fieldset><label for="UbigeoDist_">UbigeoDist : </label><input type="text" name="UbigeoDist_" id="UbigeoDist_" value="<?php echo $UbigeoDist;?>"/></fieldset>
<fieldset class="text-right"><button type="submit"  id="btregistrar">Registrar </button><button  type="button" id="btnCancelar" onclick="location.href='index.php?accion=Listar';">Cancelar </button></fieldset>
</fieldset>
</form>
</div>