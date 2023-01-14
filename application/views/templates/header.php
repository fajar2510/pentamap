<!DOCTYPE html>
<html lang="en">



<head >
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title><?= $title; ?></title>

  <!-- logo  -->
  <link rel="shortcut icon" href="<?php echo base_url() ?>assets/img/auth/jatim.ico">

  <!-- Custom fonts awesome for this template-->
  <link href="<?= base_url('assets/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="<?= base_url('assets/'); ?>vendor/fontawesome-free-6.1.2/css/all.min.css" rel="stylesheet" type="text/css">
  <!-- Custom fonts awesome for this template-->
  
  <!-- font & backup font nunito -->
  <!-- <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet"> -->
  <!-- <link href="<?= base_url('assets/'); ?>font/nunito/font-nunito.css" rel="stylesheet"> -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono&display=swap" rel="stylesheet" />
  <!-- <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono&display=swap&text=RobtMn" rel="stylesheet" /> -->

  <!-- css sb admin 2 template this bootstrap -->
  <link href="<?= base_url('assets/'); ?>css/sb-admin-2.min.css" rel="stylesheet">
  <link href="<?= base_url('assets/'); ?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <!-- css sb admin 2 template this bootstrap -->

  <!-- LEAFLET CSS , PLUGIN -->
   
  <!-- <link href="<?= base_url('assets/'); ?>leaflet/leaflet.css" rel="stylesheet"> -->
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css"integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ=="crossorigin=""/>
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>leaflet/leaflet-fullscreen-master/Control.FullScreen.css"/>
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>leaflet/leaflet-search/src/leaflet-search.css" />
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>leaflet/cluster/dist/MarkerCluster.css" />
	<link rel="stylesheet" href="<?= base_url('assets/'); ?>leaflet/cluster/dist/MarkerCluster.Default.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw.css" integrity="sha512-gc3xjCmIy673V6MyOAZhIW93xhM9ei1I+gLbmFjUHIjocENRsLX/QUE1htk5q1XV2D/iie/VQ8DXI6Vu8bexvQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	
  
  <!-- <link rel="stylesheet" href="<?= base_url('assets/'); ?>leaflet/Leaflet.label/dist/leaflet.label.css" /> -->
  <!-- <link rel="stylesheet" href="<?= base_url('assets/'); ?>leaflet/leaflet.Legend/src/leaflet.legend.css" /> -->
  <!-- <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" /> -->
  <!-- LEAFLET CSS , PLUGIN -->

  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/js-select2/css/bootstrap-select.css');?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/jquery-ui/jquery-ui.min.css');?>">

  <!-- PURE CSS MINIFI -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/purecss@2.1.0/build/pure-min.css" integrity="sha384-yHIFVG6ClnONEA5yB5DJXfW2/KC173DIQrYoZMEtBvGzmf0PKiGyNEqe9N6BNDBH" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/purecss@2.1.0/build/grids-responsive-min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/combine/npm/purecss@2.1.0/build/base-min.css,npm/purecss@2.1.0/build/grids-min.css,npm/purecss@2.1.0/build/forms-min.css" />
 
  <!-- backup css local pure css -->
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/pure-css/forms-min.css" />
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/pure-css/pure-min.css" />
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/pure-css/grids-responsive-min.css" >
  <!-- PURE CSS MINIFI -->

  <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/select2-FlatTheme/dist/select2-flat-theme.css" >
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/select2-FlatTheme/dist/select2-flat-theme.min.css">

  <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@x.x.x/dist/select2-bootstrap4.min.css"> -->
  
  <!-- <link href="https://netdna.bootstrapcdn.com/bootstrap/2.3.2/css/bootstrap.min.css" rel="stylesheet"> -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/css/datepicker.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

  <!-- <script src="<?= base_url('assets/'); ?>sweetalert2/package/dist/sweetalert2.min.js"></script>
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>sweetalert2/package/dist/sweetalert2.min.css"> -->

 



  <style type="text/css">
    /* body { margin:0; padding:0; } */
    #mapp { height: 530px; }
    #map { height: 400px; }
    #mapgeojson { height: 620px; }
    #mapcluster { height: 450px; }
    #mapltlg { height: 390px; width: 710px }
    #mapltlg_detail { height: 460px; width: 390px }
    #mapupt { height: 390px; width: 550px }
    #mapupt-index { height: 520px; width: 450px }
  </style>

  <!-- style untuk konfigura table border padding dll global -->
  <style type="text/css">
          table {
              border-collapse: collapse;
              width: 100%;
              /* text-align: center; */
              padding: 0px;
          }
          table,
          th {
              height: 1px;
             
              padding: 0px;
          }
          thead {
              height: 1px;
             
              padding: 0px;
          }
          td {          
            padding: 0px;
              /* text-align: center; */
          }
          label {          
            padding: 0px;
              /* text-align: center; */
          }
          section {          
            padding: 0px;
              /* text-align: center; */
          }
          div {          
            padding: 0px;
            margin-top: 0px;
            margin-bottom: 0px;
            margin-right: 0px;
            margin-left: 0px;
            
              /* text-align: center; */
          }

          .dropdown {
              .dropdown-menu {
                  transition: all 0.5s;
                  overflow: hidden;
                  transform-origin: top center;
                  transform: scale(1,0);
                  display: block;
              }
              &:hover {
                  .dropdown-menu {
                      transform: scale(1);
                  }
              }
          }


          .select {
              text-align-last:right;
              padding-right: 29px;
              direction: rtl;
              /* text-align-last: center; */
              width: 100%;
              min-width: 15ch;
              max-width: 30ch;
              border: 1px solid var(--select-border);
              border-radius: 0.25em;
              padding: 0.25em 0.5em;
              font-size: 1.25rem;
              cursor: pointer;
              line-height: 1.1;
              background-color: #fff;
              background-image: linear-gradient(to top, #f9f9f9, #fff 33%);
            }

            .select::after {
              content: "";
              width: 0.8em;
              height: 0.5em;
              background-color: var(--select-arrow);
              clip-path: polygon(100% 0%, 0 0%, 50% 100%);
            }

            .select--disabled {
              cursor: not-allowed;
              background-color: #eee;
              background-image: linear-gradient(to top, #ddd, #eee 33%);
            }

            img{
              max-width:200px;
            }
            input[type=file]{
            padding:10px;
            background:#2d2d2d;
          }
          .edit-foto {
            position: relative;
            text-align: center;
            color: white;
          }
          .diatas-gambar {
            display: inline-block;
            border-radius: 50%;
            width: 15%;
            position: absolute;
            top: 80%;
            left: 50%;
            transform: translate(-50%, -50%);
            opacity: 55%;
          }
          .ui-datepicker-calendar {
              display: none;
          }
          
    </style>
    <!-- style untuk konfigura table border padding dll global -->


    <style>
        #snackbar {
        visibility: hidden;
        min-width: 250px;
        margin-left: -125px;
        background-color: #fff ;
        color: #333;
        text-align: center;
        border-radius: 2px;
        padding: 16px;
        position: fixed;
        z-index: 1;
        left: 50%;
        bottom: 30px;
        font-size: 17px;
        font-weight: 50px;
        }

        #snackbar.show {
        visibility: visible;
        -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
        animation: fadein 0.5s, fadeout 0.5s 2.5s;
        }

        @-webkit-keyframes fadein {
        from {bottom: 0; opacity: 0;} 
        to {bottom: 30px; opacity: 1;}
        }

        @keyframes fadein {
        from {bottom: 0; opacity: 0;}
        to {bottom: 30px; opacity: 1;}
        }

        @-webkit-keyframes fadeout {
        from {bottom: 30px; opacity: 1;} 
        to {bottom: 0; opacity: 0;}
        }

        @keyframes fadeout {
        from {bottom: 30px; opacity: 1;}
        to {bottom: 0; opacity: 0;}
        }
    </style>
  
  <!-- untuk memeberikan efek loading di pramuat halaman -->
  <style type="text/css">
      .preloader {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 9999;
        background-color: #fff;
        opacity: 70%;
      }
      .preloader .loading {
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%,-50%);
        font: 14px arial;
      }
  </style>

  <style>
  
      /*Legend specific*/
    .legend {
      padding: 6px 8px;
      font: 14px Arial, Helvetica, sans-serif;
      background: white;
      background: rgba(255, 255, 255, 0.8);
      /*box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);*/
      /*border-radius: 5px;*/
      line-height: 24px;
      color: #555;
    }
    .legend h4 {
      text-align: center;
      font-size: 16px;
      margin: 2px 12px 8px;
      color: #1B2430;
      font-weight:bold;
    }

    .legend span {
      position: relative;
      bottom: 3px;
    }

    .legend i {
      width: 18px;
      height: 18px;
      float: left;
      margin: 0 8px 0 0;
      opacity: 0.7;
    }

    .legend i.icon {
      background-size: 18px;
      background-color: rgba(255, 255, 255, 1);
    }


    /* bin tooltip  */
    .leaflet-tooltip-left:before {
    right: 0;
    margin-right: -12px;
    border-left-color: rgba(255, 255, 255, 1);
    }
    .leaflet-tooltip-right:before {
        left: 0;
        margin-left: -12px;
        border-right-color: rgba(255, 255, 255, 1);
        }
    .leaflet-tooltip-own {
        position: absolute;
        padding: 4px;
        background-color: rgba(255, 255, 255, 0.55);
        border: 0px solid #000;
        color: #2C3333;
        font-weight:bold;
        font-size: 80%;
        white-space: nowrap;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        pointer-events: none;
        border-radius: 50%;
    }

    .leaflet-tooltip-own-upt {
        position: absolute;
        padding: 4px;
        background-color: rgba(10, 10, 10, 1);
        border: 0px solid #000;
        color: white;
        font-weight:bold;
        font-size: 90%;
        white-space: nowrap;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        pointer-events: none;
        border-radius: 70%;
    }
    

  
    

  </style>

