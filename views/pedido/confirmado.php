<?php if(isset($_SESSION['pedido']) && $_SESSION['pedido'] == 'complete'): ?>

<h1>Tu pedido se ha confirmado</h1>
<p>Tu pedido ha sido guardado con exito, una vez que 
    hayas realizado la transferencia bancaria correspondiente por 
    el costo total del pedido, te lo enviaremos a la brevedad</p>
<br/><br/><br/>
<?php if(isset($pedido_confirmado)): 
   // showArray($pedido);?>
    <h3>Datos del Pedido:</h3>
    <br/>
    <pre>
        Numero de Cuenta: 9876543210 <br/>
        Numero del Pedido: <?=$pedido_confirmado->id?> <br/>
        ID del Usuario: <?=$pedido_confirmado->usuario_id?> <br/>
        Costo del Pedido: <?=$pedido_confirmado->costo?> <br/>
    </pre>
    
    <br/>
    <h3>Productos Seleccionados:</h3>
    
    <table>
        <tr>
            <th>Imagen</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Unidades</th>
        </tr>
        <?php 
        while($producto = $productos->fetch_object()): ?>
        <tr>
            <td>
                <?php if($producto->imagen != null): ?>
                    <img src="<?=base_url?>uploads/images/<?=$producto->imagen?>"  class="img_carrito" />
                <?php else : ?>
                    <img src="<?=base_url.'uploads/images/sin_imagen.png'?>" class="thumb" />
                <?php endif; ?>
            </td>
            <td><?=$producto->nombre?></td>
            <td><?=$producto->precio?></td>
            <td><?=$producto->unidades?></td>
            
        </tr>  
        
        <?php endwhile; ?>
    </table>
<?php endif; ?>
<?php elseif (isset($_SESSION['pedido']) && $_SESSION['pedido'] != 'complete'):  ?>
<h1>Tu pedido no ha podido procesarse</h1>
<?php endif; ?>
