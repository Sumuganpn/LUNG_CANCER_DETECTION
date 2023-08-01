import glob
import os
import numpy as np
import cv2
from keras.models import load_model

# Load the saved model
loaded_model = load_model('D:/PROGRAMMING LANGUAGE HOTSPOT/Xampp/htdocs/MNCproject/lung_cancer_detection_model.h5')

# Function to preprocess input image
def preprocess_image(image_path):
    img = cv2.imread(image_path)
    img = cv2.resize(img, (256, 256))  # Assuming VGG16 input shape
    img = np.expand_dims(img, axis=0)
    img = img / 255.0  # Normalize pixel values
    return img

# Function to make predictions
def predict_cancer(image_path):
    # Preprocess the input image
    img = preprocess_image(image_path)

    # Make predictions without verbose output
    with np.printoptions(suppress=True):  # Silence the progress bar
        predictions = loaded_model.predict(img, verbose=0)

    class_labels = ['Bengin_cases', 'Malignant_cases', 'Normal_cases']
    predicted_label = class_labels[np.argmax(predictions)]
    accuracy = np.max(predictions)

    # Return the predicted label and accuracy
    return predicted_label, accuracy

# Retrieve the latest file from the upload folder
upload_folder = 'D:/PROGRAMMING LANGUAGE HOTSPOT/Xampp/htdocs/MNCproject/uploads'
image_files = glob.glob(os.path.join(upload_folder, '*.jpg'))

if len(image_files) > 0:
    latest_file = max(image_files, key=os.path.getctime)
    prediction, accuracy = predict_cancer(latest_file)

    def output():
        return f"{prediction}"

    print(output())
else:
    print("No JPG files found in the upload folder.")
