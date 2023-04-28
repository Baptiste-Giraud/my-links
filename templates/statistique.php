<?php 

include("../function.php")
?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Dashboard Statistique</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel="stylesheet" href="../assets/front/css/dashboard.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />


</head>
<body>
<!-- partial:index.partial.html -->
<div class="video-bg">
 <video width="320" height="240" autoplay loop muted>
  <source src="https://assets.codepen.io/3364143/7btrrd.mp4" type="video/mp4">
Your browser does not support the video tag.
</video>
</div>
<div class="dark-light">
    <svg viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round">
     <path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z" /></svg>
   </div>
<div class="app">
 <div class="header">
  <div class="header-menu">
   <a class="menu-link" href="dashboard">Page</a>
   <a class="menu-link is-active" href="statistique">Statistiques</a>
   <a class="menu-link" href="#">Publication</a>
   <a class="menu-link" href="#">Découvrir</a>
  </div>
  <div class="search-bar">
   <input type="text" placeholder="Recherche d'un utilisateur">
  </div>
  <div class="header-profile">
   <div class="notification">
    <span class="notification-number">3</span>
    <svg viewBox="0 0 24 24" fill="currentColor" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell">
     <path d="M18 8A6 6 0 006 8c0 7-3 9-3 9h18s-3-2-3-9M13.73 21a2 2 0 01-3.46 0" />
    </svg>
   </div>
   <svg viewBox="0 0 512 512" fill="currentColor">
    <path d="M448.773 235.551A135.893 135.893 0 00451 211c0-74.443-60.557-135-135-135-47.52 0-91.567 25.313-115.766 65.537-32.666-10.59-66.182-6.049-93.794 12.979-27.612 19.013-44.092 49.116-45.425 82.031C24.716 253.788 0 290.497 0 331c0 7.031 1.703 13.887 3.006 20.537l.015.015C12.719 400.492 56.034 436 106 436h300c57.891 0 106-47.109 106-105 0-40.942-25.053-77.798-63.227-95.449z" />
   </svg>
   <img class="profile-img" src="https://images.unsplash.com/photo-1600353068440-6361ef3a86e8?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1000&q=80" alt="">
  </div>
 </div>
 <div class="wrapper">
  <div class="left-side">
   <div class="side-wrapper">
    <div class="side-title">Apparences</div>
    <div class="side-menu">
     <a href="#">
      <svg viewBox="0 0 512 512">
       <g xmlns="http://www.w3.org/2000/svg" fill="currentColor">
        <path d="M0 0h128v128H0zm0 0M192 0h128v128H192zm0 0M384 0h128v128H384zm0 0M0 192h128v128H0zm0 0" data-original="#bfc9d1" />
       </g>
       <path xmlns="http://www.w3.org/2000/svg" d="M192 192h128v128H192zm0 0" fill="currentColor" data-original="#82b1ff" />
       <path xmlns="http://www.w3.org/2000/svg" d="M384 192h128v128H384zm0 0M0 384h128v128H0zm0 0M192 384h128v128H192zm0 0M384 384h128v128H384zm0 0" fill="currentColor" data-original="#bfc9d1" />
      </svg>
      All Apps
     </a>
     <a href="#">
      <svg viewBox="0 0 488.932 488.932" fill="currentColor">
       <path d="M243.158 61.361v-57.6c0-3.2 4-4.9 6.7-2.9l118.4 87c2 1.5 2 4.4 0 5.9l-118.4 87c-2.7 2-6.7.2-6.7-2.9v-57.5c-87.8 1.4-158.1 76-152.1 165.4 5.1 76.8 67.7 139.1 144.5 144 81.4 5.2 150.6-53 163-129.9 2.3-14.3 14.7-24.7 29.2-24.7 17.9 0 31.8 15.9 29 33.5-17.4 109.7-118.5 192-235.7 178.9-98-11-176.7-89.4-187.8-187.4-14.7-128.2 84.9-237.4 209.9-238.8z" />
      </svg>
      Updates
      <span class="notification-number updates">3</span>
     </a>
    </div>
   </div>
   <div class="side-wrapper">
    <div class="side-title">lien</div>
    <div class="side-menu">
     <a href="#">
      <svg viewBox="0 0 488.455 488.455" fill="currentColor">
       <path d="M287.396 216.317c23.845 23.845 23.845 62.505 0 86.35s-62.505 23.845-86.35 0-23.845-62.505 0-86.35 62.505-23.845 86.35 0" />
       <path d="M427.397 91.581H385.21l-30.544-61.059H133.76l-30.515 61.089-42.127.075C27.533 91.746.193 119.115.164 152.715L0 396.86c0 33.675 27.384 61.074 61.059 61.074h366.338c33.675 0 61.059-27.384 61.059-61.059V152.639c-.001-33.674-27.385-61.058-61.059-61.058zM244.22 381.61c-67.335 0-122.118-54.783-122.118-122.118s54.783-122.118 122.118-122.118 122.118 54.783 122.118 122.118S311.555 381.61 244.22 381.61z" />
      </svg>
      Photography
     </a>
     <a href="#">
      <svg viewBox="0 0 512 512" fill="currentColor">
       <circle cx="295.099" cy="327.254" r="110.96" transform="rotate(-45 295.062 327.332)" />
       <path d="M471.854 338.281V163.146H296.72v41.169a123.1 123.1 0 01121.339 122.939c0 3.717-.176 7.393-.5 11.027zM172.14 327.254a123.16 123.16 0 01100.59-120.915L195.082 73.786 40.146 338.281H172.64c-.325-3.634-.5-7.31-.5-11.027z" />
      </svg>
      Graphic Design
     </a>
     <a href="#">
      <svg viewBox="0 0 58 58" fill="currentColor">
       <path d="M57 6H1a1 1 0 00-1 1v44a1 1 0 001 1h56a1 1 0 001-1V7a1 1 0 00-1-1zM10 50H2v-9h8v9zm0-11H2v-9h8v9zm0-11H2v-9h8v9zm0-11H2V8h8v9zm26.537 12.844l-11 7a1.007 1.007 0 01-1.018.033A1.001 1.001 0 0124 36V22a1.001 1.001 0 011.538-.844l11 7a1.003 1.003 0 01-.001 1.688zM56 50h-8v-9h8v9zm0-11h-8v-9h8v9zm0-11h-8v-9h8v9zm0-11h-8V8h8v9z" />
      </svg>
      Video
     </a>
     <a href="#">
      <svg viewBox="0 0 512 512" fill="currentColor">
       <path d="M499.377 46.402c-8.014-8.006-18.662-12.485-29.985-12.613a41.13 41.13 0 00-.496-.003c-11.142 0-21.698 4.229-29.771 11.945L198.872 275.458c25.716 6.555 47.683 23.057 62.044 47.196a113.544 113.544 0 0110.453 23.179L500.06 106.661C507.759 98.604 512 88.031 512 76.89c0-11.507-4.478-22.33-12.623-30.488zM176.588 302.344a86.035 86.035 0 00-3.626-.076c-20.273 0-40.381 7.05-56.784 18.851-19.772 14.225-27.656 34.656-42.174 53.27C55.8 397.728 27.795 409.14 0 416.923c16.187 42.781 76.32 60.297 115.752 61.24 1.416.034 2.839.051 4.273.051 44.646 0 97.233-16.594 118.755-60.522 23.628-48.224-5.496-112.975-62.192-115.348z" />
      </svg>
      Illustrations
     </a>
     <a href="#">
      <svg viewBox="0 0 512 512" fill="currentColor">
       <path d="M497 151H316c-8.401 0-15 6.599-15 15v300c0 8.401 6.599 15 15 15h181c8.401 0 15-6.599 15-15V166c0-8.401-6.599-15-15-15zm-76 270h-30c-8.401 0-15-6.599-15-15s6.599-15 15-15h30c8.401 0 15 6.599 15 15s-6.599 15-15 15zm0-180h-30c-8.401 0-15-6.599-15-15s6.599-15 15-15h30c8.401 0 15 6.599 15 15s-6.599 15-15 15z" />
       <path d="M15 331h196v60h-75c-8.291 0-15 6.709-15 15s6.709 15 15 15h135v-30h-30v-60h30V166c0-24.814 20.186-45 45-45h135V46c0-8.284-6.716-15-15-15H15C6.716 31 0 37.716 0 46v270c0 8.284 6.716 15 15 15z" />
      </svg>
      UI/UX
     </a>
     <a href="#">
      <svg viewBox="0 0 512 512" fill="currentColor">
       <path d="M0 331v112.295a14.996 14.996 0 007.559 13.023L106 512V391L0 331zM136 391v121l105-60V331zM271 331v121l105 60V391zM406 391v121l98.441-55.682A14.995 14.995 0 00512 443.296V331l-106 60zM391 241l-115.754 57.876L391 365.026l116.754-66.15zM262.709 1.583a15.006 15.006 0 00-13.418 0L140.246 57.876 256 124.026l115.754-66.151L262.709 1.583zM136 90v124.955l105 52.5V150zM121 241L4.246 298.876 121 365.026l115.754-66.15zM271 150v117.455l105-52.5V90z" />
      </svg>
      3D/AR
     </a>
    </div>
   </div>
   <div class="side-wrapper">
    <div class="side-title">Paramètre</div>
    <div class="side-menu">
     <a href="#">
      <svg viewBox="0 0 332 332" fill="currentColor">
       <path d="M282.341 8.283C275.765 2.705 266.211 0 253.103 0c-18.951 0-36.359 5.634-51.756 16.743-14.972 10.794-29.274 28.637-42.482 53.028-4.358 7.993-7.428 11.041-8.973 12.179h-26.255c-10.84 0-19.626 8.786-19.626 19.626 0 8.989 6.077 16.486 14.323 18.809l-.05.165h.589c1.531.385 3.109.651 4.757.651h18.833l-32.688 128.001c-7.208 27.848-10.323 37.782-11.666 41.24-1.445 3.711-3.266 7.062-5.542 10.135-.42-5.39-2.637-10.143-6.508-13.854-4.264-4.079-10.109-6.136-17.364-6.136-8.227 0-15.08 2.433-20.37 7.229-5.416 4.93-8.283 11.193-8.283 18.134 0 5.157 1.701 12.712 9.828 19.348 6.139 4.97 14.845 7.382 26.621 7.382 17.096 0 32.541-4.568 45.891-13.577 13.112-8.845 24.612-22.489 34.166-40.522 9.391-17.678 18.696-45.124 28.427-83.9l18.598-73.479h30.016c10.841 0 19.625-8.785 19.625-19.625s-8.784-19.626-19.625-19.626h-19.628c6.34-21.62 14.175-37.948 23.443-48.578 2.284-2.695 5.246-5.692 8.412-7.678-1.543 3.392-2.325 6.767-2.325 10.055 0 6.164 2.409 11.714 6.909 16.03 4.484 4.336 10.167 6.54 16.888 6.54 7.085 0 13.373-2.667 18.17-7.716 4.76-5.005 7.185-11.633 7.185-19.703.017-9.079-3.554-16.899-10.302-22.618z" />
      </svg>
      Manage Fonts
     </a>
    </div>
   </div>
  </div>
  <div class="main-container">
  <div>
    <label for="start_date">Date de début :</label>
    <input type="date" id="start_date" name="start_date">
