<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tangramy";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Połączenie nieudane: " . $conn->connect_error);
}

$conn->set_charset("utf8");

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

$sql = "SELECT * FROM wzory WHERE id_wzoru = $id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    echo "Tangram nie znaleziony.";
    $conn->close();
    exit();
}

$prev_sql = "SELECT id_wzoru FROM wzory WHERE id_wzoru < $id ORDER BY id_wzoru DESC LIMIT 1";
$prev_result = $conn->query($prev_sql);
$prev_id = $prev_result->num_rows > 0 ? $prev_result->fetch_assoc()['id_wzoru'] : null;

$next_sql = "SELECT id_wzoru FROM wzory WHERE id_wzoru > $id ORDER BY id_wzoru ASC LIMIT 1";
$next_result = $conn->query($next_sql);
$next_id = $next_result->num_rows > 0 ? $next_result->fetch_assoc()['id_wzoru'] : null;

$conn->close();
?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tangram - <?php echo $row['nazwa']; ?></title>
    <script src="https://unpkg.com/konva@9.3.3/konva.min.js"></script>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script>
        function toggleDarkMode() {
            let body = document.body;
            body.classList.toggle('dark-mode');

            if (body.classList.contains('dark-mode')) {
                localStorage.setItem('darkModeEnabled', 'true');
            } else {
                localStorage.removeItem('darkModeEnabled');
            }
        }

        function setDarkModeFromLocalStorage() {
            let darkModeEnabled = localStorage.getItem('darkModeEnabled');
            if (darkModeEnabled === 'true') {
                document.body.classList.add('dark-mode');
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            setDarkModeFromLocalStorage();
        });
    </script>
</head>

