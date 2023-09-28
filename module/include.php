<!-- daterange picker -->
<link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- Select2 -->
<link rel="stylesheet" href="plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<!-- SweetAlert2 -->
<link rel="stylesheet" href="plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
<link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">

<!-- Google Chart -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<!-- HTML2 Canvas -->
<script src="plugins/html2canvas/html2canvas.js"></script>
<script src="plugins/html2canvas/html2canvas.min.js"></script>
<script src="plugins/autoNumeric/autoNumeric.js"></script>

<!-- InputMask -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- date-range-picker -->
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="plugins/select2/js/select2.full.min.js"></script>
<!-- SweetAlert2 -->
<script src="plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- DataTables -->
<link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

<!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@700;800&display=swap" rel="stylesheet">

<link rel="stylesheet" href="dist\fontface\Digital-7\stylesheet.css">

<style type="text/css">
.a.disabled {
    pointer-events: none;
    cursor: default;
}

.align-middle {
    display: flex;
    align-items: stretch;
    height: 100%;
    justify-content: center;
    flex-direction: column;
}

.btn-export {
    width: auto;
}

.btn-saveChart {
    cursor: pointer;
}

.btn-sm {
    padding: 0.10rem 0.40rem 0.20rem 0.40rem;
    margin: 0.0rem 0.0rem;
}

.center {
    justify-content: center;
    align-items: center;
    display: flex;
}

.center-text {
    justify-content: center;
    align-items: center;
    display: flex;
    text-align: center;
}

.right-text {
    margin-left: auto;
    align-items: center;
    display: flex;
    text-align: right;
}

.left-text {
    justify-content: flex-start;
    align-items: center;
    display: flex;
    text-align: left;
}

.centered-cell {
    text-align: center;
}

.checkbox-menu {
    /*left:-70px;*/
}

.checkbox1-menu li label {
    display: block;
    padding: 3px 10px;
    clear: both;
    color: #333;
    white-space: nowrap;
    margin: 0;
    transition: border-color 0.4s ease;
    cursor: pointer;
}
.checkbox-menu li label {
      display: block;
      padding: 3px 10px;
      clear: both;
      color: #333;
      white-space: nowrap;
      margin: 0;
      transition: border-color 0.4s ease;
      cursor: pointer;
  }

  .checkbox-menu li input {
      margin: 0px 5px;
      top: 2px;
      position: relative;
      cursor: pointer;
  }

  .checkbox-menu li.active label {
      background-color: #f5f5f5;
  }

  .checkbox-menu li label:hover,
  .checkbox-menu li label:focus {
      border-color: #007bff;
  }

  .checkbox-menu li.active label:hover,
  .checkbox-menu li.active label:focus {
      background-color: #f5f5f5;
  }

.dropdown-menu {
    /*left:-70px;*/
}

.dropdown-menu a.dropdown-item {
    font-size: 0.85rem;
    /* 40px/16=2.5em */
}

.ChartSize {
    height: 180px;
    width: 100%;
    display: flex;
    justify-content: center; /* Center horizontally */
    align-items: center; /* Center vertically */
  
}

.ChartSizeTeam {
    height: 450px;
    width: 100%;
    display: flex;
    justify-content: center; /* Center horizontally */
    align-items: center; /* Center vertically */
  
}

.google-visualization-table-table tr td {
    height: 40px;
    /* Adjust the desired height value */
}

.left-text {
    text-align: left;
}

.nav-link {
    cursor: pointer;
}

.radioGroup {
    display: inline-block;
    margin-bottom: 10px;
    margin-right: 10px;
}

@media screen and (max-width: 767px) {
    div.dt-buttons {
        float: none;
        width: 100%;
        text-align: left;
        margin-bottom: .5em;
    }
}

.select2bs4 {
    display: inline-block !important; /* Ensure it's inline with other elements */
    /* Force it to fill the entire container */
}

.gradient-custom {
/* fallback for old browsers */
background: #ffffff;

/* Chrome 10-25, Safari 5.1-6 */
background: -webkit-linear-gradient(to right, rgba(255, 255, 255, 1), rgba(255, 236, 210, 1));

/* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
background: linear-gradient(to right, rgba(255, 255, 255, 1), rgba(255, 236, 210, 1))
}

.carousel-indicators li {
background-color: #282828;
width: 7px;
height: 7px;
border-radius: 50%;
}

@font-face{
 font-family:'digital-clock-font';
 src: url('dist/fontface/Orbitron/static/Orbitron-Bold.ttf');
}

.digital {
    font-family: 'digital-clock-font';
}

.verticalCenter {
    text-align: center;
}
div.dataTables_wrapper {
  width: 100%;
  /*background-color:#FCC;*/
  margin: 0 auto;
}

.dataTables_scrollBody {
  margin-bottom: 5px;
}
.dataTables_length,
.form-control-sm {
  font-size: 0.85rem;
  /* 40px/16=2.5em */
}

.table,
.dataTable tr td {
  padding: 0.35rem 0.50rem;
  margin: 0;
}

.time-font {
    font-family: 'Digital-7';
    font-weight: normal;
    font-style: normal;
    font-size: 112px;
    font-weight: 500;
}

.background 
{
    background: #eee;
  background: linear-gradient(120deg, rgba(50, 150, 100, 0.2) , rgba(0, 0, 100, 0) );
}

.cardBackground {
    background: linear-gradient(to bottom left, #6d7fae, #e6e7e8, #6d7fae,white);
}

.card-DB{
    border-top:3px solid #000043;
   
}
.gradient {
  background: linear-gradient(to right, #0054FF, #000043, #6d7fae, #f15c22, #ffca05);
  width: 100%;
  height: 100px; /* Set an appropriate height for your element */
}
.jWText {
    color:white
}
.thermometer {
    display: inline-block;
    background: linear-gradient(to bottom, #007BFF, #0099CC, #00AEEF, #00C2FF, #00D5FF);
    -webkit-background-clip: text;
    background-clip: text;
    color: transparent;
}

.dropWater {
    display: inline-block;
    background: linear-gradient(to bottom, #00FFFF, #00E6E6, #00CCCC, #00B3B3, #009999, #008080);
    -webkit-background-clip: text;
    background-clip: text;
    color: transparent;
}
.thunder{
    display: inline-block;
    background: linear-gradient(to bottom, #FFD700, #FFC600, #FFB500, #FFA300, #FF9200, #FF8100);
    -webkit-background-clip: text;
    background-clip: text;
    color: transparent;
}
.lightBulb {
    display: inline-block;
    background: linear-gradient(to bottom, #FF5722, #FF6633, #FF7744, #FF8855, #FF9966, #FFAA77);
    -webkit-background-clip: text;
    background-clip: text;
    color: transparent;
}



</style>