<style>
    /* marker kantor UPT */
  .marker-cluster-upt-small {
    background-color: rgba(252, 10, 203, 0.7), 0.65);
    }
    .marker-cluster-upt-small div {
    background-color: rgba(221, 60, 221, 0.65);
    }
    .marker-cluster-upt-medium {
    background-color: rgba(251, 180, 221, 0.65);
    }
    .marker-cluster-upt-medium div {
    background-color: rgba(256, 124, 230, 0.65);
    }

    .marker-cluster-upt-large {
    background-color: rgba(252, 10, 203, 0.7);
    }
    .marker-cluster-upt-large div {
    background-color: rgba(252, 122, 203, 0.8);
    }
  </style>

<style>
    /* marker Lokal */
  .marker-cluster-lokal-small {
    background-color: rgba(100, 90, 225, 0.3);
    }
    .marker-cluster-lokal-small div {
    background-color: rgba(100, 100, 225, 0.4);
    }
    .marker-cluster-lokal-medium {
    background-color: rgba(100, 100, 225, 0.5);
    }
    .marker-cluster-lokal-medium div {
    background-color: rgba(100, 100, 215, 0.65);
    }

    .marker-cluster-lokal-large {
    background-color: rgba(100, 100, 225, 0.7);
    }
    .marker-cluster-lokal-large div {
    background-color: rgba(100, 100, 300, 0.8);
    }
  </style>

  <style>
    /* marker PHK */
  .marker-cluster-phk-small {
    background-color: rgba(218, 94, 94, 0.6);
    }
    .marker-cluster-phk-small div {
    background-color: rgba(226, 36, 36, 0.6);
    }
    .marker-cluster-phk-medium {
    background-color: rgba(241, 211, 87, 0.6);
    }
    .marker-cluster-phk-medium div {
    background-color: rgba(240, 194, 12, 0.6);
    }

    .marker-cluster-phk-large {
    background-color: rgba(253, 156, 115, 0.6);
    }
    .marker-cluster-phk-large div {
    background-color: rgba(241, 128, 23, 0.6);
    }
  </style>

