import speech_recognition as sr
from utils import recognize_speech_from_mic
r = sr.Recognizer()
m = sr.Microphone()
print("-----------------START SPEAKING------------------")
response=recognize_speech_from_mic(r, m)  # speak after running this line
print(response)
return_tuple = (response["transcription"],response["success"],response["error"])
connection = mysql.connector.connect(host='localhost',database='icu',user='root',password='')
cursor = connection.cursor()
recordTuple = response
cursor.execute("INSERT INTO audiodata (transcript, success, error) VALUES (%s,%s,%s)",recordTuple)
connection.commit()
print(cursor.rowcount, "Record inserted successfully into database")
cursor.close()