</div>
<div>
    <label for="end_date">Date de fin :</label>
    <input type="date" id="end_date" name="end_date">
</div>

<table id="topLinks" class="display">
    <thead>
        <tr>
            <th>URL</th>
            <th>Clics</th>
            <th>Date de début</th>
            <th>Date de fin</th>
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>

<div>
    <canvas id="dailyVisitsChart"></canvas>
  </div>

  <div>
    <canvas id="deviceVisitsChart"></canvas>
  </div>


  </div>
  </div>
 </div>
 <div class="overlay-app"></div>
</div>
<!-- partial -->

</body>
</html>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>


<script>
  //Rajouter ID utilisateur quand le systeme de connexion sera fait
 $(document).ready(function() {
    // Initialise la table DataTable
    var table = $('#topLinks').DataTable({
        columns: [
            { data: 'url' },
            { data: 'clicks' },
            { data: 'start_date' },
            { data: 'end_date' }
        ],
        order: [[1, 'desc']] // Tri par ordre décroissant du nombre de clics
    });

    // Effectue une requête AJAX pour récupérer les données de la base de données
    function getClickData() {
        var startDate = $('#start_date').val();
        var endDate = $('#end_date').val();
        var defaults = false;

        // Vérifie si les dates sont renseignées ou non
        if (startDate == '' || endDate == '') {
            defaults = false;
            startDate = '1970-01-01'; // date de début par défaut
            endDate = new Date().toISOString().slice(0, 10); // date de fin par défaut (aujourd'hui)
        }else{
          defaults = true;
        }

        $.ajax({
            url: "../function.php",
            type: "POST",
            dataType: "json",
            data: {
              getClick: 7,
              start_date: startDate,
              end_date: endDate
            },
            success: function(data) {
                // Supprime les anciennes données de la table DataTable
                table.clear();
              console.log(defaults)
                $.each(data, function(index, row) {
                  if(defaults == true){
                    if ((row.start_date != 'Aucun click' && row.end_date != 'Aucun click') || (startDate == '' && endDate == '')) {
                        table.row.add(row).draw();
                    }

                  }else{
                      table.row.add(row).draw();
                  }
                });
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error(textStatus, errorThrown);
            }
        });
    }

    // Appelle la fonction getClickData() lors du chargement de la page
    getClickData();

    // Lie la fonction getClickData() aux événements "change" des champs de dates
    $('#start_date, #end_date').on('change', function() {
        getClickData();
    });
});


