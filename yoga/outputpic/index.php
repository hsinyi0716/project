<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PoseNet Example</title>
  <!-- 引入 TensorFlow.js -->
  <script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs"></script>
  <!-- 引入 PoseNet -->
  <script src="https://cdn.jsdelivr.net/npm/@tensorflow-models/posenet"></script>
</head>
<body>
  <input type="file" id="imageInput" accept="image/*">
  <canvas id="outputCanvas"></canvas>
  <script src="script.js"></script>
</body>
</html>
