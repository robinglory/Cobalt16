<?php
include 'db_connect.php'; // Include your database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $responses = $_POST['responses']; // Get the responses from the form

    // Insert responses into the database
    foreach ($responses as $question_id => $city) {
        $dimension_id = ceil($question_id / 4); // Calculate dimension ID (1-4)
        $stmt = $conn->prepare("INSERT INTO survey_responses (question_id, dimension_id, answer) VALUES (?, ?, ?)");
        $stmt->bind_param('iis', $question_id, $dimension_id, $city);
        $stmt->execute();
    }

    echo "<div class='container mt-5'><p class='alert alert-success'>Thank you for taking the survey!</p></div>";
    exit;
}

// Survey questions
$questions = [
    "Which city has the highest electricity demand?",
    "In which city is the proximity to existing power infrastructure the closest?",
    "Which city has the most significant geographical challenges for energy infrastructure?",
    "Which city’s community would likely be most supportive of small nuclear power plants?",
    "Which city experiences peak electricity demand in the morning?",
    "In which city is energy storage seen as a critical need during off-peak hours?",
    "What city is projected to have the fastest timeline for implementing small nuclear power plants?",
    "Which city would benefit most from operational schedules tailored to local needs?",
    "Which city has the highest industrial electricity consumption?",
    "In which city are environmental considerations most likely to impact SNPP placement?",
    "Which city has the greatest need for reliable electricity sources?",
    "In which city would community engagement be critical for the success of SNPP projects?",
    "Which city’s residents are most concerned about energy reliability?",
    "In which city are peak demand times most critical for SNPP operation planning?",
    "Which city has the highest population density impacting energy needs?",
    "Which city is most likely to benefit from innovative energy solutions like SNPPs?"
];

$cities = ["Yangon", "Mandalay", "Hpa Kant", "Mawlamyine"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Survey on Small Modular Reactors</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #F0ECE5;
        }
        .container {
            background-color: #fff;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h1 {
            margin-bottom: 1.5rem;
            font-size: 1.5rem;
            color: #333;
        }
        .form-check {
            margin-bottom: 0.5rem;
        }
        .btn-primary {
            background-color: #0056b3;
            border-color: #004494;
        }
        .btn-primary:hover {
            background-color: #004494;
            border-color: #003377;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1>Survey on Small Modular Reactors in Myanmar</h1>
        <form method="POST" action="">
            <?php foreach ($questions as $index => $question): ?>
                <div class="mb-4">
                    <h5><?php echo ($index + 1) . ". " . $question; ?></h5>
                    <?php foreach ($cities as $city): ?>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="responses[<?php echo $index + 1; ?>]" value="<?php echo $city; ?>" required>
                            <label class="form-check-label">
                                <?php echo $city; ?>
                            </label>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endforeach; ?>
            <button type="submit" class="btn btn-primary">Submit Survey</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