$(document).ready(function() {
  // Fonction pour récupérer les données du graphique
  function getChartData(start_date, end_date, callback) {
    $.ajax({
      url: "../function.php",
      type: "POST",
      data: { getChart: 7, start_date: start_date, end_date: end_date, },
      dataType: "json",
      success: function (data) {
        var chartData = {};

        // Données pour le graphique des visites quotidiennes
        chartData.daily_visits = {};
        chartData.dates = data.dates;
        for (var i = 0; i < data.devices.length; i++) {
          var device = data.devices[i];
          chartData.daily_visits[device] = [];

          // Ajouter les données de visites pour chaque jour
          // Ajouter les données de visites pour chaque jour
          for (var j = 0; j < data.dates.length; j++) {
            var date = data.dates[j];
            if (device in data.daily_visits && date in data.daily_visits[device]) {
              chartData.daily_visits[device].push(data.daily_visits[device][date]);
            } else {
              var previousValue = (j > 0) ? chartData.daily_visits[device][chartData.daily_visits[device].length-1] : 0;
              chartData.daily_visits[device].push(previousValue);
            }
          }

        }

        // Données pour le graphique des visites par type de dispositif
        chartData.device_visits = {};
        chartData.devices = data.devices;
        for (var i = 0; i < data.devices.length; i++) {
          var device = data.devices[i];
          chartData.device_visits[device] = data.device_visits[device];
        }

        // Appeler le callback avec les données du graphique
        callback(chartData);
      }
    });
  }

  // Graphique des visites quotidiennes
  var dailyVisitsChart = new Chart($("#dailyVisitsChart"), {
    type: "line",
    data: {
      labels: [],
      datasets: []
    },
    options: {
      scales: {
        yAxes: [{
          ticks: {
            beginAtZero: true
          }
        }]
      }
    }
  });

  // Graphique des visites par type de dispositif
  var deviceVisitsChart = new Chart($("#deviceVisitsChart"), {
    type: "pie",
    data: {
      labels: [],
      datasets: [{
        label: "Visites",
        data: [],
        backgroundColor: [
          "rgba(255, 99, 132, 0.2)",
          "rgba(54, 162, 235, 0.2)"
        ],
        borderColor: [
          "rgba(255, 99, 132, 1)",
          "rgba(54, 162, 235, 1)"
        ],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        yAxes: [{
          ticks: {
            beginAtZero: true
          }
        }]
      }
    }
  });

  // Fonction pour mettre à jour les graphiques en fonction des dates sélectionnées
  function updateCharts() {
    var start_date = $("#start_date").val();
    var end_date = $("#end_date").val();

    getChartData(start_date, end_date, function(data) {
      // Mettre à jour les labels et les données des graphiques

      // Graphique des visites quotidiennes
      dailyVisitsChart.data.labels = data.dates;
      dailyVisitsChart.data.datasets = [];

        // Réinitialiser les datasets pour éviter les duplications
  for (var device in data.daily_visits) {
    var dataset = {
      label: device,
      data: data.daily_visits[device],
      backgroundColor: (device == 'desktop') ? "rgba(54, 162, 235, 0.2)" : "rgba(255, 99, 132, 0.2)",
      borderColor: (device == 'desktop') ? "rgba(54, 162, 235, 1)" : "rgba(255, 99, 132, 1)",
      borderWidth: 1,
      fill: false
    };
    dailyVisitsChart.data.datasets.push(dataset);
  }
  dailyVisitsChart.update();

  // Graphique des visites par type de dispositif
  deviceVisitsChart.data.labels = data.devices;
  deviceVisitsChart.data.datasets[0].data = [];
  for (var i = 0; i < data.devices.length; i++) {
    var device = data.devices[i];
    deviceVisitsChart.data.datasets[0].data.push(data.device_visits[device]);
  }
  deviceVisitsChart.update();
});
}

// Initialiser les graphiques
updateCharts();

// Mettre à jour les graphiques lorsque les dates sont modifiées
$("#start_date, #end_date").change(function() {
updateCharts();
});
});





</script>


<style>
  #topLinks_wrapper {
  background: rgba(255, 255, 255, 0.3);
  box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
  backdrop-filter: blur(10px);
  -webkit-backdrop-filter: blur(10px);
  border-radius: 10px;
  border: 1px solid rgba(255, 255, 255, 0.18);
  padding: 20px;
}

#topLinks th {
  font-weight: bold;
  color: #fff;
  background-color: #2c3e50;
  padding: 12px;
  text-align: center;
}

#topLinks td {
  color: #000;
  padding: 8px;
  text-align: center;
}

#topLinks tbody tr:nth-child(even) {
  background-color: #f2f2f2;
}

#topLinks_filter label input[type="search"] {
  background-color: transparent;
  border: none;
  color: #fff;
  font-size: 14px;
  padding: 8px;
  border-bottom: 1px solid #fff;
  margin-right: 8px;
  background-color: white;
}

#topLinks_filter label input[type="search"]::placeholder {
  color: #fff;
  opacity: 0.5;
}

table.dataTable.no-footer{
  padding-top: 12px;
}
</style>