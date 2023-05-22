<h1>Listado Completo de Categorias</h1>

<br/><br/><br/>
<table>
    
<?php while($cat = $categorias->fetch_object()): ?>
    <tr>
        
        <td>
            <br/>
            <a href="<?=base_url?>categoria/ver&id=<?=$cat->id?>" ><?=$cat->nombre?></a>
            <br/><br/>
        </td>
        
    </tr>
    
<?php endwhile; ?>
</table>