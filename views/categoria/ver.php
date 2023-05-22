<?php if(isset($categoria)): ?>

    <h1><?=$categoria->nombre?></h1>
    
    <?php if($productos->num_rows == 0) : ?>
    
        <div class="subtitulo">No Existen Productos en esta Categoria</div>
   
        
    <?php else : ?>
        
        <?php while($product = $productos->fetch_object()): ?>
        <div class="product">
            <a href="<?=base_url?>producto/ver&id=<?=$product->id?>">
                <?php if($product->imagen != null): ?>
                <img src="<?=base_url?>uploads/images/<?=$product->imagen?>" />
                <?php else : ?>
                    <img src="<?=base_url.'uploads/images/sin_imagen.png'?>" class="thumb" />
                <?php endif; ?>
                <h2><?=$product->nombre?></h2>
                <p><?=$product->precio?></p>
                <a href="<?=base_url?>producto/ver&id=<?=$product->id?>" class="button">Comprar</a>
            </a>
        </div>
        <?php endwhile; ?>
    <?php endif; ?>    
        
<?php else : ?>
    <div class="subtitulo">No Existen Productos en esta Categoria</div>
<?php endif; ?>
