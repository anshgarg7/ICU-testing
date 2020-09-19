import speech_recognition as sr
from utils import recognize_speech_from_mic
import mysql.connector
from mysql.connector import Error
from mysql.connector import errorcode
r = sr.Recognizer()
m = sr.Microphone()
print("-----------------START SPEAKING------------------")
response=recognize_speech_from_mic(r, m)  # speak after running this line
print(response)
test = []
test.append(response["transcription"])
test.append(response["success"])
test.append(response["error"])
return_tuple = (test[0],test[1],test[2])
connection = mysql.connector.connect(host='localhost',database='icu',user='root',password='')
cursor = connection.cursor()
recordTuple = return_tuple
print(recordTuple)
cursor.execute("""INSERT INTO audiodata (transcript, success, error) VALUES (%s,%s,%s);""",recordTuple)
connection.commit()
print(cursor.rowcount, "Record inserted successfully into database")
cursor.close()
