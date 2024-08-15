<?php
include 'db_connect.php';

// Fetch counts of answers grouped by question_id and answer
$query = "SELECT question_id, answer, COUNT(answer) AS answer_count
          FROM survey_responses
          GROUP BY question_id, answer
          ORDER BY question_id, answer";
$result = $conn->query($query);

$totalRespondentsQuery = "SELECT COUNT(DISTINCT survey_id) as total_respondents FROM survey_responses";
$result2 = $conn->query($totalRespondentsQuery);

$totalRespondents = 0;
if ($result2->num_rows > 0) {
    $row = $result2->fetch_assoc();
    $totalRespondents = $row['total_respondents'];
    $totalRespondents = $totalRespondents/16;
}

$question_data = array();
$labels = array();
$questions = array();

// Process the query result
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $question = $row['question_id'];
        $answer = $row['answer'];

        if (!isset($question_data[$answer])) {
            $question_data[$answer] = array_fill(0, 16, 0);  // Initialize 16 slots for each question_id
        }

        // Map question_id directly, assuming IDs start from 1
        $index = $question - 1; // If the question_id starts from 1
        $question_data[$answer][$index] = (int) $row['answer_count'];

        // Collect labels for the chart (answers)
        if (!in_array($answer, $labels)) {
            $labels[] = $answer;
        }

        // Collect question_ids for the x-axis labels
        if (!in_array($question, $questions)) {
            $questions[] = $question;
        }
    }
}

// Convert the data to JavaScript-friendly format
$question_values = json_encode($question_data);
$labels = json_encode($labels);
$questions = json_encode($questions);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>City Efficiency Chart</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        #sch, #surveyChart {
            margin: auto;
            width: 80%;
            height: 60%;
        }
    </style>
</head>
<body style="background-color:#F0ECE5;">
    <h1 style="text-align:center;">City Efficiency Comparison</h1>
    
    <div id="sch">
        <canvas id="efficiencyChart"></canvas>
    </div>
    
    <h1 style="text-align:center; margin-top:50px;">Live Survey Chart</h1>
    <h2 style="text-align:center;">Total Survey Respondents: <?php echo $totalRespondents; ?></h2>
    <div id="surveyChart">
        <canvas id="surveyDataChart"></canvas>
    </div>

    <script>
        // First Static Chart
        const ctx1 = document.getElementById('efficiencyChart').getContext('2d');

        const data1 = {
            labels: ['Geographical Location', 'Topographical', 'Proximity to Infrastructure', 'Efficiency if only 1 SPR is used'],
            datasets: [
                {
                    label: 'Yangon',
                    data: [90, 35, 80, 30],
                    backgroundColor: 'rgba(255, 99, 132, 0.8)', 
                    borderColor: 'rgba(255, 99, 132, 1)', 
                    borderWidth: 2,
                    barThickness: 25
                },
                {
                    label: 'Mandalay',
                    data: [60, 50, 60, 90],
                    backgroundColor: 'rgba(54, 162, 235, 0.8)',  
                    borderColor: 'rgba(54, 162, 235, 1)', 
                    borderWidth: 2,
                    barThickness: 25
                },
                {
                    label: 'Hpa Kant',
                    data: [20, 50, 40, 100],
                    backgroundColor: 'rgba(75, 192, 192, 0.8)', 
                    borderColor: 'rgba(75, 192, 192, 1)', 
                    borderWidth: 2,
                    barThickness: 25
                },
                {
                    label: 'Mawlamyine',
                    data: [30, 70, 30, 100],
                    backgroundColor: 'rgba(153, 102, 255, 0.8)',  
                    borderColor: 'rgba(153, 102, 255, 1)', 
                    borderWidth: 2,
                    barThickness: 25
                }
            ]
        };

        const config1 = {
            type: 'bar',
            data: data1,
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 100,
                        ticks: {
                            font: {
                                size: 20  
                            }
                        }
                    },
                    x: {
                        ticks: {
                            font: {
                                size: 20 
                            }
                        }
                    }
                },
                plugins: {
                    legend: {
                        labels: {
                            font: {
                                size: 20 
                            }
                        }
                    }
                },
                elements: {
                    bar: {
                        borderWidth: 2,
                    }
                },
                barPercentage: 0.6,  
                categoryPercentage: 0.7 
            }
        };

        const efficiencyChart = new Chart(ctx1, config1);

        // Second Chart from Database
        const ctx2 = document.getElementById('surveyDataChart').getContext('2d');

        // Use the PHP data
        const surveyData = <?php echo $question_values; ?>;
        const labels = <?php echo $labels; ?>;
        const questions = <?php echo $questions; ?>;

        // Build datasets dynamically
        const datasets = Object.keys(surveyData).map((label, index) => {
            const colors = ['rgba(255, 99, 132, 0.8)', 'rgba(54, 162, 235, 0.8)', 'rgba(75, 192, 192, 0.8)', 'rgba(153, 102, 255, 0.8)'];
            const borderColors = ['rgba(255, 99, 132, 1)', 'rgba(54, 162, 235, 1)', 'rgba(75, 192, 192, 1)', 'rgba(153, 102, 255, 1)'];
            return {
                label: label,
                data: surveyData[label],
                backgroundColor: colors[index % colors.length],  
                borderColor: borderColors[index % borderColors.length],
                borderWidth: 2,
                barThickness: 15
            };
        });

        const data2 = {
            labels: questions, // Use question IDs as x-axis labels
            datasets: datasets
        };

        const config2 = {
            type: 'bar',
            data: data2,
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        max: Math.max(...Object.values(surveyData).flat()) || 100, 
                        ticks: {
                            font: {
                                size: 20
                            }
                        }
                    },
                    x: {
                        ticks: {
                            font: {
                                size: 20
                            }
                        }
                    }
                },
                plugins: {
                    legend: {
                        labels: {
                            font: {
                                size: 20
                            }
                        }
                    }
                },
                elements: {
                    bar: {
                        borderWidth: 2,
                    }
                },
                barPercentage: 0.6,  
                categoryPercentage: 0.7  
            }
        };

        const surveyDataChart = new Chart(ctx2, config2);
    </script>
</body>
</html>