<style>
    /* marker TKA */
  .marker-cluster-tka-small {
    background-color: rgba(141, 250, 236, .6);
    }
    .marker-cluster-tka-small div {
    background-color: rgba(0, 200, 151, 0.6);
    }
    .marker-cluster-tka-medium {
    background-color: rgba(190, 235, 187, 0.6);
    }
    .marker-cluster-tka-medium div {
    background-color: rgba(142, 219, 200, 0.6);
    }

    .marker-cluster-tka-large {
    background-color: rgba(223, 247, 221, 0.6);
    }
    .marker-cluster-tka-large div {
    background-color: rgba(8, 205, 156,  0.6);
    }
</style>

<style>
    /* marker CPMI */
  .marker-cluster-cpmi-small {
    background-color: rgba(10, 161, 221,.6);
    }
    .marker-cluster-cpmi-small div {
    background-color: rgba(0, 147, 239, 0.6);
    }
    .marker-cluster-cpmi-medium {
    background-color: rgba(121, 218, 232, 0.6);
    }
    .marker-cluster-cpmi-medium div {
    background-color: rgba(134, 201, 242, 0.6);
    }

    .marker-cluster-cpmi-large {
    background-color: rgba(78, 173, 232, 0.6);
    }
    .marker-cluster-cpmi-large div {
    background-color: rgba(10, 112, 255,  0.6);
    }
