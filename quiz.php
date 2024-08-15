<?php
session_start();



// Define quiz questions and options
$questions = [
    [
        'question' => 'What is nuclear fission?',
        'options' => [
            'A process where atomic nuclei combine to form a heavier nucleus.',
            'A process where atomic nuclei split into smaller parts.',
            'A process that converts nuclear energy into electrical energy.',
            'A method for enhancing nuclear power plant efficiency.'
        ],
        'answer' => 1 // Index of the correct option
    ],
    [
        'question' => 'What is the primary fuel used in nuclear reactors?',
        'options' => [
            'Uranium',
            'Coal',
            'Natural Gas',
            'Plutonium'
        ],
        'answer' => 0 // Index of the correct option
    ]
];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $score = 0;

    foreach ($questions as $index => $question) {
        $user_answer = isset($_POST['q' . $index]) ? intval($_POST['q' . $index]) : -1;
        if ($user_answer === $question['answer']) {
            $score++;
        }
    }

    echo "<div class='container'>";
    echo "<h2>Quiz Results</h2>";
    echo "<p>You scored $score out of " . count($questions) . ".</p>";
    echo "<a href='quiz.php' class='btn btn-primary'>Try Again</a>";
    echo "<a href='dashboard.php' class='btn btn-secondary'>Back to Dashboard</a>";
    echo "</div>";
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #181818;
            color: #f1f1f1;
        }
        .container {
            max-width: 800px;
            margin-top: 50px;
            background-color: #2b2b2b;
            padding: 20px;
            border-radius: 8px;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .btn-secondary {
            background-color: #6c757d;
            border: none;
        }
        .btn-secondary:hover {
            background-color: #5a6268;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Nuclear Energy Quiz</h1>
        <form action="quiz.php" method="POST">
            <?php foreach ($questions as $index => $question): ?>
                <div class="form-group">
                    <label><?php echo htmlspecialchars($question['question']); ?></label><br>
                    <?php foreach ($question['options'] as $optIndex => $option): ?>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="q<?php echo $index; ?>" value="<?php echo $optIndex; ?>" id="q<?php echo $index; ?>_<?php echo $optIndex; ?>" required>
                            <label class="form-check-label" for="q<?php echo $index; ?>_<?php echo $optIndex; ?>">
                                <?php echo htmlspecialchars($option); ?>
                            </label>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endforeach; ?>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <a href="dashboard.php" class="btn btn-secondary mt-3">Back to Dashboard</a>
    </div>
</body>
</html>
