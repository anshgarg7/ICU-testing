import speech_recognition as sr
from utils import recognize_speech_from_mic
r = sr.Recognizer()
m = sr.Microphone()
print("-----------------START SPEAKING------------------")
response=recognize_speech_from_mic(r, m)  # speak after running this line
print(response)
