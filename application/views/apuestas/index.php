

        
            <?php foreach ($filas as $fila): ?>
              <div>
                <p><?= $fila['participante_casa'] . ' - ' . $fila['participante_visitante'] ?></p>
                <p><?= $fila['fecha_hora'] ?></p>
                <p></p>
              </div>
            <?php endforeach ?>
          
        