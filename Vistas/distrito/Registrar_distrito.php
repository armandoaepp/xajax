<div id="divRegistrar_distrito">
<form id="frmRegistrar_distrito" name="frmRegistrar_distrito" class="hform" method="post" action="<?php echo $accionf;?>">
<fieldset> <legend> Nuevo Distrito</legend>
<fieldset><label for="DistritoId_">DistritoId : </label><input type="text" name="DistritoId_" id="DistritoId_" value=""/></fieldset>
<fieldset><label for="DistritoNombre_">DistritoNombre : </label><input type="text" name="DistritoNombre_" id="DistritoNombre_" value=""/></fieldset>
<fieldset><label for="ProvinciaId_">ProvinciaId : </label><input type="text" name="ProvinciaId_" id="ProvinciaId_" value=""/></fieldset>
<fieldset><label for="UbigeoDist_">UbigeoDist : </label><input type="text" name="UbigeoDist_" id="UbigeoDist_" value=""/></fieldset>
<fieldset class="text-right"><button type="submit"  id="btregistrar">Registrar </button><button  type="button" id="btnCancelar" onclick="location.href='index.php?accion=Listar';">Cancelar </button></fieldset>
</fieldset>
</form>
</div>