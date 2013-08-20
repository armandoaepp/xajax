<div id="divRegistrar_pais">
   <form id="frmRegistrar_pais" name="frmRegistrar_pais" class="hform" method="post" action="">
      <fieldset>
         <legend id="TituloForm"> Nuevo Pais</legend>
         <fieldset>
            <input type="hidden" name="accion" id="accion">         	
	         <label for="PaisId_">Cod. : </label>
	         <input type="text" name="PaisId_" id="PaisId_" readonly value=""/>
	     </fieldset>
         <fieldset>
	         <label for="PaisNombre_">Pais : </label>
	         <input type="text" name="PaisNombre_" id="PaisNombre_" value=""/>
	     </fieldset>
         <fieldset class="text-right">
         	<button type="submit"  id="btregistrar" onClick="Registrar()">Registrar </button>
            <button  type="button" id="btnCancelar" onclick="ocultar()">Cancelar </button>
         </fieldset>
      </fieldset>
   </form>
</div>