</style>

<style>
    /* marker PHK */
  .marker-cluster-pmib-small {
    background-color: rgba(245, 236, 111, 0.6);
    }
    .marker-cluster-pmib-small div {
    background-color: rgba(241, 128, 23, 0.6);
    }
    .marker-cluster-pmib-medium {
    background-color: rgba(241, 211, 87, 0.6);
    }
    .marker-cluster-pmib-medium div {
    background-color: rgba(240, 194, 12, 0.6);
    }

    .marker-cluster-pmib-large {
    background-color: rgba(253, 156, 115, 0.6);
    }
    .marker-cluster-pmib-large div {
    background-color: rgba(255, 183, 43, 0.6);
    }
  </style>

<style>

        /* IE 6-8 fallback colors */
    .leaflet-oldie .marker-cluster-small {
      background-color: rgb(181, 226, 140);
      }
    .leaflet-oldie .marker-cluster-small div {
      background-color: rgb(110, 204, 57);
      }

    .leaflet-oldie .marker-cluster-medium {
      background-color: rgb(241, 211, 87);
      }
    .leaflet-oldie .marker-cluster-medium div {
      background-color: rgb(240, 194, 12);
      }

    .leaflet-oldie .marker-cluster-large {
      background-color: rgb(253, 156, 115);
      }
    .leaflet-oldie .marker-cluster-large div {
      background-color: rgb(241, 128, 23);
    }

    

      /* text marker */
    .marker-cluster {
      background-clip: padding-box;
      border-radius: 35px;
      }
    .marker-cluster div {
      width: 50px;
      height: 50px;
      margin-left: -5px;
      margin-top: -5px;

      text-align: center;
      border-radius: 50px;
      font: 38px "Helvetica Neue", Arial, Helvetica, sans-serif;
      color: white;
      }
    .marker-cluster span {
      line-height: 50px;
      }
  </style>
  
    <!-- <style>
    	.leaflet-container {
			height: 400px;
			width: 600px;
			max-width: 100%;
			max-height: 100%;
		}
    </style> -->

   

</head>

<!-- batas body -->
<body id="page-top"  >
<div class="preloader">
  <div class="loading">
    <img src="<?= base_url("assets/img/loading/FALLING_LOADER.gif"); ?>" width="100">
    <p><b> Sedang memuat . . . </b></p>
  </div>
</div>

  <!-- Page Wrapper -->
  <div id="wrapper">