# Thapar-ICU-Digitization
![thapar](https://github.com/AryanSethi/Thapar-ICU-Digitization/blob/master/assets/thapar.jpg)
</br>
A team project in Thapar Univ. to create an ICU digitization system for a hospital in Patiala to minimize the use of Pen/Paper and speed up the observation process.

The USP of the project is bsically a voice-guided system which will include everything from recording patient's conditions to something very specific like it's diet chart.


## Back End 
We are using an apache server on the backend that'll host the [Web Applicaiton][2] we have created [here][1]. This Website is a dashboard for the doctors as well as nurses to access the details of every ICU patient on demand from our database. Acoording to different logins, the user will have the rights to READ  or  READ & WRITE the patient data in ICU. Each doctor as well as nurse will have a separate profile to manage their patient details.
![webapp](https://github.com/AryanSethi/Thapar-ICU-Digitization/blob/master/assets/Screenshot%202020-09-16%20143426.png)

## Voice Recognition System
Inside the ICU, it's not very efficient for a doctor to waste time writing records on notebooks using pen and paper. Moreover maintaining these records and documents becomes a highly tedious task after some time. We have shifted the entire system to **Voice Recognition**. The doctor/nurse comes inside the ICU, observes the patient and says those details instead of writing them. That voice is converted to text (using the **Google speech recognition API**), confirmed, processed and sent to the database for later access. 


[1]: https://github.com/anshgarg7/ICU_Project        "Github"
[2]: https://codemonk-health.000webhostapp.com/        "SehatApplication"
