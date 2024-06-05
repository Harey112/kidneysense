<?php
include ("util_functions/session.php");
include ("util_functions/db.php");


if(!($_SESSION['type'] == 'admin')){
    header('Location: home.php');
}


$sql = "SELECT * FROM users WHERE id=".$_SESSION['id'];
$user = $conn->query($sql)->fetch_assoc();


$sql = "SELECT class, COUNT(*) AS count
        FROM patient_data
        GROUP BY class";

$num_class = $conn->query($sql);


$sql = "SELECT COUNT(*) AS total_patients FROM patient_data";

$total_data = $conn->query($sql);



$sql = "SELECT age, COUNT(*) AS frequency
        FROM patient_data
        GROUP BY age
        ORDER BY age";
$result = mysqli_query($conn, $sql);
$ages = array();

while ($row = mysqli_fetch_assoc($result)) {
    $ages[] = array('age' => $row['age'], 'frequency' => $row['frequency']);
}



$sql = "SELECT age, class, COUNT(*) AS frequency
            FROM patient_data
            GROUP BY age, class
            ORDER BY class, age";
    $result = mysqli_query($conn, $sql);

    $class0_data = array();
    $class1_data = array();

    while ($row = mysqli_fetch_assoc($result)) {
        if ($row['class'] == 0) {
            $class0_data[] = array('age' => $row['age'], 'frequency' => $row['frequency']);
        } else {
            $class1_data[] = array('age' => $row['age'], 'frequency' => $row['frequency']);
        }
    }

    mysqli_free_result($result);
    mysqli_close($conn);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="css/main_layout.css">
    <link rel="stylesheet" href="css/admin.css">
</head>
<body>
    <div class="container">
        <div class="side_bar">
            <div id="web_page_info">
                <img src="img/Chronic Kidney Disease Prediction System.png" style="width: 100%; height: 100%;">
            </div>
            <ul id="menus">
                <li class="menu selected_menu" onclick='window.location.href = "home.php";'>Home</li>
                <li class="menu" onclick='window.location.href = "usermanagement.php";'>User Management</li>
                <li class="menu" onclick='window.location.href = "ckd_records.php";'>Records</li>
            </ul>
            <div class="operations">
                <div class="operation" style="background-color: #ff8282;" onclick='window.location.href = "util_functions/logout.php";'>Logout</div>
            </div>
        </div>
        <div class="content_box">
            
            <div style="width: 100%;display: flex; justify-content: space-between; align-items: center; margin-top: 5px;">
                <h2 id="title">Home</h2>
                <div style="display: flex; justify-content: space-between; align-items: center; gap: 20px;  margin-right: 5px;">
                    <div style="display: flex; width: 30px; height: 30px; border-radius: 50px; border: 2px dashed gray; padding: 5px; justify-content: center; align-items: center;">
                        <img src="img/icons8-user-96.png" style="width: 95%; height: 95%; ">
                    </div>
                    <h4><?php echo $user['firstname'].' '.$user['lastname'];?></h4>
                </div>
            </div>

            <div style="width: 98%;height: 100px;margin: 20px 0 0 0;display: grid;grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 20px;">
                <div class="widget" style="width: 98%;height: 100px;">
                    <div style=" width: 300px; display: flex; align-items: center; justify-content: center;">
                        <h2><?php echo $total_data->fetch_assoc()["total_patients"]?></h2>
                        <p>-Entries</p>
                    </div>
                </div>
                <div style="width: 300px;" class="widget"><canvas id="pie_classification"></canvas></div>
                <div style="width: 300px;" class="widget"><canvas id="bar_ages"></canvas></div>
                <div style="width: 300px;" class="widget"><canvas id="line_class0_ages"></canvas></div>
                <div style="width: 300px;" class="widget"><canvas id="line_class1_ages"></canvas></div>
                
            </div>
            <div>

            </div>

        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const pie = document.getElementById('pie_classification');

new Chart(pie, {
  type: 'pie',
  data: {
    labels: ['Positive', 'Negative'],
    datasets: [{
      data: [<?php echo $num_class->fetch_assoc()['count']?>, <?php echo $num_class->fetch_assoc()['count']?>],
      borderWidth: 1,
      backgroundColor: ['rgba(255, 99, 132, 1)', 'green']
    }]
  },
  options: {
    maintainAspectRatio: false,
    scales: {
    }
  }
});

const bar_ages = document.getElementById('bar_ages');

    const agesAndFrequencies = <?php echo json_encode($ages); ?>;
    const ages = agesAndFrequencies.map(item => item.age);
    const frequencies = agesAndFrequencies.map(item => item.frequency);

    new Chart(bar_ages, {
      type: 'bar',
      data: {
        labels: ages,
        datasets: [{
            label: "Ages",
          data: frequencies,
          borderWidth: 1,
          backgroundColor: 'rgba(54, 162, 235, 0.2)',
          borderColor: 'rgba(54, 162, 235, 1)',
          hoverBackgroundColor: 'rgba(54, 162, 235, 0.4)',
          hoverBorderColor: 'rgba(54, 162, 235, 1)'
        }]
      },
      options: {
        maintainAspectRatio: false,
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: true
            }
          }]
        }
      }
    });



const line_graph0 = document.getElementById('line_class0_ages');
const line_graph1 = document.getElementById('line_class1_ages');
const class0_data = <?php echo json_encode($class0_data)?>;
const class1_data = <?php echo json_encode($class1_data)?>;


var x_ages0 = class0_data.map(entry => parseInt(entry.age));
var x_ages1 = class1_data.map(entry => parseInt(entry.age));
var x_freq0 = class0_data.map(entry => parseInt(entry.frequency));
var x_freq1 = class1_data.map(entry => parseInt(entry.frequency));


new Chart(line_graph0, {
      type: 'line',
      data: {
        labels: x_ages0,
        datasets: [{
          label: 'Has Chronic Kidney Disease By Age',
          data: x_freq0,
          borderColor: 'rgba(255, 99, 132, 1)', // Red color
          borderWidth: 2,
          fill: false
        }]
      },
      options: {
        maintainAspectRatio: false,
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: true
            }
          }]
        }
      }
    });
new Chart(line_graph1, {
      type: 'line',
      data: {
        labels: x_ages1,
        datasets: [{
          label: 'No Chronic Kidney Disease By Age',
          data: x_freq1,
          borderColor: 'green', // Red color
          borderWidth: 2,
          fill: false
        }]
      },
      options: {
        maintainAspectRatio: false,
        scales: {
      yAxes: [{
        ticks: {
          beginAtZero: true
        }
      }]
        }
      }
    });

</script>
</html>