<body>
    <a id="help-button">Włącz pomoc</a>
    <label class="switch" onclick="toggleDarkMode()"><h6>Motyw</h6>
        <span class="slider round"></span>
    </label>
    <a href="<?php echo $prev_id !== null ? "?id=$prev_id" : "#"; ?>" class="back-tangram-button"><i class="fas fa-arrow-left"></i> Poprzedni</a>
    <a href="menu_kategorie.php" class="menu-tangram-button">Menu</a>
    <a href="<?php echo $next_id !== null ? "?id=$next_id" : "#"; ?>" class="next-tangram-button">Następny <i class="fas fa-arrow-right"></i></a>
  <div id="container"></div>
  <script>
    var width = window.innerWidth-60;
    var height = window.innerHeight-60;

    var stage = new Konva.Stage({
      container: 'container',
      width: width,
      height: height,
    });

    var layer = new Konva.Layer();
    stage.add(layer);

    var tempLayer = new Konva.Layer();
    stage.add(tempLayer);

    var text = new Konva.Text({
      fill: 'black',
    });
    layer.add(text);

    var shapes = [];

    // maly1
    var points = [
      0, 0,
      140, 0,
      140, 140,
    ];
    var triangle1 = new Konva.Line({
      x: window.innerWidth - 600,
      y: 596,
      points: points,
      fill: 'yellow',
      closed: true,
      draggable: true,
      enableOutline: false
    });
    triangle1.rotation(315);
    layer.add(triangle1);
    shapes.push(triangle1);

    // maly2
    points = [
      0, 0,
      140, 0,
      140, 140,
    ];
    var triangle2 = new Konva.Line({
      x: window.innerWidth - 303,
      y: 497,
      points: points,
      fill: 'green',
      closed: true,
      draggable: true,
      enableOutline: false
    });
    triangle2.rotation(225);
    layer.add(triangle2);
    shapes.push(triangle2);


    // sredni
    points = [
      0, 0,
      0, 198,
      198, 198,
    ];
    var triangle5 = new Konva.Line({
      x: window.innerWidth - 402,
      y: 596,
      points: points,
      fill: 'aqua',
      closed: true,
      draggable: true,
      enableOutline: false
    });
    triangle5.rotation(270);
    layer.add(triangle5);
    shapes.push(triangle5);

    // duzy1
    points = [
      0, 0,
      280, 0,
      280, 280,
    ];
    var triangle3 = new Konva.Line({
      x: window.innerWidth - 600.2,
      y: 200,
      points: points,
      fill: 'blue',
      closed: true,
      draggable: true,
      enableOutline: false
    });
    triangle3.rotation(45);
    layer.add(triangle3);
    shapes.push(triangle3);

    // duzy2
    points = [
      280, 280,
      280, 0,
      0, 0,
    ];
    var triangle4 = new Konva.Line({
      x: window.innerWidth - 204,
      y: 200,
      points: points,
      fill: 'red',
      closed: true,
      draggable: true,
      enableOutline: false
    });
    triangle4.rotation(135);
    layer.add(triangle4);
    shapes.push(triangle4);

    // kwadrat
    points = [
      0, 0,
      140, 0,
      140, 140,
      0, 140,
    ];
    var square1 = new Konva.Line({
      x: window.innerWidth - 402,
      y: 398,
      points: points,
      fill: 'purple',
      closed: true,
      draggable: true,
      enableOutline: false
    });
    square1.rotation(45);
    layer.add(square1);
    shapes.push(square1);

    // romb
    points = [
      0, 160,
      0, 360,
      99, 260,
      99, 60,
    ];
    var square2 = new Konva.Line({
      x: window.innerWidth - 303,
      y: 138,
      points: points,
      fill: 'orange',
      closed: true,
      draggable: true,
      enableOutline: false
    });
    layer.add(square2);
    shapes.push(square2);

    document.addEventListener('contextmenu', function (event) {
      event.preventDefault();
    }, false);

    shapes.forEach(function (shape) {
      shape.on('mousedown', function (evt) {
        if (evt.evt.button === 2) {
          evt.evt.preventDefault();
          var clickedShape = evt.target;
          clickedShape.rotation(clickedShape.rotation() + 45);
          layer.batchDraw();
        }
      });
    });

    ///// NIERUCHOME
    // mały1
    var points = [
      0, 0,
      140, 0,
      140, 140,
    ];
    var triangle1s = new Konva.Line({
      x: <?php echo $row['t1_x']; ?>,
      y: <?php echo $row['t1_y']; ?>,
      points: points,
      fill: "#3D3D3B",
      closed: true,
      stroke: null,
      strokeWidth: 1,
      enableOutline: true
    });
    triangle1s.rotation(<?php echo $row['t1_rotate']; ?>);
    layer.add(triangle1s);
    shapes.push(triangle1s);

    // mały2
    points = [
      0, 0,
      140, 0,
      140, 140,
    ];
    var triangle2s = new Konva.Line({
      x: <?php echo $row['t2_x']; ?>,
      y: <?php echo $row['t2_y']; ?>,
      points: points,
      fill: "#3D3D3B",
      closed: true,
      stroke: null,
      strokeWidth: 1,
      enableOutline: true
    });
    triangle2s.rotation(<?php echo $row['t2_rotate']; ?>);
    layer.add(triangle2s);
    shapes.push(triangle2s);

    // średni
    points = [
      0, 0,
      0, 198,
      198, 198,
    ];
    var triangle5s = new Konva.Line({
      x: <?php echo $row['t3_aqua_x']; ?>,
      y: <?php echo $row['t3_aqua_y']; ?>,
      points: points,
      fill: "#3D3D3B",
      closed: true,
      stroke: null,
      strokeWidth: 1,
      enableOutline: true
    });
    triangle5s.rotation(<?php echo $row['t3_aqua_rotate']; ?>);
    layer.add(triangle5s);
    shapes.push(triangle5s);

    // duży1
    points = [
      0, 0,
      280, 0,
      280, 280,
    ];
    var triangle3s = new Konva.Line({
      x: <?php echo $row['t4_x']; ?>,
      y: <?php echo $row['t4_y']; ?>,
      points: points,
      fill: "#3D3D3B",
      closed: true,
      stroke: null,
      strokeWidth: 1,
      enableOutline: true
    });
    triangle3s.rotation(<?php echo $row['t4_rotate']; ?>);
    layer.add(triangle3s);
    shapes.push(triangle3s);

    // duży2
    points = [
      280, 280,
      280, 0,
      0, 0,
    ];
    var triangle4s = new Konva.Line({
      x: <?php echo $row['t5_x']; ?>,
      y: <?php echo $row['t5_y']; ?>,
      points: points,
      fill: "#3D3D3B",
      closed: true,
      stroke: null,
      strokeWidth: 1,
      enableOutline: true
    });
    triangle4s.rotation(<?php echo $row['t5_rotate']; ?>);
    layer.add(triangle4s);
    shapes.push(triangle4s);

    // kwadrat
    points = [
      0, 0,
      140, 0,
      140, 140,
      0, 140,
    ];
    var square11s = new Konva.Line({
      x: <?php echo $row['k_x']; ?>,
      y: <?php echo $row['k_y']; ?>,
      points: points,
      fill: "#3D3D3B",
      closed: true,
      stroke: null,
      strokeWidth: 1,
      enableOutline: true
    });
    square11s.rotation(<?php echo $row['k_rotate']; ?>);
    layer.add(square11s);
    shapes.push(square11s);
    ///
    points = [
      0, 0,
      140, 0,
      140, 140,
      0, 140,
    ];
    var square12s = new Konva.Line({
      x: <?php echo $row['k2_x']; ?>,
      y: <?php echo $row['k2_y']; ?>,
      points: points,
      fill: '#3D3D3B',
      closed: true,
      stroke: null,
      strokeWidth: 1,
      enableOutline: true
    });
    square12s.rotation(<?php echo $row['k2_rotate']; ?>);
    layer.add(square12s);
    shapes.push(square12s);
    ///
    points = [
      0, 0,
      140, 0,
      140, 140,
      0, 140,
    ];
    var square13s = new Konva.Line({
      x: <?php echo $row['k3_x']; ?>,
      y: <?php echo $row['k3_y']; ?>,
      points: points,
      fill: '#3D3D3B',
      closed: true,
      stroke: null,
      strokeWidth: 1,
      enableOutline: true
    });
    square13s.rotation(<?php echo $row['k3_rotate']; ?>);
    layer.add(square13s);
    shapes.push(square13s);
    ///
    points = [
      0, 0,
      140, 0,
      140, 140,
      0, 140,
    ];
    var square14s = new Konva.Line({
      x: <?php echo $row['k4_x']; ?>,
      y: <?php echo $row['k4_y']; ?>,
      points: points,
      fill: '#3D3D3B',
      closed: true,
      stroke: null,
      strokeWidth: 1,
      enableOutline: true
    });
    square14s.rotation(<?php echo $row['k4_rotate']; ?>);
    layer.add(square14s);
    shapes.push(square14s);

    // romb
    points = [
      0, 160,
      0, 360,
      99, 260,
      99, 60,
    ];
    var square21s = new Konva.Line({
      x: <?php echo $row['r_x']; ?>,
      y: <?php echo $row['r_y']; ?>,
      points: points,
      fill: "#3D3D3B",
      closed: true,
      stroke: null,
      strokeWidth: 1,
      enableOutline: true
    });
    square21s.rotation(<?php echo $row['r_rotate']; ?>);
    layer.add(square21s);
    shapes.push(square21s);
    ///
    points = [
      0, 160,
      0, 360,
      99, 260,
      99, 60,
    ];
    var square22s = new Konva.Line({
      x: <?php echo $row['r2_x']; ?>,
      y: <?php echo $row['r2_y']; ?>,
      points: points,
      fill: "#3D3D3B",
      closed: true,
      stroke: null,
      strokeWidth: 1,
      enableOutline: true
    });
    square22s.rotation(<?php echo $row['r2_rotate']; ?>);
    layer.add(square22s);
    shapes.push(square22s);

    var outlinesVisible = false;

    document.getElementById('help-button').addEventListener('click', function () {
      outlinesVisible = !outlinesVisible;

      shapes.forEach(function (shape) {
        if (shape.attrs.enableOutline) {
          shape.stroke(outlinesVisible ? 'white' : null);
        }
      });

      layer.draw();

      this.textContent = outlinesVisible ? 'Wyłącz pomoc' : 'Włącz pomoc';
    });

    stage.on('dragstart', function (e) {
      e.target.moveTo(tempLayer);
      layer.draw();
    });
    

    triangle1.on('dragmove', function () {
      var pos1s = triangle1s.position();
      var pos2s = triangle2s.position();
      var pos3 = triangle1.position();
      var distance1 = Math.sqrt(Math.pow(pos3.x - pos1s.x, 2) + Math.pow(pos3.y - pos1s.y, 2));
      var distance2 = Math.sqrt(Math.pow(pos3.x - pos2s.x, 2) + Math.pow(pos3.y - pos2s.y, 2));
      var rotation = triangle1.rotation() % 360;

      if (distance1 <= 100) {
        var angleDiff = Math.abs(triangle1s.rotation() - rotation);

        if (angleDiff > 180) {
          angleDiff = 360 - angleDiff;
        }

        if (angleDiff <= 10) {
          triangle1.position({
            x: pos1s.x,
            y: pos1s.y
          });
          triangle1.listening(false);
          triangle1.draggable(false);
          checkAllShapesLocked();
        }
      }
      else if (distance2 <= 100) {
        var angleDiff = Math.abs(triangle2s.rotation() - rotation);

        if (angleDiff > 180) {
          angleDiff = 360 - angleDiff;
        }

        if (angleDiff <= 10) {
          triangle1.position({
            x: pos2s.x,
            y: pos2s.y
          });
          triangle1.listening(false);
          triangle1.draggable(false);
          checkAllShapesLocked();
        }
      }
      layer.draw();
    });


    triangle2.on('dragmove', function () {
      var pos1s = triangle1s.position();
      var pos2s = triangle2s.position();
      var pos3 = triangle2.position();
      var distance1 = Math.sqrt(Math.pow(pos3.x - pos1s.x, 2) + Math.pow(pos3.y - pos1s.y, 2));
      var distance2 = Math.sqrt(Math.pow(pos3.x - pos2s.x, 2) + Math.pow(pos3.y - pos2s.y, 2));
      var rotation = triangle2.rotation() % 360;

      if (distance1 <= 100) {
        var angleDiff = Math.abs(triangle1s.rotation() - rotation);

        if (angleDiff > 180) {
          angleDiff = 360 - angleDiff;
        }

        if (angleDiff <= 10) {
          triangle2.position({
            x: pos1s.x,
            y: pos1s.y
          });
          triangle2.listening(false);
          triangle2.draggable(false);
          checkAllShapesLocked();
        }
      }
      else if (distance2 <= 100) {
        var angleDiff = Math.abs(triangle2s.rotation() - rotation);

        if (angleDiff > 180) {
          angleDiff = 360 - angleDiff;
        }

        if (angleDiff <= 10) {
          triangle2.position({
            x: pos2s.x,
            y: pos2s.y
          });
          triangle2.listening(false);
          triangle2.draggable(false);
          checkAllShapesLocked();
        }
      }
      layer.draw();
    });

    triangle3.on('dragmove', function () {
      var pos1s = triangle3s.position();
      var pos2s = triangle4s.position();
      var pos3 = triangle3.position();
      var distance1 = Math.sqrt(Math.pow(pos3.x - pos1s.x, 2) + Math.pow(pos3.y - pos1s.y, 2));
      var distance2 = Math.sqrt(Math.pow(pos3.x - pos2s.x, 2) + Math.pow(pos3.y - pos2s.y, 2));
      var rotation = triangle3.rotation() % 360;

      if (distance1 <= 100) {
        var angleDiff = Math.abs(triangle3s.rotation() - rotation);

        if (angleDiff > 180) {
          angleDiff = 360 - angleDiff;
        }

        if (angleDiff <= 10) {
          triangle3.position({
            x: pos1s.x,
            y: pos1s.y
          });
          triangle3.listening(false);
          triangle3.draggable(false);
          checkAllShapesLocked();
        }
      }
      else if (distance2 <= 100) {
        var angleDiff = Math.abs(triangle4s.rotation() - rotation);

        if (angleDiff > 180) {
          angleDiff = 360 - angleDiff;
        }

        if (angleDiff <= 10) {
          triangle3.position({
            x: pos2s.x,
            y: pos2s.y
          });
          triangle3.listening(false);
          triangle3.draggable(false);
          checkAllShapesLocked();
        }
      }
      layer.draw();
    });

    triangle4.on('dragmove', function () {
      var pos1s = triangle3s.position();
      var pos2s = triangle4s.position();
      var pos3 = triangle4.position();
      var distance1 = Math.sqrt(Math.pow(pos3.x - pos1s.x, 2) + Math.pow(pos3.y - pos1s.y, 2));
      var distance2 = Math.sqrt(Math.pow(pos3.x - pos2s.x, 2) + Math.pow(pos3.y - pos2s.y, 2));
      var rotation = triangle4.rotation() % 360;

      if (distance1 <= 100) {
        var angleDiff = Math.abs(triangle3s.rotation() - rotation);

        if (angleDiff > 180) {
          angleDiff = 360 - angleDiff;
        }

        if (angleDiff <= 10) {
          triangle4.position({
            x: pos1s.x,
            y: pos1s.y
          });
          triangle4.listening(false);
          triangle4.draggable(false);
          checkAllShapesLocked();
        }
      }
      else if (distance2 <= 100) {
        var angleDiff = Math.abs(triangle4s.rotation() - rotation);

        if (angleDiff > 180) {
          angleDiff = 360 - angleDiff;
        }

        if (angleDiff <= 10) {
          triangle4.position({
            x: pos2s.x,
            y: pos2s.y
          });
          triangle4.listening(false);
          triangle4.draggable(false);
          checkAllShapesLocked();
        }
      }
      layer.draw();
    });

    triangle5.on('dragmove', function () {
      var pos1s = triangle5s.position();
      var pos3 = triangle5.position();
      var distance1 = Math.sqrt(Math.pow(pos3.x - pos1s.x, 2) + Math.pow(pos3.y - pos1s.y, 2));
      var rotation = triangle5.rotation() % 360;

      if (distance1 <= 100) {
        var angleDiff = Math.abs(triangle5s.rotation() - rotation);

        if (angleDiff > 180) {
          angleDiff = 360 - angleDiff;
        }

        if (angleDiff <= 10) {
          triangle5.position({
            x: pos1s.x,
            y: pos1s.y
          });
          triangle5.listening(false);
          triangle5.draggable(false);
          checkAllShapesLocked();
        }
      }
      layer.draw();
    });

    square1.on('dragmove', function () {
      var pos11s = square11s.position();
      var pos12s = square12s.position();
      var pos13s = square13s.position();
      var pos14s = square14s.position();
      var pos2 = square1.position();
      var distance11 = Math.sqrt(Math.pow(pos2.x - pos11s.x, 2) + Math.pow(pos2.y - pos11s.y, 2));
      var distance12 = Math.sqrt(Math.pow(pos2.x - pos12s.x, 2) + Math.pow(pos2.y - pos12s.y, 2));
      var distance13 = Math.sqrt(Math.pow(pos2.x - pos13s.x, 2) + Math.pow(pos2.y - pos13s.y, 2));
      var distance14 = Math.sqrt(Math.pow(pos2.x - pos14s.x, 2) + Math.pow(pos2.y - pos14s.y, 2));
      var rotation = square1.rotation() % 360;

      if (distance11 <= 100) {
        var angleDiff = Math.abs(square11s.rotation() - rotation);

        if (angleDiff > 180) {
          angleDiff = 360 - angleDiff;
        }

        if (angleDiff <= 10) {
          square1.position({
            x: pos11s.x,
            y: pos11s.y
          });
          square1.listening(false);
          square1.draggable(false);
          checkAllShapesLocked();
        }
      }
      else if (distance12 <= 100) {
        var angleDiff = Math.abs(square12s.rotation() - rotation);

        if (angleDiff > 180) {
          angleDiff = 360 - angleDiff;
        }

        if (angleDiff <= 10) {
          square1.position({
            x: pos12s.x,
            y: pos12s.y
          });
          square1.listening(false);
          square1.draggable(false);
          checkAllShapesLocked();
        }
      }
      else if (distance13 <= 100) {
        var angleDiff = Math.abs(square13s.rotation() - rotation);

        if (angleDiff > 180) {
          angleDiff = 360 - angleDiff;
        }

        if (angleDiff <= 10) {
          square1.position({
            x: pos13s.x,
            y: pos13s.y
          });
          square1.listening(false);
          square1.draggable(false);
          checkAllShapesLocked();
        }
      }
      else if (distance14 <= 100) {
        var angleDiff = Math.abs(square14s.rotation() - rotation);

        if (angleDiff > 180) {
          angleDiff = 360 - angleDiff;
        }

        if (angleDiff <= 10) {
          square1.position({
            x: pos14s.x,
            y: pos14s.y
          });
          square1.listening(false);
          square1.draggable(false);
          checkAllShapesLocked();
        }
      }
      layer.draw();
    });


    square2.on('dragmove', function () {
      var pos11s = square21s.position();
      var pos12s = square22s.position();
      var pos2 = square2.position();
      var distance11 = Math.sqrt(Math.pow(pos2.x - pos11s.x, 2) + Math.pow(pos2.y - pos11s.y, 2));
      var distance12 = Math.sqrt(Math.pow(pos2.x - pos12s.x, 2) + Math.pow(pos2.y - pos12s.y, 2));
      var rotation = square2.rotation() % 360;

      if (distance11 <= 100) {
        var angleDiff = Math.abs(square21s.rotation() - rotation);

        if (angleDiff > 180) {
          angleDiff = 360 - angleDiff;
        }

        if (angleDiff <= 10) {
          square2.position({
            x: pos11s.x,
            y: pos11s.y
          });
          square2.listening(false);
          square2.draggable(false);
          checkAllShapesLocked();
        }
      }
      else if (distance12 <= 100) {
        var angleDiff = Math.abs(square22s.rotation() - rotation);

        if (angleDiff > 180) {
          angleDiff = 360 - angleDiff;
        }

        if (angleDiff <= 10) {
          square2.position({
            x: pos12s.x,
            y: pos12s.y
          });
          square2.listening(false);
          square2.draggable(false);
          checkAllShapesLocked();
        }
      }
      layer.draw();
    });

    function checkAllShapesLocked() {
      var allLocked = true;
      shapes.forEach(function (shape) {
        if (shape.draggable()) {
            allLocked = false;
        }
      });

      if (allLocked) {
        goToNextTangram();
      }
    }

    function goToNextTangram() {
      setTimeout(function () {
        window.location.href = "<?php echo $next_id !== null ? '?id=' . $next_id : '#'; ?>";
      }, 100);
    }


    var previousShape;
    stage.on('dragmove', function (evt) {
      var pos = stage.getPointerPosition();
      var shape = layer.getIntersection(pos);
      if (previousShape && shape) {
        if (previousShape !== shape) {
          previousShape.fire(
            'dragleave',
            {
              evt: evt.evt,
            },
            true
          );

          shape.fire(
            'dragenter',
            {
              evt: evt.evt,
            },
            true
          );
          previousShape = shape;
        } else {
          previousShape.fire(
            'dragover',
            {
              evt: evt.evt,
            },
            true
          );
        }
      } else if (!previousShape && shape) {
        previousShape = shape;
        shape.fire(
          'dragenter',
          {
            evt: evt.evt,
          },
          true
        );
      } else if (previousShape && !shape) {
        previousShape.fire(
          'dragleave',
          {
            evt: evt.evt,
          },
          true
        );
        previousShape = undefined;
      }
    });

    stage.on('dragend', function (e) {
      var pos = stage.getPointerPosition();
      var shape = layer.getIntersection(pos);
      if (shape) {
        previousShape.fire(
          'drop',
          {
            evt: e.evt,
          },
          true
        );
      }
      previousShape = undefined;
      e.target.moveTo(layer);
    });
    
  </script>
</body>
</html>