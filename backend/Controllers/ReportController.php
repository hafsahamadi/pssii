<?php

require_once "../models/Report.php";

class ReportController {
    
    public function generateReport() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $reportType = trim($_POST["report_type"]);

            $reportModel = new Report();
            $data = $reportModel->getReportData($reportType);

            if ($data) {
                header("Content-Type: application/vnd.ms-excel");
                header("Content-Disposition: attachment; filename=report_" . $reportType . ".csv");
                
                $output = fopen("php://output", "w");
                fputcsv($output, array_keys($data[0]));
                
                foreach ($data as $row) {
                    fputcsv($output, $row);
                }
                fclose($output);
                exit();
            } else {
                echo "Aucune donnée disponible pour ce type de rapport.";
            }
        }
    }

    public function getAvailableReports() {
        $reportModel = new Report();
        return $reportModel->getAvailableReports();
    }
}

?>