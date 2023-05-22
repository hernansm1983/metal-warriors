function confirmarBorradoProducto(ruta) {
  if(confirm("Desea Eliminar el Articulo?")){
    window.location.href = ruta; 
  }
}

function confirmarBorradoImagen(id, img) {
  if(confirm("Desea Eliminar la Imagen?")){
    window.location.href = id;  
  }
}

function confirmarBorradoCarrito(ruta) {
  if(confirm("Desea Vaciar el Carrito?")){
    window.location.href = ruta;  
  }
}

function confirmarBorradoProductoCarrito(ruta) {
  if(confirm("Desea Eliminar el producto del Carrito?")){
    window.location.href = ruta;
  }
}

function confirmarBorradoCategoria(ruta) {
  if(confirm("Desea Eliminar la Categoria?")){
    window.location.href = ruta;
  }
}