from flask import Flask, request, render_template, Response, jsonify
from flask_cors import CORS
import cv2
import numpy as np
import requests
import threading
import mediapipe as mp
import time
from queue import Queue
import base64

app = Flask(__name__)
cors = CORS(app, resources={r"/process_frame": {"origins": "*", "methods": ["POST"], "headers": "Content-Type"}})

api_url = "https://eastus.api.cognitive.microsoft.com/customvision/v3.0/Prediction/d5de92a2-86fe-4b2a-a30d-fb8ac87ec2d4/classify/iterations/Iteration4/image"
api_key = "99aa08b38969472e9dd536cbddfa2551"

api_in_progress = False

mp_hands = mp.solutions.hands
hands = mp_hands.Hands(static_image_mode=False, max_num_hands=1, min_detection_confidence=0.5, min_tracking_confidence=0.5)

mp_drawing = mp.solutions.drawing_utils

result_queue = Queue()

string = []

@app.route('/process_frame', methods=['POST'])
def process_frame():
    global api_in_progress
    # return jsonify("result")
    if not api_in_progress:
        data = request.json
        image_data = data['image']
        imageData = image_data.split(",")[1]

        decoded_data = base64.b64decode(imageData)

        nparr = np.frombuffer(decoded_data, np.uint8)

        image = cv2.imdecode(nparr, cv2.IMREAD_COLOR)

        results = hands.process(image)

        if results.multi_hand_landmarks and not api_in_progress:
            # return jsonify('hand')
            for hand_landmarks in results.multi_hand_landmarks:
                # Get the bounding box coordinates
                x_coords = [landmark.x for landmark in hand_landmarks.landmark]
                y_coords = [landmark.y for landmark in hand_landmarks.landmark]
                min_x, min_y = min(x_coords), min(y_coords)
                max_x, max_y = max(x_coords), max(y_coords)

                # Draw a rectangle around the hand
                h, w, c = image.shape
                x1, y1 = int(min_x * w)-25, int(min_y * h)-25
                x2, y2 = int(max_x * w)+25, int(max_y * h)+25

                # Crop the region inside the rectangle
                hand_crop = image[y1:y2, x1:x2]

                # Create a black background image
                black_bg = np.zeros_like(image)

                # Calculate the offset for placing the cropped hand image onto the black background
                offset_x = (black_bg.shape[1] - hand_crop.shape[1]) // 2
                offset_y = (black_bg.shape[0] - hand_crop.shape[0]) // 2

                # Paste the cropped hand image onto the black background
                black_bg[offset_y:offset_y+hand_crop.shape[0], offset_x:offset_x+hand_crop.shape[1]] = hand_crop
                hand_image = black_bg
                _, img_encoded = cv2.imencode('.jpg', hand_image)
                image_data = img_encoded.tobytes()

                if not api_in_progress:
                    api_in_progress = True
                    thread = threading.Thread(target=classify_image, args=(image_data, result_queue))
                    thread.start()
                    thread.join()
                    result = result_queue.get()
                    prediction = max(result["predictions"], key=lambda x: x["probability"])
                    label = prediction["tagName"]
                    confidence = prediction["probability"]
                    return jsonify(label, confidence)
                else:
                    return jsonify('Thread in progress')
        else:
            return jsonify('No hand')
    else:
        return jsonify('Thread in progress')

def classify_image(image_data, result_queue):
    start_time = time.time()
    global api_in_progress
    print("Thread in progress")
    headers = {
        "Prediction-Key": api_key,
        "Content-Type": "application/octet-stream"
    }


    response = requests.post(api_url, headers=headers, data=image_data)

    result = response.json()
    prediction = max(result["predictions"], key=lambda x: x["probability"])
    label = prediction["tagName"]
    image = cv2.imdecode(np.frombuffer(image_data, np.uint8), -1)
    cv2.imwrite(f'{label}_{time.time()}.jpg', image)

    api_in_progress = False
    result_queue.put(result)

if __name__ == '__main__':
    app.run(debug=True)
