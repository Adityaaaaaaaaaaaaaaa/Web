<?php
    include "Taketwoconnect.php";

    if (isset($_POST['tableSelect']) && $_POST['tableSelect'] !== 'x') {
        $tableName = $_POST['tableSelect'];

        // Check if the selected table is "uploaded_files"
        if ($tableName === 'uploaded_files') {
            if (isset($_POST['fileSelect'])) {
                $fileName = $_POST['fileSelect'];

                // Fetch file content from the database
                $sql = "SELECT filecontent FROM uploaded_files WHERE filename = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("s", $fileName);
                $stmt->execute();
                $stmt->store_result();

                if ($stmt->num_rows === 1) {
                    $stmt->bind_result($fileContent);
                    $stmt->fetch();

                    // Set appropriate headers for file download
                    header('Content-Type: application/octet-stream');
                    header('Content-Disposition: attachment; filename="' . $fileName . '"');
                    header('Content-Length: ' . strlen($fileContent));

                    echo $fileContent;

                    // Display success message
                    echo json_encode(array('status' => 'success', 'message' => 'File download will begin shortly.'));
                } else {
                    // If the file does not exist in the database, return an error message
                    echo json_encode(array('status' => 'error', 'message' => 'The selected file does not exist.<br>Or We could not proceed with your request.<br>Please try again!'));
                }
            } else {
                // If fileSelect is not set, return an error message
                echo json_encode(array('status' => 'error', 'message' => 'Please select a file to download.'));
            }
        } else {
            // For other tables, process according to the selected format
            if (isset($_POST['formatSelect'])) {
                $format = $_POST['formatSelect'];

                $tableName = mysqli_real_escape_string($conn, $tableName);

                $sql = "SELECT * FROM $tableName";
                $result = mysqli_query($conn, $sql);

                if ($result) {
                    $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
                    mysqli_free_result($result);
                    mysqli_close($conn);

                    // Set filename based on selected table and format
                    $filename = $tableName . '.' . $format;

                    // Set appropriate headers for file download
                    switch ($format) {
                        case 'csv':
                            header('Content-Type: text/csv');
                            break;
                        case 'xml':
                            header('Content-Type: application/xml');
                            break;
                        case 'json':
                            header('Content-Type: application/json');
                            break;
                    }
                    header('Content-Disposition: attachment; filename="' . $filename . '"');

                    // Output formatted content based on format
                    switch ($format) {
                        case 'csv':
                            outputCsv($data);
                            break;
                        case 'xml':
                            outputXml($tableName, $data);
                            break;
                        case 'json':
                            outputJson($tableName, $data);
                            break;
                    }
                    exit();
                } else {
                    // If query failed, return an error message
                    echo json_encode(array('status' => 'error', 'message' => 'Database query failed.'));
                }
            } else {
                // If formatSelect is not set, return an error message
                echo json_encode(array('status' => 'error', 'message' => 'Please select a format for download.'));
            }
        }
    } else {
        // If tableSelect is not set or equal to "x", return an error message
        echo json_encode(array('status' => 'error', 'message' => 'Please select a table from the list below.'));
    }

    // Function to output CSV content
    // https://stackoverflow.com/questions/4249432/export-to-csv-via-php 
    // adapted from above
    function outputCsv($data) {
        $output = fopen('php://output', 'w');
        foreach ($data as $row) {
            fputcsv($output, $row);
        }
        fclose($output);
    }

    // Function to output XML content with line breaks and table name adjustments
    // adapted from https://stackoverflow.com/questions/5112282/get-mysql-database-output-via-php-to-xml
    function outputXml($tableName, $data) {
        $xml = new SimpleXMLElement('<' . $tableName . 's></' . $tableName . 's>');
        foreach ($data as $row) {
        $parentElement = $xml->addChild($tableName);
            foreach ($row as $key => $value) {
                $childElement = $parentElement->addChild($key, htmlspecialchars($value));
            }
        }
        // Convert XML to string and add indentation for readability
        $xmlString = $xml->asXML();
        $formattedXml = formatXmlString($xmlString);
        echo $formattedXml;
    }

    // Function to add indentation for XML content
    function formatXmlString($xmlString) {
        $dom = new DOMDocument('1.0');
        $dom->preserveWhiteSpace = false;
        $dom->formatOutput = true;
        $dom->loadXML($xmlString);
        return $dom->saveXML();
    }

    // Function to output JSON content 
    function outputJson($tableName, $data) {
        $jsonData = array();
        foreach ($data as $row) {
            $parentElement = array(); // Initialize parent element for each row
            foreach ($row as $key => $value) {
                $parentElement[$key] = htmlspecialchars($value);
            }
            $jsonData[] = $parentElement;
        }
        // Convert JSON data to string and add line breaks after each record
        $jsonString = json_encode($jsonData);
        $jsonString = str_replace('},{', "},\n{", $jsonString);
        echo $jsonString;
    }

    // Function to manually pretty-print JSON for PHP 5.3 as it is available for PHP > 5.4
    // https://stackoverflow.com/questions/6054033/pretty-printing-json-with-php
    /* resource adapted from the above link 
    function jsonPrettyPrint($json) {
        $result = '';
        $level = 0;
        $in_quotes = false;
        $in_escape = false;
        $ends_line_level = NULL;
        $json_length = strlen($json);

        for ($i = 0; $i < $json_length; $i++) {
            $char = $json[$i];
            $new_line_level = NULL;
            $post = "";
            if ($ends_line_level !== NULL) {
                $new_line_level = $ends_line_level;
                $ends_line_level = NULL;
            }
            if ($in_escape) {
                $in_escape = false;
            } else if ($char === '"') {
                $in_quotes = !$in_quotes;
            } else if (!$in_quotes) {
                switch ($char) {
                    case '}': case ']':
                        $level--;
                        $ends_line_level = NULL;
                        $new_line_level = $level;
                        break;

                    case '{': case '[':
                        $level++;
                    case ',':
                        $ends_line_level = $level;
                        break;

                    case ':':
                        $post = " ";
                        break;

                    case " ": case "\t": case "\n": case "\r":
                        $char = "";
                        $ends_line_level = $new_line_level;
                        $new_line_level = NULL;
                        break;
                }
            } else if ($char === '\\') {
                $in_escape = true;
            }

            if ($new_line_level !== NULL) {
                $result .= "\n".str_repeat("\t", $new_line_level);
            }
            $result .= $char.$post;
        }

        return $result;
    }*/
?>
