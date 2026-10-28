<?php
// ... (comentario inicial)

// evita repetir codigo y controla errores de conexion a la BD
function conectar_bd(){
    $conexion = 'mysql:dbname=pedidos;host=127.0.0.1;charset=utf8';
    try {
        $bd = new PDO($conexion, 'root', '');
        $bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $bd;
    } catch (PDOException $e) {
        echo "<br>Error de conexión: " . $e->getMessage();
        return false;
    }
}

// comprueba que el usuario está registrado
function comprobar_usuario($usuarioP, $claveP){
    $bd = conectar_bd(); // CAMBIAR AQUÍ
    try {
        $consulta = "SELECT Correo, CodRes FROM restaurantes "
                . "WHERE Correo = '$usuarioP' "
                . "AND Clave = '$claveP'";
        $resul = $bd->query($consulta);
        if ($resul->rowCount() > 0) {
            $resul = $resul->fetch();
            return $resul;
        } else {
            return false; 
        }
    } catch (PDOException $e) {
        echo "<br>Error: " . $e->getMessage();
        return false;
    }
}

// cargar todas las categorias de productos
function cargar_categorias(){
    try{
        $bd = conectar_bd(); // CAMBIAR AQUÍ
        $consulta = "select CodCat, Descripcion from categorias";
        $usuarios = $bd->query($consulta);
        if(!$usuarios){return false;}
        if ($usuarios->rowCount() === 0){return false;}
        return $usuarios->fetchAll();
    }catch (PDOException $e){
        echo "error: " .$e->getMessage();
    }
}

// datos de la categoría elegida
function cargar_categoria($categor){
    try{
        $bd = conectar_bd(); // CAMBIAR AQUÍ
        $consulta = "select Nombre, Descripcion from categorias "
                .   "where CodCat = $categor ";
        $usuarios = $bd->query($consulta);
        if(!$usuarios){return false;}
        if ($usuarios->rowCount() === 0){return false;}
        $usuarios = $usuarios->fetch();
        return $usuarios;
    }catch (PDOException $e){
        echo "error: " .$e->getMessage();
    }
}

// cargar productos de la categoria elegida
function cargar_productos_categoria($categor){
    try{
        $bd = conectar_bd(); // CAMBIAR AQUÍ
        $consulta = "select CodProd, Nombre, Descripcion, "
                .   "Peso, Stock from productos "
                .   "where Categoria = $categor ";
        $usuarios = $bd->query($consulta);
        if(!$usuarios){return false;}
        if ($usuarios->rowCount() === 0){return false;}
        $usuarios = $usuarios->fetchAll(PDO::FETCH_ASSOC);
        return $usuarios;
    }catch (PDOException $e){
        echo "error: " .$e->getMessage();
    }
}

// cargar los productos del carrito
function cargar_productos($product){
    if(empty($product)){
        return false;
    }
    try{
        $bd = conectar_bd(); // CAMBIAR AQUÍ
        $interrogantes = implode(',', $product);
        $consulta = "select CodProd, Nombre, Descripcion, "
                .   "Peso from productos "
                .   "where CodProd in ($interrogantes)";
        $usuarios = $bd->query($consulta);
        if(!$usuarios){return false;}
        if ($usuarios->rowCount() === 0){return false;}
        $usuarios = $usuarios->fetchAll(PDO::FETCH_ASSOC);
        return $usuarios;
    }catch (PDOException $e){
        echo "error: " .$e->getMessage();
    }
}

// metes tu pedido en la tabla pedidosproductos
function insertar_pedido($carrito, $codUsu){
    try{
        $bd = conectar_bd(); // CAMBIAR AQUÍ
        $consulta = "insert into pedidos (Fecha, Enviado, Restaurante) "
                .   "values (now(), 0, $codUsu ) ";
        $bd->query($consulta);
        $idPedido = $bd->lastInsertId();
        foreach($carrito as $producto => $unidades){
            $consulta = "insert into pedidosproductos (Pedido, Producto, Unidades) "
                    .   "values ($idPedido, $producto, $unidades)";
            $bd->query($consulta);
        }
        return true;
    }catch (PDOException $e){
        echo "error: " .$e->getMessage();
        return false;
    }
}

// muestras los pedidos actuales que encargaste
function mostrar_pedidos($usuario){
    try{
        $bd = conectar_bd(); // CAMBIAR AQUÍ
        $consulta = "select pe.Fecha, pe.CodPed, pr.Nombre as Producto, "
                .   "ca.Nombre as Categoria from pedidos pe "
                .   "join pedidosproductos pepo on pe.CodPed = pepo.Pedido "
                .   "join productos pr on pepo.Producto = pr.CodProd "
                .   "join categorias ca on pr.Categoria = ca.CodCat "
                .   "where pe.Restaurante = $usuario "
                .   "and year(pe.Fecha) = 2026 "
                .   "order by pe.CodPed asc";
        $usuarios = $bd->query($consulta);
        if(!$usuarios){return false;}
        if ($usuarios->rowCount() === 0){return false;}
        $usuarios = $usuarios->fetchAll(PDO::FETCH_ASSOC);
        return $usuarios;
    }catch (PDOException $e){
        echo "error: " .$e->getMessage();
    }
}