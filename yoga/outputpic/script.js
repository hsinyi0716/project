document.addEventListener('DOMContentLoaded', () => {
    const imageInput = document.getElementById('imageInput');
    const outputCanvas = document.getElementById('outputCanvas');
    const ctx = outputCanvas.getContext('2d');

    imageInput.addEventListener('change', handleImage);

    async function handleImage(event) {
        const file = event.target.files[0];
        if (file) {
            const imageUrl = URL.createObjectURL(file);
            const image = new Image();
            image.src = imageUrl;
            image.onload = async () => {
                outputCanvas.width = image.width;
                outputCanvas.height = image.height;

                ctx.clearRect(0, 0, outputCanvas.width, outputCanvas.height);
                ctx.drawImage(image, 0, 0);

                const net = await posenet.load();
                const pose = await net.estimateSinglePose(image, {
                    flipHorizontal: false,
                    minPartConfidence: 0.2, // 調整此值
                    scoreThreshold: 0.5,    // 調整此值
                    architecture: 'MobileNetV1',// 嘗試使用更複雜的模型
                    detectionType: 'multiple'
                });

                drawSkeleton(pose);
            };
        }
    }

    function drawSkeleton(pose) {
        const keypoints = pose.keypoints;
        keypoints.forEach(keypoint => {
            ctx.beginPath();
            ctx.arc(keypoint.position.x, keypoint.position.y, 5, 0, 2 * Math.PI);
            ctx.fillStyle = '#FF0000';
            ctx.fill();
        });

        const adjacentKeyPoints = posenet.getAdjacentKeyPoints(keypoints, 0.1);

        adjacentKeyPoints.forEach((keypoints) => {
            ctx.beginPath();
            ctx.moveTo(keypoints[0].position.x, keypoints[0].position.y);
            ctx.lineTo(keypoints[1].position.x, keypoints[1].position.y);
            ctx.strokeStyle = '#FF0000';
            ctx.lineWidth = 2;
            ctx.stroke();
        });
    }
});
