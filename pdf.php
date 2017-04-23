<?php
    include('session.php');
    include('config.php');
    require('vendor/php/fpdf.php');

    class PDF extends FPDF {

      // Page header
      function Header(){

          $this->SetFont('Arial','B',15);
          // Move to the right
          $this->Cell(80);
          // Title
          $this->Cell(30,10,'M8Reborn',0,0,'C');
          // Line break
          $this->Ln(20);
      }

      // Page footer
      function Footer() {
          // Position at 1.5 cm from bottom
          $this->SetY(-15);
          // Arial italic 8
          $this->SetFont('Arial','I',8);
          // Page number
          $this->Cell(0,10,$this->PageNo().'/{nb}',0,0,'C');
      }
}

// Instanciation of inherited class
  $pdf = new PDF();

  $pdf->AliasNbPages();

  $pdf->AddPage();

  $pdf->SetFont('Times','',16);

  $pdf->SetLeftMargin(20);

  $pdf->Cell(0,15,'Teachers',0,1);

  $pdf->Line(20, 40, 210-20, 40);

  $pdf->SetFont('Times','',12);

  $university = $_SESSION['login_user'];

  $ses_sql = mysqli_query($conn,"SELECT UNI_ID FROM UNI WHERE UNI_NAME = '". mysqli_real_escape_string($conn, $university) ."'");

  $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

  $uniID = $row['UNI_ID'];

  $result = mysqli_query($conn, "SELECT * FROM TEACHER WHERE T_UNI = '". mysqli_real_escape_string($conn, $uniID) ."'");

  while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

      $pdf->SetLeftMargin(30);

      $name = $row["T_NAME"];

      if($row["T_PAR"] == 0){
          $partial = "Partial Time";
      } else {
          $partial = "Full Time";
      }
      $bac = $row["T_BAC"];
      $mas = $row["T_MAS"];
      $phd = $row["T_PHD"];
      $wpl = $row["T_WPL"];

      $pdf->Cell(0,10,$name,0,1);

      $pdf->SetLeftMargin(40);

      $pdf->Cell(0,10,$partial,0,1);
      $pdf->Cell(0,10,'Number of bachelor degrees: '.$bac,0,1);
      $pdf->Cell(0,10,'Number of master degrees: '.$mas,0,1);
      $pdf->Cell(0,10,'Number of PhD: '.$phd,0,1);

      $work = "";

      $pdf->Cell(0,10,'Work Locations',0,1);

      $pdf->SetLeftMargin(50);

      for ($i=0; $i < strlen($wpl); $i++) {
        if($wpl[$i] == ',' || ($wpl[$i] == substr($wpl, -1) && $i > strlen($wpl) - 2)){
          if($wpl[$i] == ','){
            $pdf->Cell(0,10,$work,0,1);
          } else {
            $pdf->SetLeftMargin(40);
            $pdf->Cell(0,10,$work.$wpl[strlen($wpl)-1],0,1);
          }
          $work = "";
        } else {
          $work .= $wpl[$i];
        }
      }

      $pdf->SetLeftMargin(30);

      $pdf->Cell(0,10,'UCs',0,1);

      $pdf->SetLeftMargin(50);

      $search = mysqli_query($conn, "SELECT UC_NAME FROM UC WHERE UC_TEAC = '". mysqli_real_escape_string($conn, $name) ."'");

      $uclist = "";

      $count = 0;

      while ($ucs = mysqli_fetch_array($search, MYSQLI_ASSOC)) {
        $count++;
      }

      $count2 = 0;

      while ($ucs = mysqli_fetch_array($search, MYSQLI_ASSOC)) {
        $count2++;

        if($count2 == $count){
          $pdf->SetLeftMargin(30);
        }
        $uclist .= $ucs["UC_NAME"];
        $pdf->Cell(0,10,$ucs["UC_NAME"],0,1);
      }

      //arranjar margem
      //bullet points fpdf
      //php row count

      if($uclist == ""){
        $pdf->SetLeftMargin(20);
        $pdf->Cell(0,10,"No info",0,1);
      }

      $pdf->Line(20, $pdf->getY(), 210-20, $pdf->getY());
    }

  $pdf->Output();

?>
