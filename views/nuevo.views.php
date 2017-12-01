<?php  require 'header.php'; ?>

<div class="contenedor">
<div class="post">

    <article>

        <h2 class="titulo"> nuevo articulo </h2>

        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype = "multipart/form-data" class="formulario" method="post">
        
            <input type="text" name="titulo" placeholder="Titulo del articulo">
            <input type="text" name="extracto" placeholder="Extracto del articulo">
            <textarea name="texto" placeholder="Texto del articulo"> </textarea>
            <input type="file" name="thumb">
            <input type="submit" value="Crear articulo">
        
        </form>

    </article> 

</div>
</div>

<?php  require 'footer.php'; ?>
