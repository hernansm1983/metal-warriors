<?php if(isset($_SESSION['identity'])): ?>
    <h1>Hacer Pedidos</h1>
    <p>
        <a href="<?=base_url?>carrito/index">Ver Pedido</a>    
    </p>
    
    <br/>
    <h3>Direccion de Envio:</h3>
    <form action="<?=base_url?>pedido/add" method="POST">
        <label for="direccion">Direccion:</label>
        <input type="text" name="direccion" required />
        
        <label for="localidad">Localidad:</label>
        <input type="text" name="localidad" required />
    
        <label for="provincia">Provincia</label>
        <select name="provincia">
            <option disabled="true" selected="true" value="" required>Seleccionar una Provincia</option>
            <option value="BUENOS AIRES">BUENOS AIRES</option>
            <option value="CATAMARCA">CATAMARCA</option>
            <option value="CHACO">CHACO</option>
            <option value="CHUBUT">CHUBUT</option>
            <option value="CIUDAD AUTONOMA DE Bs As">CIUDAD AUTONOMA DE Bs As</option>
            <option value="CORDOBA">CORDOBA</option>
            <option value="CORRIENTES">CORRIENTES</option>
            <option value="ENTRE RIOS">ENTRE RIOS</option>
            <option value="FORMOSA">FORMOSA</option>
            <option value="JUJUY">JUJUY</option>
            <option value="LA PAMPA">LA PAMPA</option>
            <option value="LA RIOJA">LA RIOJA</option>
            <option value="MENDOZA">MENDOZA</option>
            <option value="MISIONES">MISIONES</option>
            <option value="NEUQUEN">NEUQUEN</option>
            <option value="RIO NEGRO">RIO NEGRO</option>
            <option value="SALTA">SALTA</option>
            <option value="SAN LUIS">SAN LUIS</option>
            <option value="SANTA CRUZ">SANTA CRUZ</option>
            <option value="SANTA FE">SANTA FE</option>
            <option value="SANTIAGO DEL ESTERO">SANTIAGO DEL ESTERO</option>
            <option value="TIERRA DEL FUEGO">TIERRA DEL FUEGO</option>
        </select>
    
    
    
    
    <input type="submit" class="button" value="Confirmar"/>
    
    </form>
<?php else : ?>
    <h1>Pagina Sin Acceso</h1>
    <p>Necesitas estar logueado para realizar pedidos.</p>
<?php endif; ?>
