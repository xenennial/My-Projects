import cv2
import json
from ultralytics import YOLO
import supervision as sv

model = YOLO("best.pt")

def main():
    # Load an image from file
    img = cv2.imread('hasil/1.jpg')

    img = cv2.resize(img, (640, 640))

    box_annotator = sv.BoxAnnotator(
        thickness=1
    )

    result = model(img, conf=0.1)[0]
    detections = sv.Detections.from_yolov8(result)

    annotated_img = box_annotator.annotate(
        scene=img,
        detections=detections
    )

    annotated_img = cv2.resize(annotated_img, (1080, 720))
    cv2.imshow("yolov8", annotated_img)
    cv2.waitKey(0)
    cv2.destroyAllWindows()

if __name__ == "__main__":
    main()
