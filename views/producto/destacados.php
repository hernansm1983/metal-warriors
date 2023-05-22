<!-------- INICIO DEL INDEX-CONTENT.PHP -------->
<h1>Algunos de Nuestros Productos</h1> 
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
    </a>
    <a href="<?=base_url?>carrito/add&id=<?=$product->id?>" class="button carrito">Comprar</a>
    
</div>
<?php endwhile; ?>
<!-------- FIN DEL INDEX-CONTENT.PHP -------->
